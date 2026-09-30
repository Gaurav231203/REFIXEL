<?php
use App\Core\View;
$services = $services ?? [];
$categories = $categories ?? [];
?>

<div class="admin-services-page">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h4 class="font-weight-bold mb-1 text-dark">Services & Pricing Catalog</h4>
      <p class="text-muted small mb-0">Manage marketplace services, base starting prices, and category assignments.</p>
    </div>

    <div>
      <a href="<?= View::url('/admin/services/categories') ?>" class="btn btn-sm btn-outline-secondary font-weight-bold mr-2">
        <i class="fa fa-th-large mr-1"></i>Manage Categories
      </a>
      <button type="button" class="btn btn-sm btn-brand font-weight-bold" data-toggle="modal" data-target="#addServiceModal">
        <i class="fa fa-plus mr-1"></i>Add New Service
      </button>
    </div>
  </div>

  <div class="stat-card p-0 overflow-hidden">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th>Service Name</th>
            <th>Category</th>
            <th>Starting Price</th>
            <th>Description</th>
            <th>Status</th>
            <th class="text-right">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($services)): ?>
            <tr>
              <td colspan="6" class="text-center py-5 text-muted">No services registered in catalog.</td>
            </tr>
          <?php else: ?>
            <?php foreach ($services as $s): ?>
              <tr>
                <td>
                  <div class="font-weight-bold text-dark"><?= View::e($s['name']) ?></div>
                  <div class="text-muted" style="font-size: 11px;">/<?= View::e($s['slug']) ?></div>
                </td>
                <td>
                  <span class="badge badge-light border text-dark font-weight-bold">
                    <?= View::e($s['category_name']) ?>
                  </span>
                </td>
                <td>
                  <strong class="text-success font-weight-bold">₹<?= number_format((float)$s['starting_price'], 2) ?></strong>
                </td>
                <td>
                  <div class="text-muted small text-truncate" style="max-width: 280px;" title="<?= View::e($s['description']) ?>">
                    <?= View::e($s['description']) ?>
                  </div>
                </td>
                <td>
                  <?php if (!empty($s['is_active'])): ?>
                    <span class="badge badge-success">Active</span>
                  <?php else: ?>
                    <span class="badge badge-danger">Disabled</span>
                  <?php endif; ?>
                </td>
                <td class="text-right">
                  <form method="POST" action="<?= View::url('/admin/services/' . $s['id'] . '/toggle-status') ?>" class="d-inline">
                    <?= View::csrfField() ?>
                    <button type="submit" class="btn btn-sm <?= !empty($s['is_active']) ? 'btn-outline-danger' : 'btn-outline-success' ?> py-1 px-2 font-weight-bold">
                      <?= !empty($s['is_active']) ? 'Deactivate' : 'Activate' ?>
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal: Add New Service -->
<div class="modal fade" id="addServiceModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?= View::url('/admin/services') ?>">
        <?= View::csrfField() ?>
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold">Add New Service to Catalog</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label class="font-weight-bold small">Service Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" placeholder="e.g. Sofa Deep Shampoo Cleaning" required>
          </div>

          <div class="form-group mb-3">
            <label class="font-weight-bold small">Category <span class="text-danger">*</span></label>
            <select name="category_id" class="form-control" required>
              <option value="">-- Choose Category --</option>
              <?php foreach ($categories as $cat): ?>
                <option value="<?= $cat['id'] ?>"><?= View::e($cat['name']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group mb-3">
            <label class="font-weight-bold small">Starting Price (INR) <span class="text-danger">*</span></label>
            <input type="number" step="0.01" name="starting_price" class="form-control" placeholder="e.g. 799.00" required>
          </div>

          <div class="form-group mb-3">
            <label class="font-weight-bold small">Short Description</label>
            <textarea name="description" class="form-control" rows="2" placeholder="Brief scope of work included in this service..."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-brand font-weight-bold">Save Service</button>
        </div>
      </form>
    </div>
  </div>
</div>
