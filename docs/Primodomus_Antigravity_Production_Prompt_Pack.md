
# PRIMODOMUS — ANTIGRAVITY PRODUCTION BUILD PROMPT PACK

Sequential copy-paste prompts for a production-ready PHP + MySQL service platform

Prepared from the supplied “Service Management &amp; Field Workforce Platform - PHP + MySQL plan” (30 Sep 2026) and a live review of https://www.primodomus.com/index.php. The supplied plan defines the Customer + Admin + Technician architecture, database, workflow, security and deployment requirements. The live site currently exposes a customer-facing experience with a promotion/hero, location + service search, trending searches, trust stats, service categories, city availability, Why Choose Us, FAQ, cart, About, service links, legal links and mobile navigation.

PRIMARY NON-NEGOTIABLE: Preserve the current Primodomus visual UI and customer-facing content/structure. Build the production system underneath it. Do not redesign the public UI unless a bug, accessibility issue, responsiveness issue or missing functional state requires a minimal UI adjustment.


# How to use this document

Give Prompt 00 to Antigravity first.

Then execute Prompts 01–16 one by one, waiting for Antigravity to finish and test each stage before sending the next.

Never ask Antigravity to rebuild everything from scratch after a stage is completed. Each prompt is an incremental implementation stage.

If Antigravity reports a conflict, it must inspect the existing implementation and preserve the current working behavior before changing architecture.

At every stage, require a short changed-files list, test result, known issues and next-step readiness report.

Source basis: the supplied research document recommends PHP 8.2+, MySQL 8/MariaDB 10.6+, PDO, server-rendered PHP, a public web root, MVC-style layers, role-based access, secure uploads, notifications, cron jobs, backups and production security controls. It also identifies payment gateway, GST invoice, reviews, cancellation/reschedule/refund and fixed notification channels as items that need explicit implementation decisions.


# PROMPT 00 — MASTER PROJECT CONTRACT / READ BEFORE CODING

You are the lead production engineer for the Primodomus service marketplace. Before changing code, inspect the complete existing project, database, assets and current live customer UI at https://www.primodomus.com/index.php.

You are the lead production engineer for the Primodomus service marketplace. Before changing code, inspect the complete existing project, database, assets and current live customer UI at https://www.primodomus.com/index.php.PROJECT GOALBuild a production-ready PHP + MySQL home/service marketplace with three roles:1) Customer2) Admin3) Technician/StaffTECH STACK- PHP 8.2+- MySQL 8 or MariaDB 10.6+- PDO prepared statements- HTML5, CSS3, vanilla JavaScript- Apache/Nginx compatible- Composer allowed for PHPMailer, dotenv and PHPUnit if useful- Chart.js may be used for admin charts- cURL integration layer for external APIs- No React/Node/Laravel unless the existing project already requires it; prefer the supplied plain-PHP MVC architecture.VISUAL/UI CONTRACT — NON-NEGOTIABLEThe current live Primodomus customer UI is the visual source of truth:https://www.primodomus.com/index.phpPreserve the same:- overall page structure- visual hierarchy- typography feel- colors- spacing rhythm- card treatment- buttons- hero/search treatment- service category presentation- trust/stat presentation- Why Choose Us section- FAQ treatment- cart treatment- footer- mobile bottom navigation- responsive behavior- existing copy/content unless a functional correction is necessary.Do NOT replace the UI with a generic admin-template look on the customer website.Do NOT introduce a new design system just because it is easier to code.First reuse existing assets/CSS/components wherever possible.CURRENT LIVE UI ELEMENTS TO PRESERVE- Starting-at ₹999 promotional strip- Deep-cleaning hero and primary CTA- location selector- service search input- trending service searches- rating/customer/jobs/verified-professional stats- service categories- city/service availability and coming-soon state- Why Choose Us cards- FAQ accordion- cart indicator- About section- service links- legal/footer links- call/WhatsApp/booking mobile navigation behaviorFUNCTIONAL PRODUCT CONTRACTCustomer:- browse services/categories/cities- service details- checklist- booking/enquiry- issue-photo upload- account- booking tracking- invoices/receipts- review- call/WhatsApp supportAdmin:- dashboard- enquiries- bookings/jobs- staff- services/categories/pricing- assignment/reassignment- payments- invoices- reports- FAQs/gallery/checklists/process/service areas/reviews- business/settings/notificationsTechnician:- dashboard- assigned jobs only- accept/decline if enabled- on-the-way/started/completed status- job notes- before/after photos- earnings/history- own profileSECURITY CONTRACT- password_hash/password_verify- session_regenerate_id on login- secure HttpOnly SameSite cookies- CSRF on forms and fetch POST requests- XSS-safe output escaping- PDO prepared statements only- server-side authorization on every protected page and JSON endpoint- technician SQL queries must filter by current staff ID- rate limit login/OTP- secure upload MIME/extension/size checks- random upload filenames- block PHP execution in uploads- .env outside web root- production display_errors off- error logging- daily database backup- privacy consent/audit trail- security headers/CSPWORKFLOWnew → assigned → accepted → in_progress → completed → invoiced → reviewed → closedAlso support cancelled, and design the data model so reschedule/refund can be added safely.RULENever trust prices, role, staff IDs, booking ownership, status transitions or file paths supplied by the browser.Before coding, produce:1. architecture audit2. existing UI/component audit3. database audit4. security audit5. deployment audit6. exact implementation planThen wait for the next stage prompt. Do not rebuild yet.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 01 — CODEBASE + LIVE UI AUDIT

