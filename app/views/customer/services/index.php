<div class="container py-5 my-3">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent p-0 mb-4" style="font-size: 14px;">
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/') ?>" style="color:#0f6e56;">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">All Services</li>
    </ol>
  </nav>

  <div class="page_heading text-center mb-5">
    <h6 style="color: #0f6e56; font-weight: 600; letter-spacing: 1px;">SERVICE CATALOGUE</h6>
    <h1 class="font-weight-bold" style="font-size: 36px; color: #1a1a1a;">Explore Professional Home & Commercial Services</h1>
    <p class="text-muted" style="max-width: 650px; margin: 0 auto;">Select a category below to explore verified technicians, checklists, transparent pricing, and instant doorstep booking.</p>
  </div>

  <div class="row">
    <?php
    $currentCity = $_SESSION['selected_city'] ?? 'Gurugram';
    $citySlug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $currentCity), '-'));

    foreach ($categories ?? [] as $cat):
      $catSlug = \App\Core\View::e($cat['slug']);
      $catName = \App\Core\View::e($cat['name']);
      $iconFile = $cat['icon'] ?? 'home_claening.webp';
      $targetUrl = \App\Core\View::url("/{$catSlug}-services-in-{$citySlug}");
    ?>
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100 shadow-sm border-0" style="border-radius: 14px; overflow:hidden; transition: transform 0.2s ease;">
          <div style="height: 180px; overflow:hidden; background:#f8fafc; display:flex; align-items:center; justify-content:center;">
            <img src="<?= \App\Core\View::asset('img/' . $iconFile) ?>"
                 alt="<?= $catName ?>"
                 style="max-height: 140px; max-width: 80%; object-fit: contain;"
                 onerror="this.onerror=null; this.src='<?= \App\Core\View::asset('img/Full-home-clean.jpg') ?>';">
          </div>
          <div class="card-body d-flex flex-column">
            <h4 class="font-weight-bold mb-2" style="font-size: 20px; color: #1a1a1a;"><?= $catName ?></h4>
            <p class="text-muted small flex-grow-1"><?= \App\Core\View::e($cat['description'] ?? 'Verified technicians with standardized multi-point hygiene checklists.') ?></p>
            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
              <span class="badge badge-light p-2" style="color:#0f6e56; font-size:12px; font-weight:600;">
                <i class="fa fa-map-marker mr-1"></i> Available in <?= \App\Core\View::e($currentCity) ?>
              </span>
              <a href="<?= $targetUrl ?>" class="btn btn-sm text-white px-3 py-2 font-weight-bold" style="background:#0f6e56; border-radius: 6px;">
                View Services &rarr;
              </a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
