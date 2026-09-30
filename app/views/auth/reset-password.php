<h3 class="text-center font-weight-bold mb-3" style="color:#13221e;">Create New Password</h3>
<p class="text-muted text-center small mb-4">Please choose a strong password with at least 6 characters.</p>

<form action="<?= \App\Core\View::url('/reset-password') ?>" method="POST">
  <?= \App\Core\View::csrfField() ?>
  <input type="hidden" name="token" value="<?= \App\Core\View::e($token) ?>">
  <div class="form-group mb-3">
    <label class="font-weight-600">New Password</label>
    <input type="password" name="password" class="form-control" placeholder="••••••••" required autofocus>
  </div>
  <div class="form-group mb-4">
    <label class="font-weight-600">Confirm New Password</label>
    <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••" required>
  </div>
  <button type="submit" class="btn btn-primary-custom">Update Password</button>
</form>