Perform a deep audit of the existing Primodomus codebase and compare the customer-facing implementation against https://www.primodomus.com/index.php.

Perform a deep audit of the existing Primodomus codebase and compare the customer-facing implementation against https://www.primodomus.com/index.php.DO NOT redesign or refactor yet.Audit:- root files and folders- includes/components- PHP routing- database access- sessions/auth- APIs/AJAX- CSS- JS- images/assets- cart- booking- login- location- responsive behavior- current admin/staff functionality- current database tables- current security controls- current deployment configurationFor the live UI, record the exact current sections and interaction states that must remain visually equivalent:hero, search/location, trending searches, stats, categories, coming-soon city state, Why Choose Us, FAQ, cart, About, footer, service links and mobile navigation.Create an implementation map:CURRENT FILE → TARGET PRODUCTION FILE/CLASS → ACTION (reuse/refactor/replace) → RISK.Do not delete working code.Do not alter the visual UI in this stage.At the end report:- findings- broken/missing areas- duplicate code- security risks- database risks- deployment risks- exact files to touch next.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 02 — PRODUCTION ARCHITECTURE + FOLDER STRUCTURE

Implement the production architecture using the supplied PHP MVC proposal while preserving the existing Primodomus UI.

Implement the production architecture using the supplied PHP MVC proposal while preserving the existing Primodomus UI.TARGET ARCHITECTURE:project/├── .env├── .env.example├── .gitignore├── composer.json├── README.md├── public/│   ├── index.php│   ├── .htaccess│   ├── assets/│   │   ├── css/│   │   ├── js/│   │   └── img/│   └── uploads/│       ├── .htaccess│       ├── issues/│       ├── jobs/│       └── gallery/├── app/│   ├── core/│   ├── middleware/│   ├── models/│   ├── controllers/│   │   ├── Admin/│   │   ├── Staff/│   │   └── Api/│   ├── views/│   │   ├── layouts/│   │   ├── auth/│   │   ├── customer/│   │   ├── admin/│   │   ├── staff/│   │   ├── partials/│   │   └── emails/│   └── services/├── config/├── database/│   └── migrations/├── cron/├── storage/│   ├── logs/│   └── cache/├── docs/└── tests/Core classes should include:Router, Request, Response, View, Database, Env, Logger, Auth, Csrf, Validator, Upload, Workflow, Notifier, InvoiceBuilder, Report.Middleware:RequireLogin, RequireRole, VerifyCsrf, RateLimit.Controllers:Auth, Home, Page, Service, Booking, Account.Admin: Dashboard, Enquiry, Booking, Staff, Service, Payment, Report, Content, Settings.Staff: Dashboard, Job, Earnings, Profile.API: Upload, ServiceArea, JobStatus, Notification.Models should cover users, profiles, categories, services, checklists, areas, bookings, attachments, jobs, photos, status history, payments, invoices, reviews, FAQs, gallery, process steps, settings, notifications, password resets, login attempts and consents.Only public/ must be web-accessible in production.If the current hosting environment cannot point the document root to public/, create the safest compatible fallback without exposing app/, config/ or .env.Do not change the customer UI during architecture migration.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 03 — DATABASE + MIGRATIONS + SEED DATA

Build the complete MySQL production schema based on the supplied research document.

