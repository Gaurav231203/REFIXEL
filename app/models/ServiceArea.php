<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class ServiceArea extends Model
{
    protected static string $table = 'service_areas';

    public static function getActiveCities(): array
    {
        return Database::fetchAll("SELECT DISTINCT city FROM service_areas WHERE is_active = 1 ORDER BY city ASC");
    }

    public static function isPincodeServed(string $pincode): bool
    {
        $res = Database::fetchOne("SELECT id FROM service_areas WHERE pincode = :pin AND is_active = 1 LIMIT 1", ['pin' => $pincode]);
        return $res !== null;
    }
}
