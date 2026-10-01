<?php
use App\Core\View;
?>

<div class="container py-5 mt-4">
  <div class="row align-items-center">
    
    <!-- Left Side: Steps and Process -->
    <div class="col-lg-6 mb-5 mb-lg-0 pr-lg-5">
      <span class="badge badge-success px-3 py-2 mb-3 font-weight-bold" style="background: rgba(15, 110, 86, 0.1); color: #0f6e56;">BECOME A PARTNER</span>
      <h1 class="font-weight-bold mb-4" style="color: #1a1a1a; font-size: 2.5rem;">Join Primodomus & Grow Your Earnings</h1>
      <p class="text-muted mb-5" style="font-size: 1.1rem; line-height: 1.7;">
        Are you a skilled professional looking for more work and better income? Partner with Primodomus to get verified leads, flexible timings, and guaranteed payouts. Here is how our simple onboarding process works:
      </p>

      <div class="process-timeline position-relative pl-4" style="border-left: 2px dashed #e2e8f0;">
        
        <!-- Step 1 -->
        <div class="position-relative mb-4">
          <div class="position-absolute bg-white rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; left: -45px; top: -5px; border: 2px solid #0f6e56; color: #0f6e56; font-weight: bold;">
            1
          </div>
          <h5 class="font-weight-bold text-dark mb-1">Submit Application</h5>
          <p class="text-muted small mb-0">Fill out the simple form on the right with your basic details and the trade you specialize in.</p>
        </div>

        <!-- Step 2 -->
        <div class="position-relative mb-4">
          <div class="position-absolute bg-white rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; left: -45px; top: -5px; border: 2px solid #0f6e56; color: #0f6e56; font-weight: bold;">
            2
          </div>
          <h5 class="font-weight-bold text-dark mb-1">Background Verification</h5>
          <p class="text-muted small mb-0">Our team will contact you to verify your identity, documents, and professional experience.</p>
        </div>

        <!-- Step 3 -->
        <div class="position-relative mb-4">
          <div class="position-absolute bg-white rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; left: -45px; top: -5px; border: 2px solid #0f6e56; color: #0f6e56; font-weight: bold;">
            3
          </div>
          <h5 class="font-weight-bold text-dark mb-1">Training & Onboarding</h5>
          <p class="text-muted small mb-0">Attend a quick training session to understand Primodomus standards and how to use our partner app.</p>
        </div>

        <!-- Step 4 -->
        <div class="position-relative">
          <div class="position-absolute bg-white rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; left: -45px; top: -5px; border: 2px solid #0f6e56; color: #0f6e56; font-weight: bold;">
            4
          </div>
          <h5 class="font-weight-bold text-dark mb-1">Start Earning</h5>
          <p class="text-muted small mb-0">Get live booking requests in your area and start earning money with every completed job.</p>
        </div>

      </div>
    </div>

    <!-- Right Side: Application Form -->
    <div class="col-lg-6">
      <div class="card p-4 p-md-5 border-0 shadow-lg" style="border-radius: 20px;">
        <div class="text-center mb-4">
          <h3 class="font-weight-bold mb-2">Partner Application Form</h3>
          <p class="text-muted small">Fill out your details and we will call you back within 24 hours.</p>
        </div>

        <form action="<?= View::url('/partner') ?>" method="POST">
          <!-- Hidden CSRF token if required by framework, assuming standard form here -->
          
          <div class="form-group mb-3">
            <label class="font-weight-bold small text-muted">Full Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control form-control-lg bg-light border-0" placeholder="e.g. Rahul Kumar" required style="border-radius: 10px;">
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="font-weight-bold small text-muted">Phone Number <span class="text-danger">*</span></label>
              <input type="tel" name="phone" class="form-control form-control-lg bg-light border-0" placeholder="10-digit mobile number" required pattern="[0-9]{10}" style="border-radius: 10px;">
            </div>
            <div class="col-md-6 mb-3">
              <label class="font-weight-bold small text-muted">City <span class="text-danger">*</span></label>
              <select name="city" class="form-control form-control-lg bg-light border-0" required style="border-radius: 10px;">
                <option value="">Select your city</option>
                <?php foreach ($cities ?? [] as $city): ?>
                  <option value="<?= View::e($city['city']) ?>"><?= View::e($city['city']) ?></option>
                <?php endforeach; ?>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>

          <div class="form-group mb-4">
            <label class="font-weight-bold small text-muted">Primary Trade / Skill <span class="text-danger">*</span></label>
            <select name="trade" class="form-control form-control-lg bg-light border-0" required style="border-radius: 10px;">
              <option value="">What services do you provide?</option>
              <?php foreach ($categories ?? [] as $category): ?>
                <option value="<?= View::e($category['name']) ?>"><?= View::e($category['name']) ?></option>
              <?php endforeach; ?>
              <option value="Other">Other</option>
            </select>
          </div>
          
          <div class="form-group mb-4">
            <label class="font-weight-bold small text-muted">Years of Experience</label>
            <select name="experience" class="form-control form-control-lg bg-light border-0" style="border-radius: 10px;">
              <option value="0-1">0 - 1 Years</option>
              <option value="2-4">2 - 4 Years</option>
              <option value="5+">5+ Years</option>
            </select>
          </div>

          <button type="submit" class="btn btn-block text-white font-weight-bold py-3 mt-2" style="background-color: #0f6e56; border-radius: 10px; font-size: 16px;">
            Submit Application
          </button>
          
          <p class="text-center text-muted small mt-4 mb-0">
            By submitting this form, you agree to our <a href="<?= View::url('/terms') ?>" class="text-decoration-none" style="color:#0f6e56;">Terms & Conditions</a>.
          </p>
        </form>
      </div>
    </div>
  </div>
</div>
