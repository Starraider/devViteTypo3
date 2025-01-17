<?php

declare(strict_types=1);

/*
 * Copyright by Sven Kalbhenn (sven@skom.de).
 * See LICENSE that was shipped with this package.
 */

namespace Skom\MigrationExtend\Migration\Migrator;

use In2code\Migration\Migration\Migrator\AbstractMigrator;
use In2code\Migration\Migration\Migrator\MigratorInterface;
// use In2code\Migration\Migration\PropertyHelpers\SlugPropertyHelper;
//use Skom\MigrationExtend\Migration\PropertyHelpers\CreateNewsCategoryRelationPropertyHelper;
//use Skom\MigrationExtend\Migration\PropertyHelpers\CreateNewsFileRelationsPropertyHelper;
//use Skom\MigrationExtend\Migration\PropertyHelpers\CreateNewsImageRelationAndMoveImagePropertyHelper;
//use Skom\MigrationExtend\Migration\PropertyHelpers\CreateNewsRelatedRelationsPropertyHelper;

/**
 * Class NewsMigrator
 * To update previous imported news records with relations
 */
class PersonMigrator extends AbstractMigrator implements MigratorInterface
{
    /**
     * @var string
     */
    protected string $tableName = 'tx_leseohren_domain_model_person';

    /**
     * @var bool
     */
    protected bool $enforce = true;

    /**
     * Filter selection of old records like "and pid > 0" (to prevent elements in a workflow e.g.)
     *
     * @var string
     */
    protected string $additionalWhere = 'and _migrated=1 and _migrated_table="00_Personen"';

    /**
     * @var array
     */
    protected array $values = [
        '_migrated_twice' => 1 // Don't migrate a second time (for other branches that should also be migrated)
    ];

    /**
     * @var array
     */
    protected array $sql = [
        'end' => [

        ]
    ];

    /**
     * @var array
     */
    protected array $propertyHelpers = [
        'languages' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetLanguagesPropertyHelper::class,
                'configuration' => [

                ]
            ]
        ],
        'membership_type' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetMembershipTypePropertyHelper::class,
                'configuration' => [

                ]
            ]
        ],
        'mandatsreferenz' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetMandatsreferenzPropertyHelper::class,
                'configuration' => [

                ]
            ]
        ],
        'membership_fee' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetMembershipFeePropertyHelper::class,
                'configuration' => [

                ]
            ]
        ],
        'bankname' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetBanknamePropertyHelper::class,
                'configuration' => [

                ]
            ]
        ],
        'iban' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetIBANPropertyHelper::class,
                'configuration' => [

                ]
            ]
        ],
        'swift' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetSwiftPropertyHelper::class,
                'configuration' => [

                ]
            ]
        ],
        'payment_method' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetPaymentMethodPropertyHelper::class,
                'configuration' => [

                ]
            ]
        ],
        'status' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetStatusMemberPropertyHelper::class,
                'configuration' => [

                ]
            ],
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetStatusVPPropertyHelper::class,
                'configuration' => [

                ]
            ]
        ],
        'statusbegin_date' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetStatusDateMemberPropertyHelper::class,
                'configuration' => [

                ]
            ],
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetStatusDateVPPropertyHelper::class,
                'configuration' => [

                ]
            ],
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\SetStatusDatePropertyHelper::class,
                'configuration' => [

                ]
            ]
        ],
        'statuschange_date' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetStatusDateMemberPropertyHelper::class,
                'configuration' => [

                ]
            ],
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetStatusDateVPPropertyHelper::class,
                'configuration' => [

                ]
            ],
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\SetStatusDatePropertyHelper::class,
                'configuration' => [

                ]
            ]
        ],
        'statusend_date' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetStatusEndDateVPPropertyHelper::class,
                'configuration' => [

                ]
            ]
        ],
        'fuehrungszeugnis_checked' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetFuehrungszeugnisVPPropertyHelper::class,
                'configuration' => [

                ]
            ]
        ],
        'preference_organization_type' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetInteressenPropertyHelper::class,
                'configuration' => [

                ]
            ]
        ],

    ];
}
