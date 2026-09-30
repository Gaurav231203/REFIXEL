<?php
declare(strict_types=1);

namespace App\Core;

class Notifier
{
    public static function send(string $channel, string $to, string $template, array $data = []): bool
    {
        $status = 'sent';
        $error = null;

        try {
            match ($channel) {
                'email'    => self::sendEmail($to, $template, $data),
                'sms'      => self::sendSms($to, $template, $data),
                'whatsapp' => self::sendWhatsApp($to, $template, $data),
                default    => throw new \InvalidArgumentException("Unsupported notification channel: {$channel}"),
            };
        } catch (\Throwable $e) {
            $status = 'failed';
            $error = $e->getMessage();
            Logger::error("Notification failed [{$channel} to {$to}]: " . $error);
        }

        // Record in notifications table
        try {
            Database::query(
                "INSERT INTO notifications (channel, to_address, template, payload, status, error_message, created_at)
                 VALUES (:channel, :to_address, :template, :payload, :status, :error_message, NOW())",
                [
                    'channel'       => $channel,
                    'to_address'    => $to,
                    'template'      => $template,
                    'payload'       => json_encode($data),
                    'status'        => $status,
                    'error_message' => $error,
                ]
            );
        } catch (\Throwable $dbEx) {
            Logger::error("Failed to log notification to database: " . $dbEx->getMessage());
        }

        return $status === 'sent';
    }

    protected static function sendEmail(string $to, string $template, array $data): void
    {
        // Mock / SMTP abstraction
        Logger::info("Dispatched Email [{$template}] to {$to}", $data);
    }

    protected static function sendSms(string $to, string $template, array $data): void
    {
        // Mock / SMS provider adapter
        Logger::info("Dispatched SMS [{$template}] to {$to}", $data);
    }

    protected static function sendWhatsApp(string $to, string $template, array $data): void
    {
        // Mock / WhatsApp provider adapter
        Logger::info("Dispatched WhatsApp [{$template}] to {$to}", $data);
    }
}
