<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class Invoice extends Model
{
    protected static string $table = 'invoices';

    public static function findByCustomer(int $customerId): array
    {
        return Database::fetchAll(
            "SELECT i.*, p.amount, p.method, b.booking_no, s.name as service_name
             FROM invoices i
             JOIN payments p ON i.payment_id = p.id
             JOIN bookings b ON p.booking_id = b.id
             JOIN services s ON b.service_id = s.id
             WHERE b.customer_id = :cid
             ORDER BY i.issued_at DESC",
            ['cid' => $customerId]
        );
    }
}
