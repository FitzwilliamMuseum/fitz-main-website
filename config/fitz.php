<?php

    return [

        'collections' => [
            'enabled' => env('COLLECTION_ENABLED', true),
            'url' => env('COLLECTION_URL', ''),
        ],

        'directus' => [
            'api_endpoint' => env('DIRECTUS_URL', '')
        ],

        'assets' => [
            'location' => env('CONTENT_STORE', ''),
            'missing_image_url' => env('MISSING_IMAGE_URL', '')
        ],

        'google' => [
            'analytics_id' => env('APP_GOOGLE_ANALYTICS', ''),
            'gtm_id' => env('GOOGLE_TAG_MANAGER_ID', ''),
        ],

        'shopify' => [
            'url' => env('SHOPIFY_FME_URL', ''),
            'live_url' => env('SHOPIFY_FME_LIVE_URL', ''),
            'api_key' => env('SHOPIFY_FME_API_KEY', ''),
            'password' => env('SHOPIFY_FME_API_PASSWORD', ''),
            'protocol' => env('SHOPIFY_FME_PROTOCOL', ''),
            'catalogue' => env('SHOPIFY_FME_CATALOGUE', ''),
        ],

        'elastic' => [
            'scheme' => env('ELASTIC_SCHEME', ''),
            'host' => env('ELASTIC_API', ''),
            'path' => env('ELASTIC_PATH', ''),
        ],

        'imgkit' => [
            'public_key' => env('IMGKIT_PUBLIC_KEY', ''),
            'private_key' => env('IMGKIT_PRIVATE_KEY', ''),
            'endpoint' => env('IMGKIT_ENDPOINT', ''),
        ],

        'tessitura' => [
            'endpoint' => env('TESSITURA_API_URL', ''),
            'user_id' => env('TESSITURA_USER_ID', ''),
            'password' => env('TESSITURA_PASSWORD', ''),
            'machine_name' => env('TESSITURA_MACHINE_NAME', ''),
            'location' => env('TESSITURA_LOCATION', ''),
            'booking_domain' => env('TESSITURA_BOOKING_DOMAIN', ''),
        ]

    ];
