<div class="container py-5 my-3">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent p-0 mb-4" style="font-size: 14px;">
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/') ?>" style="color:#0f6e56;">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/account') ?>" style="color:#0f6e56;">My Account</a></li>
      <li class="breadcrumb-item active" aria-current="page">My Bookings</li>
    </ol>
  </nav>

  <div class="card p-4 p-md-5 border-0 shadow-sm" style="border-radius: 16px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="font-weight-bold mb-1" style="font-size: 26px; color: #1a1a1a;">Service Bookings History</h2>
        <p class="text-muted small mb-0">Track real-time field progress, view assigned technician details, and inspect completed service reports.</p>
      </div>
      <a href="<?= \App\Core\View::url('/services') ?>" class="btn text-white font-weight-bold px-4 py-2" style="background:#0f6e56; border-radius: 8px;">
        Book New Service
      </a>
    </div>

    <?php if (!empty($bookings)): ?>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0" style="font-size: 14.5px;">
          <thead class="thead-light">
            <tr>
              <th>Booking #</th>
              <th>Service</th>
              <th>Scheduled Slot</th>
              <th>Address / Area</th>
              <th>Status</th>
              <th>Details</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($bookings as $b): ?>
              <tr>
                <td class="font-weight-bold text-dark"><?= \App\Core\View::e($b['booking_no']) ?></td>
                <td>
                  <strong><?= \App\Core\View::e($b['service_name'] ?? 'Home Service') ?></strong>
                </td>
                <td>
                  <?= \App\Core\View::e($b['preferred_date']) ?><br>
                  <small class="text-muted"><?= \App\Core\View::e($b['preferred_time']) ?></small>
                </td>
                <td>
                  <span class="text-truncate d-inline-block" style="max-width: 200px;">
                    <?= \App\Core\View::e($b['address']) ?>
                  </span>
                </td>
                <td>
                  <?php
                  $badgeClass = match($b['status']) {
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
                  <span class="badge badge-<?= $badgeClass ?> p-2 font-weight-bold text-uppercase" style="letter-spacing: 0.5px;">
                    <?= str_replace('_', ' ', \App\Core\View::e($b['status'])) ?>
                  </span>
                </td>
                <td>
                  <a href="<?= \App\Core\View::url('/account/bookings/' . (int)$b['id']) ?>" class="btn btn-sm btn-outline-secondary font-weight-bold">
                    View Job &rarr;
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php else: ?>
      <div class="text-center py-5 text-muted">
        <i class="fa fa-calendar-times-o mb-3" style="font-size: 48px; color: #cbd5e1;"></i>
        <h5 class="font-weight-bold">No bookings recorded yet</h5>
        <p class="small text-muted mb-3">Schedule your first deep cleaning or repair service with verified professionals today.</p>
        <a href="<?= \App\Core\View::url('/services') ?>" class="btn text-white px-4 py-2 font-weight-bold" style="background:#0f6e56; border-radius: 8px;">
          Browse Catalogue
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>
