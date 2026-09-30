<?php
$catName = \App\Core\View::e($category['name']);
$catSlug = \App\Core\View::e($category['slug']);
$cityName = \App\Core\View::e($city);
$citySlug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $city), '-'));
?>
<div class="container py-5 my-3">
  <!-- Breadcrumb with Schema markup -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent p-0 mb-4" style="font-size: 14px;">
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/') ?>" style="color:#0f6e56;">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/services') ?>" style="color:#0f6e56;">Services</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $catName ?> in <?= $cityName ?></li>
    </ol>
  </nav>

  <!-- Hero Header for Category & City -->
  <div class="p-4 p-md-5 rounded mb-5" style="background: linear-gradient(135deg, #f0f7f4 0%, #e2efe9 100%); border: 1px solid #dcece7;">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <span class="badge badge-success px-3 py-2 mb-2" style="background:#0f6e56; font-size:12.5px;">Verified & Insured in <?= $cityName ?></span>
        <h1 class="font-weight-bold mb-3" style="font-size: 34px; color: #1a1a1a;">
          Professional <?= $catName ?> Services in <?= $cityName ?>
        </h1>
        <p class="lead text-muted mb-4" style="font-size: 16px;">
          <?= \App\Core\View::e($category['description'] ?? 'Mechanized tools, eco-friendly consumables, and background-verified technicians delivering top-rated service at your doorstep.') ?>
        </p>
        <div class="d-flex flex-wrap align-items-center" style="gap: 15px;">
          <a href="#servicesList" class="btn text-white px-4 py-2 font-weight-bold" style="background:#0f6e56; border-radius: 8px;">
            View Available Services & Pricing
          </a>
          <span class="text-muted small"><i class="fa fa-clock-o text-success mr-1"></i> Slots available today in <?= $cityName ?></span>
        </div>
      </div>
      <div class="col-lg-4 text-center mt-4 mt-lg-0">
        <img src="<?= \App\Core\View::asset('img/' . ($category['icon'] ?? 'Full-home-clean.jpg')) ?>"
             alt="<?= $catName ?> in <?= $cityName ?>"
             class="img-fluid rounded" style="max-height: 200px; object-fit: contain;"
             onerror="this.onerror=null; this.src='<?= \App\Core\View::asset('img/Full-home-clean.jpg') ?>';">
      </div>
    </div>
  </div>

  <!-- Services Grid -->
  <div id="servicesList" class="mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="font-weight-bold mb-1" style="font-size: 26px;">Available <?= $catName ?> Packages</h2>
        <p class="text-muted small mb-0">Select your required package to view full checklist and instant booking options.</p>
      </div>
    </div>

    <div class="row">
      <?php if (!empty($services)): ?>
        <?php foreach ($services as $svc):
          $svcSlug = \App\Core\View::e($svc['slug']);
          $svcName = \App\Core\View::e($svc['name']);
          $svcUrl = \App\Core\View::url("/{$svcSlug}-in-{$citySlug}");
          $imgFile = $svc['image'] ?? 'Full-home-clean.jpg';
        ?>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm border-0" style="border-radius: 12px; overflow:hidden;">
              <img src="<?= \App\Core\View::asset('img/' . $imgFile) ?>"
                   alt="<?= $svcName ?>"
                   style="height: 180px; object-fit: cover;"
                   onerror="this.onerror=null; this.src='<?= \App\Core\View::asset('img/Full-home-clean.jpg') ?>';">
              <div class="card-body d-flex flex-column">
                <h4 class="font-weight-bold mb-2" style="font-size: 18px; color: #1a1a1a;"><?= $svcName ?></h4>
                <p class="text-muted small flex-grow-1"><?= \App\Core\View::e($svc['description'] ?? '') ?></p>

                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div>
                    <span class="text-muted small">Starting at</span>
                    <h5 class="font-weight-bold mb-0" style="color: #0f6e56;">₹<?= number_format((float)$svc['starting_price'], 0) ?></h5>
                  </div>
                  <?php if (!empty($svc['duration_minutes'])): ?>
                    <span class="badge badge-light p-2" style="font-size: 12px;">
                      <i class="fa fa-clock-o mr-1"></i> <?= (int)$svc['duration_minutes'] ?> mins
                    </span>
                  <?php endif; ?>
                </div>

                <div class="d-flex" style="gap: 10px;">
                  <a href="<?= $svcUrl ?>" class="btn btn-outline-secondary btn-sm flex-grow-1 font-weight-bold">
                    Checklist & Details
                  </a>
                  <a href="<?= \App\Core\View::url('/book?service_id=' . (int)$svc['id'] . '&city=' . urlencode($city)) ?>" class="btn text-white btn-sm px-3 font-weight-bold" style="background:#0f6e56;">
                    Book Now
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-12 text-center py-5">
          <p class="text-muted">No specific services listed under this category for <?= $cityName ?> yet. Contact us for custom arrangements!</p>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <!-- City Service Area Coverage & Guarantee -->
  <div class="row pt-4 border-top">
    <div class="col-md-6 mb-4">
      <div class="p-4 rounded bg-light border h-100">
        <h4 class="font-weight-bold mb-3" style="font-size: 19px;"><i class="fa fa-map-marker text-success mr-2"></i> Service Area Coverage in <?= $cityName ?></h4>
        <p class="text-muted small">We dispatch verified technicians across all key residential societies, sectors, and commercial hubs in <?= $cityName ?>. Doorstep visit arrives with all necessary equipment, eco-friendly solvents, and mechanized tools.</p>
        <div class="d-flex align-items-center mt-3">
          <span class="badge badge-success p-2 mr-2">Instant Slots</span>
          <span class="badge badge-info p-2 mr-2">GST Invoiced</span>
          <span class="badge badge-secondary p-2">Free Re-work Guarantee</span>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="p-4 rounded bg-light border h-100">
        <h4 class="font-weight-bold mb-3" style="font-size: 19px;"><i class="fa fa-shield text-success mr-2"></i> The Primodomus Quality Promise</h4>
        <p class="text-muted small">All services booked on Primodomus are backed by our 24-hour satisfaction guarantee. If any checklist item is overlooked or not completed to your satisfaction, our supervisor revisits to re-clean at no charge.</p>
        <a href="<?= \App\Core\View::url('/contact') ?>" class="small font-weight-bold" style="color: #0f6e56;">Need help choosing the right package? Talk to an expert &rarr;</a>
      </div>
    </div>
  </div>
</div>
