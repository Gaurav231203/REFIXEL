<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class StaffEarning extends Model
{
    protected static string $table = 'staff_earnings';

    public static function getByStaff(int $staffId): array
    {
        return Database::fetchAll(
            "SELECT se.*, j.id as job_id, b.booking_no, s.name as service_name
             FROM staff_earnings se
             JOIN jobs j ON se.job_id = j.id
             JOIN bookings b ON j.booking_id = b.id
             JOIN services s ON b.service_id = s.id
             WHERE se.staff_id = :sid
             ORDER BY se.created_at DESC",
            ['sid' => $staffId]
        );
    }
}
