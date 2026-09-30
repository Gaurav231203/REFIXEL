<?php
declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Core\Report;
use App\Core\Request;
use App\Core\Response;

class ReportController extends Controller
{
    public function index(Request $request): Response
    {
        $summary = Report::getAdminSummary();
        $chartData = Report::getMonthlyRevenueChartData();

        return $this->render('admin.reports.index', [
            'title'     => 'Analytics & Reports | Primodomus Admin',
            'summary'   => $summary,
            'chartData' => $chartData,
        ], 'admin');
    }
}
