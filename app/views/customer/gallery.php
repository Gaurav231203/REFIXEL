<div class="container py-5 my-3">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent p-0 mb-4" style="font-size: 14px;">
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/') ?>" style="color:#0f6e56;">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Work Showcase & Before / After</li>
    </ol>
  </nav>

  <div class="page_heading text-center mb-5">
    <h6 style="color: #0f6e56; font-weight: 600; letter-spacing: 1px;">REAL RESULTS</h6>
    <h1 class="font-weight-bold" style="font-size: 36px; color: #1a1a1a;">Before & After Transformations</h1>
    <p class="text-muted" style="max-width: 650px; margin: 0 auto;">See the undeniable difference our mechanized cleaning, deep scrubbing, and professional maintenance bring to real Indian homes.</p>
  </div>

  <div class="row">
    <!-- Showcase 1 -->
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 12px; overflow:hidden;">
        <img src="<?= \App\Core\View::asset('img/Full-home-clean.jpg') ?>" class="card-img-top" alt="Kitchen Deep Degreasing" style="height: 220px; object-fit: cover;">
        <div class="card-body">
          <span class="badge badge-success mb-2" style="background:#0f6e56;">Kitchen Deep Cleaning</span>
          <h5 class="card-title font-weight-bold">Modular Kitchen Heavy Degreasing</h5>
          <p class="card-text text-muted small">Chimney filters, tile backsplash, gas burner descaling, and shelf sanitization in Sector 54, Gurugram.</p>
        </div>
      </div>
    </div>

    <!-- Showcase 2 -->
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 12px; overflow:hidden;">
        <img src="<?= \App\Core\View::asset('img/bathroom_cleaning.webp') ?>" class="card-img-top" alt="Bathroom Descaling" style="height: 220px; object-fit: cover;">
        <div class="card-body">
          <span class="badge badge-success mb-2" style="background:#0f6e56;">Bathroom Deep Cleaning</span>
          <h5 class="card-title font-weight-bold">Hard Water Stain & Grout Scrubbing</h5>
          <p class="card-text text-muted small">Acid-free calcium descaling, mirror buffing, sanitaryware shine, and floor scrubbing in DLF Cyber City.</p>
        </div>
      </div>
    </div>

    <!-- Showcase 3 -->
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 12px; overflow:hidden;">
        <img src="<?= \App\Core\View::asset('img/Painting-Services.png') ?>" class="card-img-top" alt="Interior Painting" style="height: 220px; object-fit: cover;">
        <div class="card-body">
          <span class="badge badge-success mb-2" style="background:#0f6e56;">Painting Services</span>
          <h5 class="card-title font-weight-bold">Mechanized Dust-Free Painting</h5>
          <p class="card-text text-muted small">Laser wall inspection, automated sanding with vacuum extraction, and 2-coat royal luxury emulsion.</p>
        </div>
      </div>
    </div>

    <!-- Showcase 4 -->
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 12px; overflow:hidden;">
        <img src="<?= \App\Core\View::asset('img/AC-Services.webp') ?>" class="card-img-top" alt="AC Jet Service" style="height: 220px; object-fit: cover;">
        <div class="card-body">
          <span class="badge badge-success mb-2" style="background:#0f6e56;">AC Jet Servicing</span>
          <h5 class="card-title font-weight-bold">Split AC Coil High-Pressure Flush</h5>
          <p class="card-text text-muted small">Indoor blower cleaning, antibacterial jet rinse, cooling fin realignment, and operating power check.</p>
        </div>
      </div>
    </div>

    <!-- Showcase 5 -->
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 12px; overflow:hidden;">
        <img src="<?= \App\Core\View::asset('img/Plumber.webp') ?>" class="card-img-top" alt="Plumbing Restoration" style="height: 220px; object-fit: cover;">
        <div class="card-body">
          <span class="badge badge-success mb-2" style="background:#0f6e56;">Plumbing Repairs</span>
          <h5 class="card-title font-weight-bold">Concealed Leakage & Fixture Overhaul</h5>
          <p class="card-text text-muted small">Diverter cartridge replacement, pressure pump diagnostics, and leak-free joint welding.</p>
        </div>
      </div>
    </div>

    <!-- Showcase 6 -->
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card h-100 shadow-sm border-0" style="border-radius: 12px; overflow:hidden;">
        <img src="<?= \App\Core\View::asset('img/Carpenter.webp') ?>" class="card-img-top" alt="Bespoke Woodwork" style="height: 220px; object-fit: cover;">
        <div class="card-body">
          <span class="badge badge-success mb-2" style="background:#0f6e56;">Carpentry Services</span>
          <h5 class="card-title font-weight-bold">Hydraulic Bed & Wardrobe Realignment</h5>
          <p class="card-text text-muted small">Precision hinge adjustment, hydraulic channel replacements, and smooth sliding wardrobe hardware fix.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="text-center mt-4">
    <a href="<?= \App\Core\View::url('/book') ?>" class="btn text-white px-5 py-3 font-weight-bold" style="background:#0f6e56; border-radius: 50px; font-size: 16px;">
      Book Your Service Now &rarr;
    </a>
  </div>
</div>
