# Service Management & Field Workforce Platform
## Research, website sections, layouts, architecture, MySQL database and folder structure
**Stack:** PHP 8.2+, MySQL 8 / MariaDB 10.6+, HTML5, CSS3, Vanilla JS  
**Roles:** Customer + Admin + Technician  
**Date:** 30 September 2026

---

### Section Summary
1. **Technology Stack:** PHP 8.2+, MySQL 8 / MariaDB 10.6+, HTML5, CSS3, vanilla JS, Chart.js, PHPMailer / cURL integration layer.
2. **Login for all roles:** Single `/login` page with role-based redirection (`customer` -> `/account`, `admin` -> `/admin`, `staff` -> `/staff`).
3. **Deep research:** Indian home services market, competitive analysis, scope gaps, timeline, DPDP compliance, gig-worker laws.
4. **Website sections needed:** About, Before/After gallery, checklist, 4-step process, Why Choose Us, reviews with admin approval, enquiry form, FAQ accordion, location map / city selector, sticky mobile navigation.
5. **Layout patterns:** Five home page patterns (Split hero, Bento grid, Search-first marketplace, Zig-zag storytelling, Mobile-first stack).
6. **System architecture:** Single front controller (`public/index.php`), MVC layers, middleware, service lifecycle workflow.
7. **MySQL database:** 22+ tables, InnoDB, utf8mb4, foreign keys, DECIMAL for financial values, IST timestamps, SQL schema.
8. **Customer portal:** Flow, layout, controllers, models, views, booking and invoice tracking.
9. **Admin portal:** 8 core modules (Dashboard, Enquiries/Jobs, Staff, Services/Categories, Payments/Invoices, Reports, Website Content, Business/Notification Settings).
10. **Technician portal:** Mobile-first dashboard, job list, job detail, status transitions, before/after photo uploads, earnings.
11. **Shared code:** Router, Request, Response, View, Database (PDO), Env, Logger, Auth, Csrf, Validator, Upload, Workflow, Notifier, InvoiceBuilder, Report.
12. **Feature matrix:** Detailed role-by-role CRUD and view permissions.
13. **Full folder structure:** Detailed file layout adhering to `public/` web root, `app/`, `config/`, `database/`, `cron/`, `storage/`, `docs/`, `tests/`.
14. **Security and deployment checklist:** SQL injection prevention (PDO prepared statements), password hashing, session regeneration, CSRF tokens, output escaping, role-based authorization, MIME upload security, rate limiting, `.env` isolation.
15. **Next steps & release readiness.**
