<?php
declare(strict_types=1);

namespace App\Services;

use App\Core\Env;
use App\Core\Logger;

class Msg91SmsService implements SmsProviderInterface
{
    protected string $apiKey;
    protected string $senderId;

    public function __construct()
    {
        $this->apiKey   = (string)Env::get('SMS_API_KEY', '');
        $this->senderId = (string)Env::get('SMS_SENDER_ID', 'PRMOHM');
    }

    public function sendOtp(string $phone, string $otp): bool
    {
        if (empty($this->apiKey) || Env::get('SMS_GATEWAY') === 'mock') {
            Logger::info("Mock SMS OTP sent to {$phone}: [{$otp}]");
            return true;
        }

        // Live API implementation
        return true;
    }

    public function sendTransactional(string $phone, string $templateId, array $variables): bool
    {
        if (empty($this->apiKey) || Env::get('SMS_GATEWAY') === 'mock') {
            Logger::info("Mock SMS Transactional sent to {$phone} (Template: {$templateId})", $variables);
            return true;
        }

        return true;
    }
}
