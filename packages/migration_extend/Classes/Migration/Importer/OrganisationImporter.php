<?php
declare(strict_types=1);
namespace Skom\MigrationExtend\Migration\Importer;

use In2code\Migration\Migration\Importer\AbstractImporter;
use In2code\Migration\Migration\Importer\ImporterInterface;

/**
 * Class OrganisationImporter
 */
class OrganisationImporter extends AbstractImporter implements ImporterInterface
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
    protected string $tableName = 'tx_leseohren_domain_model_organization';

    /**
     * Table to import from
     *
     * @var string
     */
    protected string $tableNameOld = '00_Einrichtungen';

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
        'Einrichtungen' => 'name',
    ];

    /**
     * Hardcode some properties
     *
     * @var array
     */
    protected array $values = [
        'vp_number' => '<f:if condition="{propertiesOld.anzahl_paten}"><f:then>{propertiesOld.anzahl_paten}</f:then><f:else>0</f:else></f:if>',
        'email' => '<f:if condition="{propertiesOld.email}"><f:then>{propertiesOld.email}</f:then></f:if>',
        'phone1' => '<f:if condition="{propertiesOld.Telefon}"><f:then>{propertiesOld.Telefon}</f:then></f:if>',
        'district' => '<f:if condition="{propertiesOld.Stadtteile}"><f:then>{propertiesOld.Stadtteile}</f:then></f:if>',
        'reading_times' => '<f:if condition="{propertiesOld.lesezeit}"><f:then>{propertiesOld.lesezeit}</f:then></f:if>',
        'notes' => '<f:if condition="{propertiesOld.Bemerkung}"><f:then>{propertiesOld.Bemerkung}</f:then></f:if>',
        'pid' => '20' // store events into this page
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
