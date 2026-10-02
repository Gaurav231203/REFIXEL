<?php
$svcName = \App\Core\View::e($service['name']);
$cityName = \App\Core\View::e($city);
$price = number_format((float)$service['starting_price'], 0);
$duration = (int)($service['duration_minutes'] ?? 60);
$imgFile = $service['image'] ?? 'Full-home-clean.jpg';

// Split checklist into included and excluded
$includedItems = [];
$excludedItems = [];
foreach ($checklist ?? [] as $item) {
    if (!empty($item['is_included'])) {
        $includedItems[] = $item['label'];
    } else {
        $excludedItems[] = $item['label'];
    }
}
?>
<div class="container py-5 my-3">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent p-0 mb-4" style="font-size: 14px;">
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/') ?>" style="color:#0f6e56;">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/services') ?>" style="color:#0f6e56;">Services</a></li>
      <li class="breadcrumb-item active" aria-current="page"><?= $svcName ?> in <?= $cityName ?></li>
    </ol>
  </nav>

  <div class="row">
    <!-- Main Service Information -->
    <div class="col-lg-8">
      <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px; overflow:hidden;">
        <img src="<?= \App\Core\View::asset('img/' . $imgFile) ?>"
             alt="<?= $svcName ?>"
             style="height: 340px; width: 100%; object-fit: cover;"
             onerror="this.onerror=null; this.src='<?= \App\Core\View::asset('img/Full-home-clean.jpg') ?>';">

        <div class="card-body p-4 p-md-5">
          <div class="d-flex align-items-center mb-2">
            <span class="badge badge-success mr-2" style="background:#0f6e56;">Verified Service</span>
            <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> Available across <?= $cityName ?></span>
          </div>

          <h1 class="font-weight-bold mb-3" style="font-size: 32px; color: #1a1a1a;">
            <?= $svcName ?> in <?= $cityName ?>
          </h1>

          <p class="text-muted lead mb-4" style="font-size: 16px; line-height: 1.7;">
            <?= \App\Core\View::e($service['description'] ?? 'Top-rated professional service with industrial grade equipment and verified specialists.') ?>
          </p>

          <!-- Highlights strip -->
          <div class="row py-3 mb-4 rounded bg-light border">
            <div class="col-4 text-center border-right">
              <span class="text-muted small d-block">Starting Price</span>
              <h4 class="font-weight-bold mb-0" style="color: #0f6e56;">₹<?= $price ?></h4>
            </div>
            <div class="col-4 text-center border-right">
              <span class="text-muted small d-block">Duration</span>
              <h4 class="font-weight-bold mb-0">~<?= $duration ?> mins</h4>
            </div>
            <div class="col-4 text-center">
              <span class="text-muted small d-block">Customer Rating</span>
              <h4 class="font-weight-bold mb-0" style="color: #f59e0b;">4.85 ★</h4>
            </div>
          </div>

          <!-- What's Included & What's Excluded Checklist -->
          <div class="mb-5">
            <h3 class="font-weight-bold mb-3" style="font-size: 22px;">Multi-Point Hygiene Checklist</h3>
            <p class="text-muted small mb-4">Every technician is required to complete and photograph each task before generating your invoice.</p>

            <div class="row">
              <div class="col-md-6 mb-3">
                <div class="p-3 rounded h-100" style="background: #f0fdf4; border: 1px solid #bbf7d0;">
                  <h5 class="font-weight-bold text-success mb-3" style="font-size: 16px;">
                    <i class="fa fa-check-circle mr-1"></i> What's Included
                  </h5>
                  <ul class="list-unstyled mb-0" style="font-size: 14px; line-height: 1.8;">
                    <?php if (!empty($includedItems)): ?>
                      <?php foreach ($includedItems as $item): ?>
                        <li class="mb-2"><i class="fa fa-check text-success mr-2"></i> <?= \App\Core\View::e($item) ?></li>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <li class="mb-2"><i class="fa fa-check text-success mr-2"></i> Mechanized high-pressure deep cleaning and scrubbing</li>
                      <li class="mb-2"><i class="fa fa-check text-success mr-2"></i> Surface descaling, degreasing, and dust vacuuming</li>
                      <li class="mb-2"><i class="fa fa-check text-success mr-2"></i> Eco-friendly antibacterial sanitization spray</li>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>

              <div class="col-md-6 mb-3">
                <div class="p-3 rounded h-100" style="background: #fef2f2; border: 1px solid #fecaca;">
                  <h5 class="font-weight-bold text-danger mb-3" style="font-size: 16px;">
                    <i class="fa fa-times-circle mr-1"></i> What's Excluded
                  </h5>
                  <ul class="list-unstyled mb-0" style="font-size: 14px; line-height: 1.8;">
                    <?php if (!empty($excludedItems)): ?>
                      <?php foreach ($excludedItems as $item): ?>
                        <li class="mb-2"><i class="fa fa-times text-danger mr-2"></i> <?= \App\Core\View::e($item) ?></li>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <li class="mb-2"><i class="fa fa-times text-danger mr-2"></i> Moving heavy structural furniture (>40kg) without assistance</li>
                      <li class="mb-2"><i class="fa fa-times text-danger mr-2"></i> Civil masonry repair, structural wall replastering</li>
                      <li class="mb-2"><i class="fa fa-times text-danger mr-2"></i> Replacement of broken hardware components</li>
                    <?php endif; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Before / After Showcase Section -->
          <?php
          $svcSlugLower = strtolower($service['slug'] ?? '');
          $transImg = 'before-after-laundry-cleaning.png';
          $transCategory = 'Room Cleaning';
          $transTitle = 'Laundry & Room Deep Cleaning Transformation';
          $transDesc = 'Real results achieved by REFIXEL mechanized deep scrubbing, wall degreasing, and sanitized tile restoration.';

          if (str_contains($svcSlugLower, 'pest') || str_contains($svcSlugLower, 'cockroach') || str_contains($svcSlugLower, 'ant')) {
              $transImg = 'before-after-pest-control.png';
              $transCategory = 'Pest Control';
              $transTitle = 'Kitchen Under-Counter Pest Eradication Transformation';
              $transDesc = '100% German cockroach nest eradication under kitchen cabinets using certified odorless gel-baiting and deep sanitization.';
          } elseif (str_contains($svcSlugLower, 'sofa') || str_contains($svcSlugLower, 'upholstery') || str_contains($svcSlugLower, 'carpet')) {
              $transImg = 'before-after-sofa-cleaning.png';
              $transCategory = 'Sofa Cleaning';
              $transTitle = 'Fabric Sofa Stain Extraction Transformation';
              $transDesc = 'Deep fiber shampooing extracting dark stains, sweat marks, and allergens, restoring original soft texture and brightness.';
          } elseif (str_contains($svcSlugLower, 'paint') || str_contains($svcSlugLower, 'color') || str_contains($svcSlugLower, 'wall')) {
              $transImg = 'before-after-room-painting.png';
              $transCategory = 'Room Painting';
              $transTitle = 'Living Room Wall Painting & Makeover Transformation';
              $transDesc = 'Mechanized dustless sanding, putty leveling, and 2-coat washable royal emulsion paint with false ceiling cove lighting.';
          } elseif (str_contains($svcSlugLower, 'carpenter') || str_contains($svcSlugLower, 'furniture') || str_contains($svcSlugLower, 'wood')) {
              $transImg = 'before-after-wall-renovation.png';
              $transCategory = 'Home Renovation';
              $transTitle = 'TV Feature Wall & Carpentry Renovation Transformation';
              $transDesc = 'Raw brick masonry and electrical conduits rebuilt into a bespoke modern fluted wood entertainment wall with floating media console.';
          } elseif (str_contains($svcSlugLower, 'electric') || str_contains($svcSlugLower, 'switch') || str_contains($svcSlugLower, 'mcb') || str_contains($svcSlugLower, 'fan') || str_contains($svcSlugLower, 'wiring')) {
              $transImg = 'before-after-electrical-repair.png';
              $transCategory = 'Electrical Repairs';
              $transTitle = 'MCB Distribution Board & Concealed Switchboard Overhaul';
              $transDesc = 'Exposed tangled conduits and hazardous live wiring replaced with flush-mount modular switchplates and safety-certified MCBs.';
          } elseif (str_contains($svcSlugLower, 'plumb') || str_contains($svcSlugLower, 'leak') || str_contains($svcSlugLower, 'pipe') || str_contains($svcSlugLower, 'tap') || str_contains($svcSlugLower, 'drain')) {
              $transImg = 'before-after-plumbing-repair.png';
              $transCategory = 'Plumbing Repairs';
              $transTitle = 'Under-Sink Pipe Leak & Sanitary Drainage Repair';
              $transDesc = 'Rusted dripping joints and stagnant mold cleared out, replaced with heavy-duty anti-leak PVC P-traps and clean under-sink organization.';
          } elseif (str_contains($svcSlugLower, 'ac') || str_contains($svcSlugLower, 'cool') || str_contains($svcSlugLower, 'jet') || str_contains($svcSlugLower, 'air')) {
              $transImg = 'before-after-ac-service.png';
              $transCategory = 'AC Jet Service';
              $transTitle = 'Split AC Deep Foam Jet Wash & Cooling Coil Decontamination';
              $transDesc = 'Clogged dust, mold, and odor eradicated with high-pressure water jet and antimicrobial foam wash, restoring instant ice-cold airflow.';
          }
          ?>
          <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <h3 class="font-weight-bold mb-0" style="font-size: 22px;">Transformation Showcase</h3>
              <span class="badge badge-success px-3 py-1 font-weight-bold" style="background:#0f6e56; font-size:12px;">
                <i class="fa fa-sparkles"></i> <?= $transCategory ?> Proof
              </span>
            </div>
            <p class="text-muted small mb-3"><?= $transDesc ?></p>
            <div class="position-relative rounded overflow-hidden shadow-sm border" style="border-radius: 14px;">
              <img src="<?= \App\Core\View::asset('img/' . $transImg) ?>" class="w-100" style="display: block; object-fit: cover;" alt="<?= $transTitle ?>">
            </div>
            <div class="p-3 bg-light rounded mt-2 border d-flex justify-content-between align-items-center">
              <div>
                <strong style="font-size: 14.5px; color: #1e293b;"><?= $transTitle ?></strong>
                <div class="text-muted small">Verified before & after documentation by REFIXEL certified partners.</div>
              </div>
              <a href="<?= \App\Core\View::url('/gallery') ?>" class="btn btn-sm btn-outline-dark font-weight-bold">
                View Full Gallery &rarr;
              </a>
            </div>
          </div>

          <!-- Verified Customer Reviews Section -->
          <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h3 class="font-weight-bold mb-0" style="font-size: 22px;">Verified Customer Reviews</h3>
              <span class="text-warning font-weight-bold">4.85 ★★★★★ (128+ Reviews)</span>
            </div>

            <?php if (!empty($reviews)): ?>
              <div class="row">
                <?php foreach (array_slice($reviews, 0, 4) as $rev): ?>
                  <div class="col-md-6 mb-3">
                    <div class="p-3 rounded bg-light border h-100">
                      <div class="d-flex justify-content-between align-items-center mb-2">
                        <strong style="font-size: 14.5px;"><?= \App\Core\View::e($rev['customer_name'] ?? 'Homeowner') ?></strong>
                        <span class="text-warning font-weight-bold"><?= (int)$rev['rating'] ?>★</span>
                      </div>
                      <p class="text-muted small mb-1 fst-italic">"<?= \App\Core\View::e($rev['review_text'] ?? 'Excellent work, very professional and punctual.') ?>"</p>
                      <small class="text-success"><i class="fa fa-check-circle"></i> Verified Booking in <?= $cityName ?></small>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php else: ?>
              <div class="p-4 rounded bg-light border text-center">
                <p class="text-muted mb-0 small">Be the first to review <?= $svcName ?> in <?= $cityName ?> after your service completion!</p>
              </div>
            <?php endif; ?>
          </div>

          <!-- Service Areas Covered in this City -->
          <div class="mb-5">
            <h3 class="font-weight-bold mb-3" style="font-size: 22px;">
              <i class="fa fa-map-marker text-success mr-2"></i> Service Coverage Across <?= $cityName ?>
            </h3>
            <div class="p-3 rounded bg-white border">
              <p class="text-muted small mb-2">Immediate technician dispatch available across:</p>
              <div class="d-flex flex-wrap" style="gap: 6px;">
                <?php if (!empty($serviceAreas)): ?>
                  <?php foreach ($serviceAreas as $area): ?>
                    <span class="badge badge-light p-2 border font-weight-normal">
                      <?= \App\Core\View::e($area['area_name']) ?> (<?= \App\Core\View::e($area['pincode']) ?>)
                    </span>
                  <?php endforeach; ?>
                <?php else: ?>
                  <span class="badge badge-light p-2 border">DLF Phase 1–5</span>
                  <span class="badge badge-light p-2 border">Cyber City</span>
                  <span class="badge badge-light p-2 border">Sohna Road</span>
                  <span class="badge badge-light p-2 border">Golf Course Ext.</span>
                  <span class="badge badge-light p-2 border">All Major Sectors</span>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <!-- Service FAQs -->
          <?php if (!empty($faqs)): ?>
            <div class="mb-4">
              <h3 class="font-weight-bold mb-3" style="font-size: 22px;">Frequently Asked Questions</h3>
              <div class="faq-container">
                <?php foreach (array_slice($faqs, 0, 5) as $idx => $faq): ?>
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
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Booking Sticky Action Card -->
    <div class="col-lg-4">
      <div class="card p-4 shadow-sm border-0 sticky-top" style="top: 90px; border-radius: 16px;">
        <span class="badge badge-light text-uppercase mb-2 font-weight-bold" style="letter-spacing: 0.5px; color:#0f6e56;">Instant Doorstep Slot</span>
        <h4 class="font-weight-bold mb-1" style="font-size: 22px;"><?= $svcName ?></h4>
        <p class="text-muted small mb-3">Location: <strong><?= $cityName ?></strong></p>

        <div class="d-flex align-items-baseline mb-3 pb-3 border-bottom">
          <h2 class="font-weight-bold mb-0" style="color: #0f6e56;">₹<?= $price ?></h2>
          <span class="text-muted ml-2 small">Starting price • Inclusive of GST</span>
        </div>

        <ul class="list-unstyled mb-4 small" style="line-height: 1.9;">
          <li><i class="fa fa-check text-success mr-2"></i> 100% Background-verified technician</li>
          <li><i class="fa fa-check text-success mr-2"></i> Zero advance payment needed</li>
          <li><i class="fa fa-check text-success mr-2"></i> Cash or UPI payment on service completion</li>
          <li><i class="fa fa-check text-success mr-2"></i> 24-Hour satisfaction re-clean guarantee</li>
        </ul>

        <a href="<?= \App\Core\View::url('/book?service_id=' . (int)$service['id'] . '&city=' . urlencode($city)) ?>" class="btn text-white py-3 font-weight-bold text-center w-100 mb-2" style="background:#0f6e56; border-radius: 8px; font-size: 16px;">
          Book Doorstep Visit
        </a>

        <a href="https://api.whatsapp.com/send?phone=+919458182006&text=Hi%20Refixel%2C%20I%20would%20like%20to%20book%20<?= urlencode($service['name']) ?>%20in%20<?= urlencode($city) ?>" target="_blank" class="btn btn-outline-success py-2 font-weight-bold text-center w-100 small" style="border-radius: 8px;">
          <i class="fa fa-whatsapp mr-1"></i> Quick Book via WhatsApp
        </a>
      </div>
    </div>
  </div>
</div>
