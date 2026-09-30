<?php
declare(strict_types=1);

namespace App\Core;

class Report
{
    public static function getAdminSummary(): array
    {
        $enquiriesCount = (int)(Database::fetchOne("SELECT COUNT(*) as c FROM bookings WHERE status = 'new'")['c'] ?? 0);
        $activeJobs = (int)(Database::fetchOne("SELECT COUNT(*) as c FROM jobs WHERE status IN ('assigned', 'accepted', 'in_progress')")['c'] ?? 0);
        $completedJobs = (int)(Database::fetchOne("SELECT COUNT(*) as c FROM jobs WHERE status = 'completed'")['c'] ?? 0);
        $totalRevenue = (float)(Database::fetchOne("SELECT SUM(amount) as s FROM payments WHERE status = 'paid'")['s'] ?? 0.0);
        $pendingPayments = (float)(Database::fetchOne("SELECT SUM(amount) as s FROM payments WHERE status = 'pending'")['s'] ?? 0.0);
        $staffCount = (int)(Database::fetchOne("SELECT COUNT(*) as c FROM users WHERE role = 'staff' AND status = 'active'")['c'] ?? 0);
        $servicesCount = (int)(Database::fetchOne("SELECT COUNT(*) as c FROM services WHERE is_active = 1")['c'] ?? 0);

        return [
            'enquiries_count'  => $enquiriesCount,
            'active_jobs'      => $activeJobs,
            'completed_jobs'   => $completedJobs,
            'total_revenue'    => $totalRevenue,
            'pending_payments' => $pendingPayments,
            'staff_count'      => $staffCount,
            'services_count'   => $servicesCount,
        ];
    }

    public static function getMonthlyRevenueChartData(): array
    {
        $rows = Database::fetchAll(
            "SELECT DATE_FORMAT(paid_at, '%b %Y') as month, SUM(amount) as total
             FROM payments
             WHERE status = 'paid' AND paid_at >= DATE_SUB(NOW(), INTERVAL 6 MONTH)
             GROUP BY DATE_FORMAT(paid_at, '%Y-%m')
             ORDER BY DATE_FORMAT(paid_at, '%Y-%m') ASC"
        );

        $labels = [];
        $data = [];
        foreach ($rows as $r) {
            $labels[] = $r['month'];
            $data[] = (float)$r['total'];
        }

        return ['labels' => $labels, 'data' => $data];
    }
}
