<?php
declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use App\Core\Database;
use App\Core\Request;
use App\Core\Response;
use App\Core\View;
use App\Models\User;

class StaffController extends Controller
{
    public function index(Request $request): Response
    {
        $staff = Database::fetchAll(
            "SELECT u.*, sp.rating_avg, sp.availability_note, COUNT(j.id) as total_jobs
             FROM users u
             LEFT JOIN staff_profiles sp ON u.id = sp.user_id
             LEFT JOIN jobs j ON u.id = j.staff_id
             WHERE u.role = 'staff'
             GROUP BY u.id
             ORDER BY u.name ASC"
        );

        return $this->render('admin.staff.index', [
            'title' => 'Technicians & Field Staff | Primodomus Admin',
            'staff' => $staff,
        ], 'admin');
    }

    public function create(Request $request): Response
    {
        return $this->render('admin.staff.create', ['title' => 'Add Technician | Primodomus Admin'], 'admin');
    }

    public function store(Request $request): Response
    {
        $validator = $this->validate($request, [
            'name'     => 'required|min:2',
            'phone'    => 'required|phone',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            View::setFlash('error', $validator->firstError());
            return $this->redirect('/admin/staff/create');
        }

        $userId = User::create([
            'role'          => 'staff',
            'name'          => trim((string)$request->input('name')),
            'phone'         => preg_replace('/\D/', '', (string)$request->input('phone')),
            'email'         => $request->input('email') ? trim((string)$request->input('email')) : null,
            'password_hash' => password_hash((string)$request->input('password'), PASSWORD_BCRYPT),
            'must_change_password' => 1,
            'status'        => 'active',
        ]);

        Database::query("INSERT INTO staff_profiles (user_id, rating_avg, availability_note) VALUES (:uid, 5.0, 'Available')", ['uid' => $userId]);

        View::setFlash('success', 'Technician created successfully.');
        return $this->redirect('/admin/staff');
    }

    public function show(Request $request, string $id): Response
    {
        $user = User::find((int)$id);
        $profile = Database::fetchOne("SELECT * FROM staff_profiles WHERE user_id = :id", ['id' => $id]);
        $jobs = Database::fetchAll("SELECT j.*, b.booking_no, s.name as service_name FROM jobs j JOIN bookings b ON j.booking_id = b.id JOIN services s ON b.service_id = s.id WHERE j.staff_id = :id ORDER BY j.id DESC", ['id' => $id]);

        return $this->render('admin.staff.show', [
            'title'   => "Technician: {$user['name']} | Primodomus Admin",
            'user'    => $user,
            'profile' => $profile,
            'jobs'    => $jobs,
        ], 'admin');
    }
}
