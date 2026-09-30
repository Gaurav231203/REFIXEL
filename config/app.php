<?php
declare(strict_types=1);

use App\Core\Env;

return [
    'name'     => Env::get('APP_NAME', 'Primodomus'),
    'env'      => Env::get('APP_ENV', 'production'),
    'debug'    => (bool)Env::get('APP_DEBUG', false),
    'url'      => Env::get('APP_URL', 'http://localhost/website/public'),
    'timezone' => Env::get('APP_TIMEZONE', 'Asia/Kolkata'),
    'company'  => [
        'name'    => Env::get('COMPANY_NAME', 'Primodomus Home Services'),
        'phone'   => Env::get('COMPANY_PHONE', '+91 99999 99999'),
        'email'   => Env::get('COMPANY_EMAIL', 'help@primodomus.com'),
        'address' => Env::get('COMPANY_ADDRESS', 'Cyber City, DLF Phase 2, Gurugram, Haryana 122002'),
        'gstin'   => Env::get('COMPANY_GSTIN', '07AAAAA0000A1Z5'),
    ],
];
