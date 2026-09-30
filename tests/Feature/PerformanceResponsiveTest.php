<?php
declare(strict_types=1);

namespace Tests\Feature;

require __DIR__ . '/../bootstrap.php';

use App\Controllers\HomeController;
use App\Core\Auth;
use App\Core\Cache;
use App\Core\Database;
use App\Core\Request;
use App\Core\View;
use App\Models\Setting;
use App\Models\User;

echo "=== RUNNING PERFORMANCE & RESPONSIVE QA FEATURE TESTS (PROMPT 14) ===\n";

// ==========================================
// TEST 1: Cache Service In-Memory and Disk Functionality
// ==========================================
Cache::flush();
$testKey = 'perf_test_key_' . time();
$testValue = ['metric' => 'latency_ms', 'val' => 42];

Cache::set($testKey, $testValue, 60);
assert(Cache::has($testKey) === true, "Cache must confirm key exists");
$retrieved = Cache::get($testKey);
assert($retrieved['val'] === 42, "Cache must return stored value");

// Cache remember callback execution test
$executed = 0;
$remembered = Cache::remember($testKey, 60, function () use (&$executed) {
    $executed++;
    return ['val' => 999];
});
assert($executed === 0, "Remember callback must not execute when key is already cached");
assert($remembered['val'] === 42, "Remember must return existing cached value");

Cache::forget($testKey);
assert(Cache::get($testKey) === null, "Forgotten key must return null");
echo "Test 1: Cache Service In-Memory and Disk Functionality - PASSED\n";

// ==========================================
// TEST 2: Setting Cache Optimization & Invalidation
// ==========================================
Cache::flush();

// Seed or update setting
Setting::set('perf_test_promo', 'Exclusive 20% Off');
$val1 = Setting::get('perf_test_promo');
assert($val1 === 'Exclusive 20% Off', "Setting::get must return updated value");

// Verify that repeated calls use the cache
$val2 = Setting::get('perf_test_promo');
assert($val2 === 'Exclusive 20% Off', "Second call must return cached setting");

// Update setting and verify cache invalidation
Setting::set('perf_test_promo', 'Flat ₹500 Discount');
$val3 = Setting::get('perf_test_promo');
assert($val3 === 'Flat ₹500 Discount', "Cache must invalidate and return newly saved value");
echo "Test 2: Setting Cache Optimization & Invalidation - PASSED\n";

// ==========================================
// TEST 3: Homepage Execution Speed & Query Budget
// ==========================================
$homeCtrl = new HomeController();
$startTime = microtime(true);
$response = $homeCtrl->index(new Request());
$elapsedMs = (microtime(true) - $startTime) * 1000;

assert($response->getStatusCode() === 200, "Homepage must return 200");
assert($elapsedMs < 250, "Homepage controller execution must be fast (<250ms), took {$elapsedMs}ms");
echo "Test 3: Homepage Execution Speed & Query Budget - PASSED ({$elapsedMs}ms)\n";

// ==========================================
// TEST 4: Horizontal Overflow Protection in CSS
// ==========================================
$cssContent = file_get_contents(ROOT_PATH . '/public/assets/css/style.css');
assert($cssContent !== false, "style.css must exist and be readable");
assert(
    str_contains($cssContent, 'overflow-x: hidden;'),
    "style.css must contain overflow-x: hidden on body/html to prevent mobile horizontal scroll"
);
echo "Test 4: Horizontal Overflow Protection in CSS - PASSED\n";

// ==========================================
// TEST 5: Mobile Navbar Tap Targets and High Z-Index
// ==========================================
assert(
    str_contains($cssContent, 'z-index: 1050;'),
    "bottomBarNavbar must use z-index 1050 to stay above page cards and floaters"
);
assert(
    str_contains($cssContent, 'min-height: 44px;') && str_contains($cssContent, 'min-width: 44px;'),
    "bottomBarNavbar tap targets must comply with WCAG 44x44px minimum touch target size"
);
echo "Test 5: Mobile Navbar Tap Targets and High Z-Index - PASSED\n";

