<?php
declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Core\Database;
use App\Core\InvoiceBuilder;
use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(Request $request): Response
    {
        $payments = Database::fetchAll(
            "SELECT p.*, b.booking_no, b.name as customer_name, i.invoice_no, i.id as invoice_id
             FROM payments p
             JOIN bookings b ON p.booking_id = b.id
             LEFT JOIN invoices i ON p.id = i.payment_id
             ORDER BY p.id DESC"
        );

        return $this->render('admin.payments.index', [
            'title'    => 'Payments & Invoices | Primodomus Admin',
            'payments' => $payments,
        ], 'admin');
    }

    public function recordPayment(Request $request): Response
    {
        $bookingId = (int)$request->input('booking_id');
        $amount = (float)$request->input('amount');
        $method = (string)$request->input('method', 'cash');

        $paymentId = Payment::create([
            'booking_id'  => $bookingId,
            'amount'      => $amount,
            'method'      => $method,
            'status'      => 'paid',
            'paid_at'     => date('Y-m-d H:i:s'),
            'recorded_by' => $this->userId(),
        ]);

        // Generate GST Invoice automatically
        InvoiceBuilder::createForPayment($paymentId, $amount);

        View::setFlash('success', 'Payment recorded and invoice generated successfully.');
        return $this->redirect('/admin/payments');
    }
}
