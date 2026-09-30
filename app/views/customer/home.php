<?php
/**
 * Primodomus - Authentic Customer Home View
 * Faithfully matches https://www.primodomus.com/index.php
 */
$currentCity = $_SESSION['selected_city'] ?? 'Gurugram';
$currentCitySlug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $currentCity), '-'));
?>

<!-- Hero & Search Banner -->
<div class="home_banners">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="search_service">
          <div class="looking_ser">
            <h3>Starting at ₹999 • Save up to 25% on your first booking</h3>
            <h1>Get Your Home Spotless & Germ-Free with Expert Deep Cleaning</h1>
            <a href="<?= \App\Core\View::url('/services') ?>" class="btn_cleaned_today d-inline-block text-decoration-none">
              Get Your Home Cleaned Today
            </a>
          </div>

          <div class="my_autocomplate">
            <!-- Location Selector Trigger -->
            <div class="location_sec">
              <div class="header-loc-badge" id="headerChangeCityBtn" style="cursor:pointer;">
                <svg class="hlb-pin" viewBox="0 0 20 20" fill="none" width="18" height="18">
                  <path d="M10 18s6-5.2 6-10a6 6 0 10-12 0c0 4.8 6 10 6 10z" stroke="currentColor" stroke-width="1.6"/>
                  <circle cx="10" cy="8" r="2" stroke="currentColor" stroke-width="1.6"/>
                </svg>
                <span id="headerSelectedCityText"><?= \App\Core\View::e($currentCity) ?></span>
                <svg class="hlb-chevron" viewBox="0 0 20 20" fill="none" width="12" height="12">
                  <path d="M5 8l5 5 5-5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
            </div>

            <!-- Service Search Input & Autocomplete Dropdown -->
            <div class="form-group search-wrapper" style="position:relative;">
              <i class="fa fa-search btn_btn_primary_search"></i>
              <input type="text"
                     class="form-control form_control_input"
                     placeholder="What are you looking for?"
                     id="citySearch_service"
                     autocomplete="off">

              <div id="searchDropdown" class="search-dropdown" style="display:none;">
                <div id="trendingBox">
                  <h6>Trending searches</h6>
                  <ul>
                    <li data-service="cleaning"><img src="<?= \App\Core\View::asset('img/traning.webp') ?>" alt="Trending"> Professional Full Home cleaning</li>
                    <li data-service="cleaning"><img src="<?= \App\Core\View::asset('img/traning.webp') ?>" alt="Trending"> Professional Bathroom Cleaning</li>
                    <li data-service="cleaning"><img src="<?= \App\Core\View::asset('img/traning.webp') ?>" alt="Trending"> Kitchen Deep Cleaning</li>
                    <li data-service="cleaning"><img src="<?= \App\Core\View::asset('img/traning.webp') ?>" alt="Trending"> Sofa Deep Cleaning</li>
                    <li data-service="cleaning"><img src="<?= \App\Core\View::asset('img/traning.webp') ?>" alt="Trending"> Commercial Space Cleaning</li>
                    <li data-service="pest-control"><img src="<?= \App\Core\View::asset('img/traning.webp') ?>" alt="Trending"> Pest Control</li>
                    <li data-service="painting-services"><img src="<?= \App\Core\View::asset('img/traning.webp') ?>" alt="Trending"> Home Painting</li>
                    <li data-service="ac-services"><img src="<?= \App\Core\View::asset('img/traning.webp') ?>" alt="Trending"> AC Jet Service</li>
                  </ul>
                </div>
                <div id="ajaxResults" style="display:none;"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Trust Stats -->
        <div class="complate_serv">
          <ul>
            <li>4.8★ <h6>Rated by 1000+ Happy Customers</h6></li>
            <li>5000+ <h6>Homes Professionally <br>Cleaned</h6></li>
            <li>60+ <h6>Trusted Service <br>Partners</h6></li>
            <li>400+ <h6>Verified <br>Professionals</h6></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Rated / Trust Strip -->
