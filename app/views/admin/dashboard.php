<h3 class="font-weight-bold mb-4">Operations Dashboard</h3>
    <div class="row">
      <div class="col-md-3">
        <div class="stat-card">
          <div class="text-muted small">New Enquiries</div>
          <h2 class="font-weight-bold text-warning"><?= $summary['enquiries_count'] ?? 0 ?></h2>
        </div>
      </div>
      <div class="col-md-3">
        <div class="stat-card">
          <div class="text-muted small">Active Field Jobs</div>
          <h2 class="font-weight-bold text-info"><?= $summary['active_jobs'] ?? 0 ?></h2>
        </div>
      </div>
      <div class="col-md-3">
        <div class="stat-card">
          <div class="text-muted small">Completed Jobs</div>
          <h2 class="font-weight-bold text-success"><?= $summary['completed_jobs'] ?? 0 ?></h2>
        </div>
      </div>
      <div class="col-md-3">
        <div class="stat-card">
          <div class="text-muted small">Total Revenue</div>
          <h2 class="font-weight-bold text-dark">₹<?= number_format($summary['total_revenue'] ?? 0, 2) ?></h2>
        </div>
      </div>
    </div>
