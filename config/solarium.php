<?php

return [
    'endpoint' => [
        'localhost' => [
            'host' => env('SOLR_HOST', '131.111.22.71'),
            'port' => env('SOLR_PORT', '8983'),
            'path' => env('SOLR_PATH', ''),
            'core' => env('SOLR_CORE', 'direct')
        ]
    ]
];