Build the complete MySQL production schema based on the supplied research document.Use:- InnoDB- utf8mb4- foreign keys- indexes- DECIMAL for money- IST consistently for application time- PDO- migrations- schema.sql- seed.sqlRequired tables:userscustomer_profilesstaff_profilesstaff_skillsstaff_availabilitycategoriesservicesservice_checklist_itemsservice_areasbookingsbooking_attachmentsjobsjob_photosstatus_historypaymentsinvoicesstaff_earningsreviewsfaqsgallery_itemsprocess_stepssettingsnotificationspassword_resetslogin_attemptsconsentsEnsure:- unique booking number- unique invoice number- indexes on status, staff_id, customer_id, dates- safe foreign-key actions- audit timestamps- soft-disable/active flags where appropriate- no FLOAT for financial values- uploaded files stored as paths, not BLOBs- one booking → one active job model, with reassignment recorded in history- multiple payments supported- review approval supported- service-specific and global FAQs supported- service/city SEO data can be stored cleanlyCreate realistic seed data only as clearly marked demo data.Never use demo reviews/stats as real production claims.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 04 — AUTHENTICATION + ROLE SECURITY

Implement one shared login system for Customer, Admin and Technician.

Implement one shared login system for Customer, Admin and Technician.Required flow: /login → authenticate → read users.role → redirect: customer → /account admin → /admin staff → /staffCustomer:- public signup- login- forgot password- reset password- change passwordAdmin:- never creatable through public signup- first admin via seed/CLI- later created by owner/adminStaff:- created by admin- temporary password- must_change_password on first loginImplement:- password_hash/password_verify- session_regenerate_id- secure session cookies- idle/session expiry strategy- logout- CSRF- rate limiting- login attempt logging- authorization middleware- server-side role checks on every page and API endpointCritical:Hiding a menu item is NOT authorization.A technician must only access their own records.Customers must only access their own bookings/invoices/profile.Admin pages require admin role.Do not add phone OTP as a mandatory dependency unless the existing project already uses it. Keep OTP as an integration-ready optional mechanism.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 05 — REBUILD/PRESERVE PUBLIC WEBSITE UI EXACTLY

Now implement the public customer-facing website while keeping the current Primodomus UI visually the same as https://www.primodomus.com/index.php.

Now implement the public customer-facing website while keeping the current Primodomus UI visually the same as https://www.primodomus.com/index.php.Treat the live website as the visual reference, not as an opportunity for redesign.Preserve:1. promo strip2. hero3. location selector4. service search5. trending searches6. trust stats7. service category cards8. city/availability state9. Why Choose Us10. FAQ11. cart indicator/mini-cart12. About13. service links14. footer15. mobile navigation/call/WhatsApp/booking actionsUse the existing real assets and content whenever available.Make the UI data-driven:- categories from database- services from database- cities/service areas from database- FAQs from database- gallery from database- reviews from database- stats/settings from databaseDo not change public text, headings or visual positioning unnecessarily.Add required missing pages using the same design language:- About- FAQ- Gallery / before-after- Contact- Blog- Terms- Privacy- Refund- Service category- Service detail- Booking- AccountEvery page must be responsive on Android, iPhone, tablet and desktop.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 06 — SERVICE CATALOGUE + SEO CLEAN URLS

Implement the service catalogue and location-aware clean URLs.

Implement the service catalogue and location-aware clean URLs.Required URL patterns: /{category}-services-in-{city} /{service}-services-in-{city}Examples: /cleaning-services-in-kashipur /ac-services-in-kashipur /plumber-services-in-kashipur /electrician-services-in-kashipur /full-home-cleaning-services-in-kashipurUse safe route parsing and database lookup.Never trust raw URL values for SQL.Category page must include:- breadcrumb- H1- city- service cards- starting price- service availability- SEO intro- checklist summary- FAQ- related services- service-area information- booking CTAService detail must include:- title- city- price- duration- description- what's included- what's not included- FAQs- before/after- reviews- available area- booking CTAGenerate:- title- meta description- canonical- Open Graph- Service/LocalBusiness structured data where appropriate- breadcrumb schema where appropriateAvoid duplicate pages and keyword stuffing.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 07 — CUSTOMER BOOKING ENGINE + CART

Implement the complete customer booking flow.

