<div class="container py-5 my-3">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent p-0 mb-4" style="font-size: 14px;">
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/') ?>" style="color:#0f6e56;">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/account') ?>" style="color:#0f6e56;">My Account</a></li>
      <li class="breadcrumb-item active" aria-current="page">Invoices & Receipts</li>
    </ol>
  </nav>

  <div class="card p-4 p-md-5 border-0 shadow-sm" style="border-radius: 16px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="font-weight-bold mb-1" style="font-size: 26px; color: #1a1a1a;">GST Tax Invoices & Receipts</h2>
        <p class="text-muted small mb-0">Download official tax invoices for your completed service visits.</p>
      </div>
    </div>

    <?php if (!empty($invoices)): ?>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0" style="font-size: 14.5px;">
          <thead class="thead-light">
            <tr>
              <th>Invoice #</th>
              <th>Booking #</th>
              <th>Date</th>
              <th>Total Amount</th>
              <th>GST Tax (18%)</th>
              <th>Status</th>
              <th>Download</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($invoices as $inv): ?>
              <tr>
                <td class="font-weight-bold text-dark"><?= \App\Core\View::e($inv['invoice_no']) ?></td>
                <td><?= \App\Core\View::e($inv['booking_no'] ?? 'N/A') ?></td>
                <td><?= \App\Core\View::e(substr($inv['created_at'], 0, 10)) ?></td>
                <td class="font-weight-bold text-success">₹<?= number_format((float)$inv['total_amount'], 2) ?></td>
                <td class="text-muted">₹<?= number_format((float)$inv['tax_amount'], 2) ?></td>
                <td>
                  <span class="badge badge-<?= $inv['status'] === 'paid' ? 'success' : 'warning' ?> p-2 font-weight-bold text-uppercase">
                    <?= \App\Core\View::e($inv['status']) ?>
                  </span>
                </td>
                <td>
                  <a href="<?= \App\Core\View::url('/account/invoices/' . (int)$inv['id']) ?>" class="btn btn-sm btn-outline-dark font-weight-bold">
                    <i class="fa fa-file-pdf-o text-danger mr-1"></i> Receipt
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <div class="text-center py-5 text-muted">
        <i class="fa fa-file-text-o mb-3" style="font-size: 48px; color: #cbd5e1;"></i>
        <h5 class="font-weight-bold">No invoices generated yet</h5>
        <p class="small text-muted mb-3">Invoices and formal GST receipts are automatically created when your technician completes the service.</p>
        <a href="<?= \App\Core\View::url('/services') ?>" class="btn text-white px-4 py-2 font-weight-bold" style="background:#0f6e56; border-radius: 8px;">
          Explore Services
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>
