<?php
declare(strict_types=1);

namespace App\Models;

class StaffProfile extends Model
{
    protected static string $table = 'staff_profiles';
    protected static string $primaryKey = 'user_id';
}
