<?php
declare(strict_types=1);

/**
 * Content types managed by the generic dashboard editor.
 * Each entry describes the table, its form fields and the list columns.
 */
final class Collections
{
    public static function all(): array
    {
        $practiceOptions = fn() => array_column(Db::all('SELECT id, name FROM practices ORDER BY sort, id'), 'name', 'id');

        return [
            'services' => [
                'title' => 'Services', 'singular' => 'service', 'table' => 'services', 'icon' => 'grid',
                'help' => 'Each service has its own page on the website. Leave the price amount empty to show "Let\'s talk".',
                'order' => 'sort, id',
                'columns' => ['name' => 'Service', 'practice_id' => 'Practice', 'price_amount' => 'From', 'is_active' => 'Visible'],
                'fields' => [
                    ['name', 'Service name', 'text', true],
                    ['slug', 'URL slug', 'slug', false, 'Used in the page address, e.g. /services/web-hosting. Leave empty to create it from the name.'],
                    ['practice_id', 'Practice', 'select', true, '', $practiceOptions],
                    ['tag', 'Label', 'text', false, 'Short label shown above the name, e.g. IaaS'],
                    ['summary', 'Short summary', 'text', false, 'One line shown on cards and in search results.'],
                    ['description', 'Description', 'textarea', false],
                    ['do_items', 'What we do', 'lines', false, 'One item per line.'],
                    ['get_items', 'What you get', 'lines', false, 'One item per line.'],
                    ['ideal', 'Ideal for', 'text', false],
                    ['price_from', 'Show "from" before the price', 'checkbox', false],
                    ['price_amount', 'Price amount', 'text', false, 'e.g. $49. Leave empty for "Let\'s talk".'],
                    ['price_unit', 'Price unit', 'text', false, 'e.g. /mo or /user/mo'],
                    ['external_url', 'External link (optional)', 'url', false, 'Adds a button to an external site, e.g. https://tective.cloud'],
                    ['is_active', 'Visible on website', 'checkbox', false],
                    ['sort', 'Order', 'number', false, 'Lower numbers appear first.'],
                ],
                'touch' => 'updated_at',
            ],
            'practices' => [
                'title' => 'Practices', 'singular' => 'practice', 'table' => 'practices', 'icon' => 'layers',
                'help' => 'Practices group your services on the website and in the navigation.',
                'order' => 'sort, id',
                'columns' => ['name' => 'Practice', 'summary' => 'Summary', 'sort' => 'Order'],
                'fields' => [
                    ['name', 'Name', 'text', true],
                    ['slug', 'Anchor slug', 'slug', false],
                    ['summary', 'Short summary', 'text', false],
                    ['intro', 'Introduction', 'textarea', false],
                    ['sort', 'Order', 'number', false],
                ],
            ],
            'levels' => [
                'title' => 'Service levels', 'singular' => 'service level', 'table' => 'levels', 'icon' => 'stack',
                'help' => 'The managed-service tiers shown on the Managed services page.',
                'order' => 'sort, id',
                'columns' => ['name' => 'Level', 'price_amount' => 'From', 'featured' => 'Highlighted'],
                'fields' => [
                    ['name', 'Name', 'text', true],
                    ['audience', 'Who it is for', 'textarea', false],
                    ['items', 'What is included', 'lines', false, 'One item per line.'],
                    ['price_from', 'Show "from" before the price', 'checkbox', false],
                    ['price_amount', 'Price amount', 'text', false, 'Leave empty for "Let\'s talk".'],
                    ['price_unit', 'Price unit', 'text', false],
                    ['featured', 'Highlight this level', 'checkbox', false],
                    ['sort', 'Order', 'number', false],
                ],
            ],
            'commitments' => [
                'title' => 'Commitments', 'singular' => 'commitment', 'table' => 'commitments', 'icon' => 'check',
                'order' => 'sort, id',
                'columns' => ['title' => 'Commitment', 'sort' => 'Order'],
                'fields' => [['title', 'Title', 'text', true], ['body', 'Text', 'textarea', false], ['sort', 'Order', 'number', false]],
            ],
            'steps' => [
                'title' => 'How we work', 'singular' => 'step', 'table' => 'steps', 'icon' => 'route',
                'order' => 'sort, id',
                'columns' => ['title' => 'Step', 'sort' => 'Order'],
                'fields' => [['title', 'Title', 'text', true], ['body', 'Text', 'textarea', false], ['sort', 'Order', 'number', false]],
            ],
            'offices' => [
                'title' => 'Offices', 'singular' => 'office', 'table' => 'offices', 'icon' => 'pin',
                'help' => 'Leave the address empty to show "Address coming soon".',
                'order' => 'sort, id',
                'columns' => ['country' => 'Country', 'region' => 'Region', 'address' => 'Address'],
                'fields' => [
                    ['country', 'Country', 'text', true],
                    ['region', 'Region served', 'text', false],
                    ['description', 'Description', 'textarea', false],
                    ['address', 'Address', 'textarea', false],
                    ['phone', 'Phone', 'text', false],
                    ['sort', 'Order', 'number', false],
                ],
            ],
            'faqs' => [
                'title' => 'FAQs', 'singular' => 'question', 'table' => 'faqs', 'icon' => 'help',
                'order' => 'sort, id',
                'columns' => ['question' => 'Question', 'is_active' => 'Visible'],
                'fields' => [
                    ['question', 'Question', 'text', true],
                    ['answer', 'Answer', 'textarea', false],
                    ['is_active', 'Visible on website', 'checkbox', false],
                    ['sort', 'Order', 'number', false],
                ],
            ],
        ];
    }

