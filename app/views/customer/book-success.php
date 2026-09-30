<div class="container py-5 my-4">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 text-center">
      <div class="card p-5 border-0 shadow-sm" style="border-radius: 20px; background: #ffffff;">
        <div class="mb-4">
          <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 80px; height: 80px; background: #eaf4f0; color: #0f6e56; font-size: 38px;">
            <i class="fa fa-check"></i>
          </div>
        </div>

        <h2 class="font-weight-bold mb-2" style="color: #1a1a1a;">Booking Confirmed!</h2>
        <p class="text-muted mb-4">Thank you for booking with Primodomus. We have matched your request with our operations desk.</p>

        <div class="p-3 rounded bg-light border mb-4 text-center">
          <span class="text-muted small d-block">Your Booking Reference Number</span>
          <h3 class="font-weight-bold mb-0 text-success" style="letter-spacing: 1px;"><?= \App\Core\View::e($booking_no ?? 'PRM-BK-PENDING') ?></h3>
        </div>

        <p class="text-muted small mb-4" style="line-height: 1.8;">
          A confirmation SMS and WhatsApp message has been dispatched to your mobile number. A verified technician will call you 30 minutes prior to arrival.
        </p>

        <div class="d-flex flex-column flex-sm-row justify-content-center" style="gap: 12px;">
          <?php if (\App\Core\Auth::check()): ?>
            <a href="<?= \App\Core\View::url('/account/bookings') ?>" class="btn text-white px-4 py-2 font-weight-bold" style="background:#0f6e56; border-radius: 8px;">
              Track in My Account
            </a>
          <?php endif; ?>
          <a href="<?= \App\Core\View::url('/') ?>" class="btn btn-outline-dark px-4 py-2 font-weight-bold" style="border-radius: 8px;">
            Return to Home
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