Implement the complete customer booking flow.FLOW:Home → service/category → service detail → select location → booking form → issue details/photo → date/time → login if needed → confirmation → account tracking.Cart:- add service- remove service- quantity where applicable- mini-cart- cart count- server-side recalculation- never trust browser price- empty cart state- loading/error/success statesBooking fields should support:- customer name- phone- email- service- city/area- full address- pincode- preferred date- preferred time- issue details- customer issue photos- priority where appropriateOn submit:- validate- CSRF- check service active- check service area- calculate price server-side- create unique booking number- create status=new- create notification for admin- show booking success- make booking visible in customer accountDo not expose database errors to customers.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 08 — JOB WORKFLOW + TECHNICIAN/STaff PORTAL

Implement the technician portal as a mobile-first field-work interface while keeping it visually consistent with Primodomus.

Implement the technician portal as a mobile-first field-work interface while keeping it visually consistent with Primodomus.Technician dashboard:- today’s jobs- upcoming jobs- current status- rating- earnings summaryJob list:- only jobs assigned to current technician- today/upcoming/completed filtersJob detail:- customer- service- address- pincode- issue- preferred time- photos- notes- status timeline- contact actionsStatus workflow:assigned → accepted → in_progress → completedIn-progress sub-actions:- on the way- startedCompletion:- work summary- final notes- before photos- after photos- completion timestampAll status transitions must be enforced server-side through Workflow.php.Reject illegal transitions.Every technician query must contain authorization logic equivalent to:WHERE staff_id = current_user_idNever rely on URL parameters to determine the technician.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 09 — ADMIN DASHBOARD + OPERATIONS

Build the production admin panel.

Build the production admin panel.Admin-only modules:1. Dashboard2. Enquiries3. Bookings4. Calendar5. Staff6. Services7. Categories8. Payments9. Invoices10. Reports11. Website Content12. Service Areas13. FAQs14. Gallery15. Checklists16. Process Steps17. Reviews approval18. Business Settings19. Notification SettingsDashboard:- new enquiries- assigned jobs- active jobs- completed jobs- revenue- pending payments- staff count- service count- date filters- service/staff reports- charts where usefulEnquiry operations:- view- notes- priority- assign- reassign- statusBooking operations:- details- assignment- rescheduling-ready data model- payment- invoice- historyStaff:- create- activate/deactivate- skills- availability- view jobs- earningsContent:- FAQs- gallery- checklist- reviews approval- areas- process steps- About/stats/settingsKeep admin UI clean and centralized. Avoid making users jump between unnecessary screens.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 10 — PAYMENTS, INVOICES, REVIEWS + MISSING WORKFLOW STATES

Implement the financial and post-service foundation.

Implement the financial and post-service foundation.PAYMENTS:- record cash/UPI/card/bank- pending/partial/paid/refunded- amount stored as DECIMAL- payment history- recorded_by- paid_atINVOICES:- invoice number- subtotal- GST rate- GST amount- total- issue date- printable invoice- customer view- admin viewImportant:The supplied research identifies online payment gateway and GST-compliant invoice as gaps in the original scope. Build the internal payment/invoice model now. Keep Razorpay or another gateway behind an integration interface so it can be enabled later without rewriting booking logic.REVIEWS:- one review per eligible booking- rating- comment- admin approval- customer own review- public approved reviews onlyWORKFLOW STATES:Add safe handling for:- cancelled- rescheduled- refund_requested- refundedDo not let a customer or technician change a status outside their allowed transitions.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 11 — NOTIFICATIONS + INTEGRATIONS

Create a single notification/integration layer.

Create a single notification/integration layer.Implement a Notifier service with provider interfaces for:- email- SMS- WhatsAppLog outgoing notifications in notifications table.Required notification events:- new booking → admin- booking confirmation → customer- staff assignment → technician- booking status changes → customer- job completed → customer/admin- invoice created → customer- password reset → customer/staff- important admin alertsUse PHPMailer/SMTP for email where appropriate.Use cURL provider adapters for SMS/WhatsApp APIs.Do not hardcode API keys.All secrets come from .env.WhatsApp automation and provider billing must remain configurable. A simple WhatsApp chat link may exist independently of paid API automation.Add cron-ready reminder support:- upcoming booking reminder- missed/failed notification retry- cleanup tasks

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 12 — WEBSITE CONTENT, LOCAL SEO + CMS

Make the public website content manageable without a developer where the research document calls for admin-editable content.

Make the public website content manageable without a developer where the research document calls for admin-editable content.Admin-editable:- FAQs- before/after gallery- service checklists- reviews- service areas- process steps- About text- stats- map/settings- service/category descriptions- banners where the existing UI supports themSEO requirements:- clean service/city URLs- unique title/meta- canonical- internal links- breadcrumbs- service-area pages- FAQ schema where valid- LocalBusiness/Service schema where valid- sitemap.xml- robots.txt- Open Graph- image alt textDo not fabricate testimonials, customer counts, ratings, completed jobs, certifications or business claims.Use only verified/current business data.Preserve the current Primodomus UI and content style.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 13 — SECURITY HARDENING + PRIVACY

