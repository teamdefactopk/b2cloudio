<?php
declare(strict_types=1);

/** Default content loaded by the installer. Everything here is editable in the dashboard. */
final class Seed
{
    public static function settings(): array
    {
        return [
            'site_name' => 'b2cloud.io',
            'site_url' => 'https://b2cloud.io',
            'tagline' => 'Domains, hosting and cloud, managed by people who own the outcome',
            'meta_description' => 'b2cloud.io is a managed services provider for domains, business email, web and corporate hosting, cloud infrastructure (IaaS), platforms (PaaS), business software (SaaS) and cloud storage, with offices in the UAE, UK, Canada, Czech Republic and Pakistan.',
            'email_info' => 'info@b2cloud.io',
            'email_sales' => 'sales@b2cloud.io',
            'email_support' => 'support@b2cloud.io',
            'notify_email' => 'sales@b2cloud.io',
            'notify_enabled' => '1',
            'client_login_url' => '',
            'social_linkedin' => '',
            'social_x' => '',
            'social_facebook' => '',
            'social_instagram' => '',
            'social_youtube' => '',
            'announcement' => '',
            'animations' => '1',
            'tective_url' => 'https://tective.cloud',
            'platforms' => "Amazon Web Services\nMicrosoft Azure\nGoogle Cloud\nOracle Cloud\nVMware & Proxmox\nKubernetes\nMicrosoft 365\nGoogle Workspace\nZoho\nLinux & Windows Server\ncPanel, DirectAdmin & Plesk",
            'pricing_note' => 'Prices are indicative starting points in US dollars (USD), exclusive of taxes. VAT, GST/HST or sales tax applies according to the billing country. Final pricing depends on scope, region and service level and is confirmed in a written proposal. Third-party licences and public-cloud usage are billed at the providers\' list prices.',
            'footer_text' => 'Managed domains, hosting and cloud services for growing companies, from offices in five countries.',
        ];
    }

