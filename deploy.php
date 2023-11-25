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

mittwald_app('p-pey4f8')
    ->set('public_path', '/public');
