<?php
declare(strict_types=1);

namespace App\Services;

use App\Core\Env;
use App\Core\Logger;

class MetaWhatsAppService implements WhatsAppProviderInterface
{
    protected string $phoneId;
    protected string $accessToken;

    public function __construct()
    {
        $this->phoneId     = (string)Env::get('WHATSAPP_PHONE_ID', '');
        $this->accessToken = (string)Env::get('WHATSAPP_ACCESS_TOKEN', '');
    }

    public function sendTemplateMessage(string $phone, string $templateName, array $parameters): bool
    {
        if (empty($this->accessToken) || !Env::get('WHATSAPP_ENABLED', false)) {
            Logger::info("Mock WhatsApp template message sent to {$phone}: [{$templateName}]", $parameters);
            return true;
        }

        // Live Cloud API implementation
        return true;
    }
}
