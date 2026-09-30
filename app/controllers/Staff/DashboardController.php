<?php
declare(strict_types=1);

namespace App\Controllers\Staff;

use App\Controllers\Controller;
use App\Core\Auth;
use App\Core\Request;
use App\Core\Response;
use App\Models\Job;
use App\Models\StaffEarning;
use App\Models\StaffProfile;

class DashboardController extends Controller
{
    public function index(Request $request): Response
    {
        $staffId = Auth::id();
        $todayJobs = Job::findByStaff($staffId, 'today');
        $upcomingJobs = Job::findByStaff($staffId, 'upcoming');
        $profile = StaffProfile::find($staffId);
        $earnings = StaffEarning::getByStaff($staffId);

        return $this->render('staff.dashboard', [
            'title'        => 'Technician Dashboard | Primodomus',
            'todayJobs'    => $todayJobs,
            'upcomingJobs' => $upcomingJobs,
            'profile'      => $profile,
            'earnings'     => $earnings,
        ], 'staff');
    }
}
