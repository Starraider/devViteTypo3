<?php

/*
 * Copyright by Sven Kalbhenn (sven@skom.de).
 * See LICENSE that was shipped with this package.
 */

namespace Deployer;

require 'recipe/composer.php';
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/mittwald/deployer-recipes/recipes/deploy.php';

set('repository', 'https://github.com/Starraider/devViteTypo3.git');

mittwald_app('e0131e04-65de-4a44-8d0a-9c4e6d5f3596')
    ->set('public_path', '/public');
