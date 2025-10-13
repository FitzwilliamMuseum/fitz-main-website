<?php
namespace Deployer;

/**
 * 1. Deployer recipes we are using for this website
 */
require_once 'vendor/studio24/deployer-recipes/recipe/laravel.php';
require 'contrib/php-fpm.php';

/**
 * 2. Deployment configuration variables
 */

// Project name
set('application', 'Fitzwilliam Museum Main Website');

// Git repo
set('repository', 'git@github.com:FitzwilliamMuseum/fitz-main-website.git');

// Filesystem volume we're deploying to
set('disk_space_filesystem', '/');

/**
 * 3. Hosts
 */

host('production')
    ->set('hostname', '1.2.3.4')
    ->set('http_user', 'production')
    ->set('deploy_path', '/var/www/vhosts/DOMAIN.co.uk/production')
    ->set('log_files', [
        'storage/logs/*.log',
        '/logs/DOMAIN.co.uk.access.log',
        '/logs/DOMAIN.co.uk.error.log',
    ])
    ->set('url', 'https://www.DOMAIN.co.uk');

host('staging')
    ->set('hostname', '13.42.150.108')
    ->set('http_user', 'www-data')
    ->set('deploy_path', '/var/www/fitzmuseum.cam.uk/staging')
    ->set('log_files', [
        'storage/logs/*.log',
        '/var/log/apache2/fitzmuseum.cam.uk.access.log',
        '/var/log/apache2/fitzmuseum.cam.uk.error.log',
    ])
    ->set('url', 'https://fitzmuseum.studio24.dev');


/**
 * 4. Deployment tasks
 *
 * Any custom deployment tasks to run
 */

task('artisan:twig:clean', function() {});
task('artisan:migrate', function() {});

