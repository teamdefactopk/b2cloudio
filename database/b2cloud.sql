-- b2cloud.io website: database import file
-- Import with cPanel → phpMyAdmin → select your database → Import.
-- Contains all tables and the default website content (services, prices, page text, FAQs, offices, settings).
-- It does NOT contain any user accounts or messages. After importing, open https://your-domain/install:
-- the installer detects the existing tables, keeps this content, and creates your config file and first admin.
-- Compatible with MySQL 5.7+ and MariaDB 10.3+.

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `k` varchar(100) NOT NULL,
  `v` text DEFAULT NULL,
  PRIMARY KEY (`k`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`k`, `v`) VALUES ('animations','1'),
('announcement',''),
('client_login_url',''),
('email_info','info@b2cloud.io'),
('email_sales','sales@b2cloud.io'),
('email_support','support@b2cloud.io'),
('footer_text','Managed domains, hosting and cloud services for growing companies, from offices in five countries.'),
('meta_description','b2cloud.io is a managed services provider for domains, business email, web and corporate hosting, cloud infrastructure (IaaS), platforms (PaaS), business software (SaaS) and cloud storage, with offices in the UAE, UK, Canada, Czech Republic and Pakistan.'),
('notify_email','sales@b2cloud.io'),
('notify_enabled','1'),
('platforms','Amazon Web Services\nMicrosoft Azure\nGoogle Cloud\nOracle Cloud\nVMware & Proxmox\nKubernetes\nMicrosoft 365\nGoogle Workspace\nZoho\nLinux & Windows Server\ncPanel, DirectAdmin & Plesk'),
('pricing_note','Prices are indicative starting points in US dollars (USD), exclusive of taxes. VAT, GST/HST or sales tax applies according to the billing country. Final pricing depends on scope, region and service level and is confirmed in a written proposal. Third-party licences and public-cloud usage are billed at the providers\' list prices.'),
('site_name','b2cloud.io'),
('site_url','https://b2cloud.io'),
('social_facebook',''),
('social_instagram',''),
('social_linkedin',''),
('social_x',''),
('social_youtube',''),
('tagline','Domains, hosting and cloud, managed by people who own the outcome'),
('tective_url','https://tective.cloud');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
DROP TABLE IF EXISTS `blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `blocks` (
  `k` varchar(100) NOT NULL,
  `page` varchar(50) NOT NULL,
  `label` varchar(150) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'text',
  `v` mediumtext DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`k`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;
INSERT INTO `blocks` (`k`, `page`, `label`, `type`, `v`, `sort`) VALUES ('about_body','About','Main text (Markdown)','markdown','Most companies run on a patchwork of providers: a domain registrar here, a hosting company there, a cloud account and email from other vendors, and a contractor in between. When something breaks, nobody owns the problem.\n\nb2cloud.io takes ownership. We operate our own platforms where that serves you best, extend our offering through trusted white-label infrastructure partners, and manage the public clouds and software you already use. Whatever runs underneath, you deal with a single team, one agreement and one invoice.\n\nFrom offices in five countries, we serve clients across the Middle East, Europe, North America and South Asia, with regional infrastructure for data residency and support across time zones.',10),
('about_pillars','About','Principles (one per line: Title | text)','lines','Managed, not just hosted | We monitor, patch, back up and optimise. That\'s the work behind the service.\nVendor-neutral | We recommend the platform that fits: our own, a partner\'s, or AWS, Azure, Google Cloud or Oracle.\nAccountable | Defined service levels, named contacts and regular service reviews.\nSecure by default | Hardening, monitoring and backup are part of every managed service.',11),
('about_title','About','Page title','text','Your domains, hosting and cloud, managed end to end',9),
('contact_intro','Contact','Introduction','textarea','Tell us what you run today and what you need. A specialist will reply within one business day.',17),
('contact_success','Contact','Message shown after sending','textarea','Thank you. Your message has reached our team and we\'ll be in touch within one business day.',18),
('contact_title','Contact','Page title','text','Let\'s talk',16),
('home_cta_band_body','Home','Bottom call-to-action text','textarea','Tell us what you run today. We\'ll review your domains, hosting and cloud setup, show you where to reduce risk and cost, and propose a managed service that fits.',8),
('home_cta_band_title','Home','Bottom call-to-action title','text','Start with a free assessment',7),
('home_cta_primary','Home','Primary button text','text','Let\'s talk',3),
('home_cta_secondary','Home','Secondary button text','text','Explore services',4),
('home_eyebrow','Home','Hero eyebrow','text','Managed domains · hosting · cloud',0),
('home_intro','Home','Hero introduction','textarea','b2cloud.io designs, migrates, operates and supports the online foundations companies depend on: domains, email, web and corporate hosting, cloud infrastructure, platforms, business software and cloud storage. One accountable partner, clear service levels and engineers who know your environment.',2),
('home_title','Home','Hero title','text','Domains, hosting and cloud, managed by people who own the outcome',1),
('home_why_body','Home','\"Why b2cloud.io\" text','textarea','Most companies buy their domain from one company, hosting from another, cloud and email from others, and pay a contractor to hold it together. When something breaks, nobody owns the problem. b2cloud.io takes ownership: one team, one agreement and one invoice for everything you run online.',6),
('home_why_title','Home','\"Why b2cloud.io\" title','text','One partner instead of five providers',5),
('managed_intro','Managed services','Introduction','textarea','Every managed service is available at three levels, depending on how much your own team wants to keep in-house.',15),
('managed_title','Managed services','Page title','text','Choose how much you hand over',14),
('privacy_body','Legal','Privacy policy (Markdown)','markdown','## Who we are\nb2cloud.io (\"we\", \"us\") provides managed domain, hosting and cloud services. This policy explains how we handle personal data on this website.\n\n## What we collect\n- Details you send through our contact form: name, email, company, phone and your message.\n- Basic technical data needed to run the site securely, such as IP address and browser type.\n\n## How we use it\nWe use your details only to respond to your enquiry and to provide our services. We do not sell personal data.\n\n## Cookies\nThis website uses only essential cookies needed for security and forms. We do not use advertising cookies.\n\n## Your rights\nYou can ask us to access, correct or delete your data at any time by emailing info@b2cloud.io.\n\n*[Placeholder policy. Please have it reviewed for each country where you operate before launch.]*',19),
('services_intro','Services','Introduction','textarea','Take any service on its own or combine them into one managed agreement. Indicative starting prices are shown; your proposal follows a short assessment of your environment.',13),
('services_title','Services','Page title','text','Domains, hosting and cloud from one accountable team',12),
('terms_body','Legal','Terms of use (Markdown)','markdown','## Website terms\nThis website is provided by b2cloud.io for general information about our services.\n\n## Pricing\nPrices shown are indicative starting points in US dollars, exclusive of taxes. Final pricing is confirmed in a written proposal.\n\n## Services\nServices are provided under a separate client agreement, which takes precedence over anything on this website.\n\n## Contact\nQuestions about these terms: info@b2cloud.io\n\n*[Placeholder terms. Please have them reviewed before launch.]*',20);
/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;
DROP TABLE IF EXISTS `practices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `practices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `intro` text DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `practices` DISABLE KEYS */;
INSERT INTO `practices` (`id`, `slug`, `name`, `summary`, `intro`, `sort`) VALUES (1,'dom','Domains & Email','Domains, DNS, SSL, business email','Your company\'s identity online: the names, certificates and mailboxes everything else depends on.',10),
(2,'host','Hosting','Web hosting, corporate hosting','Where your websites and business applications live, managed and monitored.',20),
(3,'cloud','Cloud','IaaS, PaaS, SaaS, cloud storage','Infrastructure, platforms, software and storage, on our white-label cloud or the public cloud of your choice.',30),
(4,'ops','Management & Support','Consultancy, migration, 24/7 support','Where we don\'t run the platform ourselves, we advise, migrate, manage and support it for you.',40);
/*!40000 ALTER TABLE `practices` ENABLE KEYS */;
DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `practice_id` int(10) unsigned DEFAULT NULL,
  `slug` varchar(120) NOT NULL,
  `tag` varchar(80) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `summary` varchar(300) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `do_items` text DEFAULT NULL,
  `get_items` text DEFAULT NULL,
  `ideal` text DEFAULT NULL,
  `price_from` tinyint(1) NOT NULL DEFAULT 1,
  `price_amount` varchar(50) DEFAULT NULL,
  `price_unit` varchar(80) DEFAULT NULL,
  `external_url` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `practice_idx` (`practice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` (`id`, `practice_id`, `slug`, `tag`, `name`, `summary`, `description`, `do_items`, `get_items`, `ideal`, `price_from`, `price_amount`, `price_unit`, `external_url`, `is_active`, `sort`, `updated_at`) VALUES (1,1,'domains','Domains','Domains, DNS & Certificates','Registration, managed DNS and SSL for every brand and country.','Corporate domain registration and portfolio management across global and country extensions, with managed DNS and SSL lifecycle handled for you.','Registration, transfers and renewals\nDomain portfolio consolidation\nManaged DNS and DNSSEC\nSSL/TLS certificates from DV to EV','.com, .co.uk, .ca, .cz, .ae, .pk and more\nNo lapsed renewals\nCentral ownership records','Single-brand to multi-country businesses.',1,'$12.99','/domain per year',NULL,1,10,'2026-10-15 07:10:02'),
(2,1,'business-email','Email','Business Email','Secure, professional email on your own domain.','Professional email on your domain, from secure hosted mailboxes to Exchange Online and Gmail, set up and supported for you.','Hosted business mailboxes\nExchange Online and Gmail setup\nMigration with no lost mail\nSPF, DKIM and DMARC','Spam and virus filtering\nArchiving and retention\nShared mailboxes and aliases\nSupport for every user','Any company that wants reliable email on its own domain.',1,'$1.49','/user/mo',NULL,1,20,'2026-10-15 07:10:02'),
(3,2,'web-hosting','Web hosting','Managed Web Hosting','Fast, secure, fully managed hosting for business websites and stores.','Fast, secure hosting for business websites, WordPress and WooCommerce stores, fully managed so your team never touches a server.','Business, WordPress and WooCommerce hosting\nManaged VPS for web applications\nPerformance tuning, caching and CDN\nMalware scanning and firewall','Daily off-site backups\nFree migration\nStaging environments\nUptime monitoring and SSL','Company websites, online stores and agencies.',1,'$49','/mo',NULL,1,30,'2026-10-15 07:10:02'),
(4,2,'corporate-hosting','Corporate hosting','Corporate Hosting & Data Centre','Dedicated infrastructure in the region where your data must stay.','Dedicated infrastructure for business-critical systems in the region where your data must stay.','Dedicated and bare-metal servers\nColocation with remote hands\nHosted private cloud (VMware or Proxmox)\nDisaster-recovery sites','Regional hosting in five markets\nTier-3 partner facilities\nCapacity planning\nFully managed option','ERP, databases and line-of-business systems.',1,'$179','/mo',NULL,1,40,'2026-10-15 07:10:02'),
(5,3,'cloud-infrastructure','IaaS','Cloud Infrastructure (IaaS)','Compute, network and storage on our cloud or AWS, Azure, Google and Oracle.','Compute, networking and storage on demand, on our white-label cloud or on AWS, Microsoft Azure, Google Cloud and Oracle Cloud, designed and run by our engineers.','Virtual data centres and cloud servers\nLanding zones and network design\nMigration from on-premises or other clouds\nMonitoring, patching and backup','Hyperscaler usage at list price\nCost-optimisation reviews\nNamed cloud engineer\nOne invoice across clouds','Production workloads without an in-house cloud team.',1,'$199','/mo management',NULL,1,50,'2026-10-15 07:10:02'),
(6,3,'platform-services','PaaS','Platform Services (PaaS)','Managed Kubernetes, app platforms and databases for your developers.','Managed platforms your developers deploy on, including containers, Kubernetes, runtimes and databases, so they ship code while we run what\'s underneath.','Managed Kubernetes and containers\nApp platforms with Git-based deploys\nManaged MySQL, PostgreSQL, MongoDB and Redis\nCI/CD pipelines','High availability\nAutomatic backups\nMonitoring and alerts\nPlatform support','Software and digital product teams.',1,'$79','/mo',NULL,1,60,'2026-10-15 07:10:02'),
(7,3,'business-software','SaaS','Business Software (SaaS)','Microsoft 365, Google Workspace and Zoho, licensed and supported.','Licensing, setup, migration and support for Microsoft 365, Google Workspace and Zoho.','Microsoft 365 and Google Workspace\nZoho Workplace\nUser and licence management\nMigration from other suites','Licences at vendor list price\nSetup and onboarding\nOne invoice for all seats\nOngoing user support','Organisations of 5 to 1,000 staff.',1,'$6','/user/mo',NULL,1,70,'2026-10-15 07:10:02'),
(8,3,'cloud-storage','Cloud storage','Cloud Storage','S3-compatible storage and team file sharing with no egress fees.','Scalable storage for files, backups, archives and media, with team sharing built in.','S3-compatible object storage\nTeam file sync and sharing\nBackup targets and archive tiers\nData migration between clouds','No egress fees on our storage\nVersioning and object lock\nRegional data residency\nLifecycle policies','Growing data with retention needs.',1,'$7.99','/TB per month',NULL,1,80,'2026-10-15 07:10:02'),
(9,4,'consultancy-migration','Consultancy','Consultancy & Migration','Plan, cost and move to the right hosting and cloud setup.','Advice and hands-on delivery to choose, cost and move to the right hosting and cloud setup.','Hosting and cloud assessments\nMigration planning and execution\nCost optimisation\nLicensing reviews','Roadmap with costs\nRisk-managed cutovers\nClear recommendations','Companies changing providers or moving to the cloud.',1,'$799',' assessment',NULL,1,90,'2026-10-15 07:10:02'),
(10,4,'managed-support','Managed support','24/7 Managed Support','Round-the-clock monitoring and support wherever your systems run.','Round-the-clock monitoring, maintenance and support for your hosting, servers and cloud, wherever they run.','24/7 monitoring and alerting\nIncident response\nPatching and maintenance\nBackup verification','SLA-backed response\nMonthly service reports\nNamed service manager','Businesses without an in-house operations team.',1,'$129','/server per month',NULL,1,100,'2026-10-15 07:10:02');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
DROP TABLE IF EXISTS `levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `audience` text DEFAULT NULL,
  `items` text DEFAULT NULL,
  `price_from` tinyint(1) NOT NULL DEFAULT 1,
  `price_amount` varchar(50) DEFAULT NULL,
  `price_unit` varchar(80) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` (`id`, `name`, `audience`, `items`, `price_from`, `price_amount`, `price_unit`, `featured`, `sort`) VALUES (1,'Foundation','For teams with strong in-house IT who want a reliable platform and a safety net.','24/7 monitoring and alerting\nBackups and restore support\nBusiness-hours support desk\nMonthly health report',1,'$129','/mo',0,10),
(2,'Advanced','For teams with skills gaps who want us to run day-to-day operations.','Everything in Foundation\n24/7 incident response\nPatching and security hardening\nCost-optimisation reviews\nChange management',1,'$549','/mo',1,20),
(3,'Premium','For companies that want to outsource operations fully, with a dedicated team.','Everything in Advanced\nNamed service manager and engineers\nCustom SLA and reporting\nQuarterly architecture reviews\nPriority escalation',1,'','',0,30);
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
DROP TABLE IF EXISTS `commitments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `commitments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `body` text DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `commitments` DISABLE KEYS */;
INSERT INTO `commitments` (`id`, `title`, `body`, `sort`) VALUES (1,'24/7/365 monitoring','Every managed system is watched around the clock from our operations centre.',10),
(2,'Fast response','Critical incidents get a response within 15 minutes on Premium and 30 minutes on Advanced, around the clock.',20),
(3,'Up to 99.99% availability','Infrastructure availability targets backed by service credits, defined per service in your agreement.',30),
(4,'Documented environments','Runbooks, diagrams and credentials kept current and handed back to you on request.',40),
(5,'Transparent cost','Public cloud and software at provider list price, with monthly reports and savings recommendations.',50),
(6,'No lock-in','Your data and documentation stay yours, with an exit plan agreed at the start.',60);
/*!40000 ALTER TABLE `commitments` ENABLE KEYS */;
DROP TABLE IF EXISTS `steps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `steps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `body` text DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `steps` DISABLE KEYS */;
INSERT INTO `steps` (`id`, `title`, `body`, `sort`) VALUES (1,'Assess','We review your systems, risks, costs and goals, and agree what success looks like.',10),
(2,'Design','We propose the right platforms, service level and price, with a clear scope.',20),
(3,'Transition','We migrate and onboard with minimal disruption, documenting everything we take over.',30),
(4,'Operate & improve','We run, report and optimise, with regular reviews of performance and spend.',40);
/*!40000 ALTER TABLE `steps` ENABLE KEYS */;
DROP TABLE IF EXISTS `offices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `offices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(100) NOT NULL,
  `region` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `offices` DISABLE KEYS */;
INSERT INTO `offices` (`id`, `country`, `region`, `description`, `address`, `phone`, `sort`) VALUES (1,'United Arab Emirates','Middle East & Africa','Regional hosting and enterprise accounts.','','',10),
(2,'United Kingdom','UK & Ireland','UK-hosted services and GDPR-aligned operations.','','',20),
(3,'Czech Republic','European Union','EU data residency and EU-wide support.','','',30),
(4,'Canada','North America','Canadian-hosted services for privacy-sensitive clients.','','',40),
(5,'Pakistan','South Asia · 24/7 operations','South Asia, plus our 24/7 engineering and operations centre.','','',50);
/*!40000 ALTER TABLE `offices` ENABLE KEYS */;
DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` (`id`, `question`, `answer`, `is_active`, `sort`) VALUES (1,'Do we have to move our cloud accounts to you?','No. We can manage your existing AWS, Azure, Google Cloud or Oracle accounts, or provide them on our consolidated billing. You choose.',1,10),
(2,'Can our data stay in our country?','Yes. We offer hosting in the UAE, UK, EU, Canada and Pakistan, and design services around your residency requirements.',1,20),
(3,'What if we already have an IT team?','Choose Foundation or a co-managed arrangement. We cover out-of-hours monitoring, specialist skills or specific platforms, and your team keeps control.',1,30),
(4,'How long does onboarding take?','Most single-service engagements start within a few weeks. Larger migrations follow a plan agreed during the assessment.',1,40),
(5,'How are we billed?','One monthly or annual invoice in USD covering services, licences and cloud usage. You can pay by card, bank transfer, direct debit or invoice terms. Taxes apply according to your billing country.',1,50),
(6,'Can you transfer our existing domains and websites?','Yes. We handle domain transfers, website and email migration as part of onboarding, usually with no downtime.',1,60);
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(190) NOT NULL,
  `company` varchar(190) DEFAULT NULL,
  `phone` varchar(60) DEFAULT NULL,
  `service` varchar(150) DEFAULT NULL,
  `body` text NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'new',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status_idx` (`status`),
  KEY `created_idx` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(190) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'editor',
  `created_at` datetime NOT NULL,
  `last_login_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `login_attempts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(45) NOT NULL,
  `email` varchar(190) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip_idx` (`ip`,`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_name` varchar(150) DEFAULT NULL,
  `action` varchar(100) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_idx` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


SET FOREIGN_KEY_CHECKS = 1;
