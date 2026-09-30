<?php
$catName = \App\Core\View::e($category['name']);
$catSlug = \App\Core\View::e($category['slug']);
$cityName = \App\Core\View::e($city);
$currentCitySlug = \App\Core\View::e($citySlug ?? strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $city), '-')));
?>
<div class="container py-5 my-3">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent p-0 mb-4" style="font-size: 14px;">
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/') ?>" style="color:#0f6e56;">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/services') ?>" style="color:#0f6e56;">Services</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $catName ?> in <?= $cityName ?></li>
    </ol>
  </nav>

  <!-- Hero Header for Category & City -->
  <div class="p-4 p-md-5 rounded mb-5" style="background: linear-gradient(135deg, #f0f7f4 0%, #e2efe9 100%); border: 1px solid #dcece7; border-radius: 16px;">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <span class="badge badge-success px-3 py-2 mb-2" style="background:#0f6e56; font-size:12.5px;">Verified & Insured in <?= $cityName ?></span>
        <h1 class="font-weight-bold mb-3" style="font-size: 34px; color: #1a1a1a;">
          Professional <?= $catName ?> Services in <?= $cityName ?>
        </h1>
        <p class="lead text-muted mb-4" style="font-size: 16px; line-height: 1.7;">
          <?= \App\Core\View::e($category['description'] ?? 'Mechanized tools, eco-friendly consumables, and background-verified technicians delivering top-rated service at your doorstep.') ?>
        </p>
        <div class="d-flex flex-wrap align-items-center" style="gap: 15px;">
          <a href="#servicesList" class="btn text-white px-4 py-2 font-weight-bold" style="background:#0f6e56; border-radius: 8px;">
            View Available Packages & Pricing
          </a>
          <span class="text-muted small"><i class="fa fa-clock-o text-success mr-1"></i> Slots available today in <?= $cityName ?></span>
        </div>
      </div>
      <div class="col-lg-4 text-center mt-4 mt-lg-0">
        <img src="<?= \App\Core\View::asset('img/' . ($category['icon'] ?? 'Full-home-clean.jpg')) ?>"
             alt="<?= $catName ?> in <?= $cityName ?>"
             class="img-fluid rounded" style="max-height: 220px; object-fit: contain;"
             onerror="this.onerror=null; this.src='<?= \App\Core\View::asset('img/Full-home-clean.jpg') ?>';">
      </div>
    </div>
  </div>

  <!-- Services Grid -->
  <div id="servicesList" class="mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="font-weight-bold mb-1" style="font-size: 26px;">Available <?= $catName ?> Packages in <?= $cityName ?></h2>
        <p class="text-muted small mb-0">Select your package to view full checklist and instant booking options.</p>
      </div>
    </div>

    <div class="row">
      <?php if (!empty($services)): ?>
        <?php foreach ($services as $svc):
          $svcSlug = \App\Core\View::e($svc['slug']);
          $svcName = \App\Core\View::e($svc['name']);
          $svcUrl = \App\Core\View::url("/{$svcSlug}-in-{$currentCitySlug}");
          $imgFile = $svc['image'] ?? 'Full-home-clean.jpg';
        ?>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm border-0" style="border-radius: 14px; overflow:hidden;">
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

  <!-- Checklist Summary & Safety Promise -->
  <div class="p-4 rounded bg-light border mb-5">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h4 class="font-weight-bold mb-2" style="color:#0f6e56; font-size:20px;">
          <i class="fa fa-check-square-o mr-2"></i> The Primodomus Verified Checklist Standard
        </h4>
        <p class="text-muted small mb-0" style="line-height: 1.7;">
          Every <?= $catName ?> job follows an audited step-by-step protocol: background-verified technicians, mechanized floor scrubbing, high-grade eco-friendly chemicals, and pre/post inspection photos uploaded to your invoice before sign-off.
        </p>
      </div>
      <div class="col-lg-4 text-lg-right mt-3 mt-lg-0">
        <a href="<?= \App\Core\View::url('/gallery') ?>" class="btn btn-outline-dark btn-sm font-weight-bold">
          View Work Showcase &rarr;
        </a>
      </div>
    </div>
  </div>

  <!-- Service Areas Covered in this City -->
  <div class="mb-5">
    <h3 class="font-weight-bold mb-3" style="font-size: 22px;">
      <i class="fa fa-map-marker text-success mr-2"></i> <?= $catName ?> Coverage Areas in <?= $cityName ?>
    </h3>
    <div class="p-4 rounded bg-white border">
      <p class="text-muted small mb-3">Our mobile teams and vetted field technicians service the following localities across <?= $cityName ?>:</p>
      <div class="d-flex flex-wrap" style="gap: 8px;">
        <?php if (!empty($serviceAreas)): ?>
          <?php foreach ($serviceAreas as $area): ?>
            <span class="badge badge-light p-2 border font-weight-normal" style="font-size: 13px;">
              <i class="fa fa-map-pin text-success mr-1"></i> <?= \App\Core\View::e($area['area_name']) ?> (<?= \App\Core\View::e($area['pincode']) ?>)
            </span>
          <?php endforeach; ?>
        <?php else: ?>
          <span class="badge badge-light p-2 border">City Center & All Primary Sectors</span>
          <span class="badge badge-light p-2 border">Residential Colonies & Gated Societies</span>
          <span class="badge badge-light p-2 border">Commercial Hubs & Office Parks</span>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Related Services / Categories -->
  <?php if (!empty($relatedCategories)): ?>
    <div class="mb-5">
      <h3 class="font-weight-bold mb-3" style="font-size: 22px;">Explore Related Home Services</h3>
      <div class="row">
        <?php foreach ($relatedCategories as $rel):
          $relSlug = \App\Core\View::e($rel['slug']);
          $relUrl = \App\Core\View::url("/{$relSlug}-services-in-{$currentCitySlug}");
        ?>
          <div class="col-6 col-md-3 mb-3">
            <a href="<?= $relUrl ?>" class="card p-3 text-center text-dark text-decoration-none h-100 shadow-sm border-0" style="border-radius: 12px; transition: transform 0.15s ease;">
              <h6 class="font-weight-bold mb-1"><?= \App\Core\View::e($rel['name']) ?></h6>
              <small class="text-success font-weight-bold">View in <?= $cityName ?> &rarr;</small>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>

  <!-- Category FAQ Accordion -->
  <div class="mb-5">
    <div class="page_heading text-center mb-4">
      <h6 style="color:#0f6e56; font-weight:600;">QUESTIONS & ANSWERS</h6>
      <h3 class="font-weight-bold">Frequently Asked Questions</h3>
    </div>
    <div class="faq-container">
      <?php foreach (array_slice($faqs ?? [], 0, 4) as $idx => $faq): ?>
        <div class="faq-item <?= $idx === 0 ? 'active' : '' ?>">
          <div class="faq-question">
            <span><?= \App\Core\View::e($faq['question']) ?></span>
            <div class="faq-icon"><?= $idx === 0 ? '−' : '+' ?></div>
          </div>
          <div class="faq-answer" style="<?= $idx === 0 ? 'display:block;' : 'display:none;' ?>">
            <?= nl2br(\App\Core\View::e($faq['answer'])) ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Booking CTA Banner -->
  <div class="p-4 p-md-5 rounded text-center text-white" style="background: linear-gradient(135deg, #0f6e56 0%, #0b5341 100%); border-radius: 16px;">
    <h2 class="font-weight-bold mb-2">Ready to transform your space in <?= $cityName ?>?</h2>
    <p class="mb-4" style="opacity: 0.9;">Book now with zero advance payment and a 24-hour customer satisfaction guarantee.</p>
    <a href="<?= \App\Core\View::url('/book?city=' . urlencode($city)) ?>" class="btn btn-light px-5 py-3 font-weight-bold" style="color: #0f6e56; border-radius: 50px; font-size: 16px;">
      Schedule <?= $catName ?> Now &rarr;
    </a>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll(".faq-item").forEach(function(item) {
    var q = item.querySelector(".faq-question");
    if (q) {
      q.addEventListener("click", function() {
        var isOpen = item.classList.contains("active");
        document.querySelectorAll(".faq-item").forEach(function(other) {
          other.classList.remove("active");
          var ans = other.querySelector(".faq-answer");
          var ico = other.querySelector(".faq-icon");
          if (ans) ans.style.display = "none";
          if (ico) ico.textContent = "+";
        });
        if (!isOpen) {
          item.classList.add("active");
          var ans = item.querySelector(".faq-answer");
          var ico = item.querySelector(".faq-icon");
          if (ans) ans.style.display = "block";
          if (ico) ico.textContent = "−";
        }
      });
    }
  });
});
</script>
