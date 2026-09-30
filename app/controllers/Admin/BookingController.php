<?php
declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Core\Database;
use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Models\Booking;
use App\Models\Job;

class BookingController extends Controller
{
    public function index(Request $request): Response
    {
        $status = $request->query('status');
        $sql = "SELECT b.*, s.name as service_name, u.name as customer_name, st.name as staff_name, j.status as job_status
                FROM bookings b
                JOIN services s ON b.service_id = s.id
                LEFT JOIN users u ON b.customer_id = u.id
                LEFT JOIN jobs j ON b.id = j.booking_id
                LEFT JOIN users st ON j.staff_id = st.id";

        $params = [];
        if ($status) {
            $sql .= " WHERE b.status = :status";
            $params['status'] = $status;
        }
        $sql .= " ORDER BY b.id DESC";

        $bookings = Database::fetchAll($sql, $params);

        return $this->render('admin.bookings.index', [
            'title'    => 'Manage Bookings | Primodomus Admin',
            'bookings' => $bookings,
            'currentStatus' => $status,
        ], 'admin');
    }

    public function assignStaff(Request $request, string $id): Response
    {
        $staffId = (int)$request->input('staff_id');
        $scheduledAt = $request->input('scheduled_at') ?? date('Y-m-d H:i:s');

        $booking = Booking::find((int)$id);
        if (!$booking) {
            View::setFlash('error', 'Booking not found.');
            return $this->redirect('/admin/bookings');
        }

        // Check if job exists
        $job = Database::fetchOne("SELECT id FROM jobs WHERE booking_id = :bid", ['bid' => $id]);

        if ($job) {
            Database::query(
                "UPDATE jobs SET staff_id = :sid, scheduled_at = :sched, status = 'assigned', updated_at = NOW() WHERE id = :jid",
                ['sid' => $staffId, 'sched' => $scheduledAt, 'jid' => $job['id']]
            );
        } else {
            Job::create([
                'booking_id'   => (int)$id,
                'staff_id'     => $staffId,
                'status'       => 'assigned',
                'scheduled_at' => $scheduledAt,
            ]);
        }

        Booking::update((int)$id, ['status' => 'assigned']);
        View::setFlash('success', 'Technician successfully assigned.');
        return $this->redirect('/admin/bookings/' . $id);
    }

    public function show(Request $request, string $id): Response
    {
        $booking = Booking::findWithDetails((int)$id);
        $staffMembers = Database::fetchAll("SELECT id, name, phone FROM users WHERE role = 'staff' AND status = 'active'");

        return $this->render('admin.bookings.show', [
            'title'        => "Booking Details #{$booking['booking_no']} | Primodomus Admin",
            'booking'      => $booking,
            'staffMembers' => $staffMembers,
        ], 'admin');
    }
}
