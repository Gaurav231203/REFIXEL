<?php
use App\Core\View;
$payments = $payments ?? [];
$unpaidBookings = $unpaidBookings ?? [];
$totalPaid = $totalPaid ?? 0.0;
$totalPending = $totalPending ?? 0.0;
$totalGst = $totalGst ?? 0.0;
?>

<div class="admin-payments-page">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h4 class="font-weight-bold mb-1 text-dark">Payments & Invoicing</h4>
      <p class="text-muted small mb-0">Record customer settlements, track payment methods, and issue GST invoices.</p>
    </div>

    <div>
      <button type="button" class="btn btn-sm btn-brand font-weight-bold" data-toggle="modal" data-target="#recordPaymentModal">
        <i class="fa fa-plus mr-1"></i>Record New Payment
      </button>
    </div>
  </div>

  <!-- 3 Summary Stat Cards -->
  <div class="row mb-3">
    <div class="col-md-4">
      <div class="stat-card" style="border-left: 4px solid #10b981 !important;">
        <div class="stat-label text-success">Total Collected</div>
        <div class="stat-value text-dark">₹<?= number_format((float)$totalPaid, 2) ?></div>
        <span class="text-muted small">Cleared customer transactions</span>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat-card" style="border-left: 4px solid #ef4444 !important;">
        <div class="stat-label text-danger">Pending Amount</div>
        <div class="stat-value text-danger">₹<?= number_format((float)$totalPending, 2) ?></div>
        <span class="text-muted small">Awaiting payment settlement</span>
      </div>
    </div>
    <div class="col-md-4">
      <div class="stat-card" style="border-left: 4px solid #6366f1 !important;">
        <div class="stat-label" style="color: #6366f1;">Total GST Invoiced</div>
        <div class="stat-value text-dark">₹<?= number_format((float)$totalGst, 2) ?></div>
        <span class="text-muted small">18% GST output tax accrued</span>
      </div>
    </div>
  </div>

  <!-- Payments Records Table -->
  <div class="stat-card p-0 overflow-hidden">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th>Txn ID</th>
            <th>Booking #</th>
            <th>Customer</th>
            <th>Amount (INR)</th>
            <th>Method</th>
            <th>Status</th>
            <th>Paid Date</th>
            <th>Invoice</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($payments)): ?>
            <tr>
              <td colspan="8" class="text-center py-5 text-muted">No payments recorded yet.</td>
            </tr>
          <?php else: ?>
            <?php foreach ($payments as $p): ?>
              <tr>
                <td>
                  <strong class="text-dark">#TXN-<?= (int)$p['id'] ?></strong>
                  <?php if (!empty($p['transaction_ref'])): ?>
                    <div class="text-muted" style="font-size: 11px;">Ref: <?= View::e($p['transaction_ref']) ?></div>
                  <?php endif; ?>
                </td>
                <td>
                  <a href="<?= View::url('/admin/bookings/' . $p['booking_id']) ?>" class="font-weight-bold text-dark">
                    #<?= View::e($p['booking_no']) ?>
                  </a>
                  <div class="text-muted small"><?= View::e($p['service_name']) ?></div>
                </td>
                <td>
                  <div class="font-weight-bold text-dark"><?= View::e($p['customer_name']) ?></div>
                  <div class="text-muted small"><?= View::e($p['customer_phone']) ?></div>
                </td>
                <td>
                  <h6 class="font-weight-bold text-success mb-0">₹<?= number_format((float)$p['amount'], 2) ?></h6>
                </td>
                <td>
                  <span class="badge badge-light border text-dark font-weight-bold">
                    <?= strtoupper(View::e($p['method'] ?? 'cash')) ?>
                  </span>
                </td>
                <td>
                  <?php if ($p['status'] === 'paid'): ?>
                    <span class="badge badge-success">Paid</span>
                  <?php elseif ($p['status'] === 'pending'): ?>
                    <span class="badge badge-warning text-dark">Pending</span>
                  <?php else: ?>
                    <span class="badge badge-secondary"><?= ucfirst(View::e($p['status'])) ?></span>
                  <?php endif; ?>
                </td>
                <td class="small">
                  <?= View::e(substr((string)($p['paid_at'] ?? $p['created_at']), 0, 16)) ?>
                </td>
                <td>
                  <?php if (!empty($p['invoice_no'])): ?>
                    <a href="<?= View::url('/admin/invoices/' . $p['invoice_id']) ?>" class="btn btn-sm btn-outline-secondary font-weight-bold py-1 px-2" style="font-size: 11px;">
                      <i class="fa fa-file-text-o mr-1"></i><?= View::e($p['invoice_no']) ?>
                    </a>
                  <?php else: ?>
                    <span class="text-muted small">No invoice</span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal: Record Payment -->
<div class="modal fade" id="recordPaymentModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?= View::url('/admin/payments') ?>">
        <?= View::csrfField() ?>
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold">Record Customer Payment</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label class="font-weight-bold small">Select Booking <span class="text-danger">*</span></label>
            <select name="booking_id" class="form-control" required>
              <option value="">-- Choose Booking --</option>
              <?php foreach ($unpaidBookings as $ub): ?>
                <option value="<?= $ub['id'] ?>">
                  #<?= View::e($ub['booking_no']) ?> - <?= View::e($ub['name']) ?> (<?= View::e($ub['service_name']) ?>)
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group mb-3">
            <label class="font-weight-bold small">Amount Collected (INR) <span class="text-danger">*</span></label>
            <input type="number" step="0.01" name="amount" class="form-control" placeholder="e.g. 2499.00" required>
          </div>

          <div class="form-group mb-3">
            <label class="font-weight-bold small">Payment Method <span class="text-danger">*</span></label>
            <select name="method" class="form-control" required>
              <option value="cash">Cash on Delivery (Cash)</option>
              <option value="upi">UPI / QR Code (Google Pay / PhonePe / Paytm)</option>
              <option value="card">Debit / Credit Card</option>
              <option value="bank">Bank Transfer / NEFT</option>
            </select>
          </div>

          <div class="form-group mb-3">
            <label class="font-weight-bold small">Transaction / Reference ID (Optional)</label>
            <input type="text" name="transaction_ref" class="form-control" placeholder="UPI Reference or Bank Txn ID">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-brand font-weight-bold">Confirm & Generate GST Invoice</button>
        </div>
      </form>
    </div>
  </div>
</div>
