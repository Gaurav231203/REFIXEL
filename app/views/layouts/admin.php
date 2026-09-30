<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= \App\Core\View::e($title ?? 'Admin Panel | Primodomus') ?></title>
  <link href="<?= \App\Core\View::asset('img/favicon.png') ?>" rel="shortcut icon" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <style>
    body { font-family: 'Inter Tight', sans-serif; background: #f4f6f8; min-height: 100vh; }
    .admin-wrapper { display: flex; min-height: 100vh; }
    .admin-sidebar { width: 250px; background: #13221e; color: #fff; flex-shrink: 0; }
    .admin-sidebar .brand { padding: 20px; font-weight: 700; font-size: 18px; border-bottom: 1px solid rgba(255,255,255,0.08); display: flex; align-items: center; }
    .admin-sidebar .brand img { height: 28px; margin-right: 10px; }
    .admin-nav { list-style: none; padding: 15px 0; margin: 0; }
    .admin-nav li a { display: flex; align-items: center; padding: 12px 20px; color: #9ab4ad; text-decoration: none; font-size: 14px; font-weight: 500; }
    .admin-nav li a:hover, .admin-nav li.active a { color: #fff; background: rgba(255,255,255,0.06); }
    .admin-nav li a i { width: 24px; font-size: 16px; margin-right: 10px; }
    .admin-content { flex: 1; display: flex; flex-direction: column; overflow-x: hidden; }
    .admin-topbar { height: 60px; background: #fff; border-bottom: 1px solid #e1e7ec; display: flex; align-items: center; justify-content: space-between; padding: 0 24px; }
    .admin-body { padding: 24px; flex: 1; }
    .stat-card { background: #fff; border-radius: 8px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); margin-bottom: 20px; }
  </style>
</head>
<body>
  <div class="admin-wrapper">
    <div class="admin-sidebar">
      <div class="brand">
        <a href="<?= \App\Core\View::url('/admin') ?>" class="text-white text-decoration-none">
          <img src="<?= \App\Core\View::asset('img/logo2.svg') ?>" alt="Primodomus">
        </a>
      </div>
      <ul class="admin-nav">
        <li><a href="<?= \App\Core\View::url('/admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= \App\Core\View::url('/admin/enquiries') ?>"><i class="fa fa-inbox"></i> Enquiries</a></li>
        <li><a href="<?= \App\Core\View::url('/admin/bookings') ?>"><i class="fa fa-calendar-check-o"></i> Bookings & Jobs</a></li>
        <li><a href="<?= \App\Core\View::url('/admin/staff') ?>"><i class="fa fa-users"></i> Staff & Techs</a></li>
        <li><a href="<?= \App\Core\View::url('/admin/services') ?>"><i class="fa fa-wrench"></i> Services & Catalog</a></li>
        <li><a href="<?= \App\Core\View::url('/admin/payments') ?>"><i class="fa fa-money"></i> Payments & Invoices</a></li>
        <li><a href="<?= \App\Core\View::url('/admin/reports') ?>"><i class="fa fa-bar-chart"></i> Reports</a></li>
        <li><a href="<?= \App\Core\View::url('/admin/content/faqs') ?>"><i class="fa fa-file-text-o"></i> CMS & Content</a></li>
        <li><a href="<?= \App\Core\View::url('/admin/settings') ?>"><i class="fa fa-cog"></i> Settings</a></li>
        <li class="mt-4"><a href="<?= \App\Core\View::url('/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
      </ul>
    </div>
    <div class="admin-content">
      <div class="admin-topbar">
        <div><strong>Primodomus Operations Hub</strong></div>
        <div>
          <span class="mr-3"><i class="fa fa-user-circle"></i> <?= \App\Core\View::e(\App\Core\Auth::user()['name'] ?? 'Admin') ?></span>
          <a href="<?= \App\Core\View::url('/') ?>" target="_blank" class="btn btn-sm btn-outline-secondary"><i class="fa fa-external-link"></i> Live Site</a>
        </div>
      </div>
      <div class="admin-body">
        <?= \App\Core\View::partial('flash') ?>
        <?= $content ?? '' ?>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
