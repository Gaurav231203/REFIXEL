<?php
use App\Core\View;
$items = $items ?? [];
$services = $services ?? [];
?>

<div class="admin-gallery-page">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h4 class="font-weight-bold mb-1 text-dark">Before / After Gallery Showcase</h4>
      <p class="text-muted small mb-0">Transformational proof showcases displayed in the public gallery section.</p>
    </div>

    <div>
      <button type="button" class="btn btn-sm btn-brand font-weight-bold" data-toggle="modal" data-target="#addGalleryModal">
        <i class="fa fa-plus mr-1"></i>Add Showcase Item
      </button>
    </div>
  </div>

  <div class="row">
    <?php if (empty($items)): ?>
      <div class="col-12">
        <div class="stat-card text-center py-5 text-muted">
          <i class="fa fa-picture-o fa-3x mb-2 d-block text-muted" style="opacity: 0.3;"></i>
          No gallery showcase items added yet. Click "Add Showcase Item" above.
        </div>
      </div>
    <?php else: ?>
      <?php foreach ($items as $item): ?>
        <div class="col-md-6 col-lg-4 mb-3">
          <div class="stat-card p-3 h-100 d-flex flex-direction-column justify-content-between">
            <div>
              <div class="d-flex justify-content-between align-items-start mb-2">
                <span class="badge badge-light border text-dark font-weight-bold"><?= View::e($item['service_name'] ?? 'General Service') ?></span>
                <span class="badge <?= !empty($item['is_active']) ? 'badge-success' : 'badge-secondary' ?>">
                  <?= !empty($item['is_active']) ? 'Active' : 'Hidden' ?>
                </span>
              </div>
              <h6 class="font-weight-bold text-dark mb-2"><?= View::e($item['title']) ?></h6>

              <div class="row no-gutters mx-n1 mb-2">
                <div class="col-6 p-1">
                  <div class="small font-weight-bold text-muted mb-1">BEFORE</div>
                  <div class="border rounded overflow-hidden" style="height: 100px;">
                    <img src="<?= View::asset($item['before_image']) ?>" alt="Before" style="width: 100%; height: 100%; object-fit: cover;">
                  </div>
                </div>
                <div class="col-6 p-1">
                  <div class="small font-weight-bold text-success mb-1">AFTER</div>
                  <div class="border rounded overflow-hidden" style="height: 100px;">
                    <img src="<?= View::asset($item['after_image']) ?>" alt="After" style="width: 100%; height: 100%; object-fit: cover;">
                  </div>
                </div>
              </div>
            </div>

            <div class="border-top pt-2 mt-2 text-right">
              <form method="POST" action="<?= View::url('/admin/content/gallery/' . $item['id'] . '/toggle') ?>" class="d-inline">
                <?= View::csrfField() ?>
                <button type="submit" class="btn btn-sm <?= !empty($item['is_active']) ? 'btn-outline-secondary' : 'btn-success' ?> py-1 px-2 font-weight-bold">
                  <?= !empty($item['is_active']) ? 'Hide from Live Site' : 'Show on Live Site' ?>
                </button>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<!-- Modal: Add Gallery Item -->
<div class="modal fade" id="addGalleryModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?= View::url('/admin/content/gallery') ?>" enctype="multipart/form-data">
        <?= View::csrfField() ?>
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold">Add Before/After Showcase</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label class="font-weight-bold small">Showcase Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" placeholder="e.g. Marble Floor Polish & Buffing" required>
          </div>

          <div class="form-group mb-3">
            <label class="font-weight-bold small">Service Category</label>
            <select name="service_id" class="form-control">
              <option value="0">General Transformation</option>
              <?php foreach ($services as $svc): ?>
                <option value="<?= $svc['id'] ?>"><?= View::e($svc['name']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group mb-3">
            <label class="font-weight-bold small">Before Image</label>
            <input type="file" name="before_image" accept="image/*" class="form-control-file">
          </div>

          <div class="form-group mb-3">
            <label class="font-weight-bold small">After Image</label>
            <input type="file" name="after_image" accept="image/*" class="form-control-file">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-brand font-weight-bold">Upload Showcase</button>
        </div>
      </form>
    </div>
  </div>
</div>
