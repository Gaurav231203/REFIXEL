<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Notifier;
use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Models\Booking;
use App\Models\BookingAttachment;
use App\Models\Service;

class BookingController extends Controller
{
    public function showForm(Request $request): Response
    {
        $serviceId = (int)$request->query('service_id', 0);
        $service = $serviceId ? Service::find($serviceId) : null;
        $allServices = Service::getActive();

        return $this->render('customer.book', [
            'title'       => 'Book a Service | Primodomus',
            'service'     => $service,
            'allServices' => $allServices,
        ], 'customer');
    }


    public function submit(Request $request): Response
    {
        $validator = $this->validate($request, [
            'service_id'     => 'required|numeric',
            'name'           => 'required|min:2',
            'phone'          => 'required|phone',
            'address'        => 'required|min:5',
            'preferred_date' => 'required',
            'preferred_time' => 'required',
        ]);

        if ($validator->fails()) {
            View::setFlash('error', $validator->firstError());
            return $this->redirect('/book?service_id=' . (int)$request->input('service_id'));
        }

        $service = Service::find((int)$request->input('service_id'));
        if (!$service || empty($service['is_active'])) {
            View::setFlash('error', 'Selected service is currently unavailable.');
            return $this->redirect('/services');
        }

        $bookingNo = Booking::generateBookingNo();
        $customerId = Auth::id(); // optional, can be guest or logged-in customer

        $bookingId = Booking::create([
            'booking_no'     => $bookingNo,
            'customer_id'    => $customerId,
            'service_id'     => $service['id'],
            'name'           => trim((string)$request->input('name')),
            'phone'          => preg_replace('/\D/', '', (string)$request->input('phone')),
            'email'          => $request->input('email') ? trim((string)$request->input('email')) : null,
            'address'        => trim((string)$request->input('address')),
            'pincode'        => $request->input('pincode') ? trim((string)$request->input('pincode')) : null,
            'preferred_date' => $request->input('preferred_date'),
            'preferred_time' => $request->input('preferred_time'),
            'issue_details'  => $request->input('issue_details') ? trim((string)$request->input('issue_details')) : null,
            'status'         => 'new',
            'priority'       => 'normal',
        ]);

        // Trigger notification
        Notifier::send('email', 'admin@primodomus.com', 'new_booking_admin', [
            'booking_no' => $bookingNo,
            'service'    => $service['name'],
        ]);

        return $this->redirect('/book-success?booking_no=' . urlencode($bookingNo));
    }

    public function success(Request $request): Response
    {
        $bookingNo = (string)$request->query('booking_no', '');
        return $this->render('customer.book-success', [
            'title'      => 'Booking Confirmed | Primodomus',
            'booking_no' => $bookingNo,
        ], 'customer');
    }
}
