<?php
declare(strict_types=1);

use App\Core\Router;

// ==========================================
// PUBLIC CUSTOMER ROUTES
// ==========================================
Router::get('/', 'HomeController@index');
Router::get('/index.php', 'HomeController@index'); // Legacy alias

Router::get('/about', 'PageController@about');
Router::get('/about-us.php', 'PageController@about');

Router::get('/faq', 'PageController@faq');
Router::get('/faqs.php', 'PageController@faq');

Router::get('/gallery', 'PageController@gallery');

Router::get('/contact', 'PageController@contact');
Router::get('/contact-us.php', 'PageController@contact');

Router::get('/terms', 'PageController@terms');
Router::get('/terms-and-conditions.php', 'PageController@terms');

Router::get('/privacy', 'PageController@privacy');
Router::get('/privacy-policy.php', 'PageController@privacy');

Router::get('/refund', 'PageController@refund');
Router::get('/refund-policy.php', 'PageController@refund');

Router::get('/blog', 'PageController@blog');
Router::get('/blog.php', 'PageController@blog');

Router::get('/services', 'ServiceController@index');


// Clean SEO URLs for categories and services
Router::get('/{category}-services-in-{city}', 'ServiceController@categoryInCity');
Router::get('/{service}-in-{city}', 'ServiceController@serviceInCity');

// Booking Flow & Cart
Router::get('/book', 'BookingController@showForm');
Router::post('/book', 'BookingController@submit', ['VerifyCsrf']);
Router::get('/book-success', 'BookingController@success');
Router::get('/cart', 'BookingController@showForm');
Router::get('/cart.php', 'BookingController@showForm');

// ==========================================
// UNIFIED AUTHENTICATION (ALL ROLES)
// ==========================================
Router::get('/login', 'AuthController@showLogin');
Router::post('/login', 'AuthController@login', ['VerifyCsrf', 'RateLimit:5,60']);

Router::get('/signup', 'AuthController@showSignup');
Router::post('/signup', 'AuthController@signup', ['VerifyCsrf', 'RateLimit:5,60']);

Router::get('/forgot-password', 'AuthController@showForgotPassword');
Router::post('/forgot-password', 'AuthController@forgotPassword', ['VerifyCsrf', 'RateLimit:5,60']);

Router::get('/reset-password', 'AuthController@showResetPassword');
Router::post('/reset-password', 'AuthController@resetPassword', ['VerifyCsrf']);

Router::get('/change-password', 'AuthController@showChangePassword', ['RequireLogin']);
Router::post('/change-password', 'AuthController@changePassword', ['RequireLogin', 'VerifyCsrf']);

Router::get('/logout', 'AuthController@logout');
Router::get('/logout.php', 'AuthController@logout');

// ==========================================
// CUSTOMER PORTAL (/account)
// ==========================================
Router::group(['middleware' => ['RequireRole:customer']], function () {
    Router::get('/account', 'AccountController@index');
    Router::get('/account/bookings', 'AccountController@bookings');
    Router::get('/my-booking.php', 'AccountController@bookings'); // Legacy alias
    Router::get('/account/bookings/{id}', 'AccountController@bookingDetail');
    Router::get('/account/invoices', 'AccountController@invoices');
    Router::get('/account/profile', 'AccountController@profile');
});

// ==========================================
// ADMIN PORTAL (/admin)
// ==========================================
Router::group(['middleware' => ['RequireRole:admin']], function () {
    Router::get('/admin', 'Admin\\DashboardController@index');
    Router::get('/admin/dashboard', 'Admin\\DashboardController@index');

    Router::get('/admin/enquiries', 'Admin\\EnquiryController@index');
    Router::get('/admin/enquiries/{id}', 'Admin\\EnquiryController@show');

    Router::get('/admin/bookings', 'Admin\\BookingController@index');
    Router::get('/admin/bookings/{id}', 'Admin\\BookingController@show');
    Router::post('/admin/bookings/{id}/assign', 'Admin\\BookingController@assignStaff', ['VerifyCsrf']);

    Router::get('/admin/staff', 'Admin\\StaffController@index');
    Router::get('/admin/staff/create', 'Admin\\StaffController@create');
    Router::post('/admin/staff', 'Admin\\StaffController@store', ['VerifyCsrf']);
    Router::get('/admin/staff/{id}', 'Admin\\StaffController@show');

    Router::get('/admin/services', 'Admin\\ServiceController@index');
    Router::get('/admin/services/categories', 'Admin\\ServiceController@categories');

    Router::get('/admin/payments', 'Admin\\PaymentController@index');
    Router::post('/admin/payments', 'Admin\\PaymentController@recordPayment', ['VerifyCsrf']);

    Router::get('/admin/reports', 'Admin\\ReportController@index');

    Router::get('/admin/content/faqs', 'Admin\\ContentController@faqs');
    Router::get('/admin/content/gallery', 'Admin\\ContentController@gallery');
    Router::get('/admin/content/reviews', 'Admin\\ContentController@reviews');
    Router::get('/admin/content/areas', 'Admin\\ContentController@areas');
    Router::get('/admin/content/steps', 'Admin\\ContentController@steps');

    Router::get('/admin/settings', 'Admin\\SettingsController@index');
    Router::post('/admin/settings', 'Admin\\SettingsController@save', ['VerifyCsrf']);
});

// ==========================================
// TECHNICIAN / STAFF PORTAL (/staff)
// ==========================================
Router::group(['middleware' => ['RequireRole:staff']], function () {
    Router::get('/staff', 'Staff\\DashboardController@index');
    Router::get('/staff/jobs', 'Staff\\JobController@index');
    Router::get('/staff/jobs/{id}', 'Staff\\JobController@show');
    Router::get('/staff/jobs/{id}/complete', 'Staff\\JobController@complete');
    Router::get('/staff/earnings', 'Staff\\EarningsController@index');
    Router::get('/staff/profile', 'Staff\\ProfileController@index');
});

// ==========================================
// API / AJAX JSON ENDPOINTS
// ==========================================
Router::post('/api/upload', 'Api\\UploadController@upload', ['VerifyCsrf']);
Router::post('/api/service-area/pincode', 'Api\\ServiceAreaController@checkPincode');
Router::post('/api/search', 'Api\\ServiceAreaController@search');
Router::post('/api/job/status', 'Api\\JobStatusController@update', ['RequireLogin', 'VerifyCsrf']);
Router::get('/api/notifications', 'Api\\NotificationController@recent', ['RequireLogin']);
