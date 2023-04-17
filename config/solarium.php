<?php

return [
    'enabled' => env('SOLR_ENABLED', false),
    'endpoint' => [
        'localhost' => [
            'host' => env('SOLR_HOST'),
            'port' => env('SOLR_PORT', '8983'),
            'path' => env('SOLR_PATH', '/'),
            'core' => env('SOLR_CORE')
        ]
    ]
];
