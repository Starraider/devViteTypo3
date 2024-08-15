<?php

/**
 * Extension Manager/Repository config file for ext "vite_base_sitepackage".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Vite Base Sitepackage',
    'description' => '',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'bootstrap_package' => '13.0.0-14.9.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Skom\\ViteBaseSitepackage\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'author' => 'Sven Kalbhenn',
    'author_email' => 'sven@skom.de',
    'author_company' => 'SKom',
    'version' => '1.0.0',
];