    /** [key, page, label, type, value] */
    public static function blocks(): array
    {
        return [
            ['home_eyebrow', 'Home', 'Hero eyebrow', 'text', 'Managed domains · hosting · cloud'],
            ['home_title', 'Home', 'Hero title', 'text', 'Domains, hosting and cloud, managed by people who own the outcome'],
            ['home_intro', 'Home', 'Hero introduction', 'textarea', 'b2cloud.io designs, migrates, operates and supports the online foundations companies depend on: domains, email, web and corporate hosting, cloud infrastructure, platforms, business software and cloud storage. One accountable partner, clear service levels and engineers who know your environment.'],
            ['home_cta_primary', 'Home', 'Primary button text', 'text', 'Let\'s talk'],
            ['home_cta_secondary', 'Home', 'Secondary button text', 'text', 'Explore services'],
            ['home_why_title', 'Home', '"Why b2cloud.io" title', 'text', 'One partner instead of five providers'],
            ['home_why_body', 'Home', '"Why b2cloud.io" text', 'textarea', 'Most companies buy their domain from one company, hosting from another, cloud and email from others, and pay a contractor to hold it together. When something breaks, nobody owns the problem. b2cloud.io takes ownership: one team, one agreement and one invoice for everything you run online.'],
            ['home_cta_band_title', 'Home', 'Bottom call-to-action title', 'text', 'Start with a free assessment'],
            ['home_cta_band_body', 'Home', 'Bottom call-to-action text', 'textarea', 'Tell us what you run today. We\'ll review your domains, hosting and cloud setup, show you where to reduce risk and cost, and propose a managed service that fits.'],

            ['about_title', 'About', 'Page title', 'text', 'Your domains, hosting and cloud, managed end to end'],
            ['about_body', 'About', 'Main text (Markdown)', 'markdown', "Most companies run on a patchwork of providers: a domain registrar here, a hosting company there, a cloud account and email from other vendors, and a contractor in between. When something breaks, nobody owns the problem.\n\nb2cloud.io takes ownership. We operate our own platforms where that serves you best, extend our offering through trusted white-label infrastructure partners, and manage the public clouds and software you already use. Whatever runs underneath, you deal with a single team, one agreement and one invoice.\n\nFrom offices in five countries, we serve clients across the Middle East, Europe, North America and South Asia, with regional infrastructure for data residency and support across time zones."],
            ['about_pillars', 'About', 'Principles (one per line: Title | text)', 'lines', "Managed, not just hosted | We monitor, patch, back up and optimise. That's the work behind the service.\nVendor-neutral | We recommend the platform that fits: our own, a partner's, or AWS, Azure, Google Cloud or Oracle.\nAccountable | Defined service levels, named contacts and regular service reviews.\nSecure by default | Hardening, monitoring and backup are part of every managed service."],

            ['services_title', 'Services', 'Page title', 'text', 'Domains, hosting and cloud from one accountable team'],
            ['services_intro', 'Services', 'Introduction', 'textarea', 'Take any service on its own or combine them into one managed agreement. Indicative starting prices are shown; your proposal follows a short assessment of your environment.'],

            ['managed_title', 'Managed services', 'Page title', 'text', 'Choose how much you hand over'],
            ['managed_intro', 'Managed services', 'Introduction', 'textarea', 'Every managed service is available at three levels, depending on how much your own team wants to keep in-house.'],

            ['contact_title', 'Contact', 'Page title', 'text', 'Let\'s talk'],
            ['contact_intro', 'Contact', 'Introduction', 'textarea', 'Tell us what you run today and what you need. A specialist will reply within one business day.'],
            ['contact_success', 'Contact', 'Message shown after sending', 'textarea', 'Thank you. Your message has reached our team and we\'ll be in touch within one business day.'],

            ['privacy_body', 'Legal', 'Privacy policy (Markdown)', 'markdown', "## Who we are\nb2cloud.io (\"we\", \"us\") provides managed domain, hosting and cloud services. This policy explains how we handle personal data on this website.\n\n## What we collect\n- Details you send through our contact form: name, email, company, phone and your message.\n- Basic technical data needed to run the site securely, such as IP address and browser type.\n\n## How we use it\nWe use your details only to respond to your enquiry and to provide our services. We do not sell personal data.\n\n## Cookies\nThis website uses only essential cookies needed for security and forms. We do not use advertising cookies.\n\n## Your rights\nYou can ask us to access, correct or delete your data at any time by emailing info@b2cloud.io.\n\n*[Placeholder policy. Please have it reviewed for each country where you operate before launch.]*"],
            ['terms_body', 'Legal', 'Terms of use (Markdown)', 'markdown', "## Website terms\nThis website is provided by b2cloud.io for general information about our services.\n\n## Pricing\nPrices shown are indicative starting points in US dollars, exclusive of taxes. Final pricing is confirmed in a written proposal.\n\n## Services\nServices are provided under a separate client agreement, which takes precedence over anything on this website.\n\n## Contact\nQuestions about these terms: info@b2cloud.io\n\n*[Placeholder terms. Please have them reviewed before launch.]*"],
        ];
    }

    public static function practices(): array
    {
        return [
            ['dom', 'Domains & Email', 'Domains, DNS, SSL, business email', 'Your company\'s identity online: the names, certificates and mailboxes everything else depends on.'],
            ['host', 'Hosting', 'Web hosting, corporate hosting', 'Where your websites and business applications live, managed and monitored.'],
            ['cloud', 'Cloud', 'IaaS, PaaS, SaaS, cloud storage', 'Infrastructure, platforms, software and storage, on our white-label cloud or the public cloud of your choice.'],
            ['ops', 'Management & Support', 'Consultancy, migration, 24/7 support', 'Where we don\'t run the platform ourselves, we advise, migrate, manage and support it for you.'],
        ];
    }