<div class="rated_values">
  <p><i class="fa fa-star"></i> Trusted by <span>1000+ homeowners</span> across Delhi-NCR, Gurugram, Mumbai, Hyderabad, Chennai, Ahmedabad, Chandigarh, Kochi & Pune</p>
</div>

<!-- Mobile Banner Slider -->
<div class="mobile_banner_slider">
  <div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?= \App\Core\View::asset('img/Full-home-clean.jpg') ?>" class="d-block w-100" style="border-radius:12px; max-height:220px; object-fit:cover;" alt="Full Home Cleaning" fetchpriority="high">
        </div>
        <div class="carousel-item">
          <img src="<?= \App\Core\View::asset('img/Painting-Services.png') ?>" class="d-block w-100" style="border-radius:12px; max-height:220px; object-fit:cover;" alt="Painting Services" loading="lazy" decoding="async">
        </div>
        <div class="carousel-item">
          <img src="<?= \App\Core\View::asset('img/AC-Services.webp') ?>" class="d-block w-100" style="border-radius:12px; max-height:220px; object-fit:cover;" alt="AC Services" loading="lazy" decoding="async">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </button>
    </div>
  </div>
</div>

<!-- Categories Section (Dynamic from Database) -->
<div class="categories_main">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="categorie_head">
          <h3>What are you looking for?</h3>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="categorie_listing">
          <ul>
            <?php foreach ($categories as $cat):
              $catSlug = \App\Core\View::e($cat['slug']);
              $targetUrl = \App\Core\View::url("/{$catSlug}-services-in-{$currentCitySlug}");
              $iconFile = $cat['icon'] ?? 'home_claening.webp';
            ?>
              <li>
                <a href="<?= $targetUrl ?>" title="<?= \App\Core\View::e($cat['name']) ?>">
                  <span class="categorie_icon">
                    <img src="<?= \App\Core\View::asset('img/' . $iconFile) ?>"
                         alt="<?= \App\Core\View::e($cat['name']) ?>"
                         width="85" height="85" loading="lazy"
                         onerror="this.onerror=null; this.src='<?= \App\Core\View::asset('img/home_claening.webp') ?>';">
                  </span>
                  <h6><?= \App\Core\View::e($cat['name']) ?></h6>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- City / Service State -->
<div class="ourservice_main">
  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="text-align:center; padding:30px 15px;">
        <h4 style="color:#0f6e56; font-weight:700;">Services Live in <?= \App\Core\View::e($currentCity) ?></h4>
        <p style="margin:0; color:#555;">Verified professionals available for instant and scheduled booking across <?= \App\Core\View::e($currentCity) ?>.</p>
      </div>
    </div>
  </div>
</div>

<!-- Why Choose Us Section -->
<div class="whychoose_main">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="page_heading" style="text-align: left;">
          <h6>WHY CHOOSE US</h6>
          <h3>Why Our Customer Choose Us</h3>
          <p>With Primodomus.com you will find the best Professionals in the area, whatever your need.</p>
        </div>

        <div class="whyus_item">
          <div class="whyus_item_img">
            <img src="<?= \App\Core\View::asset('img/trust.webp') ?>" alt="Verified" width="60" height="60" loading="lazy" decoding="async">
            <div class="bottm_arrow"></div>
          </div>
          <div class="whyus_content">
            <h4>Verified & vetted professionals</h4>
            <p>Get service from trusted and verified partner with professional skills and experience.</p>
          </div>
        </div>

        <div class="whyus_item">
          <div class="whyus_item_img">
            <img src="<?= \App\Core\View::asset('img/Services_Single.webp') ?>" alt="Matched to your needs" width="60" height="60" loading="lazy" decoding="async">
            <div class="bottm_arrow"></div>
          </div>
          <div class="whyus_content">
            <h4>Matched to your needs.</h4>
            <p>Avail tailored, service-specific options according to your precise needs and preferences.</p>
          </div>
        </div>

        <div class="whyus_item">
          <div class="whyus_item_img">
            <img src="<?= \App\Core\View::asset('img/repair.webp') ?>" alt="Customer support" width="60" height="60" loading="lazy" decoding="async">
          </div>
          <div class="whyus_content">
            <h4>Customer support at every step.</h4>
            <p>Ensuring smooth connections and support at every step for our users.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="choose_right_bar">
          <img src="<?= \App\Core\View::asset('img/find-expert.webp') ?>" alt="Happy Customers" loading="lazy" decoding="async">
          <div class="happy_clients">
            <ul>
              <li>400+ <h6>Verified Professionals</h6></li>
              <li>5000+ <h6>Homes Professionally Cleaned</h6></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Frequently Asked Questions (Dynamic from Database) -->
