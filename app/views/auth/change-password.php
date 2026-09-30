<h3 class="text-center font-weight-bold mb-3" style="color:#13221e;">Update Your Password</h3>
<?php if (!empty($user['must_change_password'])): ?>
  <div class="alert alert-info py-2 small mb-3">
    <strong>First-time Login:</strong> Please change your temporary password before accessing the field workforce dashboard.
  </div>
<?php endif; ?>

<form action="<?= \App\Core\View::url('/change-password') ?>" method="POST">
  <?= \App\Core\View::csrfField() ?>

  <?php if (empty($user['must_change_password'])): ?>
    <div class="form-group mb-3">
      <label class="font-weight-600">Current Password</label>
      <input type="password" name="current_password" class="form-control" placeholder="••••••••" required>
    </div>
  <?php endif; ?>

  <div class="form-group mb-3">
    <label class="font-weight-600">New Password</label>
    <input type="password" name="new_password" class="form-control" placeholder="Minimum 6 characters" required>
  </div>
  <div class="form-group mb-4">
    <label class="font-weight-600">Confirm New Password</label>
    <input type="password" name="new_password_confirmation" class="form-control" placeholder="Repeat new password" required>
  </div>
  <button type="submit" class="btn btn-primary-custom">Save & Continue</button>
</form>