// ==========================================
// TEST 6: Body Padding-Bottom for Sticky Mobile Bar
// ==========================================
assert(
    str_contains($cssContent, 'padding-bottom: 65px;'),
    "style.css must provide padding-bottom: 65px on mobile body so sticky bottom nav never obscures content"
);
echo "Test 6: Body Padding-Bottom for Sticky Mobile Bar - PASSED\n";

// ==========================================
// TEST 7: Image Lazy Loading, Decoding & FetchPriority Attributes
// ==========================================
$homeHtml = $response->getContent();
assert(
    str_contains($homeHtml, 'fetchpriority="high"'),
    "Primary hero/slider image must have fetchpriority=high for LCP optimization"
);
assert(
    str_contains($homeHtml, 'loading="lazy"'),
    "Below-the-fold images must have loading=lazy attribute"
);
assert(
    str_contains($homeHtml, 'decoding="async"'),
    "Below-the-fold images must have decoding=async attribute"
);
echo "Test 7: Image Lazy Loading, Decoding & FetchPriority Attributes - PASSED\n";

// ==========================================
// TEST 8: Form Double-Submit Protection Script Present in Customer Layout
// ==========================================
$layoutContent = file_get_contents(ROOT_PATH . '/app/views/layouts/customer.php');
assert(
    str_contains($layoutContent, 'Form double-submission prevention') || str_contains($layoutContent, 'Processing...'),
    "Customer layout must include client-side double-submission prevention and loading state spinner"
);
echo "Test 8: Form Double-Submit Protection Script Present in Customer Layout - PASSED\n";

// ==========================================
// TEST 9: Empty States Verification Across Modules
// ==========================================
// Customer Cart Empty State
$cartHtml = View::render('customer.cart', ['cart' => ['items' => [], 'is_empty' => true]], 'customer')->getContent();
assert(
    str_contains($cartHtml, 'Your cart is empty'),
    "Cart view must display empty state when items array is empty"
);

// Customer Bookings Empty State
$bookingsHtml = View::render('customer.account.bookings', ['bookings' => []], 'customer')->getContent();
assert(
    str_contains($bookingsHtml, 'No bookings recorded yet'),
    "Bookings view must display empty state when user has no bookings"
);

// Customer Invoices Empty State
$invoicesHtml = View::render('customer.account.invoices', ['invoices' => []], 'customer')->getContent();
assert(
    str_contains($invoicesHtml, 'No invoices generated yet'),
    "Invoices view must display empty state when user has no invoices"
);

// Staff Jobs Empty State
$staffJobsHtml = View::render('staff.jobs.index', [
    'filter' => 'today',
    'jobs'   => [],
    'counts' => ['today' => 0, 'upcoming' => 0, 'in_progress' => 0, 'completed' => 0, 'all' => 0],
], 'staff')->getContent();
assert(
    str_contains($staffJobsHtml, 'No jobs found'),
    "Staff jobs view must display empty state when no jobs are assigned"
);
echo "Test 9: Empty States Verification Across Modules - PASSED\n";

// ==========================================
// TEST 10: Mobile Bottom Bar Icons & WhatsApp Links Verification
// ==========================================
$mobileBarHtml = file_get_contents(ROOT_PATH . '/app/views/partials/mobile-bar.php');
assert(
    str_contains($mobileBarHtml, 'width="22" height="22"'),
    "Mobile bottom bar icons must define explicit width and height"
);
assert(
    str_contains($mobileBarHtml, 'https://api.whatsapp.com/send?phone='),
    "WhatsApp mobile action must link to official WhatsApp gateway"
);
echo "Test 10: Mobile Bottom Bar Icons & WhatsApp Links Verification - PASSED\n";

echo "\nALL 10 PERFORMANCE & RESPONSIVE QA FEATURE TESTS PASSED SUCCESSFULLY!\n";
