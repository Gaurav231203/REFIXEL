<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Request;
use App\Core\Response;
use App\Models\Booking;
use App\Models\Invoice;
use App\Models\User;

class AccountController extends Controller
{
    public function index(Request $request): Response
    {
        $user = Auth::user();
        $recentBookings = Booking::findByCustomer($user['id']);

        return $this->render('customer.account.index', [
            'title'    => 'My Account | Primodomus',
            'user'     => $user,
            'bookings' => array_slice($recentBookings, 0, 5),
        ], 'customer');
    }

    public function bookings(Request $request): Response
    {
        $bookings = Booking::findByCustomer(Auth::id());
        return $this->render('customer.account.bookings', [
            'title'    => 'My Bookings | Primodomus',
            'bookings' => $bookings,
        ], 'customer');
    }

    public function bookingDetail(Request $request, string $id): Response
    {
        $booking = Booking::findWithDetails((int)$id);

        if (!$booking || (int)$booking['customer_id'] !== Auth::id()) {
            return $this->render('partials.404', ['title' => 'Booking Not Found'], 'customer')->setStatusCode(404);
        }

        return $this->render('customer.account.booking-detail', [
            'title'   => "Booking #{$booking['booking_no']} | Primodomus",
            'booking' => $booking,
        ], 'customer');
    }

    public function invoices(Request $request): Response
    {
        $invoices = Invoice::findByCustomer(Auth::id());
        return $this->render('customer.account.invoices', [
            'title'    => 'My Invoices | Primodomus',
            'invoices' => $invoices,
        ], 'customer');
    }

    public function profile(Request $request): Response
    {
        return $this->render('customer.account.profile', [
            'title' => 'Profile Settings | Primodomus',
            'user'  => Auth::user(),
        ], 'customer');
    }
}