    public static function get(string $key): ?array
    {
        return self::all()[$key] ?? null;
    }

    /** Normalised field definitions: [name, label, type, required, help, options] */
    public static function fields(array $def): array
    {
        return array_map(fn($f) => [
            'name' => $f[0], 'label' => $f[1], 'type' => $f[2],
            'required' => $f[3] ?? false, 'help' => $f[4] ?? '', 'options' => isset($f[5]) ? ($f[5])() : [],
        ], $def['fields']);
    }

    /** Validate POSTed values into a row. Returns [data, errors]. */
    public static function fromPost(array $def, ?int $id): array
    {
        $data = [];
        $errors = [];
        foreach (self::fields($def) as $f) {
            $n = $f['name'];
            $v = post($n);
            switch ($f['type']) {
                case 'checkbox':
                    $v = isset($_POST[$n]) ? 1 : 0;
                    break;
                case 'number':
                    $v = (int)$v;
                    break;
                case 'select':
                    $v = $v === '' ? null : (int)$v;
                    if ($v !== null && !array_key_exists($v, $f['options'])) {
                        $errors[$n] = 'Choose a valid option.';
                    }
                    break;
                case 'url':
                    if ($v !== '' && !preg_match('#^https?://#i', $v)) {
                        $errors[$n] = 'Enter a full address starting with https://';
                    }
                    break;
                case 'slug':
                    $v = $v === '' ? slugify(post('name') ?: post('title') ?: post('country')) : slugify($v);
                    $dupe = Db::value("SELECT id FROM `{$def['table']}` WHERE slug = ? AND id <> ?", [$v, $id ?? 0]);
                    if ($dupe) {
                        $errors[$n] = 'This slug is already used. Choose another.';
                    }
                    break;
                default:
                    $v = mb_substr($v, 0, $f['type'] === 'text' ? 300 : 20000);
            }
            if ($f['required'] && ($v === '' || $v === null)) {
                $errors[$n] = $f['label'] . ' is required.';
            }
            $data[$n] = $v;
        }
        if (!empty($def['touch'])) {
            $data[$def['touch']] = now();
        }
        return [$data, $errors];
    }
}
