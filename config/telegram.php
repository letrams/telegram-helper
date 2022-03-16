<?php

return [

    'TOKEN' => env('TELEGRAM_TOKEN'),

    'TELEGRAM_API_BASE_URL' => env('TELEGRAM_API_BASE_URL', 'https://api.telegram.org/bot'),

    // роутинг для вебхука
    'TELEGRAM_WEBHOOK_URL' => env('TELEGRAM_WEBHOOK_ROUTE_NAME', 'telegram.webhook'),

];