Perform a full security hardening pass.

Perform a full security hardening pass.Must verify:- PDO prepared statements everywhere- no SQL concatenation with user input- CSRF on every state-changing form/fetch- htmlspecialchars output escaping- CSP and security headers- RequireLogin/RequireRole on all protected routes- JSON endpoint authorization- technician ownership filters- secure session cookies- session ID regeneration- password hashing- login rate limiting- OTP rate limiting if OTP is enabled- password reset token hashing and expiry- upload MIME validation- extension validation- file-size validation- random filenames- upload directories cannot execute PHP- .env is outside public web root- secrets are never committed- display_errors off in production- error logging- no sensitive values in logs- safe exception handling- database least-privilege user- backup strategy- audit/status historyPrivacy:- consent records- privacy notice- data access/deletion workflow foundation- access logs where appropriateDo not claim legal compliance merely because code exists. Document compliance assumptions and advise legal review where needed.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 14 — PERFORMANCE + RESPONSIVE QA

Optimize the production website without changing the Primodomus visual identity.

Optimize the production website without changing the Primodomus visual identity.Test:- Android Chrome- iPhone Safari- tablet- desktop- slow connectionCheck:- no horizontal overflow- tap targets- sticky mobile actions- image dimensions- lazy loading- responsive images- JS loading- CSS duplication- database query count- N+1 queries- pagination- caching where safe- form loading states- API latency- error states- empty statesDo not remove important content merely for speed.Do not replace the existing UI with a simpler generic design.Create a responsive QA checklist and fix every critical issue found.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 15 — TESTING + COMPLETE END-TO-END QA

Run a production QA cycle covering the entire system.

Run a production QA cycle covering the entire system.AUTH TESTS:- customer signup/login/logout- admin login- staff login- wrong password- disabled account- forgot/reset password- role access blockingCUSTOMER:- browse category- service detail- location- cart- booking- issue photo- account- booking tracking- invoice- review- cancel/reschedule/refund statesADMIN:- dashboard- enquiry- assignment- reassignment- staff- service/category- payments- invoice- reports- content- review approval- settingsTECHNICIAN:- only own jobs- accept- on way- started- complete- photos- notes- earnings- profileSECURITY:- SQL injection attempts- XSS- CSRF- IDOR- role escalation- unauthorized JSON endpoints- malicious upload- oversized upload- executable upload- brute-force simulation- session fixationUI:- desktop- tablet- mobile- broken links- console errors- PHP warnings/notices- missing assets- invalid URLsCreate automated tests for:WorkflowTestValidatorTestInvoiceTestRoleAccessTestAuthTestBookingFlowTestAssignmentTestPermissionTestDo not mark QA passed if a known critical issue remains.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 16 — DEPLOYMENT + PRODUCTION GO-LIVE

Prepare the application for real production deployment.

Prepare the application for real production deployment.SERVER REQUIREMENTS:- PHP 8.2+- MySQL 8 or MariaDB 10.6+- pdo_mysql- mbstring- fileinfo- gd- curl- Apache/Nginx- HTTPS- cronDEPLOYMENT:1. Set document root to /public.2. Keep app/, config/, database/, storage/, .env outside public web access.3. Configure production .env.4. Import/migrate database.5. Seed only required production data.6. Configure writable storage/logs and uploads safely.7. Block PHP execution in uploads.8. Configure .htaccess/rewrite rules.9. Enable HTTPS.10. Set display_errors=Off.11. Enable error logging.12. Configure cron.13. Configure daily mysqldump.14. Store backup off-server.15. Test restore.16. Configure email/SMS/WhatsApp credentials.17. Verify permissions.18. Verify robots.txt and sitemap.19. Verify canonical URLs.20. Run smoke tests.Create:- deployment.md- environment variable checklist- backup/restore instructions- rollback plan- cron configuration- production smoke-test checklistBefore declaring deployment ready, verify the live customer UI still visually matches the current Primodomus website.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# PROMPT 17 — FINAL PRODUCTION AUDIT / ZERO-MISS CHECK

This is the final release gate.

