<?php
declare(strict_types=1);
namespace Skom\MigrationExtend\Migration\Importer;

use In2code\Migration\Migration\Importer\AbstractImporter;
use In2code\Migration\Migration\Importer\ImporterInterface;

/**
 * Class EventCategoryImporter
 */
class EventCategoryImporter extends AbstractImporter implements ImporterInterface
{

    /**
     * New table should be truncated before each importer run
     *
     * @var bool
     */
    protected bool $truncate = false;

    /**
     * Use new values for .uid property
     *
     * @var bool
     */
    protected bool $keepIdentifiers = false;

    /**
     * Table where to run the migration
     *
     * @var string
     */
    protected string $tableName = 'sys_category_record_mm';

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
        'ID' => 'uid_foreign',
    ];

    /**
     * Hardcode some properties
     *
     * @var array
     */
    protected array $values = [
        'uid_local' => '19',
        'tablenames' => 'tx_leseohren_domain_model_event',
        'fieldname' => 'categories',
        'sorting_foreign' => '1',
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
    // protected array $propertyHelpers = [
    //     'start_date' => [
    //         [
    //             'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\ConvertDateTimeToTimestampPropertyHelper::class,
    //             'configuration' => [

    //             ]
    //         ]
    //     ]
    // ];
}
