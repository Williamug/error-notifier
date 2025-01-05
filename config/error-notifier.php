<?php

// config for Williamug/ErrorNotifier
return [
    // Email Settings
    'recipients' => env('EXCEPTION_MAIL_RECIPIENTS', 'admin@example.com'),
    'enabled' => env('EXCEPTION_MAIL_ENABLED', true),

    // Slack Settings
    'slack' => [
        'enabled' => env('EXCEPTION_SLACK_ENABLED', false),
        'webhook_url' => env('EXCEPTION_SLACK_WEBHOOK', ''),
    ],
];
