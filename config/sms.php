<?php
declare(strict_types=1);

use App\Core\Env;

return [
    'gateway'   => Env::get('SMS_GATEWAY', 'mock'),
    'api_key'   => Env::get('SMS_API_KEY', ''),
    'sender_id' => Env::get('SMS_SENDER_ID', 'PRMOHM'),
];