    /** practice slug => services */
    public static function services(): array
    {
        return [
            'dom' => [
                ['domains', 'Domains', 'Domains, DNS & Certificates', 'Registration, managed DNS and SSL for every brand and country.', 'Corporate domain registration and portfolio management across global and country extensions, with managed DNS and SSL lifecycle handled for you.', "Registration, transfers and renewals\nDomain portfolio consolidation\nManaged DNS and DNSSEC\nSSL/TLS certificates from DV to EV", ".com, .co.uk, .ca, .cz, .ae, .pk and more\nNo lapsed renewals\nCentral ownership records", 'Single-brand to multi-country businesses.', '$12.99', '/domain per year'],
                ['business-email', 'Email', 'Business Email', 'Secure, professional email on your own domain.', 'Professional email on your domain, from secure hosted mailboxes to Exchange Online and Gmail, set up and supported for you.', "Hosted business mailboxes\nExchange Online and Gmail setup\nMigration with no lost mail\nSPF, DKIM and DMARC", "Spam and virus filtering\nArchiving and retention\nShared mailboxes and aliases\nSupport for every user", 'Any company that wants reliable email on its own domain.', '$1.49', '/user/mo'],
            ],
            'host' => [
                ['web-hosting', 'Web hosting', 'Managed Web Hosting', 'Fast, secure, fully managed hosting for business websites and stores.', 'Fast, secure hosting for business websites, WordPress and WooCommerce stores, fully managed so your team never touches a server.', "Business, WordPress and WooCommerce hosting\nManaged VPS for web applications\nPerformance tuning, caching and CDN\nMalware scanning and firewall", "Daily off-site backups\nFree migration\nStaging environments\nUptime monitoring and SSL", 'Company websites, online stores and agencies.', '$49', '/mo'],
                ['corporate-hosting', 'Corporate hosting', 'Corporate Hosting & Data Centre', 'Dedicated infrastructure in the region where your data must stay.', 'Dedicated infrastructure for business-critical systems in the region where your data must stay.', "Dedicated and bare-metal servers\nColocation with remote hands\nHosted private cloud (VMware or Proxmox)\nDisaster-recovery sites", "Regional hosting in five markets\nTier-3 partner facilities\nCapacity planning\nFully managed option", 'ERP, databases and line-of-business systems.', '$179', '/mo'],
            ],
            'cloud' => [
                ['cloud-infrastructure', 'IaaS', 'Cloud Infrastructure (IaaS)', 'Compute, network and storage on our cloud or AWS, Azure, Google and Oracle.', 'Compute, networking and storage on demand, on our white-label cloud or on AWS, Microsoft Azure, Google Cloud and Oracle Cloud, designed and run by our engineers.', "Virtual data centres and cloud servers\nLanding zones and network design\nMigration from on-premises or other clouds\nMonitoring, patching and backup", "Hyperscaler usage at list price\nCost-optimisation reviews\nNamed cloud engineer\nOne invoice across clouds", 'Production workloads without an in-house cloud team.', '$199', '/mo management'],
                ['platform-services', 'PaaS', 'Platform Services (PaaS)', 'Managed Kubernetes, app platforms and databases for your developers.', 'Managed platforms your developers deploy on, including containers, Kubernetes, runtimes and databases, so they ship code while we run what\'s underneath.', "Managed Kubernetes and containers\nApp platforms with Git-based deploys\nManaged MySQL, PostgreSQL, MongoDB and Redis\nCI/CD pipelines", "High availability\nAutomatic backups\nMonitoring and alerts\nPlatform support", 'Software and digital product teams.', '$79', '/mo'],
                ['business-software', 'SaaS', 'Business Software (SaaS)', 'Microsoft 365, Google Workspace and Zoho, licensed and supported.', 'Licensing, setup, migration and support for Microsoft 365, Google Workspace and Zoho.', "Microsoft 365 and Google Workspace\nZoho Workplace\nUser and licence management\nMigration from other suites", "Licences at vendor list price\nSetup and onboarding\nOne invoice for all seats\nOngoing user support", 'Organisations of 5 to 1,000 staff.', '$6', '/user/mo'],
                ['cloud-storage', 'Cloud storage', 'Cloud Storage', 'S3-compatible storage and team file sharing with no egress fees.', 'Scalable storage for files, backups, archives and media, with team sharing built in.', "S3-compatible object storage\nTeam file sync and sharing\nBackup targets and archive tiers\nData migration between clouds", "No egress fees on our storage\nVersioning and object lock\nRegional data residency\nLifecycle policies", 'Growing data with retention needs.', '$7.99', '/TB per month'],
            ],
            'ops' => [
                ['consultancy-migration', 'Consultancy', 'Consultancy & Migration', 'Plan, cost and move to the right hosting and cloud setup.', 'Advice and hands-on delivery to choose, cost and move to the right hosting and cloud setup.', "Hosting and cloud assessments\nMigration planning and execution\nCost optimisation\nLicensing reviews", "Roadmap with costs\nRisk-managed cutovers\nClear recommendations", 'Companies changing providers or moving to the cloud.', '$799', ' assessment'],
                ['managed-support', 'Managed support', '24/7 Managed Support', 'Round-the-clock monitoring and support wherever your systems run.', 'Round-the-clock monitoring, maintenance and support for your hosting, servers and cloud, wherever they run.', "24/7 monitoring and alerting\nIncident response\nPatching and maintenance\nBackup verification", "SLA-backed response\nMonthly service reports\nNamed service manager", 'Businesses without an in-house operations team.', '$129', '/server per month'],
            ],
        ];
    }

