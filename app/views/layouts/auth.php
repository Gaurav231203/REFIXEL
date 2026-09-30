<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= \App\Core\View::e($title ?? 'Authentication | Primodomus') ?></title>
  <link href="<?= \App\Core\View::asset('img/favicon.png') ?>" rel="shortcut icon" type="image/x-icon" />
  <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?= \App\Core\View::asset('css/style.css') ?>" />
  <style>
    body { background-color: #f7faf9; font-family: 'Inter Tight', sans-serif; }
    .auth-card { max-width: 440px; margin: 60px auto; background: #fff; padding: 32px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); }
    .auth-logo { text-align: center; margin-bottom: 24px; }
    .auth-logo img { height: 42px; }
    .btn-primary-custom { background-color: #0f6e56; border-color: #0f6e56; color: #fff; font-weight: 600; width: 100%; border-radius: 6px; padding: 10px; }
    .btn-primary-custom:hover { background-color: #0b5341; color: #fff; }
  </style>
</head>
<body>
  <div class="container">
    <?= \App\Core\View::partial('flash') ?>
    <div class="auth-card">
      <div class="auth-logo">
        <a href="<?= \App\Core\View::url('/') ?>">
          <img src="<?= \App\Core\View::asset('img/logo2.svg') ?>" alt="Primodomus">
        </a>
      </div>
      <?= $content ?? '' ?>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
