<?php
$successMsg = \App\Core\View::flash('success');
$errorMsg   = \App\Core\View::flash('error');
?>
<?php if ($successMsg): ?>
  <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
    <strong>Success!</strong> <?= \App\Core\View::e($successMsg) ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>

<?php if ($errorMsg): ?>
  <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
    <strong>Error:</strong> <?= \App\Core\View::e($errorMsg) ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>