    /** [name, audience, items, amount, unit, featured] */
    public static function levels(): array
    {
        return [
            ['Foundation', 'For teams with strong in-house IT who want a reliable platform and a safety net.', "24/7 monitoring and alerting\nBackups and restore support\nBusiness-hours support desk\nMonthly health report", '$129', '/mo', 0],
            ['Advanced', 'For teams with skills gaps who want us to run day-to-day operations.', "Everything in Foundation\n24/7 incident response\nPatching and security hardening\nCost-optimisation reviews\nChange management", '$549', '/mo', 1],
            ['Premium', 'For companies that want to outsource operations fully, with a dedicated team.', "Everything in Advanced\nNamed service manager and engineers\nCustom SLA and reporting\nQuarterly architecture reviews\nPriority escalation", '', '', 0],
        ];
    }

    public static function commitments(): array
    {
        return [
            ['24/7/365 monitoring', 'Every managed system is watched around the clock from our operations centre.'],
            ['Fast response', 'Critical incidents get a response within 15 minutes on Premium and 30 minutes on Advanced, around the clock.'],
            ['Up to 99.99% availability', 'Infrastructure availability targets backed by service credits, defined per service in your agreement.'],
            ['Documented environments', 'Runbooks, diagrams and credentials kept current and handed back to you on request.'],
            ['Transparent cost', 'Public cloud and software at provider list price, with monthly reports and savings recommendations.'],
            ['No lock-in', 'Your data and documentation stay yours, with an exit plan agreed at the start.'],
        ];
    }

    public static function steps(): array
    {
        return [
            ['Assess', 'We review your systems, risks, costs and goals, and agree what success looks like.'],
            ['Design', 'We propose the right platforms, service level and price, with a clear scope.'],
            ['Transition', 'We migrate and onboard with minimal disruption, documenting everything we take over.'],
            ['Operate & improve', 'We run, report and optimise, with regular reviews of performance and spend.'],
        ];
    }

    /** [country, region, description] */
    public static function offices(): array
    {
        return [
            ['United Arab Emirates', 'Middle East & Africa', 'Regional hosting and enterprise accounts.'],
            ['United Kingdom', 'UK & Ireland', 'UK-hosted services and GDPR-aligned operations.'],
            ['Czech Republic', 'European Union', 'EU data residency and EU-wide support.'],
            ['Canada', 'North America', 'Canadian-hosted services for privacy-sensitive clients.'],
            ['Pakistan', 'South Asia · 24/7 operations', 'South Asia, plus our 24/7 engineering and operations centre.'],
        ];
    }

