# b2cloud.io website

Corporate website for **b2cloud.io** with a built-in content dashboard. Plain PHP 8.1+ and MySQL, with no frameworks or Composer packages, so it runs on any cPanel hosting.

- **Public site:** home, services (one page per service), managed services, about, FAQ, contact form, site search, privacy, terms, 404, `sitemap.xml`, `robots.txt`
- **Dashboard (`/admin`):** messages inbox (with CSV export and email alerts), page text, services and prices, practices, service levels, commitments, process steps, FAQs, offices and addresses, settings (emails, social links, client-login button, announcement bar, animations), users and roles, activity log
- **Placeholders:** the *Client login* button and social icons show as disabled ("coming soon") until you add their links in **Settings**
- **Logo:** `public/assets/img/logo-dark.svg`, `logo-light.svg`, `logo-mark.svg`, `public/favicon.svg`

## Folder layout

```
app/        PHP code, templates, schema (keep OUT of public_html)
public/     web root: index.php, .htaccess, assets
tools/      local development helper (not deployed)
.cpanel.yml deployment recipe for cPanel "Git Version Control"
```

## Deploy on cPanel

### Option A: Git Version Control (recommended)
1. cPanel → **Git™ Version Control** → *Create* → clone this repository (for a private repo, add the SSH key cPanel shows you as a read-only *Deploy key* in GitHub).
2. Open the repository → **Pull or Deploy** → *Deploy HEAD Commit*. `.cpanel.yml` copies `public/` into `public_html` and `app/` into `~/b2cloud_app`.
3. Remove any old `index.html` from `public_html`.

### Option B: File Manager / FTP
1. Upload the contents of `public/` into `public_html`.
2. Upload the `app/` folder to your home directory and rename it to `b2cloud_app` (next to `public_html`, not inside it).
   *If you can only use `public_html`, upload `app/` inside it; `.htaccess` blocks web access to it.*

### Install
1. cPanel → **MySQL® Databases**: create a database and a user, and add the user to the database with **All Privileges**.
2. Visit `https://your-domain/install` and enter the database details and your first administrator account.
3. Sign in at `https://your-domain/admin`.
4. Turn on SSL (cPanel → SSL/TLS Status → AutoSSL), then uncomment the HTTPS redirect in `public_html/.htaccess`.

The installer writes `b2cloud_app/config.php` (database credentials, permissions 600) and `storage/installed.lock`. To reinstall, delete both.

## Everyday editing
| Want to change… | Go to |
|---|---|
| Homepage, About, Contact, Privacy, Terms text | Dashboard → **Page text** |
| A service, its price or its list items | **Services** |
| Office addresses and phone numbers | **Offices** |
| Emails, social links, client-login link, announcement | **Settings** (administrators) |
| Read and answer enquiries | **Messages** |

Leave a price amount empty to show **"Let's talk"**.

## Security
- Passwords hashed with PHP `password_hash`; sessions are HTTP-only, SameSite, regenerated on sign-in, and expire after 2 hours idle
- CSRF tokens on every form; login is limited to 5 failed attempts per 15 minutes per IP
- All database access uses prepared statements; all output is escaped
- Contact form has a honeypot, a minimum fill time and a per-IP hourly limit; email headers are sanitised
- `app/` is outside the web root (or blocked by `.htaccess`); the dashboard sends `noindex` and `no-store` headers

## Local development
```bash
php -S 127.0.0.1:8080 -t public tools/dev-router.php
# then open http://127.0.0.1:8080/install
```

## Roadmap
Online systems (client portal, ordering, domain search, billing) will be added later on the same codebase and database. The *Client login* button already points to a configurable address.
