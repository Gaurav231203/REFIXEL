<?php
declare(strict_types=1);

namespace App\Models;

use App\Core\Database;

class JobPhoto extends Model
{
    protected static string $table = 'job_photos';

    public static function getByJob(int $jobId): array
    {
        return Database::fetchAll("SELECT * FROM job_photos WHERE job_id = :jid ORDER BY type ASC, created_at ASC", ['jid' => $jobId]);
    }
}
