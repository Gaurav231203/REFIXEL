<?php
declare(strict_types=1);

namespace App\Controllers\Staff;

use App\Controllers\Controller;
use App\Core\Auth;
use App\Core\Request;
use App\Core\Response;
use App\Models\StaffProfile;

class ProfileController extends Controller
{
    public function index(Request $request): Response
    {
        $user = Auth::user();
        $profile = StaffProfile::find($user['id']);

        return $this->render('staff.profile', [
            'title'   => 'My Profile | Primodomus Staff',
            'user'    => $user,
            'profile' => $profile,
        ], 'staff');
    }
}
