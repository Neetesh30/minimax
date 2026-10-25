<?php

use App\Filament\Fabricator\PageBlocks\PrivacyPolicy;

return [
    'content' => [
        'message' => 'This website uses cookies and other tracking technologies to assist with navigation, monitor site usage and web traffic, assist with our promotions and marketing, and personalize and improve our services and websites',
        'dismiss' => 'Accept',
        'link' => 'Privacy Policy',
        'href' => '/PrivacyPolicy',
    ],
    'palette' => [
        'popup' => [
            'background' => '#696969',
            'text' => '#FFFFFF',
        ],
        'button' => [
            'background' => '#FFAB00',
            'text' => '#FFFFFF',
        ],
    ],
    'position' => 'bottom-left',
];