    public static function faqs(): array
    {
        return [
            ['Do we have to move our cloud accounts to you?', 'No. We can manage your existing AWS, Azure, Google Cloud or Oracle accounts, or provide them on our consolidated billing. You choose.'],
            ['Can our data stay in our country?', 'Yes. We offer hosting in the UAE, UK, EU, Canada and Pakistan, and design services around your residency requirements.'],
            ['What if we already have an IT team?', 'Choose Foundation or a co-managed arrangement. We cover out-of-hours monitoring, specialist skills or specific platforms, and your team keeps control.'],
            ['How long does onboarding take?', 'Most single-service engagements start within a few weeks. Larger migrations follow a plan agreed during the assessment.'],
            ['How are we billed?', 'One monthly or annual invoice in USD covering services, licences and cloud usage. You can pay by card, bank transfer, direct debit or invoice terms. Taxes apply according to your billing country.'],
            ['Can you transfer our existing domains and websites?', 'Yes. We handle domain transfers, website and email migration as part of onboarding, usually with no downtime.'],
        ];
    }

    public static function run(): void
    {
        $now = now();
        foreach (self::settings() as $k => $v) {
            Db::exec('INSERT IGNORE INTO settings (k, v) VALUES (?, ?)', [$k, $v]);
        }
        foreach (self::blocks() as $i => [$k, $page, $label, $type, $v]) {
            Db::exec('INSERT IGNORE INTO blocks (k, page, label, type, v, sort) VALUES (?,?,?,?,?,?)', [$k, $page, $label, $type, $v, $i]);
        }
        if ((int)Db::value('SELECT COUNT(*) FROM practices') > 0) {
            return; // content already present
        }
        $pids = [];
        foreach (self::practices() as $i => [$slug, $name, $summary, $intro]) {
            $pids[$slug] = Db::insert('practices', ['slug' => $slug, 'name' => $name, 'summary' => $summary, 'intro' => $intro, 'sort' => ($i + 1) * 10]);
        }
        $n = 0;
        foreach (self::services() as $p => $list) {
            foreach ($list as [$slug, $tag, $name, $summary, $desc, $do, $get, $ideal, $amount, $unit]) {
                Db::insert('services', [
                    'practice_id' => $pids[$p], 'slug' => $slug, 'tag' => $tag, 'name' => $name, 'summary' => $summary,
                    'description' => $desc, 'do_items' => $do, 'get_items' => $get, 'ideal' => $ideal,
                    'price_from' => 1, 'price_amount' => $amount, 'price_unit' => $unit, 'is_active' => 1,
                    'sort' => (++$n) * 10, 'updated_at' => $now,
                ]);
            }
        }
        foreach (self::levels() as $i => [$name, $aud, $items, $amount, $unit, $feat]) {
            Db::insert('levels', ['name' => $name, 'audience' => $aud, 'items' => $items, 'price_from' => 1, 'price_amount' => $amount, 'price_unit' => $unit, 'featured' => $feat, 'sort' => ($i + 1) * 10]);
        }
        foreach (self::commitments() as $i => [$t, $b]) {
            Db::insert('commitments', ['title' => $t, 'body' => $b, 'sort' => ($i + 1) * 10]);
        }
        foreach (self::steps() as $i => [$t, $b]) {
            Db::insert('steps', ['title' => $t, 'body' => $b, 'sort' => ($i + 1) * 10]);
        }
        foreach (self::offices() as $i => [$c, $r, $d]) {
            Db::insert('offices', ['country' => $c, 'region' => $r, 'description' => $d, 'address' => '', 'phone' => '', 'sort' => ($i + 1) * 10]);
        }
        foreach (self::faqs() as $i => [$q, $a]) {
            Db::insert('faqs', ['question' => $q, 'answer' => $a, 'is_active' => 1, 'sort' => ($i + 1) * 10]);
        }
    }
}
