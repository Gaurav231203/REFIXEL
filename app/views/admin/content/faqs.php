<?php
use App\Core\View;
$faqs = $faqs ?? [];
$services = $services ?? [];
?>

<div class="admin-faqs-page">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h4 class="font-weight-bold mb-1 text-dark">Frequently Asked Questions (CMS)</h4>
      <p class="text-muted small mb-0">Public FAQ accordions rendered on the homepage and service category pages.</p>
    </div>

    <div>
      <button type="button" class="btn btn-sm btn-brand font-weight-bold" data-toggle="modal" data-target="#addFaqModal">
        <i class="fa fa-plus mr-1"></i>Add FAQ
      </button>
    </div>
  </div>

  <div class="stat-card p-0 overflow-hidden">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th>Question</th>
            <th>Associated Service</th>
            <th>Sort</th>
            <th>Status</th>
            <th class="text-right">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($faqs)): ?>
            <tr><td colspan="5" class="text-center py-4 text-muted">No FAQs found.</td></tr>
          <?php else: ?>
            <?php foreach ($faqs as $f): ?>
              <tr>
                <td>
                  <strong class="text-dark"><?= View::e($f['question']) ?></strong>
                  <div class="text-muted small mt-1 text-truncate" style="max-width: 450px;"><?= View::e($f['answer']) ?></div>
                </td>
                <td>
                  <span class="badge badge-light border"><?= View::e($f['service_name'] ?? 'Global FAQ') ?></span>
                </td>
                <td><?= (int)$f['sort_order'] ?></td>
                <td>
                  <span class="badge <?= !empty($f['is_active']) ? 'badge-success' : 'badge-secondary' ?>">
                    <?= !empty($f['is_active']) ? 'Active' : 'Disabled' ?>
                  </span>
                </td>
                <td class="text-right">
                  <form method="POST" action="<?= View::url('/admin/content/faqs/' . $f['id'] . '/delete') ?>" class="d-inline" onsubmit="return confirm('Delete this FAQ?')">
                    <?= View::csrfField() ?>
                    <button type="submit" class="btn btn-sm btn-outline-danger py-1 px-2">
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

<!-- Modal: Add FAQ -->
<div class="modal fade" id="addFaqModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?= View::url('/admin/content/faqs') ?>">
        <?= View::csrfField() ?>
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold">Add New FAQ</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-3">
            <label class="font-weight-bold small">Question <span class="text-danger">*</span></label>
            <input type="text" name="question" class="form-control" placeholder="e.g. Do I need to provide cleaning chemicals?" required>
          </div>

          <div class="form-group mb-3">
            <label class="font-weight-bold small">Answer <span class="text-danger">*</span></label>
            <textarea name="answer" class="form-control" rows="3" placeholder="Clear, concise explanation..." required></textarea>
          </div>

          <div class="form-group mb-3">
            <label class="font-weight-bold small">Associated Service (Optional)</label>
            <select name="service_id" class="form-control">
              <option value="0">Global FAQ (Applies to all services)</option>
              <?php foreach ($services as $svc): ?>
                <option value="<?= $svc['id'] ?>"><?= View::e($svc['name']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group mb-3">
            <label class="font-weight-bold small">Sort Order</label>
            <input type="number" name="sort_order" class="form-control" value="0">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-brand font-weight-bold">Save FAQ</button>
        </div>
      </form>
    </div>
  </div>
</div>
