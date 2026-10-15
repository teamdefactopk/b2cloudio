<?php
declare(strict_types=1);

/**
 * Brings an existing installation up to date with new default content.
 * Runs automatically on the first request after an update. Text that an editor
 * has changed in the dashboard is never overwritten: only values that still
 * match the previous defaults are replaced.
 */
final class Migrate
{
    public const VERSION = 2;

    public static function run(): void
    {
        $current = (int)(Db::value("SELECT v FROM settings WHERE k = 'schema_version'") ?? 1);
        if ($current >= self::VERSION) {
            return;
        }
        if ($current < 2) {
            self::toV2();
        }
        Db::exec('INSERT INTO settings (k, v) VALUES (?, ?) ON DUPLICATE KEY UPDATE v = VALUES(v)', ['schema_version', (string)self::VERSION]);
    }

    private static function toV2(): void
    {
        $old = json_decode((string)file_get_contents(__DIR__ . '/migrations/v1-defaults.json'), true) ?: [];

        // New settings and blocks are added; changed defaults replace untouched old defaults.
        foreach (Seed::settings() as $k => $v) {
            Db::exec('INSERT IGNORE INTO settings (k, v) VALUES (?, ?)', [$k, $v]);
            if (isset($old['settings'][$k]) && $old['settings'][$k] !== $v) {
                Db::exec('UPDATE settings SET v = ? WHERE k = ? AND v = ?', [$v, $k, $old['settings'][$k]]);
            }
        }
        $sort = (int)Db::value('SELECT COALESCE(MAX(sort), 0) FROM blocks');
        foreach (Seed::blocks() as [$k, $page, $label, $type, $v]) {
            Db::exec('INSERT IGNORE INTO blocks (k, page, label, type, v, sort) VALUES (?,?,?,?,?,?)', [$k, $page, $label, $type, $v, ++$sort]);
            Db::exec('UPDATE blocks SET page = ?, label = ?, type = ? WHERE k = ?', [$page, $label, $type, $k]);
            if (isset($old['blocks'][$k]) && $old['blocks'][$k] !== $v) {
                Db::exec('UPDATE blocks SET v = ? WHERE k = ? AND v = ?', [$v, $k, $old['blocks'][$k]]);
            }
        }

        foreach (Seed::services() as $list) {
            foreach ($list as [$slug, , , $summary, $desc, $do, $get, $ideal]) {
                $new = ['summary' => $summary, 'description' => $desc, 'do_items' => $do, 'get_items' => $get, 'ideal' => $ideal];
                foreach ($new as $col => $v) {
                    $was = $old['services'][$slug][$col] ?? null;
                    if ($was !== null && $was !== $v) {
                        Db::exec("UPDATE services SET `$col` = ? WHERE slug = ? AND `$col` = ?", [$v, $slug, $was]);
                    }
                }
            }
        }

        foreach (Seed::commitments() as $i => [$t, $b]) {
            [$ot, $ob] = $old['commitments'][$i] ?? [null, null];
            if ($ot !== null && ($ot !== $t || $ob !== $b)) {
                Db::exec('UPDATE commitments SET title = ?, body = ? WHERE title = ? AND body = ?', [$t, $b, $ot, $ob]);
            }
        }

        foreach (Seed::offices() as $i => [$c, $r, $d]) {
            [$oc, $or, $od] = $old['offices'][$i] ?? [null, null, null];
            if ($oc === $c) {
                Db::exec('UPDATE offices SET region = ? WHERE country = ? AND region = ?', [$r, $c, $or]);
                Db::exec('UPDATE offices SET description = ? WHERE country = ? AND description = ?', [$d, $c, $od]);
            }
        }

        foreach (Seed::faqs() as $i => [$q, $a]) {
            [$oq, $oa] = $old['faqs'][$i] ?? [null, null];
            if ($oq === $q && $oa !== $a) {
                Db::exec('UPDATE faqs SET answer = ? WHERE question = ? AND answer = ?', [$a, $q, $oa]);
            }
        }
    }
}
