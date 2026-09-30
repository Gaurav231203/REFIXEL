<div class="container py-5 my-3">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent p-0 mb-4" style="font-size: 14px;">
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/') ?>" style="color:#0f6e56;">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
    </ol>
  </nav>

  <div class="row">
    <!-- Contact Info Cards -->
    <div class="col-lg-5 mb-5 mb-lg-0">
      <div class="page_heading" style="text-align: left;">
        <h6 style="color: #0f6e56; font-weight: 600; letter-spacing: 1px;">GET IN TOUCH</h6>
        <h1 class="font-weight-bold mb-3" style="font-size: 36px; color: #1a1a1a;">We are here to help</h1>
        <p class="text-muted">Have a query regarding a booking, customized corporate cleaning requirement, or partnership? Reach out to us today.</p>
      </div>

      <div class="d-flex align-items-start mb-4">
        <div class="mr-3 p-3 rounded" style="background:#eaf4f0; color:#0f6e56; font-size: 20px;">
          <i class="fa fa-map-marker"></i>
        </div>
        <div>
          <h5 class="font-weight-bold mb-1">Corporate Office</h5>
          <p class="text-muted mb-0">DLF Cyber City, Phase 2, Sector 24, Gurugram, Haryana 122002</p>
        </div>
      </div>

      <div class="d-flex align-items-start mb-4">
        <div class="mr-3 p-3 rounded" style="background:#eaf4f0; color:#0f6e56; font-size: 20px;">
          <i class="fa fa-envelope"></i>
        </div>
        <div>
          <h5 class="font-weight-bold mb-1">Email Support</h5>
          <p class="text-muted mb-0"><a href="mailto:help@primodomus.com" class="text-dark">help@primodomus.com</a></p>
          <p class="text-muted mb-0"><a href="mailto:bookings@primodomus.com" class="text-dark">bookings@primodomus.com</a></p>
        </div>
      </div>

      <div class="d-flex align-items-start mb-4">
        <div class="mr-3 p-3 rounded" style="background:#eaf4f0; color:#0f6e56; font-size: 20px;">
          <i class="fa fa-phone"></i>
        </div>
        <div>
          <h5 class="font-weight-bold mb-1">Phone & WhatsApp</h5>
          <p class="text-muted mb-0">+91 99533 58855 (Mon–Sat, 8am–8pm)</p>
          <a href="https://api.whatsapp.com/send?phone=+919953358855&text=Hello%20Primodomus%20Support" target="_blank" class="small text-success font-weight-bold">
            <i class="fa fa-whatsapp"></i> Chat instantly on WhatsApp &rarr;
          </a>
        </div>
      </div>
    </div>

    <!-- Enquiry Form -->
    <div class="col-lg-7">
      <div class="card p-4 p-md-5 shadow-sm border-0" style="border-radius: 16px; background: #ffffff;">
        <h3 class="font-weight-bold mb-3" style="font-size: 24px;">Send us a message</h3>
        <p class="text-muted mb-4 small">Fill in the form below and our operations desk will respond within 30 minutes.</p>

        <form action="<?= \App\Core\View::url('/contact') ?>" method="POST">
          <?= \App\Core\View::csrf() ?>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label class="font-weight-bold small">Your Full Name <span class="text-danger">*</span></label>
              <input type="text" name="name" class="form-control" placeholder="e.g. Rahul Sharma" required>
            </div>
            <div class="col-md-6 form-group">
              <label class="font-weight-bold small">Phone Number <span class="text-danger">*</span></label>
              <input type="tel" name="phone" class="form-control" placeholder="10-digit mobile number" pattern="[6-9][0-9]{9}" required>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6 form-group">
              <label class="font-weight-bold small">Email Address</label>
              <input type="email" name="email" class="form-control" placeholder="rahul@example.com">
            </div>
            <div class="col-md-6 form-group">
              <label class="font-weight-bold small">City</label>
              <select name="city" class="form-control">
                <?php foreach ($cities ?? ['Gurugram', 'Delhi-NCR', 'Mumbai', 'Hyderabad', 'Bangalore', 'Pune', 'Chandigarh'] as $c): ?>
                  <option value="<?= \App\Core\View::e($c) ?>"><?= \App\Core\View::e($c) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="font-weight-bold small">Message / Inquiry Details <span class="text-danger">*</span></label>
            <textarea name="message" rows="4" class="form-control" placeholder="Tell us how we can assist you..." required></textarea>
          </div>

          <button type="submit" class="btn text-white px-5 py-3 font-weight-bold w-100" style="background:#0f6e56; border-radius: 8px;">
            Submit Inquiry
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
