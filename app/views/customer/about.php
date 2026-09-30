<div class="container py-5 my-3">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent p-0 mb-4" style="font-size: 14px;">
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/') ?>" style="color:#0f6e56;">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">About Us</li>
    </ol>
  </nav>

  <div class="row align-items-center mb-5">
    <div class="col-lg-7">
      <div class="page_heading" style="text-align: left;">
        <h6 style="color: #0f6e56; font-weight: 600; letter-spacing: 1px;">OUR STORY</h6>
        <h1 class="font-weight-bold mb-3" style="color: #1a1a1a; font-size: 38px;">About Primodomus</h1>
        <p class="lead" style="color: #555; font-size: 18px; line-height: 1.6;">
          Welcome to Primodomus – India's premier managed marketplace for professional, verified, and hassle-free home and commercial maintenance services.
        </p>
      </div>
      <p style="color: #666; font-size: 15px; line-height: 1.8;">
        Founded to bring reliability, standardized pricing, and mechanized cleaning excellence to urban households, Primodomus bridges the gap between discerning customers and vetted field service technicians. We combine industrial-grade tools with rigorous background verification, creating trust at every doorstep.
      </p>
      <div class="d-flex flex-wrap mt-4" style="gap: 15px;">
        <a href="<?= \App\Core\View::url('/services') ?>" class="btn text-white px-4 py-2 font-weight-bold" style="background:#0f6e56; border-radius: 8px;">Explore Services</a>
        <a href="<?= \App\Core\View::url('/contact') ?>" class="btn btn-outline-dark px-4 py-2 font-weight-bold" style="border-radius: 8px;">Contact Support</a>
      </div>
    </div>
    <div class="col-lg-5 text-center mt-4 mt-lg-0">
      <img src="<?= \App\Core\View::asset('img/find-expert.webp') ?>" alt="About Primodomus" class="img-fluid rounded" style="max-height: 360px; object-fit: contain;">
    </div>
  </div>

  <!-- Core Pillars -->
  <div class="row pt-4 mb-5 border-top">
    <div class="col-md-4 mb-4">
      <div class="p-4 bg-light rounded h-100 border">
        <div class="mb-3" style="font-size: 28px; color: #0f6e56;"><i class="fa fa-shield"></i></div>
        <h4 class="font-weight-bold" style="font-size: 20px;">100% Verified Partners</h4>
        <p class="text-muted mb-0" style="font-size: 14.5px;">Every technician undergoes comprehensive ID verification, police background checks, and trade skill certifications before taking their first booking.</p>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="p-4 bg-light rounded h-100 border">
        <div class="mb-3" style="font-size: 28px; color: #0f6e56;"><i class="fa fa-check-circle"></i></div>
        <h4 class="font-weight-bold" style="font-size: 20px;">Standardized Checklists</h4>
        <p class="text-muted mb-0" style="font-size: 14.5px;">No guesswork. Our multi-point service checklists guarantee transparent scopes of work, with before-and-after photo verification on every job.</p>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="p-4 bg-light rounded h-100 border">
        <div class="mb-3" style="font-size: 28px; color: #0f6e56;"><i class="fa fa-headphones"></i></div>
        <h4 class="font-weight-bold" style="font-size: 20px;">Dedicated Support</h4>
        <p class="text-muted mb-0" style="font-size: 14.5px;">From booking assistance to post-service warranty and GST invoicing, our customer care desk is readily available over WhatsApp and phone.</p>
      </div>
    </div>
  </div>

  <!-- Trust Numbers -->
  <div class="complate_serv p-4 rounded mb-5" style="background:#f7fbf9; border: 1px solid #dcece7;">
    <ul class="d-flex justify-content-around flex-wrap mb-0 p-0" style="list-style:none;">
      <li class="text-center p-2"><span style="font-size:32px; font-weight:700; color:#0f6e56;"><?= \App\Core\View::e(\App\Models\Setting::get('stat_rating', '4.8★')) ?></span> <h6 class="text-muted mt-1"><?= \App\Core\View::e(\App\Models\Setting::get('stat_rating_note', 'Rated by 1000+ Customers')) ?></h6></li>
      <li class="text-center p-2"><span style="font-size:32px; font-weight:700; color:#0f6e56;"><?= \App\Core\View::e(\App\Models\Setting::get('stat_homes_cleaned', '5000+')) ?></span> <h6 class="text-muted mt-1"><?= \App\Core\View::e(\App\Models\Setting::get('stat_homes_note', 'Homes Cleaned')) ?></h6></li>
      <li class="text-center p-2"><span style="font-size:32px; font-weight:700; color:#0f6e56;"><?= \App\Core\View::e(\App\Models\Setting::get('stat_service_partners', '60+')) ?></span> <h6 class="text-muted mt-1"><?= \App\Core\View::e(\App\Models\Setting::get('stat_partners_note', 'Service Partners')) ?></h6></li>
      <li class="text-center p-2"><span style="font-size:32px; font-weight:700; color:#0f6e56;"><?= \App\Core\View::e(\App\Models\Setting::get('stat_verified_pros', '400+')) ?></span> <h6 class="text-muted mt-1"><?= \App\Core\View::e(\App\Models\Setting::get('stat_pros_note', 'Verified Professionals')) ?></h6></li>
    </ul>
  </div>
</div>
