<?php
use App\Core\View;
$items = $items ?? [];
$services = $services ?? [];
$currentServiceId = $currentServiceId ?? 0;
?>

<div class="admin-checklists">
  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap" style="gap: 15px;">
    <div>
      <h2 class="font-weight-bold text-dark mb-1">Service Checklists & Scope</h2>
      <p class="text-muted small mb-0">Manage customer-facing service inclusions and exclusions displayed on service pages.</p>
    </div>
    <div>
      <button class="btn btn-brand font-weight-bold" data-toggle="modal" data-target="#addChecklistModal">
        <i class="fa fa-plus mr-1"></i>Add Checklist Item
      </button>
    </div>
  </div>

  <!-- Filter by Service -->
  <div class="card p-3 border-0 shadow-sm mb-4">
    <form method="GET" action="<?= View::url('/admin/content/checklists') ?>" class="form-inline">
      <label class="font-weight-bold small mr-2">Filter by Service:</label>
      <select name="service_id" class="form-control form-control-sm mr-2" onchange="this.form.submit()">
        <option value="0">All Services</option>
        <?php foreach ($services as $svc): ?>
          <option value="<?= (int)$svc['id'] ?>" <?= $currentServiceId === (int)$svc['id'] ? 'selected' : '' ?>>
            <?= View::e($svc['name']) ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php if ($currentServiceId > 0): ?>
        <a href="<?= View::url('/admin/content/checklists') ?>" class="btn btn-sm btn-link text-muted">Clear Filter</a>
      <?php endif; ?>
    </form>
  </div>

  <div class="stat-card p-0 overflow-hidden">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th>Service</th>
            <th>Type</th>
            <th>Scope / Checklist Item</th>
            <th class="text-center" style="width: 100px;">Sort</th>
            <th class="text-right" style="width: 100px;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($items)): ?>
            <tr>
              <td colspan="5" class="text-center py-5 text-muted">No checklist items found.</td>
            </tr>
          <?php else: ?>
            <?php foreach ($items as $item): ?>
              <tr>
                <td class="font-weight-bold text-dark"><?= View::e($item['service_name']) ?></td>
                <td>
                  <?php if (!empty($item['is_included'])): ?>
                    <span class="badge badge-success px-2 py-1"><i class="fa fa-check mr-1"></i>Included</span>
                  <?php else: ?>
                    <span class="badge badge-danger px-2 py-1"><i class="fa fa-times mr-1"></i>Excluded</span>
                  <?php endif; ?>
                </td>
                <td class="text-dark"><?= View::e($item['label']) ?></td>
                <td class="text-center text-muted small"><?= (int)$item['sort_order'] ?></td>
                <td class="text-right">
                  <form method="POST" action="<?= View::url('/admin/content/checklists/' . (int)$item['id'] . '/delete') ?>" class="d-inline" onsubmit="return confirm('Delete this checklist item?');">
                    <?= View::csrfField() ?>
                    <button type="submit" class="btn btn-sm btn-outline-danger py-0 px-2" style="font-size: 11px;">
                      <i class="fa fa-trash"></i>
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

<!-- Modal: Add Checklist Item -->
<div class="modal fade" id="addChecklistModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?= View::url('/admin/content/checklists') ?>">
        <?= View::csrfField() ?>
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold">Add Service Checklist Item</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label class="font-weight-bold small">Service <span class="text-danger">*</span></label>
            <select name="service_id" class="form-control" required>
              <option value="">Select Service</option>
              <?php foreach ($services as $svc): ?>
                <option value="<?= (int)$svc['id'] ?>" <?= $currentServiceId === (int)$svc['id'] ? 'selected' : '' ?>>
                  <?= View::e($svc['name']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group mb-3">
            <label class="font-weight-bold small">Item Scope Type <span class="text-danger">*</span></label>
            <div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="type_inc" name="is_included" value="1" class="custom-control-input" checked>
                <label class="custom-control-label text-success font-weight-bold" for="type_inc">What's Included</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="type_exc" name="is_included" value="0" class="custom-control-input">
                <label class="custom-control-label text-danger font-weight-bold" for="type_exc">What's Not Included</label>
              </div>
            </div>
          </div>
          <div class="form-group mb-3">
            <label class="font-weight-bold small">Checklist Item Description <span class="text-danger">*</span></label>
            <input type="text" name="label" class="form-control" placeholder="e.g. Mechanized single-disc floor scrubbing" required>
          </div>
          <div class="form-group mb-3">
            <label class="font-weight-bold small">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="0">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-brand font-weight-bold">Save Item</button>
        </div>
      </form>
    </div>
  </div>
</div>
