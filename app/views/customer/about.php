<!-- Load Custom Styles for New About Page UI -->
<link rel="stylesheet" href="<?= \App\Core\View::asset('css/about-new.css') ?>" />

<div class="about-page-wrapper">
  <!-- 1. Breadcrumb -->
  <div class="container">
    <nav class="about-breadcrumb" aria-label="breadcrumb">
      <a href="<?= \App\Core\View::url('/') ?>">Home</a>
      <span class="divider">/</span>
      <span class="active-item">About Us</span>
    </nav>
  </div>

  <!-- 2. Hero Story Section -->
  <div class="hero-story-container mb-5">
    <section class="hero-story-section">
      <!-- Wide Background Team Visual (extends leftward behind text with soft gradient fade) -->
      <div class="hero-wide-image-backdrop" aria-hidden="true">
        <img 
          src="<?= \App\Core\View::asset('img/about-hero-bg.png') ?>?v=<?= filemtime(ROOT_PATH . '/public/assets/img/about-hero-bg.png') ?>" 
          alt="REFIXEL Professional Verified Technicians and Service Van" 
          class="hero-wide-team-img"
          loading="eager"
          fetchpriority="high"
          decoding="async"
        >
        <div class="hero-image-soft-gradient"></div>
      </div>

      <div class="container hero-content-relative">
        <div class="row align-items-center">
          <!-- Left: Text Content -->
          <div class="col-lg-6 col-md-12 hero-text-col">
            <span class="section-eyebrow">— OUR STORY</span>
            <h1 class="hero-heading">
              About <span class="brand-highlight">REFIXEL</span>
              <span class="sub-line-navy">Professional Home Services.</span>
              <span class="sub-line-orange">Simplified for Every Home.</span>
            </h1>
            <p class="hero-description">
              REFIXEL is a modern home services platform connecting customers with verified professionals for all home maintenance and repair needs. Our mission is to make home services reliable, affordable, and hassle-free at your doorstep.
            </p>

            <div class="d-flex flex-wrap align-items-center" style="gap: 14px;">
              <a href="<?= \App\Core\View::url('/services') ?>" class="btn-refixel-primary">
                Book a Service <i class="fa fa-arrow-right ml-2" style="font-size: 13px;"></i>
              </a>
              <a href="#ourJourney" class="btn-refixel-outline">
                <i class="fa fa-th-large mr-2" style="font-size: 13px;"></i> Explore More
              </a>
            </div>

            <!-- Trust Badges Under Hero Buttons -->
            <div class="hero-trust-pills">
              <div class="trust-pill-item">
                <span class="pill-icon"><i class="fa fa-shield"></i></span>
                <span>Trusted Professionals</span>
              </div>
              <div class="trust-pill-item">
                <span class="pill-icon"><i class="fa fa-check-circle-o"></i></span>
                <span>Quality Service</span>
              </div>
              <div class="trust-pill-item">
                <span class="pill-icon"><i class="fa fa-headphones"></i></span>
                <span>On-Time Support</span>
              </div>
              <div class="trust-pill-item">
                <span class="pill-icon"><i class="fa fa-tag"></i></span>
                <span>Affordable Pricing</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- 3. Our Journey Section -->
  <section class="our-journey-section" id="ourJourney">
    <div class="container">
      <div class="row align-items-center">
        <!-- Left: Storefront Photo -->
        <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
          <div class="journey-img-wrap shadow-sm" style="border-radius: 20px; overflow: hidden; border: 1px solid #e2e8f0;">
            <img 
              src="<?= \App\Core\View::asset('img/refixel-storefront.jpg') ?>" 
              alt="REFIXEL Home Services Storefront & Experience Center" 
              class="img-fluid w-100"
              style="border-radius: 20px; display: block; object-fit: cover;"
              loading="lazy"
              decoding="async"
            >
          </div>
        </div>

        <!-- Right: Journey Story & Numbers -->
        <div class="col-lg-6 col-md-12">
          <div class="journey-content-wrap">
            <span class="section-eyebrow">OUR JOURNEY</span>
            <h2 class="section-title-large mb-3">
              More Than a Service.<br>
              <span class="text-refixel-orange">A Trusted Home Partner.</span>
            </h2>
            <p class="text-muted" style="font-size: 15.5px; line-height: 1.75;">
              REFIXEL was founded with a simple idea — to make home services reliable, professional, and stress-free for every household. We bridge the gap between customers and verified service professionals, ensuring high-quality service, transparent pricing, and complete peace of mind.
            </p>

            <!-- 3 Stat Metrics -->
            <div class="journey-stats-row">
              <div class="journey-stat-card">
                <div class="stat-icon"><i class="fa fa-home"></i></div>
                <div>
                  <div class="stat-number"><?= \App\Core\View::e(\App\Models\Setting::get('stat_homes_cleaned', '5,000+')) ?></div>
                  <div class="stat-label"><?= \App\Core\View::e(\App\Models\Setting::get('stat_homes_note', 'Homes Served')) ?></div>
                </div>
              </div>
              <div class="journey-stat-card">
                <div class="stat-icon"><i class="fa fa-handshake-o"></i></div>
                <div>
                  <div class="stat-number"><?= \App\Core\View::e(\App\Models\Setting::get('stat_service_partners', '60+')) ?></div>
                  <div class="stat-label"><?= \App\Core\View::e(\App\Models\Setting::get('stat_partners_note', 'Service Partners')) ?></div>
                </div>
              </div>
              <div class="journey-stat-card">
                <div class="stat-icon"><i class="fa fa-certificate"></i></div>
                <div>
                  <div class="stat-number"><?= \App\Core\View::e(\App\Models\Setting::get('stat_verified_pros', '400+')) ?></div>
                  <div class="stat-label"><?= \App\Core\View::e(\App\Models\Setting::get('stat_pros_note', 'Verified Professionals')) ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. Meet The Founder Section -->
  <section class="meet-founder-section">
    <div class="container">
      <div class="row align-items-center">
        <!-- Left: Founder Bio & Quote -->
        <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
          <span class="section-eyebrow">MEET THE FOUNDER</span>
          <h2 class="founder-title">Aakash Kumar</h2>
          <span class="founder-designation">Founder, REFIXEL</span>
          <p class="founder-bio">
            Aakash Kumar, the founder of REFIXEL, is dedicated to building a reliable and customer-focused home services platform. With a strong focus on quality, transparency, and customer satisfaction, his vision is to make professional home services easily accessible for every home.
          </p>

          <div class="founder-quote-box mb-4">
            <div class="quote-icon"><i class="fa fa-quote-left"></i></div>
            <p>“Our goal is to make every home cleaner, safer and more comfortable with professional services.”</p>
            <div class="quote-author">— Aakash Kumar</div>
          </div>

          <!-- Founder Social Links -->
          <div class="founder-social-links">
            <span class="founder-social-label">Follow Aakash:</span>
            <div class="founder-social-icons">
              <a href="https://www.linkedin.com/in/lets-refixel-3aab5a43b?utm_source=share_via&amp;utm_content=profile&amp;utm_medium=member_android" target="_blank" rel="noopener noreferrer" class="founder-social-btn btn-linkedin" title="Connect with Aakash Kumar on LinkedIn" aria-label="LinkedIn">
                <i class="fa fa-linkedin"></i>
              </a>
              <a href="https://www.instagram.com/letsrefixel?stkn=ajJtc20zcHRyM2Q3" target="_blank" rel="noopener noreferrer" class="founder-social-btn btn-instagram" title="Follow Aakash Kumar on Instagram" aria-label="Instagram">
                <i class="fa fa-instagram"></i>
              </a>
              <a href="https://x.com/letsrefixel" target="_blank" rel="noopener noreferrer" class="founder-social-btn btn-x" title="Follow Aakash Kumar on X" aria-label="X">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" style="display:inline-block; vertical-align:-2px;"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
              </a>
              <a href="https://www.facebook.com/share/1GU16Dtfcr/" target="_blank" rel="noopener noreferrer" class="founder-social-btn btn-facebook" title="Follow Aakash Kumar on Facebook" aria-label="Facebook">
                <i class="fa fa-facebook"></i>
              </a>
              <a href="https://youtube.com/@letsrefixel?si=Xq0LZUFrv_yzlM5C" target="_blank" rel="noopener noreferrer" class="founder-social-btn btn-youtube" title="Subscribe to Aakash Kumar on YouTube" aria-label="YouTube">
                <i class="fa fa-youtube-play"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Right: Founder Photo -->
        <div class="col-lg-6 col-md-12">
          <div class="founder-photo-wrap shadow-sm" style="border-radius: 20px; overflow: hidden; border: 1px solid #e2e8f0;">
            <img 
              src="<?= \App\Core\View::asset('img/founder-aakash-kumar.jpg') ?>" 
              alt="Aakash Kumar, Founder of REFIXEL" 
              class="img-fluid w-100"
              style="border-radius: 20px; display: block; object-fit: cover;"
              loading="lazy"
              decoding="async"
            >
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 5. Our Mission & Values Section -->
  <section class="mission-values-section">
    <div class="container">
      <span class="section-eyebrow">OUR MISSION & VALUES</span>
      <h2 class="section-title-large mb-3">Our Mission & Values</h2>
      <p class="mission-intro">
        At REFIXEL, our mission is to deliver professional home services that create cleaner, healthier, and more comfortable spaces through skilled professionals, advanced tools, and safe practices. We are committed to maintaining the highest standards of quality, transparency, reliability, and customer satisfaction.
      </p>

      <div class="values-grid">
        <!-- 1. Trust -->
        <div class="value-card">
          <div class="value-icon-circle"><i class="fa fa-shield"></i></div>
          <h5>Trust</h5>
          <p>Building long-term relationships through honesty and reliability.</p>
        </div>
        <!-- 2. Professionalism -->
        <div class="value-card">
          <div class="value-icon-circle"><i class="fa fa-user-circle-o"></i></div>
          <h5>Professionalism</h5>
          <p>Verified and skilled professionals for every service.</p>
        </div>
        <!-- 3. Quality -->
        <div class="value-card">
          <div class="value-icon-circle"><i class="fa fa-cog"></i></div>
          <h5>Quality</h5>
          <p>Consistent and high-quality service every time.</p>
        </div>
        <!-- 4. Innovation -->
        <div class="value-card">
          <div class="value-icon-circle"><i class="fa fa-lightbulb-o"></i></div>
          <h5>Innovation</h5>
          <p>Using modern tools and techniques for better results.</p>
        </div>
        <!-- 5. Customer First -->
        <div class="value-card">
          <div class="value-icon-circle"><i class="fa fa-heart"></i></div>
          <h5>Customer First</h5>
          <p>Your satisfaction is always our priority.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 6. Why Choose Us Section (Dark Navy) -->
  <section class="why-choose-section">
    <div class="container">
      <span class="section-eyebrow" style="color: #ff7847;">WHY CHOOSE REFIXEL</span>
      <h2 class="section-title-large text-white">Why Choose Us?</h2>

      <div class="why-choose-grid">
        <!-- 1. Verified Professionals -->
        <div class="why-card">
          <div class="why-icon-circle"><i class="fa fa-shield"></i></div>
          <h5>Verified Professionals</h5>
          <p>Every service partner is verified with background checks and skill certifications.</p>
        </div>
        <!-- 2. Safe & Hygienic -->
        <div class="why-card">
          <div class="why-icon-circle"><i class="fa fa-leaf"></i></div>
          <h5>Safe & Hygienic</h5>
          <p>We use safe cleaning methods and high-quality products for a healthier environment.</p>
        </div>
        <!-- 3. Advanced Equipment -->
        <div class="why-card">
          <div class="why-icon-circle"><i class="fa fa-cogs"></i></div>
          <h5>Advanced Equipment</h5>
          <p>From deep cleaning machines to specialized equipment for efficient and professional results.</p>
        </div>
        <!-- 4. Customer Trusted -->
        <div class="why-card">
          <div class="why-icon-circle"><i class="fa fa-thumbs-up"></i></div>
          <h5>Customer Trusted</h5>
          <p>Transparent pricing, reliable service, and complete customer satisfaction.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 7. Our Professional Process Section -->
  <section class="process-section">
    <div class="container">
      <div class="text-center">
        <span class="section-eyebrow">OUR PROCESS</span>
        <h2 class="section-title-large">Our Professional Process</h2>
      </div>

      <div class="process-grid">
        <!-- Step 01 -->
        <div class="process-step-card">
          <div class="step-badge">01</div>
          <div class="step-icon-wrap"><i class="fa fa-clipboard"></i></div>
          <h5>Service Inspection &<br>Requirement Analysis</h5>
          <p>We understand your requirements, inspect the area, and suggest the right cleaning or maintenance solution.</p>
        </div>

        <!-- Step 02 -->
        <div class="process-step-card">
          <div class="step-badge">02</div>
          <div class="step-icon-wrap"><i class="fa fa-wrench"></i></div>
          <h5>Professional Equipment &<br>Cleaning Preparation</h5>
          <p>Our team prepares the space with advanced tools, safe products, and proper safety measures.</p>
        </div>

        <!-- Step 03 -->
        <div class="process-step-card">
          <div class="step-badge">03</div>
          <div class="step-icon-wrap"><i class="fa fa-magic"></i></div>
          <h5>Deep Cleaning &<br>Sanitization Execution</h5>
          <p>We perform detailed cleaning using modern techniques to remove dust, stains, bacteria, and hidden dirt.</p>
        </div>

        <!-- Step 04 -->
        <div class="process-step-card">
          <div class="step-badge">04</div>
          <div class="step-icon-wrap"><i class="fa fa-check-circle"></i></div>
          <h5>Final Quality Inspection<br>& Customer Satisfaction</h5>
          <p>We conduct a final quality check to ensure everything meets our standards and guarantee your complete satisfaction.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- 8. Our Clients / Testimonials Section -->
  <section class="testimonials-section">
    <div class="container">
      <div class="testimonial-header-row">
        <div>
          <span class="section-eyebrow">OUR CLIENTS</span>
          <h2 class="section-title-large mb-0">
            Trusted by Thousands of People & Companies
            <span class="badge badge-light border ml-2" style="font-size: 15px; font-weight: 700; color: #f25b29; vertical-align: middle;">
              <i class="fa fa-star text-warning"></i> <?= \App\Core\View::e(\App\Models\Setting::get('stat_rating', '4.8★')) ?>
            </span>
          </h2>
        </div>
        <div>
          <a href="<?= \App\Core\View::url('/services') ?>" class="btn-refixel-pill-outline">
            View All Reviews <i class="fa fa-arrow-right ml-1"></i>
          </a>
        </div>
      </div>

      <div class="testimonials-grid">
        <!-- Review 1: Mukul Singh -->
        <div class="testimonial-card">
          <div>
            <div class="client-meta">
              <div class="client-info">
                <div class="client-avatar-circle">M</div>
                <div>
                  <div class="client-name">mukul singh</div>
                  <div class="client-time">2 months ago</div>
                </div>
              </div>
              <svg class="google-badge-icon" viewBox="0 0 24 24">
                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
              </svg>
            </div>
            <div class="rating-stars-row">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            </div>
            <p class="testimonial-quote">
              Very good service price is also so reasonable.
            </p>
          </div>
        </div>

        <!-- Review 2: Rohit Rai -->
        <div class="testimonial-card">
          <div>
            <div class="client-meta">
              <div class="client-info">
                <div class="client-avatar-circle avatar-blue">R</div>
                <div>
                  <div class="client-name">Rohit Rai</div>
                  <div class="client-time">3 months ago</div>
                </div>
              </div>
              <svg class="google-badge-icon" viewBox="0 0 24 24">
                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
              </svg>
            </div>
            <div class="rating-stars-row">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            </div>
            <p class="testimonial-quote">
              Very good service and positive behaviour. Clean water tank and tap.
            </p>
          </div>
        </div>

        <!-- Review 3: Shipra Bhard -->
        <div class="testimonial-card">
          <div>
            <div class="client-meta">
              <div class="client-info">
                <div class="client-avatar-circle avatar-pink">S</div>
                <div>
                  <div class="client-name">shipra bhard</div>
                  <div class="client-time">3 months ago</div>
                </div>
              </div>
              <svg class="google-badge-icon" viewBox="0 0 24 24">
                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
              </svg>
            </div>
            <div class="rating-stars-row">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            </div>
            <p class="testimonial-quote">
              Amazing work! My water tank was very dirty, but now it is perfectly clean and the water is crystal clear.
            </p>
          </div>
        </div>

        <!-- Review 4: Ld Popnal -->
        <div class="testimonial-card">
          <div>
            <div class="client-meta">
              <div class="client-info">
                <div class="client-avatar-circle avatar-slate">L</div>
                <div>
                  <div class="client-name">Ld Popnal</div>
                  <div class="client-time">3 months ago</div>
                </div>
              </div>
              <svg class="google-badge-icon" viewBox="0 0 24 24">
                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
              </svg>
            </div>
            <div class="rating-stars-row">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            </div>
            <p class="testimonial-quote">
              Very very Excellent service.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 9. Our Recent Work / Before & After Section -->
  <section class="recent-work-section" id="beforeAfterSection">
    <div class="container">
      <div class="work-header-row flex-column flex-md-row align-items-start align-items-md-end">
        <div>
          <span class="section-eyebrow">BEFORE / AFTER</span>
          <h2 class="section-title-large mb-1">Our Recent Work & Transformations</h2>
          <p class="text-muted mb-0" style="font-size: 15px;">Real results from verified REFIXEL home services — see the difference our professional equipment and expert technicians deliver.</p>
        </div>
        <div class="mt-3 mt-md-0">
          <a href="<?= \App\Core\View::url('/gallery') ?>" class="btn-refixel-pill-outline">
            View All Gallery <i class="fa fa-arrow-right ml-1"></i>
          </a>
        </div>
      </div>

      <!-- Top Header & Controls -->
      <div class="d-flex flex-wrap justify-content-between align-items-center mt-4 mb-3">
        <!-- Filter Buttons for Category Highlighting -->
        <div class="transformation-filter-nav mb-0">
          <button type="button" class="trans-filter-btn active" data-filter="all">
            <i class="fa fa-th-large mr-1"></i> All Showcases (8)
          </button>
          <button type="button" class="trans-filter-btn" data-filter="room-cleaning">
            <i class="fa fa-sparkles mr-1"></i> Room Cleaning
          </button>
          <button type="button" class="trans-filter-btn" data-filter="pest-control">
            <i class="fa fa-bug mr-1"></i> Pest Control
          </button>
          <button type="button" class="trans-filter-btn" data-filter="sofa-cleaning">
            <i class="fa fa-couch mr-1"></i> Sofa Cleaning
          </button>
          <button type="button" class="trans-filter-btn" data-filter="room-painting">
            <i class="fa fa-paint-brush mr-1"></i> Room Painting
          </button>
          <button type="button" class="trans-filter-btn" data-filter="home-renovation">
            <i class="fa fa-wrench mr-1"></i> Home Renovation
          </button>
          <button type="button" class="trans-filter-btn" data-filter="electrical-repair">
            <i class="fa fa-bolt mr-1"></i> Electrical Repairs
          </button>
          <button type="button" class="trans-filter-btn" data-filter="plumbing-repair">
            <i class="fa fa-wrench mr-1"></i> Plumbing Repairs
          </button>
          <button type="button" class="trans-filter-btn" data-filter="ac-service">
            <i class="fa fa-snowflake-o mr-1"></i> AC Jet Service
          </button>
        </div>

        <!-- Marquee Pause/Play Toggle Button -->
        <div class="d-none d-md-flex align-items-center" style="gap: 8px;">
          <span class="text-muted small"><i class="fa fa-info-circle mr-1"></i> Hover to pause scroll</span>
          <button type="button" class="btn btn-sm btn-outline-secondary font-weight-bold px-3 py-1" id="marqueeToggleBtn" style="border-radius: 20px; font-size: 12.5px;">
            <i class="fa fa-pause mr-1" id="marqueeToggleIcon"></i> <span id="marqueeToggleText">Pause</span>
          </button>
        </div>
      </div>
    </div>

    <!-- Parent Div: Horizontal Infinite Loop Marquee -->
    <div class="transformation-marquee-wrapper" id="transformationMarquee">
      <div class="transformation-marquee-track" id="transformationTrack">

        <!-- ================= SET 1 (8 Verified Transformation Cards) ================= -->

        <!-- 1. Room Cleaning / Laundry Area Deep Cleaning -->
        <div class="transformation-marquee-card" data-category="room-cleaning">
          <div class="transformation-media-wrap">
            <span class="transformation-category-badge badge-clean">
              <i class="fa fa-sparkles"></i> Room Cleaning
            </span>
            <img 
              src="<?= \App\Core\View::asset('img/before-after-laundry-cleaning.png') ?>" 
              alt="Before and After Room & Laundry Area Deep Cleaning" 
              loading="lazy"
              decoding="async"
            >
          </div>
          <div class="transformation-body">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="badge badge-light border text-success font-weight-bold" style="font-size: 11.5px; padding: 4px 8px;">
                  <i class="fa fa-check-circle"></i> Service Completed
                </span>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> Sector 54, Gurugram</span>
              </div>
              <h4>Laundry & Utility Room Deep Cleaning</h4>
              <p>Heavy wall dampness, stained utility sink, cluttered floor and detergent buildup completely eliminated with mechanized scrubbing and eco-friendly descaling.</p>
            </div>
            <div class="transformation-meta-row">
              <div>
                <span class="text-warning font-weight-bold">★ 4.9</span>
                <span class="text-muted small ml-1">(1,200+ Homes Cleaned)</span>
              </div>
              <a href="<?= \App\Core\View::url('/cleaning-services-in-gurugram') ?>" class="font-weight-bold text-decoration-none" style="color: #f25b29;">
                Book Room Cleaning <i class="fa fa-angle-right ml-1"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 2. Pest Control / Cockroach Infestation Eradication -->
        <div class="transformation-marquee-card" data-category="pest-control">
          <div class="transformation-media-wrap">
            <span class="transformation-category-badge badge-pest">
              <i class="fa fa-bug"></i> Pest Control
            </span>
            <img 
              src="<?= \App\Core\View::asset('img/before-after-pest-control.png') ?>" 
              alt="Before and After Kitchen Pest Control & Cockroach Eradication" 
              loading="lazy"
              decoding="async"
            >
          </div>
          <div class="transformation-body">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="badge badge-light border text-danger font-weight-bold" style="font-size: 11.5px; padding: 4px 8px;">
                  <i class="fa fa-shield"></i> 100% Roach-Free
                </span>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> DLF Phase 4, Gurugram</span>
              </div>
              <h4>Kitchen Under-Counter Pest Eradication</h4>
              <p>Severe cockroach infestation beneath kitchen cabinets eradicated using certified odorless gel-bait technology, crack sealing, and deep sanitization.</p>
            </div>
            <div class="transformation-meta-row">
              <div>
                <span class="text-warning font-weight-bold">★ 5.0</span>
                <span class="text-muted small ml-1">(90-Day Warranty)</span>
              </div>
              <a href="<?= \App\Core\View::url('/pest-control-services-in-gurugram') ?>" class="font-weight-bold text-decoration-none" style="color: #f25b29;">
                Book Pest Control <i class="fa fa-angle-right ml-1"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 3. Sofa Cleaning / Upholstery Deep Cleaning -->
        <div class="transformation-marquee-card" data-category="sofa-cleaning">
          <div class="transformation-media-wrap">
            <span class="transformation-category-badge badge-sofa">
              <i class="fa fa-couch"></i> Sofa Cleaning
            </span>
            <img 
              src="<?= \App\Core\View::asset('img/before-after-sofa-cleaning.png') ?>" 
              alt="Before and After Fabric Sofa Deep Cleaning" 
              loading="lazy"
              decoding="async"
            >
          </div>
          <div class="transformation-body">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="badge badge-light border text-primary font-weight-bold" style="font-size: 11.5px; padding: 4px 8px;">
                  <i class="fa fa-sparkles"></i> Fabric Restored
                </span>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> Golf Course Road</span>
              </div>
              <h4>Sectional Fabric Sofa Stain Extraction</h4>
              <p>Deep-set grime, beverage spills, sweat marks and dust mites extracted via high-suction mechanized shampooing, restoring original fabric brightness and freshness.</p>
            </div>
            <div class="transformation-meta-row">
              <div>
                <span class="text-warning font-weight-bold">★ 4.9</span>
                <span class="text-muted small ml-1">(Quick Dry in 2-3 Hrs)</span>
              </div>
              <a href="<?= \App\Core\View::url('/sofa-cleaning-in-gurugram') ?>" class="font-weight-bold text-decoration-none" style="color: #f25b29;">
                Book Sofa Cleaning <i class="fa fa-angle-right ml-1"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 4. Room Painting / Interior Wall Makeover -->
        <div class="transformation-marquee-card" data-category="room-painting">
          <div class="transformation-media-wrap">
            <span class="transformation-category-badge badge-paint">
              <i class="fa fa-paint-brush"></i> Room Painting
            </span>
            <img 
              src="<?= \App\Core\View::asset('img/before-after-room-painting.png') ?>" 
              alt="Before and After Living Room Painting Service" 
              loading="lazy"
              decoding="async"
            >
          </div>
          <div class="transformation-body">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="badge badge-light border text-warning font-weight-bold" style="font-size: 11.5px; padding: 4px 8px; color: #b45309 !important;">
                  <i class="fa fa-paint-brush"></i> Dustless Sanding
                </span>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> Nirvana Country</span>
              </div>
              <h4>Living Room Wall Painting & Makeover</h4>
              <p>Peeling plaster and rough walls transformed into smooth, luxury washable finish with mechanized dust-free sanding, 2 coats of emulsion, and clean cove lighting.</p>
            </div>
            <div class="transformation-meta-row">
              <div>
                <span class="text-warning font-weight-bold">★ 4.8</span>
                <span class="text-muted small ml-1">(Laser Measurement)</span>
              </div>
              <a href="<?= \App\Core\View::url('/painting-services-services-in-gurugram') ?>" class="font-weight-bold text-decoration-none" style="color: #f25b29;">
                Book Painting <i class="fa fa-angle-right ml-1"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 5. Home Renovation / Modern TV Feature Wall Carpentry -->
        <div class="transformation-marquee-card" data-category="home-renovation">
          <div class="transformation-media-wrap">
            <span class="transformation-category-badge badge-renovation">
              <i class="fa fa-wrench"></i> Home Renovation
            </span>
            <img 
              src="<?= \App\Core\View::asset('img/before-after-wall-renovation.png') ?>" 
              alt="Before and After Living Room TV Feature Wall & Carpentry Renovation" 
              loading="lazy"
              decoding="async"
            >
          </div>
          <div class="transformation-body">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="badge badge-light border font-weight-bold" style="font-size: 11.5px; padding: 4px 8px; color: #f25b29;">
                  <i class="fa fa-home"></i> Complete Transformation
                </span>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> Sohna Road, Gurugram</span>
              </div>
              <h4>Living Room TV Feature Wall & Carpentry Renovation</h4>
              <p>Chiseled conduit brick wall and construction debris rebuilt into a contemporary luxury media center featuring vertical fluted wood slats, warm LED backlit accents, and floating storage console.</p>
            </div>
            <div class="transformation-meta-row">
              <div>
                <span class="text-warning font-weight-bold">★ 5.0</span>
                <span class="text-muted small ml-1">(Bespoke Woodwork)</span>
              </div>
              <a href="<?= \App\Core\View::url('/carpenter-services-in-gurugram') ?>" class="font-weight-bold text-decoration-none" style="color: #f25b29;">
                Book Carpentry & Renovation <i class="fa fa-angle-right ml-1"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 6. Electrical Repairs / Switchboard & MCB Distribution Panel -->
        <div class="transformation-marquee-card" data-category="electrical-repair">
          <div class="transformation-media-wrap">
            <span class="transformation-category-badge badge-electric">
              <i class="fa fa-bolt"></i> Electrical Repairs
            </span>
            <img 
              src="<?= \App\Core\View::asset('img/before-after-electrical-repair.png') ?>" 
              alt="Before and After Electrical Repairs & MCB Panel Overhaul" 
              loading="lazy"
              decoding="async"
            >
          </div>
          <div class="transformation-body">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="badge badge-light border text-warning font-weight-bold" style="font-size: 11.5px; padding: 4px 8px; color: #b45309 !important;">
                  <i class="fa fa-bolt"></i> Insulated & Safe
                </span>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> Sector 48, Gurugram</span>
              </div>
              <h4>Switchboard & MCB Distribution Panel Overhaul</h4>
              <p>Dangerous loose wiring, exposed fuse boxes and chiseled conduits systematically rewired, neatly enclosed in a certified MCB panel, and fitted with sleek modular switchplates.</p>
            </div>
            <div class="transformation-meta-row">
              <div>
                <span class="text-warning font-weight-bold">★ 5.0</span>
                <span class="text-muted small ml-1">(Certified Electricians)</span>
              </div>
              <a href="<?= \App\Core\View::url('/fan-switchboard-repair-in-gurugram') ?>" class="font-weight-bold text-decoration-none" style="color: #f25b29;">
                Book Electrical Repair <i class="fa fa-angle-right ml-1"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 7. Plumbing Services / Kitchen Under-Sink Leak Repair -->
        <div class="transformation-marquee-card" data-category="plumbing-repair">
          <div class="transformation-media-wrap">
            <span class="transformation-category-badge badge-plumbing">
              <i class="fa fa-wrench"></i> Plumbing Repairs
            </span>
            <img 
              src="<?= \App\Core\View::asset('img/before-after-plumbing-repair.png') ?>" 
              alt="Before and After Kitchen Under-Sink Leak Repair & Pipe Fitting" 
              loading="lazy"
              decoding="async"
            >
          </div>
          <div class="transformation-body">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="badge badge-light border text-info font-weight-bold" style="font-size: 11.5px; padding: 4px 8px;">
                  <i class="fa fa-tint"></i> 100% Leak-Proof
                </span>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> Cyber City, Gurugram</span>
              </div>
              <h4>Kitchen Under-Sink Pipe Leak & Drainage Overhaul</h4>
              <p>Corroded leaking drain pipe and water-damaged cabinet completely fixed with brand new heavy-duty PVC P-trap pipe fitting, watertight seals, and clean sanitized dry storage.</p>
            </div>
            <div class="transformation-meta-row">
              <div>
                <span class="text-warning font-weight-bold">★ 4.9</span>
                <span class="text-muted small ml-1">(Instant Diagnosis)</span>
              </div>
              <a href="<?= \App\Core\View::url('/tap-leak-repair-in-gurugram') ?>" class="font-weight-bold text-decoration-none" style="color: #f25b29;">
                Book Plumbing Repair <i class="fa fa-angle-right ml-1"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 8. AC Jet Service & Coil Deep Cleaning -->
        <div class="transformation-marquee-card" data-category="ac-service">
          <div class="transformation-media-wrap">
            <span class="transformation-category-badge badge-ac">
              <i class="fa fa-snowflake-o"></i> AC Jet Service
            </span>
            <img 
              src="<?= \App\Core\View::asset('img/before-after-ac-service.png') ?>" 
              alt="Before and After Split AC Deep Jet Wash & Coil Cleaning" 
              loading="lazy"
              decoding="async"
            >
          </div>
          <div class="transformation-body">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="badge badge-light border text-primary font-weight-bold" style="font-size: 11.5px; padding: 4px 8px;">
                  <i class="fa fa-snowflake-o"></i> 2X Better Cooling
                </span>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> Sushant Lok 1, Gurugram</span>
              </div>
              <h4>Split AC Deep Jet Wash & Coil Cleaning</h4>
              <p>Extreme dust accumulation, blocked airflow and foul odor resolved through high-pressure antibacterial jet flush, restoring instant ice-cool airflow and pure fresh indoor air.</p>
            </div>
            <div class="transformation-meta-row">
              <div>
                <span class="text-warning font-weight-bold">★ 5.0</span>
                <span class="text-muted small ml-1">(Full Coil Jet Clean)</span>
              </div>
              <a href="<?= \App\Core\View::url('/ac-jet-service-in-gurugram') ?>" class="font-weight-bold text-decoration-none" style="color: #f25b29;">
                Book AC Service <i class="fa fa-angle-right ml-1"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- ================= SET 2 (Cloned for Infinite Loop) ================= -->

        <!-- 1 Clone -->
        <div class="transformation-marquee-card" data-category="room-cleaning" aria-hidden="true">
          <div class="transformation-media-wrap">
            <span class="transformation-category-badge badge-clean"><i class="fa fa-sparkles"></i> Room Cleaning</span>
            <img src="<?= \App\Core\View::asset('img/before-after-laundry-cleaning.png') ?>" alt="Room Cleaning" loading="lazy" decoding="async">
          </div>
          <div class="transformation-body">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="badge badge-light border text-success font-weight-bold" style="font-size: 11.5px; padding: 4px 8px;"><i class="fa fa-check-circle"></i> Service Completed</span>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> Sector 54, Gurugram</span>
              </div>
              <h4>Laundry & Utility Room Deep Cleaning</h4>
              <p>Heavy wall dampness, stained utility sink, cluttered floor and detergent buildup completely eliminated with mechanized scrubbing and eco-friendly descaling.</p>
            </div>
            <div class="transformation-meta-row">
              <div><span class="text-warning font-weight-bold">★ 4.9</span> <span class="text-muted small ml-1">(1,200+ Homes Cleaned)</span></div>
              <a href="<?= \App\Core\View::url('/cleaning-services-in-gurugram') ?>" class="font-weight-bold text-decoration-none" style="color: #f25b29;">Book Room Cleaning <i class="fa fa-angle-right ml-1"></i></a>
            </div>
          </div>
        </div>

        <!-- 2 Clone -->
        <div class="transformation-marquee-card" data-category="pest-control" aria-hidden="true">
          <div class="transformation-media-wrap">
            <span class="transformation-category-badge badge-pest"><i class="fa fa-bug"></i> Pest Control</span>
            <img src="<?= \App\Core\View::asset('img/before-after-pest-control.png') ?>" alt="Pest Control" loading="lazy" decoding="async">
          </div>
          <div class="transformation-body">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="badge badge-light border text-danger font-weight-bold" style="font-size: 11.5px; padding: 4px 8px;"><i class="fa fa-shield"></i> 100% Roach-Free</span>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> DLF Phase 4, Gurugram</span>
              </div>
              <h4>Kitchen Under-Counter Pest Eradication</h4>
              <p>Severe cockroach infestation beneath kitchen cabinets eradicated using certified odorless gel-bait technology, crack sealing, and deep sanitization.</p>
            </div>
            <div class="transformation-meta-row">
              <div><span class="text-warning font-weight-bold">★ 5.0</span> <span class="text-muted small ml-1">(90-Day Warranty)</span></div>
              <a href="<?= \App\Core\View::url('/pest-control-services-in-gurugram') ?>" class="font-weight-bold text-decoration-none" style="color: #f25b29;">Book Pest Control <i class="fa fa-angle-right ml-1"></i></a>
            </div>
          </div>
        </div>

        <!-- 3 Clone -->
        <div class="transformation-marquee-card" data-category="sofa-cleaning" aria-hidden="true">
          <div class="transformation-media-wrap">
            <span class="transformation-category-badge badge-sofa"><i class="fa fa-couch"></i> Sofa Cleaning</span>
            <img src="<?= \App\Core\View::asset('img/before-after-sofa-cleaning.png') ?>" alt="Sofa Cleaning" loading="lazy" decoding="async">
          </div>
          <div class="transformation-body">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="badge badge-light border text-primary font-weight-bold" style="font-size: 11.5px; padding: 4px 8px;"><i class="fa fa-sparkles"></i> Fabric Restored</span>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> Golf Course Road</span>
              </div>
              <h4>Sectional Fabric Sofa Stain Extraction</h4>
              <p>Deep-set grime, beverage spills, sweat marks and dust mites extracted via high-suction mechanized shampooing, restoring original fabric brightness and freshness.</p>
            </div>
            <div class="transformation-meta-row">
              <div><span class="text-warning font-weight-bold">★ 4.9</span> <span class="text-muted small ml-1">(Quick Dry in 2-3 Hrs)</span></div>
              <a href="<?= \App\Core\View::url('/sofa-cleaning-in-gurugram') ?>" class="font-weight-bold text-decoration-none" style="color: #f25b29;">Book Sofa Cleaning <i class="fa fa-angle-right ml-1"></i></a>
            </div>
          </div>
        </div>

        <!-- 4 Clone -->
        <div class="transformation-marquee-card" data-category="room-painting" aria-hidden="true">
          <div class="transformation-media-wrap">
            <span class="transformation-category-badge badge-paint"><i class="fa fa-paint-brush"></i> Room Painting</span>
            <img src="<?= \App\Core\View::asset('img/before-after-room-painting.png') ?>" alt="Room Painting" loading="lazy" decoding="async">
          </div>
          <div class="transformation-body">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="badge badge-light border text-warning font-weight-bold" style="font-size: 11.5px; padding: 4px 8px; color: #b45309 !important;"><i class="fa fa-paint-brush"></i> Dustless Sanding</span>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> Nirvana Country</span>
              </div>
              <h4>Living Room Wall Painting & Makeover</h4>
              <p>Peeling plaster and rough walls transformed into smooth, luxury washable finish with mechanized dust-free sanding, 2 coats of emulsion, and clean cove lighting.</p>
            </div>
            <div class="transformation-meta-row">
              <div><span class="text-warning font-weight-bold">★ 4.8</span> <span class="text-muted small ml-1">(Laser Measurement)</span></div>
              <a href="<?= \App\Core\View::url('/painting-services-services-in-gurugram') ?>" class="font-weight-bold text-decoration-none" style="color: #f25b29;">Book Painting <i class="fa fa-angle-right ml-1"></i></a>
            </div>
          </div>
        </div>

        <!-- 5 Clone -->
        <div class="transformation-marquee-card" data-category="home-renovation" aria-hidden="true">
          <div class="transformation-media-wrap">
            <span class="transformation-category-badge badge-renovation"><i class="fa fa-wrench"></i> Home Renovation</span>
            <img src="<?= \App\Core\View::asset('img/before-after-wall-renovation.png') ?>" alt="TV Feature Wall Renovation" loading="lazy" decoding="async">
          </div>
          <div class="transformation-body">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="badge badge-light border font-weight-bold" style="font-size: 11.5px; padding: 4px 8px; color: #f25b29;"><i class="fa fa-home"></i> Complete Transformation</span>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> Sohna Road, Gurugram</span>
              </div>
              <h4>Living Room TV Feature Wall & Carpentry Renovation</h4>
              <p>Chiseled conduit brick wall and construction debris rebuilt into a contemporary luxury media center featuring vertical fluted wood slats, warm LED backlit accents, and floating storage console.</p>
            </div>
            <div class="transformation-meta-row">
              <div><span class="text-warning font-weight-bold">★ 5.0</span> <span class="text-muted small ml-1">(Bespoke Woodwork)</span></div>
              <a href="<?= \App\Core\View::url('/carpenter-services-in-gurugram') ?>" class="font-weight-bold text-decoration-none" style="color: #f25b29;">Book Carpentry & Renovation <i class="fa fa-angle-right ml-1"></i></a>
            </div>
          </div>
        </div>

        <!-- 6 Clone -->
        <div class="transformation-marquee-card" data-category="electrical-repair" aria-hidden="true">
          <div class="transformation-media-wrap">
            <span class="transformation-category-badge badge-electric"><i class="fa fa-bolt"></i> Electrical Repairs</span>
            <img src="<?= \App\Core\View::asset('img/before-after-electrical-repair.png') ?>" alt="Electrical Repair" loading="lazy" decoding="async">
          </div>
          <div class="transformation-body">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="badge badge-light border text-warning font-weight-bold" style="font-size: 11.5px; padding: 4px 8px; color: #b45309 !important;"><i class="fa fa-bolt"></i> Insulated & Safe</span>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> Sector 48, Gurugram</span>
              </div>
              <h4>Switchboard & MCB Distribution Panel Overhaul</h4>
              <p>Dangerous loose wiring, exposed fuse boxes and chiseled conduits systematically rewired, neatly enclosed in a certified MCB panel, and fitted with sleek modular switchplates.</p>
            </div>
            <div class="transformation-meta-row">
              <div><span class="text-warning font-weight-bold">★ 5.0</span> <span class="text-muted small ml-1">(Certified Electricians)</span></div>
              <a href="<?= \App\Core\View::url('/fan-switchboard-repair-in-gurugram') ?>" class="font-weight-bold text-decoration-none" style="color: #f25b29;">Book Electrical Repair <i class="fa fa-angle-right ml-1"></i></a>
            </div>
          </div>
        </div>

        <!-- 7 Clone -->
        <div class="transformation-marquee-card" data-category="plumbing-repair" aria-hidden="true">
          <div class="transformation-media-wrap">
            <span class="transformation-category-badge badge-plumbing"><i class="fa fa-wrench"></i> Plumbing Repairs</span>
            <img src="<?= \App\Core\View::asset('img/before-after-plumbing-repair.png') ?>" alt="Plumbing Repair" loading="lazy" decoding="async">
          </div>
          <div class="transformation-body">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="badge badge-light border text-info font-weight-bold" style="font-size: 11.5px; padding: 4px 8px;"><i class="fa fa-tint"></i> 100% Leak-Proof</span>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> Cyber City, Gurugram</span>
              </div>
              <h4>Kitchen Under-Sink Pipe Leak & Drainage Overhaul</h4>
              <p>Corroded leaking drain pipe and water-damaged cabinet completely fixed with brand new heavy-duty PVC P-trap pipe fitting, watertight seals, and clean sanitized dry storage.</p>
            </div>
            <div class="transformation-meta-row">
              <div><span class="text-warning font-weight-bold">★ 4.9</span> <span class="text-muted small ml-1">(Instant Diagnosis)</span></div>
              <a href="<?= \App\Core\View::url('/tap-leak-repair-in-gurugram') ?>" class="font-weight-bold text-decoration-none" style="color: #f25b29;">Book Plumbing Repair <i class="fa fa-angle-right ml-1"></i></a>
            </div>
          </div>
        </div>

        <!-- 8 Clone -->
        <div class="transformation-marquee-card" data-category="ac-service" aria-hidden="true">
          <div class="transformation-media-wrap">
            <span class="transformation-category-badge badge-ac"><i class="fa fa-snowflake-o"></i> AC Jet Service</span>
            <img src="<?= \App\Core\View::asset('img/before-after-ac-service.png') ?>" alt="AC Jet Service" loading="lazy" decoding="async">
          </div>
          <div class="transformation-body">
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="badge badge-light border text-primary font-weight-bold" style="font-size: 11.5px; padding: 4px 8px;"><i class="fa fa-snowflake-o"></i> 2X Better Cooling</span>
                <span class="text-muted small"><i class="fa fa-map-marker text-danger mr-1"></i> Sushant Lok 1, Gurugram</span>
              </div>
              <h4>Split AC Deep Jet Wash & Coil Cleaning</h4>
              <p>Extreme dust accumulation, blocked airflow and foul odor resolved through high-pressure antibacterial jet flush, restoring instant ice-cool airflow and pure fresh indoor air.</p>
            </div>
            <div class="transformation-meta-row">
              <div><span class="text-warning font-weight-bold">★ 5.0</span> <span class="text-muted small ml-1">(Full Coil Jet Clean)</span></div>
              <a href="<?= \App\Core\View::url('/ac-jet-service-in-gurugram') ?>" class="font-weight-bold text-decoration-none" style="color: #f25b29;">Book AC Service <i class="fa fa-angle-right ml-1"></i></a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Interactive Controls for Infinite Marquee -->
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var track = document.getElementById('transformationTrack');
    var marquee = document.getElementById('transformationMarquee');
    var toggleBtn = document.getElementById('marqueeToggleBtn');
    var toggleIcon = document.getElementById('marqueeToggleIcon');
    var toggleText = document.getElementById('marqueeToggleText');
    var filterBtns = document.querySelectorAll('.trans-filter-btn');
    var allCards = document.querySelectorAll('.transformation-marquee-card');
    var isManuallyPaused = false;

    // Toggle Play / Pause
    if (toggleBtn && track) {
      toggleBtn.addEventListener('click', function() {
        isManuallyPaused = !isManuallyPaused;
        if (isManuallyPaused) {
          track.classList.add('is-paused');
          toggleIcon.className = 'fa fa-play mr-1';
          toggleText.textContent = 'Resume';
        } else {
          track.classList.remove('is-paused');
          toggleIcon.className = 'fa fa-pause mr-1';
          toggleText.textContent = 'Pause';
        }
      });
    }

    // Category Filter Navigation
    if (filterBtns.length && allCards.length && track) {
      filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
          filterBtns.forEach(function(b) { b.classList.remove('active'); });
          this.classList.add('active');
          var cat = this.getAttribute('data-filter');

          allCards.forEach(function(card) {
            card.classList.remove('card-highlighted');
          });

          if (cat === 'all') {
            // Resume infinite marquee
            track.classList.remove('is-paused');
            if (toggleIcon && toggleText) {
              toggleIcon.className = 'fa fa-pause mr-1';
              toggleText.textContent = 'Pause';
            }
            isManuallyPaused = false;
          } else {
            // Pause marquee and highlight the matching card
            track.classList.add('is-paused');
            if (toggleIcon && toggleText) {
              toggleIcon.className = 'fa fa-play mr-1';
              toggleText.textContent = 'Resume';
            }
            isManuallyPaused = true;

            var targetCard = track.querySelector('.transformation-marquee-card[data-category="' + cat + '"]');
            if (targetCard) {
              targetCard.classList.add('card-highlighted');
              targetCard.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
            }
          }
        });
      });
    }
  });
  </script>

  <!-- 10. CTA & Newsletter Banner -->
  <section class="cta-newsletter-section">
    <div class="container">
      <div class="cta-banner-container">
        <div class="row align-items-center">
          <!-- Left: Call to action -->
          <div class="col-lg-7 col-md-12 mb-4 mb-lg-0 cta-content-left">
            <h3 class="cta-title">
              We Do Magic with Reliable, Safe & Affordable Home Services You Can Trust.
            </h3>
            <a href="<?= \App\Core\View::url('/services') ?>" class="btn-refixel-primary" style="padding: 14px 30px; font-size: 16px;">
              Get a Free Quote <i class="fa fa-arrow-right ml-2"></i>
            </a>
          </div>

          <!-- Right: Newsletter subscription -->
          <div class="col-lg-5 col-md-12">
            <div class="subscribe-card-white">
              <h4>Subscribe to Our Newsletter</h4>
              <p>Get the latest offers, tips and updates.</p>

              <form action="<?= \App\Core\View::url('/contact') ?>" method="GET" class="subscribe-input-group">
                <input type="email" name="email" placeholder="Enter your email address" required>
                <button type="submit" class="subscribe-submit-btn" aria-label="Subscribe">
                  <i class="fa fa-arrow-right"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
