<div class="p-2">
      <h4 class="font-weight-bold mb-3">Assigned Jobs Overview</h4>
      <div class="row">
        <div class="col-6 mb-3">
          <div class="job-card text-center">
            <div class="text-muted small">Today's Jobs</div>
            <h3 class="font-weight-bold text-primary mb-0"><?= count($todayJobs ?? []) ?></h3>
          </div>
        </div>
        <div class="col-6 mb-3">
          <div class="job-card text-center">
            <div class="text-muted small">My Rating</div>
            <h3 class="font-weight-bold text-warning mb-0">5.0★</h3>
          </div>
        </div>
      </div>
    </div>
