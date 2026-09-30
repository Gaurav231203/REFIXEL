<?php
declare(strict_types=1);

namespace App\Core;

use RuntimeException;

class Workflow
{
    public const STATUS_NEW         = 'new';
    public const STATUS_ASSIGNED    = 'assigned';
    public const STATUS_ACCEPTED    = 'accepted';
    public const STATUS_IN_PROGRESS = 'in_progress';
    public const STATUS_COMPLETED   = 'completed';
    public const STATUS_INVOICED    = 'invoiced';
    public const STATUS_REVIEWED    = 'reviewed';
    public const STATUS_CLOSED      = 'closed';
    public const STATUS_CANCELLED   = 'cancelled';

    /**
     * Allowed forward status transitions.
     */
    protected const ALLOWED_TRANSITIONS = [
        self::STATUS_NEW => [
            self::STATUS_ASSIGNED,
            self::STATUS_CANCELLED,
        ],
        self::STATUS_ASSIGNED => [
            self::STATUS_ACCEPTED,
            self::STATUS_ASSIGNED, // reassignment
            self::STATUS_CANCELLED,
        ],
        self::STATUS_ACCEPTED => [
            self::STATUS_IN_PROGRESS,
            self::STATUS_ASSIGNED, // technician declined / reassigned
            self::STATUS_CANCELLED,
        ],
        self::STATUS_IN_PROGRESS => [
            self::STATUS_COMPLETED,
            self::STATUS_CANCELLED,
        ],
        self::STATUS_COMPLETED => [
            self::STATUS_INVOICED,
            self::STATUS_REVIEWED,
            self::STATUS_CLOSED,
        ],
        self::STATUS_INVOICED => [
            self::STATUS_REVIEWED,
            self::STATUS_CLOSED,
        ],
        self::STATUS_REVIEWED => [
            self::STATUS_CLOSED,
        ],
        self::STATUS_CLOSED => [],
        self::STATUS_CANCELLED => [],
    ];

    public static function canTransition(string $currentStatus, string $newStatus, string $role): bool
    {
        if (!isset(self::ALLOWED_TRANSITIONS[$currentStatus])) {
            return false;
        }

        if (!in_array($newStatus, self::ALLOWED_TRANSITIONS[$currentStatus], true)) {
            return false;
        }

        // Role-based authorization rules
        return match ($role) {
            'admin' => true, // Admin can execute all valid transitions
            'staff' => match ($newStatus) {
                self::STATUS_ACCEPTED,
                self::STATUS_IN_PROGRESS,
                self::STATUS_COMPLETED => true,
                default => false,
            },
            'customer' => match ($newStatus) {
                self::STATUS_CANCELLED => in_array($currentStatus, [self::STATUS_NEW, self::STATUS_ASSIGNED], true),
                self::STATUS_REVIEWED => in_array($currentStatus, [self::STATUS_COMPLETED, self::STATUS_INVOICED], true),
                default => false,
            },
            default => false,
        };
    }

    public static function transition(
        int $jobId,
        string $newStatus,
        int $changedByUserId,
        string $role,
        ?string $notes = null
    ): void {
        $job = Database::fetchOne("SELECT id, status FROM jobs WHERE id = :id", ['id' => $jobId]);
        if (!$job) {
            throw new RuntimeException("Job #{$jobId} not found.");
        }

        $currentStatus = (string)$job['status'];

        if (!self::canTransition($currentStatus, $newStatus, $role)) {
            throw new RuntimeException("Invalid status transition from '{$currentStatus}' to '{$newStatus}' for role '{$role}'.");
        }

        Database::beginTransaction();
        try {
            // Update jobs table
            Database::query(
                "UPDATE jobs SET status = :status, updated_at = NOW() WHERE id = :id",
                ['status' => $newStatus, 'id' => $jobId]
            );

            // Record in status_history
            Database::query(
                "INSERT INTO status_history (job_id, from_status, to_status, changed_by, notes, created_at)
                 VALUES (:job_id, :from_status, :to_status, :changed_by, :notes, NOW())",
                [
                    'job_id'      => $jobId,
                    'from_status' => $currentStatus,
                    'to_status'   => $newStatus,
                    'changed_by'  => $changedByUserId,
                    'notes'       => $notes,
                ]
            );

            Database::commit();
        } catch (\Throwable $e) {
            Database::rollBack();
            throw $e;
        }
    }
}