<div class="homepage_faq">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page_heading text-center">
          <h6>Get answers to common questions</h6>
          <h3>Frequently Asked Questions</h3>
        </div>

        <div class="faq-container">
          <?php if (!empty($faqs)): ?>
            <?php foreach ($faqs as $idx => $faq): ?>
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
          <?php else: ?>
            <div class="faq-item active">
              <div class="faq-question">
                <span>What is included in a full home deep cleaning service?</span>
                <div class="faq-icon">−</div>
              </div>
              <div class="faq-answer" style="display:block;">
                Our full home deep cleaning covers bedrooms, bathrooms, kitchen, living areas, floors, furniture, appliances, windows (inside), dusting, degreasing, sanitization, and more.
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Partner Program Banner -->
<div class="container my-5">
  <section class="partner-banner">
    <div class="bg-pattern pattern-1"></div>
    <div class="bg-pattern pattern-2"></div>

    <div class="banner-content">
      <div class="partner-badge">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
        </svg>
        Partner Program
      </div>
      <h2 class="banner-title">Grow your business with Primodomus</h2>
      <p class="banner-subtitle">
        India's fast-growing Home & Professional Services platform — connecting skilled professionals with thousands of customers across multiple cities.
      </p>
      <a href="<?= \App\Core\View::url('/contact') ?>" class="cta-button">
        Become a Service Partner
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1 8H15M15 8L8 1M15 8L8 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>
    </div>

    <div class="banner-visual">
      <div class="partners-container">
        <div class="partner-char">
          <img src="<?= \App\Core\View::asset('img/service_partners_p.png') ?>" alt="Home Cleaning Partner" loading="lazy" decoding="async">
          <div class="service-tag tag-left">
            <div class="icon-box">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
            </div>
            <div class="tag-info">
              <span class="tag-title">Home Cleaning</span>
              <span class="tag-desc">Service Provider</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Mini Floating Cart Bar -->
<div class="homecart_items" id="homeCartBar">
  <h4>
    <span><i class="fa fa-shopping-cart"></i> <span id="cartItemCount">0</span> item</span>
    <span id="cartTotalPrice">₹0</span>
  </h4>
  <a href="<?= \App\Core\View::url('/cart') ?>">
    View Cart
    <svg width="15" height="15" viewBox="0 0 24 24" fill="none">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M13.2307 5.53999C12.9769 5.28615 12.5653 5.28615 12.3115 5.53999C12.0576 5.79383 12.0576 6.20539 12.3115 6.45923L17.2019 11.3496L5.39414 11.3496C5.03516 11.3496 4.74414 11.6406 4.74414 11.9996C4.74414 12.3586 5.03516 12.6496 5.39414 12.6496L17.2019 12.6496L12.3115 17.54C12.0576 17.7938 12.0576 18.2054 12.3115 18.4592C12.5653 18.7131 12.9769 18.7131 13.2307 18.4592L18.949 12.741C19.3584 12.3315 19.3584 11.6677 18.949 11.2583L13.2307 5.53999Z" fill="#0f6e56"/>
    </svg>
  </a>
</div>

