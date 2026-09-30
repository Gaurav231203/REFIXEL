<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Review extends Model
{
    protected static string $table = 'reviews';

    public static function getApproved(): array
    {
        return Database::fetchAll(
            "SELECT r.*, u.name as customer_name, s.name as service_name
             FROM reviews r
             JOIN users u ON r.customer_id = u.id
             JOIN bookings b ON r.booking_id = b.id
             JOIN services s ON b.service_id = s.id
             WHERE r.is_approved = 1
             ORDER BY r.created_at DESC"
        );
    }
}
