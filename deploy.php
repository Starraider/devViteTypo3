<?php

/*
 * Copyright by Sven Kalbhenn (sven@skom.de).
 * See LICENSE that was shipped with this package.
 */

/*
 * Project-ID: p-pey4f8
 * mw context set --project-id=p-pey4f8
 * dep deploy -vvv
 */

namespace Deployer;

require 'recipe/composer.php';
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/mittwald/deployer-recipes/recipes/deploy.php';

set('repository', 'git@github.com:Starraider/devViteTypo3.git');
set('git_recursive', true);
set('mittwald_app_dependencies', [
    'php' => '~8.2',
    'gm' => '*',
    'webp' => '*',
    'nano' => '*',
    'pdftools' => '*',
    'composer' => '>=2.0',
]);
set('web_path', 'public/');
set('public_path', 'public/');
set('deploy_path', '/current/public');
set('typo3_webroot', 'public/');
set('keep_releases', '4');

set('shared_dirs', [
    '{{typo3_webroot}}/fileadmin',
    '{{typo3_webroot}}/typo3temp',
    '{{typo3_webroot}}/uploads'
]);
set('writable_dirs', [
    '{{typo3_webroot}}/fileadmin',
    '{{typo3_webroot}}/typo3temp',
    '{{typo3_webroot}}/typo3conf',
    '{{typo3_webroot}}/uploads'
]);

set('shared_files', ['.env', '{{typo3_webroot}}/.htaccess']);

mittwald_app('2e9967b6-8ff0-4e0d-ac55-866fe5b357a9', hostname: 'beta')
    ->set('branch', 'develop')
    ->set('mittwald_domains', ['p-pey4f8.project.space']);

//mittwald_app('9bcae0f5-bf78-4d2e-adf1-5ee5c18ccc1d', hostname: 'live')
//    ->set('branch', 'main');

// after('deploy:failed', 'deploy:unlock');
