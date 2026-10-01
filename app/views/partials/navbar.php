<?php
$user = \App\Core\Auth::user();
?>
<nav class="navbar navbar-expand-lg navbar-light main_menu">
  <div class="container d-flex align-items-center justify-content-between">
    <a class="navbar-brand" href="<?= \App\Core\View::url('/') ?>">
      <img src="<?= \App\Core\View::asset('img/logo2.svg') ?>" alt="Primodomus">
    </a>

    <!-- Desktop Navigation Links -->
    <div class="d-none d-lg-flex flex-grow-1 justify-content-center">
      <ul class="d-flex mb-0 pl-0 list-unstyled align-items-center" style="gap: 24px; font-weight: 500; font-size: 15px;">
        <li><a href="<?= \App\Core\View::url('/') ?>" class="text-dark text-decoration-none hover-text-success">Home</a></li>
        <li><a href="<?= \App\Core\View::url('/about') ?>" class="text-dark text-decoration-none hover-text-success">About</a></li>
        <li><a href="<?= \App\Core\View::url('/services') ?>" class="text-dark text-decoration-none hover-text-success">Services</a></li>
        <li><a href="<?= \App\Core\View::url('/blogs') ?>" class="text-dark text-decoration-none hover-text-success">Blogs</a></li>
        <li><a href="<?= \App\Core\View::url('/contact') ?>" class="text-dark text-decoration-none hover-text-success">Contact Us</a></li>
        <li><a href="<?= \App\Core\View::url('/partner') ?>" class="text-decoration-none px-3 py-1 rounded" style="background: rgba(15, 110, 86, 0.1); color: #0f6e56; font-weight: 600;">Service Partner</a></li>
      </ul>
    </div>

    <div class="d-flex align-items-center ml-auto">
      <div class="d-none d-lg-flex align-items-center mr-3">
        <a class="hdr-cart" id="hdrCart" href="<?= \App\Core\View::url('/cart') ?>" aria-label="Cart">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
            <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path>
          </svg>
          <span id="hdrCartText" class="hc-empty">Cart</span>
        </a>
      </div>

      <div class="our_cart">
      <ul>
        <?php if ($user): ?>
          <li class="position-relative">
            <a href="<?= \App\Core\View::url($user['role'] === 'admin' ? '/admin' : ($user['role'] === 'staff' ? '/staff' : '/account')) ?>" class="d-flex align-items-center">
              <img src="<?= \App\Core\View::asset('img/account.webp') ?>" alt="Account">
              <strong><?= \App\Core\View::e($user['name']) ?></strong>
              <i class="fa fa-angle-down ml-2 mr-2" style="font-size: 13px; opacity: 0.85;"></i>
            </a>
            <div class="account_dropdown">
              <a href="<?= \App\Core\View::url($user['role'] === 'admin' ? '/admin' : ($user['role'] === 'staff' ? '/staff' : '/account')) ?>">
                <i class="fa fa-dashboard mr-2 text-success"></i> Dashboard
              </a>
              <?php if ($user['role'] === 'customer'): ?>
                <a href="<?= \App\Core\View::url('/account/bookings') ?>">
                  <i class="fa fa-calendar mr-2 text-success"></i> My Bookings
                </a>
                <a href="<?= \App\Core\View::url('/account/invoices') ?>">
                  <i class="fa fa-file-text-o mr-2 text-success"></i> Invoices
                </a>
                <a href="<?= \App\Core\View::url('/account/profile') ?>">
                  <i class="fa fa-user-circle mr-2 text-success"></i> Profile
                </a>
              <?php endif; ?>
              <a href="<?= \App\Core\View::url('/logout') ?>" class="text-danger">
                <i class="fa fa-sign-out mr-2"></i> Log Out
              </a>
            </div>
          </li>
        <?php else: ?>
          <li>
            <a href="javascript:void(0)" id="hdrLoginTrigger">
              <img src="<?= \App\Core\View::asset('img/account.webp') ?>" alt="Login">
              <strong>Login</strong>
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
  </div>
</nav>
