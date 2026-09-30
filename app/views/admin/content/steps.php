<?php
use App\Core\View;
$steps = $steps ?? [];
?>

<div class="admin-steps-page">
  <div class="mb-3">
    <h4 class="font-weight-bold mb-1 text-dark">4-Step Service Process (Public Display)</h4>
    <p class="text-muted small mb-0">The 4-step "How It Works" workflow guide displayed prominently on the live homepage.</p>
  </div>

  <div class="row">
    <?php foreach ($steps as $step): ?>
      <div class="col-md-6 mb-3">
        <div class="stat-card h-100">
          <form method="POST" action="<?= View::url('/admin/content/steps/' . $step['id']) ?>">
            <?= View::csrfField() ?>
            <div class="d-flex justify-content-between align-items-center mb-3">
              <span class="badge badge-success px-3 py-1 font-weight-bold" style="font-size: 13px;">
                STEP <?= (int)$step['step_no'] ?>
              </span>
            </div>

            <div class="form-group mb-2">
              <label class="font-weight-bold small text-dark">Step Title</label>
              <input type="text" name="title" class="form-control" value="<?= View::e($step['title']) ?>" required>
            </div>

            <div class="form-group mb-3">
              <label class="font-weight-bold small text-dark">Description</label>
              <textarea name="description" class="form-control" rows="3" required><?= View::e($step['description']) ?></textarea>
            </div>

            <button type="submit" class="btn btn-sm btn-brand font-weight-bold">
              <i class="fa fa-save mr-1"></i>Save Step <?= (int)$step['step_no'] ?>
            </button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