<!-- Home-Specific Interactive Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  var selectedCity = '<?= addslashes($currentCity) ?>';
  var selectedCitySlug = '<?= addslashes($currentCitySlug) ?>';
  var baseUrl = '<?= rtrim(\App\Core\View::url(), '/') ?>';

  // 1. Animated Typing Search Placeholder
  var services = ["AC Service & Repair", "Carpenter", "Cleaning", "Painting Services", "Pest Control", "Plumbers"];
  var sIdx = 0, charIdx = 0, isDeleting = false;
  var searchInput = document.getElementById("citySearch_service");
  var baseText = "Search services ";

  function typeEffect() {
    if (!searchInput || services.length === 0) return;
    var current = services[sIdx];
    if (!isDeleting) {
      charIdx++;
      searchInput.setAttribute("placeholder", baseText + "‘" + current.substring(0, charIdx) + "’");
      if (charIdx >= current.length) {
        setTimeout(function() { isDeleting = true; }, 1200);
      }
    } else {
      charIdx--;
      searchInput.setAttribute("placeholder", baseText + "‘" + current.substring(0, charIdx) + "’");
      if (charIdx <= 0) {
        isDeleting = false;
        sIdx = (sIdx + 1) % services.length;
      }
    }
  }
  setInterval(typeEffect, 60);

  // 2. Search dropdown & Trending
  var searchDropdown = document.getElementById("searchDropdown");
  var trendingBox = document.getElementById("trendingBox");
  var ajaxResults = document.getElementById("ajaxResults");

  if (searchInput) {
    searchInput.addEventListener("focus", function() {
      if (searchDropdown) searchDropdown.style.display = "block";
      if (trendingBox) trendingBox.style.display = "block";
      if (ajaxResults) ajaxResults.style.display = "none";
    });

    searchInput.addEventListener("input", function() {
      var q = this.value.trim().toLowerCase();
      if (q.length >= 2) {
        if (trendingBox) trendingBox.style.display = "none";
        if (ajaxResults) {
          ajaxResults.style.display = "block";
          ajaxResults.innerHTML = '<div class="p-2 text-muted small">Searching...</div>';
          fetch(baseUrl + '/api/services?q=' + encodeURIComponent(q))
            .then(function(r) { return r.json(); })
            .then(function(data) {
              if (data && data.services && data.services.length) {
                var html = '<ul class="list-unstyled mb-0">';
                data.services.forEach(function(s) {
                  html += '<li class="p-2 border-bottom suggestion-item" style="cursor:pointer;" data-slug="' + s.slug + '">' +
                          '<strong>' + s.name + '</strong> <span class="badge badge-success float-right">₹' + s.starting_price + '</span></li>';
                });
                html += '</ul>';
                ajaxResults.innerHTML = html;
              } else {
                ajaxResults.innerHTML = '<div class="p-2 text-muted small">No direct match. Press enter or browse categories below.</div>';
              }
            })
            .catch(function() {
              ajaxResults.innerHTML = '<div class="p-2 text-muted small">Search service active.</div>';
            });
        }
      } else {
        if (ajaxResults) ajaxResults.style.display = "none";
        if (trendingBox) trendingBox.style.display = "block";
      }
    });
  }

  // Click outside closes dropdown
  document.addEventListener("click", function(e) {
    if (!e.target.closest(".search-wrapper")) {
      if (searchDropdown) searchDropdown.style.display = "none";
    }
  });

  // Trending & Suggestion clicks
  document.addEventListener("click", function(e) {
    var trendLi = e.target.closest("#trendingBox li");
    if (trendLi) {
      var sSlug = trendLi.getAttribute("data-service") || 'cleaning';
      window.location.href = baseUrl + '/' + sSlug + '-services-in-' + selectedCitySlug;
    }
    var suggLi = e.target.closest(".suggestion-item");
    if (suggLi) {
      var sSlug2 = suggLi.getAttribute("data-slug") || 'cleaning';
      window.location.href = baseUrl + '/' + sSlug2 + '-in-' + selectedCitySlug;
    }
  });

  // 3. FAQ Accordion Toggle
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
