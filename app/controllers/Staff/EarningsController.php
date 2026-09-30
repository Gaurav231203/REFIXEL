<?php
declare(strict_types=1);

namespace App\Controllers\Staff;

use App\Controllers\Controller;
use App\Core\Auth;
use App\Core\Request;
use App\Core\Response;
use App\Models\StaffEarning;

class EarningsController extends Controller
{
    public function index(Request $request): Response
    {
        $earnings = StaffEarning::getByStaff(Auth::id());
        $totalEarned = array_sum(array_column($earnings, 'amount'));

        return $this->render('staff.earnings', [
            'title'       => 'My Earnings | Primodomus Staff',
            'earnings'    => $earnings,
            'totalEarned' => $totalEarned,
        ], 'staff');
    }
}
