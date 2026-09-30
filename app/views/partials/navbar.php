<?php
$user = \App\Core\Auth::user();
?>
<nav class="navbar navbar-expand-lg navbar-light main_menu">
  <div class="container">
    <a class="navbar-brand" href="<?= \App\Core\View::url('/') ?>">
      <img src="<?= \App\Core\View::asset('img/logo.svg') ?>" alt="Primodomus">
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <a class="hdr-cart" id="hdrCart" href="<?= \App\Core\View::url('/cart') ?>" aria-label="Cart">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
            <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path>
          </svg>
          <span id="hdrCartText" class="hc-empty">Cart</span>
        </a>
      </ul>
    </div>

    <div class="our_cart">
      <ul>
        <?php if ($user): ?>
          <li>
            <a href="<?= \App\Core\View::url($user['role'] === 'admin' ? '/admin' : ($user['role'] === 'staff' ? '/staff' : '/account')) ?>">
              <img src="<?= \App\Core\View::asset('img/account.webp') ?>" alt="Account">
              <strong><?= \App\Core\View::e($user['name']) ?></strong>
            </a>
          </li>
          <li class="ml-2">
            <a href="<?= \App\Core\View::url('/logout') ?>" class="text-danger small font-weight-bold" title="Log Out">
              <i class="fa fa-sign-out"></i>
            </a>
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
</nav>
