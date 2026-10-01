<?php
$user = \App\Core\Auth::user();
?>
<div class="hometfn_popup">
  <div class="popup_footer">
    <button class="btnclose_tfn" type="button" aria-label="Close menu">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="#0F0F0F" xmlns="http://www.w3.org/2000/svg">
        <path d="M10.586 12l-6.043 6.043 1.414 1.414L12 13.414l6.043 6.043 1.414-1.414L13.414 12l6.043-6.043-1.414-1.414L12 10.586 5.957 4.543 4.543 5.957 10.586 12z" fill="#0F0F0F"></path>
      </svg>
    </button>

    <div class="menu_header">
      <div class="right_menu2">
        <img src="<?= \App\Core\View::asset('img/account.png') ?>" alt="Account">
        <h4><?= \App\Core\View::e($user['name'] ?? 'Welcome Guest') ?></h4>
        <h6><?= !empty($user['phone']) ? '+91-' . \App\Core\View::e($user['phone']) : 'Sign in to manage bookings' ?></h6>
      </div>
    </div>

    <?php if ($user): ?>
    <div class="bottom_option" style="padding-top: 5px; border-bottom: 1px solid #e2e8f0; margin-bottom: 10px;">
      <ul>
        <li><a href="<?= \App\Core\View::url('/account') ?>"><span class="menu_ico"><i class="fa fa-dashboard text-success" style="font-size:18px; width:20px; text-align:center;"></i></span> Dashboard <i class="fa fa-angle-right"></i></a></li>
        <li><a href="<?= \App\Core\View::url('/account/bookings') ?>"><span class="menu_ico"><i class="fa fa-calendar text-success" style="font-size:18px; width:20px; text-align:center;"></i></span> My Bookings <i class="fa fa-angle-right"></i></a></li>
        <li><a href="<?= \App\Core\View::url('/account/invoices') ?>"><span class="menu_ico"><i class="fa fa-file-text-o text-success" style="font-size:18px; width:20px; text-align:center;"></i></span> Invoices & Receipts <i class="fa fa-angle-right"></i></a></li>
        <li><a href="<?= \App\Core\View::url('/account/profile') ?>"><span class="menu_ico"><i class="fa fa-user-circle text-success" style="font-size:18px; width:20px; text-align:center;"></i></span> Profile & Address <i class="fa fa-angle-right"></i></a></li>
        <li><a href="<?= \App\Core\View::url('/account/privacy') ?>"><span class="menu_ico"><i class="fa fa-shield text-success" style="font-size:18px; width:20px; text-align:center;"></i></span> Privacy & Data Rights <i class="fa fa-angle-right"></i></a></li>
      </ul>
    </div>
    <?php else: ?>
    <div class="btoption_one">
      <ul>
        <li>
          <a href="<?= \App\Core\View::url('/account/bookings') ?>">
            <span class="menu_ico"><img src="<?= \App\Core\View::asset('img/wirte.png') ?>" alt="Your Booking"></span> Your Booking
          </a>
        </li>
        <li>
          <a href="<?= \App\Core\View::url('/contact') ?>">
            <span class="menu_ico"><img src="<?= \App\Core\View::asset('img/office-building.png') ?>" alt="Need Help"></span> Need Help
          </a>
        </li>
      </ul>
    </div>
    <?php endif; ?>
    <div class="bottom_option">
      <ul>
        <li><a href="<?= \App\Core\View::url('/') ?>"><span class="menu_ico"><img src="<?= \App\Core\View::asset('img/home2.png') ?>" alt="Home"></span> Home <i class="fa fa-angle-right"></i></a></li>
        <li><a href="<?= \App\Core\View::url('/about') ?>"><span class="menu_ico"><img src="<?= \App\Core\View::asset('img/info.png') ?>" alt="About"></span> About Us <i class="fa fa-angle-right"></i></a></li>
        <li><a href="<?= \App\Core\View::url('/services') ?>"><span class="menu_ico"><i class="fa fa-briefcase text-success" style="font-size:18px; width:20px; text-align:center;"></i></span> Services <i class="fa fa-angle-right"></i></a></li>
        <li><a href="<?= \App\Core\View::url('/blogs') ?>"><span class="menu_ico"><i class="fa fa-file-text text-success" style="font-size:18px; width:20px; text-align:center;"></i></span> Blogs <i class="fa fa-angle-right"></i></a></li>
        <li><a href="<?= \App\Core\View::url('/partner') ?>"><span class="menu_ico"><i class="fa fa-handshake-o text-success" style="font-size:18px; width:20px; text-align:center;"></i></span> Service Partner <i class="fa fa-angle-right"></i></a></li>
        <li><a href="<?= \App\Core\View::url('/terms') ?>"><span class="menu_ico"><img src="<?= \App\Core\View::asset('img/pages.png') ?>" alt="Terms"></span> Terms & Conditions <i class="fa fa-angle-right"></i></a></li>
        <li><a href="<?= \App\Core\View::url('/refund') ?>"><span class="menu_ico"><img src="<?= \App\Core\View::asset('img/refund_policy.png') ?>" alt="Refund Policy"></span> Refund Policy <i class="fa fa-angle-right"></i></a></li>
        <li><a href="<?= \App\Core\View::url('/privacy') ?>"><span class="menu_ico"><img src="<?= \App\Core\View::asset('img/privacy_policy.png') ?>" alt="Privacy Policy"></span> Privacy Policy <i class="fa fa-angle-right"></i></a></li>
        <li><a href="<?= \App\Core\View::url('/contact') ?>"><span class="menu_ico"><img src="<?= \App\Core\View::asset('img/support.png') ?>" alt="Support"></span> Help & Support <i class="fa fa-angle-right"></i></a></li>
      </ul>

      <?php if ($user): ?>
        <ul class="logout_option">
          <li><a href="<?= \App\Core\View::url('/logout') ?>"><span class="menu_ico"><img src="<?= \App\Core\View::asset('img/logout.png') ?>" alt="Log Out"></span> Log Out <i class="fa fa-angle-right"></i></a></li>
        </ul>
      <?php else: ?>
        <ul class="logout_option">
          <li><a href="<?= \App\Core\View::url('/login') ?>"><span class="menu_ico"><img src="<?= \App\Core\View::asset('img/account.png') ?>" alt="Sign In"></span> Sign In <i class="fa fa-angle-right"></i></a></li>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</div>
