<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title><?= \App\Core\View::e($title ?? 'Technician Portal | Primodomus') ?></title>
  <link href="<?= \App\Core\View::asset('img/favicon.png') ?>" rel="shortcut icon" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <style>
    body { font-family: 'Inter Tight', sans-serif; background: #f8faf9; padding-bottom: 70px; }
    .staff-header { background: #0f6e56; color: #fff; padding: 14px 18px; display: flex; align-items: center; justify-content: space-between; }
    .staff-header h5 { margin: 0; font-size: 16px; font-weight: 600; }
    .staff-bottom-nav { position: fixed; bottom: 0; left: 0; right: 0; background: #fff; border-top: 1px solid #e1e7ec; height: 60px; display: flex; z-index: 1000; }
    .staff-bottom-nav a { flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; color: #6c757d; font-size: 11px; text-decoration: none; font-weight: 500; }
    .staff-bottom-nav a.active, .staff-bottom-nav a:hover { color: #0f6e56; }
    .staff-bottom-nav a i { font-size: 18px; margin-bottom: 2px; }
    .job-card { background: #fff; border-radius: 10px; border: 1px solid #e7ede9; padding: 16px; margin-bottom: 14px; box-shadow: 0 2px 6px rgba(0,0,0,0.02); }
  </style>
</head>
<body>
  <div class="staff-header">
    <div class="d-flex align-items-center">
      <img src="<?= \App\Core\View::asset('img/favicon.png') ?>" alt="" style="height: 24px; margin-right: 8px;">
      <h5>Field Workforce</h5>
    </div>
    <div>
      <span class="badge badge-light px-2 py-1"><?= \App\Core\View::e(\App\Core\Auth::user()['name'] ?? 'Tech') ?></span>
      <a href="<?= \App\Core\View::url('/logout') ?>" class="text-white ml-2"><i class="fa fa-sign-out"></i></a>
    </div>
  </div>

  <div class="container py-3">
    <?= \App\Core\View::partial('flash') ?>
    <?= $content ?? '' ?>
  </div>

  <nav class="staff-bottom-nav">
    <a href="<?= \App\Core\View::url('/staff') ?>">
      <i class="fa fa-dashboard"></i>
      <span>Home</span>
    </a>
    <a href="<?= \App\Core\View::url('/staff/jobs?filter=today') ?>">
      <i class="fa fa-briefcase"></i>
      <span>My Jobs</span>
    </a>
    <a href="<?= \App\Core\View::url('/staff/earnings') ?>">
      <i class="fa fa-inr"></i>
      <span>Earnings</span>
    </a>
    <a href="<?= \App\Core\View::url('/staff/profile') ?>">
      <i class="fa fa-user"></i>
      <span>Profile</span>
    </a>
  </nav>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
