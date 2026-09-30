<div class="container py-5 my-3">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent p-0 mb-4" style="font-size: 14px;">
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/') ?>" style="color:#0f6e56;">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/account') ?>" style="color:#0f6e56;">My Account</a></li>
      <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
    </ol>
  </nav>

  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card p-4 p-md-5 border-0 shadow-sm" style="border-radius: 16px;">
        <h2 class="font-weight-bold mb-2" style="font-size: 26px; color: #1a1a1a;">Profile & Account Settings</h2>
        <p class="text-muted small mb-4">Manage your personal contact details, saved addresses, and security credentials.</p>

        <form action="<?= \App\Core\View::url('/account/profile') ?>" method="POST">
          <?= \App\Core\View::csrf() ?>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label class="font-weight-bold small">Full Name</label>
              <input type="text" name="name" class="form-control" value="<?= \App\Core\View::e($user['name'] ?? '') ?>" required>
            </div>
            <div class="col-md-6 form-group">
              <label class="font-weight-bold small">Mobile Number</label>
              <input type="tel" name="phone" class="form-control" value="<?= \App\Core\View::e($user['phone'] ?? '') ?>" readonly>
              <small class="text-muted">Mobile number is verified via OTP.</small>
            </div>
          </div>

          <div class="form-group">
            <label class="font-weight-bold small">Email Address (for GST Invoices & Receipts)</label>
            <input type="email" name="email" class="form-control" value="<?= \App\Core\View::e($user['email'] ?? '') ?>" placeholder="name@example.com">
          </div>

          <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
            <a href="<?= \App\Core\View::url('/change-password') ?>" class="text-danger font-weight-bold small">
              <i class="fa fa-key mr-1"></i> Change Account Password
            </a>
            <button type="submit" class="btn text-white px-4 py-2 font-weight-bold" style="background:#0f6e56; border-radius: 8px;">
              Save Profile Changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
