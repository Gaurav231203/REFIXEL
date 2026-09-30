<?php
$bNo = \App\Core\View::e($booking['booking_no']);
$status = \App\Core\View::e($booking['status']);
?>
<div class="container py-5 my-3">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent p-0 mb-4" style="font-size: 14px;">
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/') ?>" style="color:#0f6e56;">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/account/bookings') ?>" style="color:#0f6e56;">My Bookings</a></li>
      <li class="breadcrumb-item active" aria-current="page">Booking #<?= $bNo ?></li>
    </ol>
  </nav>

  <div class="row">
    <!-- Booking Details Column -->
    <div class="col-lg-8 mb-4">
      <div class="card p-4 p-md-5 border-0 shadow-sm" style="border-radius: 16px;">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap" style="gap: 10px;">
          <div>
            <span class="text-muted small">Booking Number</span>
            <h2 class="font-weight-bold mb-0" style="font-size: 26px; color: #1a1a1a;">#<?= $bNo ?></h2>
          </div>
          <?php
          $badgeClass = match($booking['status']) {
            'new'         => 'warning',
            'assigned'    => 'info',
            'accepted'    => 'primary',
            'in_progress' => 'primary',
            'completed'   => 'success',
            'invoiced'    => 'success',
            'cancelled'   => 'danger',
            default       => 'secondary'
          };
          ?>
          <span class="badge badge-<?= $badgeClass ?> px-3 py-2 font-weight-bold text-uppercase" style="font-size: 13px; letter-spacing: 0.5px;">
            <?= str_replace('_', ' ', $status) ?>
          </span>
        </div>

        <!-- Workflow Progress Timeline -->
        <div class="p-3 rounded bg-light border mb-4">
          <h6 class="font-weight-bold mb-3" style="font-size: 14px; color: #0f6e56;">Service Progress Tracking</h6>
          <div class="d-flex justify-content-between text-center flex-wrap" style="gap: 8px; font-size: 12px;">
            <div class="<?= in_array($booking['status'], ['new', 'assigned', 'accepted', 'in_progress', 'completed', 'invoiced', 'closed']) ? 'text-success font-weight-bold' : 'text-muted' ?>">
              <i class="fa fa-dot-circle-o d-block mb-1" style="font-size: 18px;"></i> Booked
            </div>
            <div class="<?= in_array($booking['status'], ['assigned', 'accepted', 'in_progress', 'completed', 'invoiced', 'closed']) ? 'text-success font-weight-bold' : 'text-muted' ?>">
              <i class="fa fa-user d-block mb-1" style="font-size: 18px;"></i> Assigned
            </div>
            <div class="<?= in_array($booking['status'], ['in_progress', 'completed', 'invoiced', 'closed']) ? 'text-success font-weight-bold' : 'text-muted' ?>">
              <i class="fa fa-wrench d-block mb-1" style="font-size: 18px;"></i> In Progress
            </div>
            <div class="<?= in_array($booking['status'], ['completed', 'invoiced', 'closed']) ? 'text-success font-weight-bold' : 'text-muted' ?>">
              <i class="fa fa-check-circle d-block mb-1" style="font-size: 18px;"></i> Completed
            </div>
            <div class="<?= in_array($booking['status'], ['invoiced', 'closed']) ? 'text-success font-weight-bold' : 'text-muted' ?>">
              <i class="fa fa-file-text-o d-block mb-1" style="font-size: 18px;"></i> Invoiced
            </div>
          </div>
        </div>

        <!-- Service Information -->
        <h5 class="font-weight-bold mb-3" style="font-size: 18px; color: #0f6e56;">Service Information</h5>
        <div class="row mb-4">
          <div class="col-md-6 mb-2">
            <span class="text-muted small d-block">Service Requested:</span>
            <strong><?= \App\Core\View::e($booking['service_name'] ?? 'Home Maintenance') ?></strong>
          </div>
          <div class="col-md-6 mb-2">
            <span class="text-muted small d-block">Scheduled Slot:</span>
            <strong><?= \App\Core\View::e($booking['preferred_date']) ?> (<?= \App\Core\View::e($booking['preferred_time']) ?>)</strong>
          </div>
          <div class="col-12 mt-2">
            <span class="text-muted small d-block">Service Address:</span>
            <p class="mb-0 text-dark"><?= \App\Core\View::e($booking['address']) ?>, <?= \App\Core\View::e($booking['city'] ?? '') ?> - <?= \App\Core\View::e($booking['pincode'] ?? '') ?></p>
          </div>
          <?php if (!empty($booking['issue_details'])): ?>
            <div class="col-12 mt-2">
              <span class="text-muted small d-block">Specific Instructions / Issue Notes:</span>
              <p class="mb-0 text-muted fst-italic">"<?= \App\Core\View::e($booking['issue_details']) ?>"</p>
            </div>
          <?php endif; ?>
        </div>

        <!-- Assigned Technician (if present) -->
        <?php if (!empty($booking['staff_name'])): ?>
          <h5 class="font-weight-bold mb-3" style="font-size: 18px; color: #0f6e56;">Assigned Professional</h5>
          <div class="p-3 rounded bg-light border d-flex align-items-center mb-4">
            <img src="<?= \App\Core\View::asset('img/account.png') ?>" alt="Technician" class="rounded-circle mr-3" style="width: 48px; height: 48px;">
            <div>
              <h6 class="font-weight-bold mb-0"><?= \App\Core\View::e($booking['staff_name']) ?></h6>
              <small class="text-success font-weight-bold"><i class="fa fa-shield"></i> Verified Primodomus Partner</small>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <!-- Booking Summary Sidebar -->
    <div class="col-lg-4">
      <div class="card p-4 border-0 shadow-sm" style="border-radius: 16px; background:#f7fbf9; border:1px solid #dcece7;">
        <h5 class="font-weight-bold mb-3" style="font-size: 18px;">Payment & Invoice</h5>

        <div class="d-flex justify-content-between mb-2 small text-muted">
          <span>Starting Base Price:</span>
          <span class="font-weight-bold text-dark">₹<?= number_format((float)($booking['starting_price'] ?? 0), 0) ?></span>
        </div>
        <div class="d-flex justify-content-between mb-2 small text-muted">
          <span>Payment Status:</span>
          <span class="badge badge-light p-1 font-weight-bold"><?= strtoupper(\App\Core\View::e($booking['payment_status'] ?? 'PENDING')) ?></span>
        </div>
        <hr>

        <?php if (in_array($booking['status'], ['completed', 'invoiced', 'closed'])): ?>
          <a href="<?= \App\Core\View::url('/account/invoices') ?>" class="btn text-white py-2 font-weight-bold w-100 mb-2" style="background:#0f6e56; border-radius: 8px;">
            <i class="fa fa-download mr-1"></i> View GST Invoice
          </a>
        <?php else: ?>
          <div class="alert alert-info small mb-3">
            <i class="fa fa-info-circle mr-1"></i> Payment is collected on doorstep upon successful completion.
          </div>
        <?php endif; ?>

        <a href="https://api.whatsapp.com/send?phone=+919953358855&text=Inquiry%20regarding%20booking%20<?= urlencode($bNo) ?>" target="_blank" class="btn btn-outline-success py-2 font-weight-bold w-100 small" style="border-radius: 8px;">
          <i class="fa fa-whatsapp mr-1"></i> Need Help with this Booking?
        </a>
      </div>
    </div>
  </div>
</div>
