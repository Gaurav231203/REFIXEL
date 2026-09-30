<div class="container py-5 my-3">
  <!-- Breadcrumb -->
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent p-0 mb-4" style="font-size: 14px;">
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/') ?>" style="color:#0f6e56;">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= \App\Core\View::url('/account') ?>" style="color:#0f6e56;">My Account</a></li>
      <li class="breadcrumb-item active" aria-current="page">Privacy & Data Rights</li>
    </ol>
  </nav>

  <div class="row">
    <!-- Account Sidebar Navigation -->
    <div class="col-lg-3 mb-4">
      <div class="card p-3 border-0 shadow-sm" style="border-radius: 14px;">
        <div class="d-flex align-items-center p-2 mb-3 border-bottom pb-3">
          <img src="<?= \App\Core\View::asset('img/account.webp') ?>" alt="User" class="rounded-circle mr-3" style="width: 48px; height: 48px;">
          <div>
            <h6 class="font-weight-bold mb-0"><?= \App\Core\View::e($user['name']) ?></h6>
            <small class="text-muted"><?= \App\Core\View::e($user['phone'] ?? $user['email']) ?></small>
          </div>
        </div>

        <div class="list-group list-group-flush" style="font-size: 14.5px;">
          <a href="<?= \App\Core\View::url('/account') ?>" class="list-group-item list-group-item-action border-0">
            <i class="fa fa-dashboard mr-2"></i> Dashboard Overview
          </a>
          <a href="<?= \App\Core\View::url('/account/bookings') ?>" class="list-group-item list-group-item-action border-0">
            <i class="fa fa-calendar mr-2"></i> My Bookings
          </a>
          <a href="<?= \App\Core\View::url('/account/invoices') ?>" class="list-group-item list-group-item-action border-0">
            <i class="fa fa-file-text-o mr-2"></i> Invoices & Receipts
          </a>
          <a href="<?= \App\Core\View::url('/account/profile') ?>" class="list-group-item list-group-item-action border-0">
            <i class="fa fa-user-circle mr-2"></i> Profile & Address
          </a>
          <a href="<?= \App\Core\View::url('/account/privacy') ?>" class="list-group-item list-group-item-action border-0 font-weight-bold text-success">
            <i class="fa fa-shield mr-2"></i> Privacy & Data Rights
          </a>
          <a href="<?= \App\Core\View::url('/logout') ?>" class="list-group-item list-group-item-action border-0 text-danger">
            <i class="fa fa-sign-out mr-2"></i> Sign Out
          </a>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div class="col-lg-9">
      <div class="card p-4 p-md-5 border-0 shadow-sm mb-4" style="border-radius: 16px;">
        <h3 class="font-weight-bold mb-2" style="font-size: 24px; color: #1a1a1a;">
          <i class="fa fa-shield text-success mr-2"></i> Privacy & Data Governance
        </h3>
        <p class="text-muted small mb-4">
          In alignment with the Digital Personal Data Protection (DPDP) Act, Primodomus provides full transparency into your personal data processing, active consents, and data rights.
        </p>

        <!-- Data Portability / Export -->
        <div class="p-3 mb-4 rounded border" style="background: #f8fafc;">
          <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
            <div class="mb-3 mb-md-0">
              <h6 class="font-weight-bold mb-1 text-dark">Data Portability (Export Your Information)</h6>
              <p class="small text-muted mb-0">Download a complete, machine-readable JSON copy of your profile, bookings, reviews, and consent trail.</p>
            </div>
            <a href="<?= \App\Core\View::url('/account/privacy/export') ?>" class="btn btn-outline-success font-weight-bold px-3 py-2 btn-sm text-nowrap">
              <i class="fa fa-download mr-1"></i> Export Data (JSON)
            </a>
          </div>
        </div>

        <!-- Consent Audit Trail -->
        <h5 class="font-weight-bold mb-3" style="font-size: 17px;">Consent Audit Log</h5>
        <div class="table-responsive mb-4">
          <table class="table table-bordered table-sm mb-0" style="font-size: 13.5px;">
            <thead class="thead-light">
              <tr>
                <th>Purpose</th>
                <th>Timestamp (IST)</th>
                <th>IP Address</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($consents)): ?>
                <?php foreach ($consents as $c): ?>
                  <tr>
                    <td class="font-weight-bold"><?= \App\Core\View::e(str_replace('_', ' ', ucwords($c['purpose']))) ?></td>
                    <td><?= \App\Core\View::e($c['granted_at']) ?></td>
                    <td class="text-muted font-monospace"><?= \App\Core\View::e($c['ip']) ?></td>
                    <td><span class="badge badge-success px-2 py-1">Active</span></td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="4" class="text-center text-muted py-3">No explicit consent records recorded yet.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

        <!-- Right to Erasure / Data Deletion Request -->
        <div class="p-3 rounded border border-danger-subtle" style="background: #fffafa;">
          <h6 class="font-weight-bold text-danger mb-1">
            <i class="fa fa-exclamation-triangle mr-1"></i> Right to Erasure / Data Deletion Request
          </h6>
          <p class="small text-muted mb-3">
            You may request the permanent deletion of your personal account data. Please note that statutory records (such as GST-compliant tax invoices and transaction ledgers) must be retained under applicable Indian tax laws for statutory retention periods.
          </p>

          <form action="<?= \App\Core\View::url('/account/privacy/delete-request') ?>" method="POST" onsubmit="return confirm('Are you sure you wish to submit a data erasure request? This action will initiate account deactivation.');">
            <?= \App\Core\View::csrf() ?>
            <div class="form-group mb-2">
              <label class="small font-weight-bold">Reason for Deletion Request (Optional)</label>
              <textarea name="reason" class="form-control form-control-sm" rows="2" placeholder="Briefly describe your reason for requesting erasure..."></textarea>
            </div>
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input" id="confirmErasure" name="confirm_erasure" value="1" required>
              <label class="custom-control-label small" for="confirmErasure">
                I understand that submitting this request will initiate account closure and anonymization of my customer profile.
              </label>
            </div>
            <button type="submit" class="btn btn-danger btn-sm font-weight-bold px-3 py-2">
              Submit Erasure Request
            </button>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
