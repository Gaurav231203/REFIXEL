<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Job extends Model
{
    protected static string $table = 'jobs';

    public static function findByStaff(int $staffId, ?string $filter = null): array
    {
        $sql = "SELECT j.*, b.booking_no, b.address, b.pincode, b.preferred_date, b.preferred_time,
                       b.issue_details, b.name as customer_name, b.phone as customer_phone,
                       s.name as service_name, s.starting_price
                FROM jobs j
                JOIN bookings b ON j.booking_id = b.id
                JOIN services s ON b.service_id = s.id
                WHERE j.staff_id = :staff_id";

        $params = ['staff_id' => $staffId];

        if ($filter === 'today') {
            $sql .= " AND (b.preferred_date = CURDATE() OR DATE(j.scheduled_at) = CURDATE())";
        } elseif ($filter === 'upcoming') {
            $sql .= " AND (b.preferred_date > CURDATE() OR DATE(j.scheduled_at) > CURDATE())";
        } elseif ($filter === 'completed') {
            $sql .= " AND j.status = 'completed'";
        }

        $sql .= " ORDER BY j.scheduled_at DESC, j.id DESC";

        return Database::fetchAll($sql, $params);
    }

    public static function findWithDetailsForStaff(int $jobId, int $staffId): ?array
    {
        return Database::fetchOne(
            "SELECT j.*, b.booking_no, b.address, b.pincode, b.preferred_date, b.preferred_time,
                    b.issue_details, b.name as customer_name, b.phone as customer_phone,
                    s.name as service_name, s.starting_price, s.description as service_description
             FROM jobs j
             JOIN bookings b ON j.booking_id = b.id
             JOIN services s ON b.service_id = s.id
             WHERE j.id = :jid AND j.staff_id = :sid
             LIMIT 1",
            ['jid' => $jobId, 'sid' => $staffId]
        );
    }
}
