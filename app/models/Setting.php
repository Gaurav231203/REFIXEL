<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Setting extends Model
{
    protected static string $table = 'settings';

    public static function get(string $key, mixed $default = null): mixed
    {
        $res = Database::fetchOne("SELECT setting_value FROM settings WHERE setting_key = :k LIMIT 1", ['k' => $key]);
        return $res['setting_value'] ?? $default;
    }

    public static function set(string $key, string $value): void
    {
        Database::query(
            "INSERT INTO settings (setting_key, setting_value) VALUES (:k, :v)
             ON DUPLICATE KEY UPDATE setting_value = :v2",
            ['k' => $key, 'v' => $value, 'v2' => $value]
        );
    }
}
