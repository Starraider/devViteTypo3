<?php
declare(strict_types=1);
namespace Skom\MigrationExtend\Migration\Importer;

use In2code\Migration\Migration\Importer\AbstractImporter;
use In2code\Migration\Migration\Importer\ImporterInterface;

/**
 * Class EventImporter
 */
class EventImporter extends AbstractImporter implements ImporterInterface
{

    /**
     * New table should be truncated before each importer run
     *
     * @var bool
     */
    protected bool $truncate = true;

    /**
     * Use new values for .uid property
     *
     * @var bool
     */
    protected bool $keepIdentifiers = true;

    /**
     * Table where to run the migration
     *
     * @var string
     */
    protected string $tableName = 'tx_leseohren_domain_model_event';

    /**
     * Table to import from
     *
     * @var string
     */
    protected string $tableNameOld = '02_Fortbildungen';

    /**
     * Default fields
     *
     * @var array
     */
    protected array $mappingDefault = [
        'ID' => 'uid',
    ];

    /**
     * Overwrite default order by definition
     *
     * @var string
     */
    protected string $orderBy = 'ID';

    /**
     * Copy from old.fieldname to new.fieldname
     *
     * @var array
     */
    protected array $mapping = [
        'ID' => 'uid',
        'Fortbildungen' => 'title',
        'Datum' => 'start_date',
    ];

    /**
     * Hardcode some properties
     *
     * @var array
     */
    protected array $values = [
        'description' => '<f:if condition="{propertiesOld.Beschreibung}"><f:then>{propertiesOld.Beschreibung}</f:then></f:if>',
        'end_date' => '<f:if condition="{propertiesOld.Datum}"><f:then>{propertiesOld.Datum}</f:then></f:if>',
        'pid' => '21', // store events into this page
        'categories' => '1'
    ];

    /**
     * PropertyHelpers are called after initial build via mapping
     *
     *      "newProperty" => [
     *          [
     *              "className" => class1::class,
     *              "configuration => ["red"]
     *          ],
     *          [
     *              "className" => class2::class
     *          ]
     *      ]
     *
     * @var array
     */
    protected array $propertyHelpers = [
        'start_date' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\ConvertDateTimeToTimestampPropertyHelper::class,
                'configuration' => [

                ]
            ]
        ],
        'end_date' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\ConvertDateTimeToTimestampPropertyHelper::class,
                'configuration' => [

                ]
            ]
        ]
    ];
}
