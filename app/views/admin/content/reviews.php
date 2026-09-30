<?php
use App\Core\View;
$reviews = $reviews ?? [];
?>

<div class="admin-reviews-page">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <div>
      <h4 class="font-weight-bold mb-1 text-dark">Customer Reviews Moderation</h4>
      <p class="text-muted small mb-0">Approve verified customer feedback before displaying on public pages.</p>
    </div>
  </div>

  <div class="stat-card p-0 overflow-hidden">
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th>Customer</th>
            <th>Service & Booking</th>
            <th>Rating</th>
            <th>Review Comment</th>
            <th>Approval Status</th>
            <th class="text-right">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($reviews)): ?>
            <tr>
              <td colspan="6" class="text-center py-5 text-muted">
                <i class="fa fa-star-o fa-2x mb-2 d-block text-muted" style="opacity: 0.3;"></i>
                No customer reviews submitted yet.
              </td>
            </tr>
          <?php else: ?>
            <?php foreach ($reviews as $r): ?>
              <tr>
                <td>
                  <strong class="text-dark"><?= View::e($r['customer_name']) ?></strong>
                  <div class="text-muted small"><?= View::e(substr((string)$r['created_at'], 0, 10)) ?></div>
                </td>
                <td>
                  <div class="small font-weight-bold text-dark"><?= View::e($r['service_name']) ?></div>
                  <div class="text-muted" style="font-size: 11px;">#<?= View::e($r['booking_no']) ?></div>
                </td>
                <td>
                  <span class="badge badge-warning text-dark font-weight-bold">
                    <?= (int)$r['rating'] ?> ★
                  </span>
                </td>
                <td>
                  <div class="text-dark small" style="max-width: 380px;">
                    "<?= View::e($r['comment']) ?>"
                  </div>
                </td>
                <td>
                  <?php if (!empty($r['is_approved'])): ?>
                    <span class="badge badge-success"><i class="fa fa-check mr-1"></i>Approved Live</span>
                  <?php else: ?>
                    <span class="badge badge-warning text-dark"><i class="fa fa-clock-o mr-1"></i>Pending Review</span>
                  <?php endif; ?>
                </td>
                <td class="text-right">
                  <?php if (empty($r['is_approved'])): ?>
                    <form method="POST" action="<?= View::url('/admin/content/reviews/' . $r['id'] . '/approve') ?>" class="d-inline mr-1">
                      <?= View::csrfField() ?>
                      <button type="submit" class="btn btn-sm btn-success py-1 px-2 font-weight-bold">
                        <i class="fa fa-check mr-1"></i>Approve
                      </button>
                    </form>
                  <?php endif; ?>

                  <form method="POST" action="<?= View::url('/admin/content/reviews/' . $r['id'] . '/delete') ?>" class="d-inline" onsubmit="return confirm('Delete this review?')">
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
