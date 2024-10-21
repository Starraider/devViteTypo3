<?php
declare(strict_types=1);
namespace Skom\MigrationExtend\Migration\Importer;

use In2code\Migration\Migration\Importer\AbstractImporter;
use In2code\Migration\Migration\Importer\ImporterInterface;

/**
 * Class PersonCategoryImporter
 */
class PersonCategoryImporter extends AbstractImporter implements ImporterInterface
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
    protected string $tableNameOld = '09_Personen_Rollen';

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
        'Personen' => 'uid_foreign',
    ];

    /**
     * Hardcode some properties
     *
     * @var array
     */
    protected array $values = [
        'uid_local' => '<f:switch expression="{propertiesOld.Rollen}"><f:case value="1">3</f:case><f:case value="2">2</f:case><f:case value="3">7</f:case><f:case value="4">4</f:case><f:case value="5">5</f:case><f:case value="6">8</f:case><f:case value="7">9</f:case></f:switch>',
        'tablenames' => 'tx_leseohren_domain_model_person',
        'fieldname' => 'categories',
        'sorting_foreign' => '1',
    ];
    //'uid_local' => '<f:if condition="{propertiesOld.Rollen} == 1"><f:then>3</f:then><f:else if="{propertiesOld.Rollen} == 2"><f:then>2</f:then></f:else></f:if>',


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
