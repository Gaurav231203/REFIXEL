# Primodomus — Service Management & Field Workforce Platform

A modern, high-performance service marketplace and field workforce management platform built on plain PHP 8.2+ MVC and MySQL 8 / MariaDB 10.6+.

## Architecture
- **Web Root:** `public/` (Single front controller `public/index.php`)
- **App Core:** `app/core/` (Custom lightweight MVC: Router, Request, Response, View, Database, Env, Logger, Auth, Csrf, Validator, Upload, Workflow, Notifier, InvoiceBuilder, Report)
- **Middleware:** `app/middleware/` (RequireLogin, RequireRole, VerifyCsrf, RateLimit)
- **Roles:**
  - Customer (`/account`, `/cart`, booking engine, invoice tracking, reviews)
  - Admin (`/admin`, enquiries, bookings, staff assignment, services, payments, CMS, settings)
  - Technician / Staff (`/staff`, mobile-first job list, job status workflow, before/after photos, earnings)

## Requirements
- PHP 8.2+ with PDO, mbstring, fileinfo, curl, session
- MariaDB 10.6+ or MySQL 8.0+
- Apache 2.4+ with mod_rewrite enabled

## Local Setup (XAMPP)
1. Place project in `c:\xampp\htdocs\website`.
2. Configure `.env` database credentials (`DB_DATABASE=primodomus_db`).
3. Import `database/schema.sql` and `database/seed.sql`.
4. Open `http://localhost/website/public/` (or `http://localhost/website/` with root fallback).
