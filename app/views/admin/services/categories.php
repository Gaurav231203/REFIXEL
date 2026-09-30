<?php
use App\Core\View;
$categories = $categories ?? [];
?>

<div class="admin-categories-page">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <a href="<?= View::url('/admin/services') ?>" class="text-muted small font-weight-bold">
        <i class="fa fa-arrow-left mr-1"></i>Back to Services
      </a>
      <h4 class="font-weight-bold mb-1 text-dark mt-1">Service Categories</h4>
      <p class="text-muted small mb-0">High-level trade categories shown on website navigation and skill filters.</p>
    </div>

    <div>
      <button type="button" class="btn btn-sm btn-brand font-weight-bold" data-toggle="modal" data-target="#addCategoryModal">
        <i class="fa fa-plus mr-1"></i>Add New Category
      </button>
    </div>
  </div>

  <div class="stat-card p-0 overflow-hidden">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th>Icon</th>
            <th>Category Name</th>
            <th>Slug</th>
            <th>Services Mapped</th>
            <th>Sort Order</th>
            <th>Status</th>
            <th class="text-right">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($categories)): ?>
            <tr>
              <td colspan="7" class="text-center py-5 text-muted">No categories configured.</td>
            </tr>
          <?php else: ?>
            <?php foreach ($categories as $c): ?>
              <tr>
                <td>
                  <div class="p-2 rounded bg-light d-inline-block text-primary">
                    <i class="fa <?= View::e($c['icon'] ?? 'fa-wrench') ?> fa-lg"></i>
                  </div>
                </td>
                <td>
                  <div class="font-weight-bold text-dark"><?= View::e($c['name']) ?></div>
                  <div class="text-muted small"><?= View::e($c['description'] ?? '') ?></div>
                </td>
                <td>
                  <code>/<?= View::e($c['slug']) ?></code>
                </td>
                <td>
                  <span class="badge badge-light border text-dark font-weight-bold">
                    <?= (int)($c['service_count'] ?? 0) ?> services
                  </span>
                </td>
                <td>
                  <span class="badge badge-light border"><?= (int)$c['sort_order'] ?></span>
                </td>
                <td>
                  <?php if (!empty($c['is_active'])): ?>
                    <span class="badge badge-success">Active</span>
                  <?php else: ?>
                    <span class="badge badge-danger">Disabled</span>
                  <?php endif; ?>
                </td>
                <td class="text-right">
                  <form method="POST" action="<?= View::url('/admin/services/categories/' . $c['id'] . '/toggle-status') ?>" class="d-inline">
                    <?= View::csrfField() ?>
                    <button type="submit" class="btn btn-sm <?= !empty($c['is_active']) ? 'btn-outline-danger' : 'btn-outline-success' ?> py-1 px-2 font-weight-bold">
                      <?= !empty($c['is_active']) ? 'Deactivate' : 'Activate' ?>
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

<!-- Modal: Add New Category -->
<div class="modal fade" id="addCategoryModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?= View::url('/admin/services/categories') ?>">
        <?= View::csrfField() ?>
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold">Add Trade Category</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label class="font-weight-bold small">Category Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" placeholder="e.g. Pest Control Services" required>
          </div>

          <div class="form-group mb-3">
            <label class="font-weight-bold small">FontAwesome Icon Class</label>
            <input type="text" name="icon" class="form-control" value="fa-wrench" placeholder="e.g. fa-bug, fa-paint-brush">
          </div>

          <div class="form-group mb-3">
            <label class="font-weight-bold small">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="0">
          </div>

          <div class="form-group mb-3">
            <label class="font-weight-bold small">Description</label>
            <textarea name="description" class="form-control" rows="2" placeholder="Brief overview of services in this category..."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-brand font-weight-bold">Save Category</button>
        </div>
      </form>
    </div>
  </div>
</div>
