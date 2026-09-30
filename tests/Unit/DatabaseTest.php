<?php
declare(strict_types=1);

require_once __DIR__ . '/../bootstrap.php';

use App\Core\Database;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;

echo "=== RUNNING DATABASE & SCHEMA TESTS ===\n";

// Test 1: Check users count & roles
$users = Database::fetchAll("SELECT role, count(*) as c FROM users GROUP BY role");
echo "Test 1: User roles:\n";
foreach ($users as $u) {
    echo "  - {$u['role']}: {$u['c']} users\n";
}

// Test 2: Check active categories
$categories = Category::getActive();
assert(count($categories) >= 6, "Expected at least 6 categories");
echo "Test 2: Active categories: " . count($categories) . " (PASSED)\n";

// Test 3: Check services
$services = Database::fetchAll("SELECT s.name, s.starting_price, c.name as cat_name FROM services s JOIN categories c ON s.category_id = c.id");
assert(count($services) >= 10, "Expected at least 10 services");
echo "Test 3: Active services: " . count($services) . " (PASSED)\n";
foreach (array_slice($services, 0, 3) as $s) {
    echo "  - {$s['name']} ({$s['cat_name']}) starting at INR {$s['starting_price']}\n";
}

// Test 4: Verify decimal format (not float)
$price = $services[0]['starting_price'];
assert(is_string($price) && str_contains($price, '.'), "Expected DECIMAL formatted as string with decimal places");
echo "Test 4: Financial accuracy DECIMAL verification: {$price} (PASSED)\n";

// Test 5: Verify foreign key enforcement
try {
    Database::query("INSERT INTO services (category_id, name, slug, starting_price) VALUES (999999, 'Invalid', 'invalid', 100)");
    echo "Test 5: Foreign key test FAILED (should have thrown exception)\n";
    exit(1);
} catch (\PDOException $e) {
    echo "Test 5: Foreign key integrity check (PASSED) - Caught expected constraint violation\n";
}

echo "=== ALL DATABASE TESTS PASSED SUCCESSFULLY! ===\n";
