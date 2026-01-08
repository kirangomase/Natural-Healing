# Natural Heal Project

**A simple static/PHP website for natural health resources and appointments.**

## Overview
This repository contains the front-end pages and minimal PHP endpoints for a small health/wellness site. It includes static HTML pages, a stylesheet, and a couple of PHP pages that require a running PHP server and a database.

## Contents
- `index.html` - Home page
- `about.html` - About the project/service
- `treatments.html` - Treatments information
- `diet.html` - Diet-related pages
- `yoga.html` - Yoga resources
- `packages.html` - Package/pricing info
- `appointment.php` - Appointment form (requires PHP + DB)
- `disease.php` - Disease-related pages (requires PHP + DB)
- `database_setup.sql` - SQL script to create required DB tables
- `style.css` - Global stylesheet

## Local setup
- For a quick view of static pages, open `index.html` in your browser.
- To use the PHP pages (`appointment.php`, `disease.php`) you need a PHP-enabled server (e.g., XAMPP, WAMP, or the PHP built-in server):
  - Place the project folder in your server's document root (e.g., `htdocs` for XAMPP) and start Apache & MySQL.
  - Import `database_setup.sql` into your MySQL database (via phpMyAdmin or CLI).
  - If using PHP built-in server, run from the project root:

    ```bash
    php -S localhost:8000
    ```

    and open `http://localhost:8000/appointment.php` in your browser.

> Note: Check `appointment.php` and `disease.php` for how database credentials are configured and update them to match your local DB.

## Contributing
- Feel free to open issues or submit pull requests with improvements or fixes.

## License
This project is provided as-is. You can add a license file later (e.g., MIT) if desired.

---

**Contact:** for questions or edits, update the files directly or open an issue.
