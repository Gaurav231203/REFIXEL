<?php
declare(strict_types=1);

namespace App\Controllers\Staff;

use App\Controllers\Controller;
use App\Core\Auth;
use App\Core\Request;
use App\Core\Response;
use App\Core\Workflow;
use App\Models\Job;
use App\Models\JobPhoto;
use App\Models\StatusHistory;

class JobController extends Controller
{
    public function index(Request $request): Response
    {
        $filter = $request->query('filter', 'today');
        $jobs = Job::findByStaff(Auth::id(), $filter);

        return $this->render('staff.jobs.index', [
            'title'  => 'My Assigned Jobs | Primodomus Staff',
            'jobs'   => $jobs,
            'filter' => $filter,
        ], 'staff');
    }

    public function show(Request $request, string $id): Response
    {
        $job = Job::findWithDetailsForStaff((int)$id, Auth::id());
        if (!$job) {
            return $this->render('partials.404', ['title' => 'Job Not Found'], 'staff')->setStatusCode(404);
        }

        $history = StatusHistory::getByJob((int)$id);
        $photos = JobPhoto::getByJob((int)$id);

        return $this->render('staff.jobs.show', [
            'title'   => "Job #{$job['id']} - {$job['service_name']} | Primodomus Staff",
            'job'     => $job,
            'history' => $history,
            'photos'  => $photos,
        ], 'staff');
    }

    public function complete(Request $request, string $id): Response
    {
        $job = Job::findWithDetailsForStaff((int)$id, Auth::id());
        if (!$job) {
            return $this->render('partials.404', ['title' => 'Job Not Found'], 'staff')->setStatusCode(404);
        }

        return $this->render('staff.jobs.complete', [
            'title' => "Complete Job #{$id} | Primodomus Staff",
            'job'   => $job,
        ], 'staff');
    }
}
