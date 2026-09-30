<?php
declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Core\Database;
use App\Core\Request;
use App\Core\Response;
use App\Models\Booking;
use App\Models\User;

class EnquiryController extends Controller
{
    public function index(Request $request): Response
    {
        $enquiries = Database::fetchAll(
            "SELECT b.*, s.name as service_name 
             FROM bookings b 
             JOIN services s ON b.service_id = s.id 
             WHERE b.status = 'new' 
             ORDER BY b.created_at DESC"
        );

        return $this->render('admin.enquiries.index', [
            'title'     => 'New Enquiries | Primodomus Admin',
            'enquiries' => $enquiries,
        ], 'admin');
    }

    public function show(Request $request, string $id): Response
    {
        $booking = Booking::findWithDetails((int)$id);
        $staffMembers = Database::fetchAll("SELECT id, name, phone FROM users WHERE role = 'staff' AND status = 'active'");

        return $this->render('admin.enquiries.show', [
            'title'        => "Enquiry #{$booking['booking_no']} | Primodomus Admin",
            'booking'      => $booking,
            'staffMembers' => $staffMembers,
        ], 'admin');
    }
}