This is the final release gate.Do not add new features. Audit everything already built.Compare the implementation against:A. supplied Service Management &amp; Field Workforce Platform researchB. current Primodomus live UIC. database schemaD. customer workflowE. admin workflowF. technician workflowG. security checklistH. deployment checklistCreate a matrix:Requirement | Implemented | File/Class | Database | Tested | Evidence | Remaining RiskExplicitly verify every requirement:- public website- exact current UI preservation- clean URLs- service catalogue- city/service areas- customer account- booking- cart- issue photos- admin enquiries- staff assignment- technician jobs- status workflow- before/after photos- payments- invoices- reviews- earnings- reports- FAQs- gallery- checklist- process- About/stats- notifications- SEO- responsive UI- security- backups- cron- logs- privacy/consent- deploymentFind and fix all P0/P1 issues before release.Run final PHP syntax checks, database checks, authorization tests, responsive checks and smoke tests.Final output must include:1. release status2. exact production URL3. database migration status4. test summary5. security summary6. backup status7. cron status8. external integrations status9. known limitations10. rollback instructionsDo not say “production ready” unless the critical checks actually pass.

Completion gate: Antigravity must report changed files, tests run, test results, remaining issues and confirm that no unrelated UI redesign was introduced.


# APPENDIX A — REQUIRED PRODUCTION FOLDER TREE

primodomus/├── .env├── .env.example├── .gitignore├── composer.json├── README.md├── public/│   ├── index.php│   ├── .htaccess│   ├── assets/│   │   ├── css/│   │   ├── js/│   │   └── img/│   └── uploads/│       ├── .htaccess│       ├── issues/│       ├── jobs/│       └── gallery/├── app/│   ├── core/│   ├── middleware/│   ├── models/│   ├── controllers/│   │   ├── Admin/│   │   ├── Staff/│   │   └── Api/│   ├── services/│   └── views/│       ├── layouts/│       ├── auth/│       ├── customer/│       ├── admin/│       ├── staff/│       ├── partials/│       └── emails/├── config/├── database/│   └── migrations/├── cron/├── storage/│   ├── logs/│   └── cache/├── docs/└── tests/    ├── Unit/    ├── Feature/    └── Browser/


# APPENDIX B — PRODUCTION DATABASE TABLE CHECKLIST

userscustomer_profilesstaff_profilesstaff_skillsstaff_availabilitycategoriesservicesservice_checklist_itemsservice_areasbookingsbooking_attachmentsjobsjob_photosstatus_historypaymentsinvoicesstaff_earningsreviewsfaqsgallery_itemsprocess_stepssettingsnotificationspassword_resetslogin_attemptsconsents


# APPENDIX C — CURRENT LIVE UI REFERENCE

Visual source of truth: https://www.primodomus.com/index.php

Promo strip with starting price/offer

Deep-cleaning hero headline and primary CTA

Location selector

Service search input

Trending searches

Rating / happy customer / homes cleaned / verified professional stats

Service category cards

City/service availability and coming-soon state

Why Choose Us

FAQ accordion

Cart count / View Cart

About Primodomus

Quick Links and service links

Contact information and city list

Mobile bottom navigation including Home, Booking, WhatsApp and Cart

Live-site review note: the current page publicly shows Gurugram as the address and lists service cities including Gurugram, Delhi-NCR, Mumbai, Hyderabad, Chennai, Ahmedabad, Chandigarh, Kochi and Pune. Treat these as current site content to preserve only if they remain verified in the project database/admin content.

The supplied research document also notes that demo statistics/testimonials must not be treated as real production claims. Replace any unverified demo numbers/reviews with verified business data before launch.


# APPENDIX D — RELEASE GATE

No critical security issue

No unauthorized role access

No SQL injection path

No executable upload path

No production secrets in public files/repository

Database backup tested

Restore tested

HTTPS active

Cron active

Error logging active

Production display_errors disabled

Customer UI visually matches the current Primodomus reference

Mobile/tablet/desktop QA passed

All core booking workflow states tested

Admin assignment/reassignment tested

Technician ownership tested

Invoice/payment records tested

Review approval tested

Clean URLs tested

SEO metadata/canonical/sitemap/robots verified

Source basis: Service Management &amp; Field Workforce Platform - PHP + MySQL plan, 30 September 2026 (29 pages), supplied by the user; plus live review of the Primodomus homepage at https://www.primodomus.com/index.php.

Important: This document is an implementation prompt pack, not a legal certification or a guarantee of production security. Legal/privacy/payment compliance must be verified for the actual operating model and providers.
