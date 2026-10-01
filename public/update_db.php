<?php
define('ROOT_PATH', dirname(__DIR__));
spl_autoload_register(function (string $class) {
    $prefix = 'App\\';
    $baseDir = ROOT_PATH . '/app/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) { return; }
    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    if (file_exists($file)) { require_once $file; }
});
\App\Core\Env::load(ROOT_PATH . '/.env');

try {
    \App\Core\Database::query("ALTER TABLE customer_profiles ADD COLUMN house_no VARCHAR(100) DEFAULT NULL AFTER user_id, ADD COLUMN street VARCHAR(255) DEFAULT NULL AFTER house_no, ADD COLUMN state VARCHAR(100) DEFAULT NULL AFTER city, ADD COLUMN address_type VARCHAR(50) DEFAULT 'Home' AFTER state;");
    echo "Success";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
