<?php
declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Core\Report;
use App\Core\Request;
use App\Core\Response;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index(Request $request): Response
    {
        $summary = Report::getAdminSummary();
        $chartData = Report::getMonthlyRevenueChartData();
        $recentBookings = Booking::all('id DESC LIMIT 10');

        return $this->render('admin.dashboard', [
            'title'          => 'Admin Dashboard | Primodomus',
            'summary'        => $summary,
            'chartData'      => $chartData,
            'recentBookings' => $recentBookings,
        ], 'admin');
    }
}
