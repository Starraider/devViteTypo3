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
class OrganisationMigrator extends AbstractMigrator implements MigratorInterface
{
    /**
     * @var string
     */
    protected string $tableName = 'tx_leseohren_domain_model_organization';

    /**
     * @var bool
     */
    protected bool $enforce = true;

    /**
     * Filter selection of old records like "and pid > 0" (to prevent elements in a workflow e.g.)
     *
     * @var string
     */
    protected string $additionalWhere = 'and _migrated=1 and _migrated_table="00_Einrichtungen"';

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
        'vp_languages' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\GetLanguagesOrgPropertyHelper::class,
                'configuration' => [

                ]
            ]
        ],


    ];
}
