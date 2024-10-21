<?php
return [
    // Default values if not given from CLI
    'configuration' => [
        'key' => '',
        'dryrun' => true,
        'limitToRecord' => null,
        'limitToPage' => null,
        'recursive' => false
    ],

    // Define your migrations
    'migrations' => [
        [
            'className' => \Skom\MigrationExtend\Migration\Importer\PersonenImporter::class,
            'keys' => [
                'person'
            ]
        ],
        [
            'className' => \Skom\MigrationExtend\Migration\Importer\PersonCategoryImporter::class,
            'keys' => [
                'person'
            ]
        ],
        [
            'className' => \Skom\MigrationExtend\Migration\Importer\EventImporter::class,
            'keys' => [
                'event'
            ]
        ],
        [
            'className' => \Skom\MigrationExtend\Migration\Importer\EventCategoryImporter::class,
            'keys' => [
                'event'
            ]
        ],
        [
            'className' => \Skom\MigrationExtend\Migration\Importer\GiftImporter::class,
            'keys' => [
                'gift'
            ]
        ],
        [
            'className' => \Skom\MigrationExtend\Migration\Importer\PresentImporter::class,
            'keys' => [
                'gift',
                'person'
            ]
        ],
        [
            'className' => \Skom\MigrationExtend\Migration\Importer\OrganisationImporter::class,
            'keys' => [
                'organisation'
            ]
        ],
        [
            'className' => \Skom\MigrationExtend\Migration\Importer\OrganisationCategoryImporter::class,
            'keys' => [
                'organisation'
            ]
        ],
        [
            'className' => \Skom\MigrationExtend\Migration\Importer\VPImporter::class,
            'keys' => [
                'organisation',
                'person'
            ]
        ],
        [
            'className' => \Skom\MigrationExtend\Migration\Importer\PersonEventImporter::class,
            'keys' => [
                'event',
                'person'
            ]
        ],
        [
            'className' => \Skom\MigrationExtend\Migration\Migrator\PersonMigrator::class,
            'keys' => [
                'person'
            ]
        ],
        [
            'className' => \Skom\MigrationExtend\Migration\Migrator\OrganisationMigrator::class,
            'keys' => [
                'organisation'
            ]
        ]

    ]
];
