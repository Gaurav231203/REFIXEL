<div class="container py-5 my-3">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent p-0 mb-4" style="font-size: 14px;">
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/') ?>" style="color:#0f6e56;">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">My Account</li>
    </ol>
  </nav>

  <div class="row">
    <!-- Account Sidebar Navigation -->
    <div class="col-lg-3 mb-4">
      <div class="card p-3 border-0 shadow-sm" style="border-radius: 14px;">
        <div class="d-flex align-items-center p-2 mb-3 border-bottom pb-3">
          <img src="<?= \App\Core\View::asset('img/account.webp') ?>" alt="User" class="rounded-circle mr-3" style="width: 48px; height: 48px;">
          <div>
            <h6 class="font-weight-bold mb-0"><?= \App\Core\View::e($user['name']) ?></h6>
            <small class="text-muted"><?= \App\Core\View::e($user['phone'] ?? $user['email']) ?></small>
          </div>
        </div>

        <div class="list-group list-group-flush" style="font-size: 14.5px;">
          <a href="<?= \App\Core\View::url('/account') ?>" class="list-group-item list-group-item-action border-0 font-weight-bold text-success">
            <i class="fa fa-dashboard mr-2"></i> Dashboard Overview
          </a>
          <a href="<?= \App\Core\View::url('/account/bookings') ?>" class="list-group-item list-group-item-action border-0">
            <i class="fa fa-calendar mr-2"></i> My Bookings
          </a>
          <a href="<?= \App\Core\View::url('/account/invoices') ?>" class="list-group-item list-group-item-action border-0">
            <i class="fa fa-file-text-o mr-2"></i> Invoices & Receipts
          </a>
          <a href="<?= \App\Core\View::url('/account/profile') ?>" class="list-group-item list-group-item-action border-0">
            <i class="fa fa-user-circle mr-2"></i> Profile & Address
          </a>
          <a href="<?= \App\Core\View::url('/logout') ?>" class="list-group-item list-group-item-action border-0 text-danger">
            <i class="fa fa-sign-out mr-2"></i> Sign Out
          </a>
        </div>
      </div>
    </div>

    <!-- Main Account Content -->
    <div class="col-lg-9">
      <!-- Welcome Hero Banner -->
      <div class="p-4 rounded mb-4" style="background: linear-gradient(135deg, #0f6e56 0%, #0b5341 100%); color: #ffffff; border-radius: 16px;">
        <h3 class="font-weight-bold mb-1">Welcome back, <?= \App\Core\View::e($user['name']) ?>!</h3>
        <p class="mb-0" style="opacity: 0.9; font-size: 14.5px;">Manage your home maintenance requests, view assigned technicians, and download GST receipts.</p>
      </div>

      <!-- Quick Stats Cards -->
      <div class="row mb-4">
        <div class="col-md-4 mb-3">
          <div class="card p-3 border-0 shadow-sm" style="border-radius: 12px;">
            <span class="text-muted small">Total Bookings</span>
            <h3 class="font-weight-bold mb-0 text-dark"><?= count($bookings ?? []) ?></h3>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card p-3 border-0 shadow-sm" style="border-radius: 12px;">
            <span class="text-muted small">Account Status</span>
            <h3 class="font-weight-bold mb-0 text-success">Active</h3>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="card p-3 border-0 shadow-sm" style="border-radius: 12px;">
            <span class="text-muted small">Satisfaction Guarantee</span>
            <h3 class="font-weight-bold mb-0" style="color:#0f6e56;">24h Protected</h3>
          </div>
        </div>
      </div>

      <!-- Recent Bookings Table -->
      <div class="card p-4 border-0 shadow-sm" style="border-radius: 16px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="font-weight-bold mb-0" style="font-size: 18px;">Recent Service Bookings</h5>
          <a href="<?= \App\Core\View::url('/account/bookings') ?>" class="small font-weight-bold text-success">View All &rarr;</a>
        </div>

        <?php if (!empty($bookings)): ?>
          <div class="table-responsive">
            <table class="table table-hover mb-0" style="font-size: 14px;">
              <thead class="thead-light">
                <tr>
                  <th>Booking No</th>
                  <th>Service</th>
                  <th>Date & Time</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($bookings as $b): ?>
                  <tr>
                    <td class="font-weight-bold"><?= \App\Core\View::e($b['booking_no']) ?></td>
                    <td><?= \App\Core\View::e($b['service_name'] ?? 'Home Service') ?></td>
                    <td><?= \App\Core\View::e($b['preferred_date']) ?> <br><small class="text-muted"><?= \App\Core\View::e($b['preferred_time']) ?></small></td>
                    <td>
                      <span class="badge badge-<?= $b['status'] === 'completed' ? 'success' : ($b['status'] === 'in_progress' ? 'info' : 'warning') ?> p-2">
                        <?= strtoupper(\App\Core\View::e($b['status'])) ?>
                      </span>
                    </td>
                    <td>
                      <a href="<?= \App\Core\View::url('/account/bookings/' . (int)$b['id']) ?>" class="btn btn-sm btn-outline-secondary">
                        View
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php else: ?>
          <div class="text-center py-4 text-muted">
            <i class="fa fa-calendar-o mb-2" style="font-size: 32px; color: #cbd5e1;"></i>
            <p class="mb-2">You haven't scheduled any service bookings yet.</p>
            <a href="<?= \App\Core\View::url('/services') ?>" class="btn text-white btn-sm px-3 font-weight-bold" style="background:#0f6e56;">
              Explore Services Now
            </a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
