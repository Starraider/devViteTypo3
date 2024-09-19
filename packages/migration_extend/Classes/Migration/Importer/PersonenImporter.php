<?php
declare(strict_types=1);
namespace Skom\MigrationExtend\Migration\Importer;

use In2code\Migration\Migration\Importer\AbstractImporter;
use In2code\Migration\Migration\Importer\ImporterInterface;

/**
 * Class PersonenImporter
 * UPDATE `00_Personen` SET `Geburtstag` = '1900-01-01 00:00:00' WHERE `Geburtstag` IS NULL
 */
class PersonenImporter extends AbstractImporter implements ImporterInterface
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
    protected string $tableName = 'tx_leseohren_domain_model_person';

    /**
     * Table to import from
     *
     * @var string
     */
    protected string $tableNameOld = '00_Personen';

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
        'Vorname' => 'firstname',
        'Nachname' => 'lastname'
    ];

    /**
     * Hardcode some properties
     *
     * @var array
     */
    protected array $values = [
        'title' => '<f:if condition="{propertiesOld.Titel}"><f:then>{propertiesOld.Titel}</f:then></f:if>',
        'gender' => '<f:if condition="{propertiesOld.Anrede} == \'Herr\'"><f:then>1</f:then></f:if>',
        'street1' => '<f:if condition="{propertiesOld.Hausnummer}"><f:then>{propertiesOld.Strasse} {propertiesOld.Hausnummer}</f:then><f:else>{propertiesOld.Strasse}</f:else></f:if>',
        'city' => '<f:if condition="{propertiesOld.Stadt}"><f:then>{propertiesOld.Stadt}</f:then></f:if>',
        'zip' => '<f:if condition="{propertiesOld.PLZ}"><f:then>{propertiesOld.PLZ}</f:then></f:if>',
        'email' => '<f:if condition="{propertiesOld.email}"><f:then>{propertiesOld.email}</f:then></f:if>',
        'notes' => '<f:if condition="{propertiesOld.Bemerkung}"><f:then>{propertiesOld.Bemerkung}</f:then></f:if>',
        'phone_mobile' => '<f:if condition="{propertiesOld.Tel_mobil}"><f:then>{propertiesOld.Tel_mobil}</f:then><f:else>{propertiesOld.Tel_geschaeftlich}</f:else></f:if>',
        'phone_landline' => '<f:if condition="{propertiesOld.Tel_privat}"><f:then>{propertiesOld.Tel_privat}</f:then><f:else>{propertiesOld.Tel_geschaeftlich}</f:else></f:if>',
        'job' => '<f:if condition="{propertiesOld.Beruf}"><f:then>{propertiesOld.Beruf}</f:then></f:if>',
        'birthday' => '<f:if condition="{propertiesOld.Geburtstag}"><f:then>{propertiesOld.Geburtstag}</f:then></f:if>',
        'pid' => '13' // store personen into this page
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
        'birthday' => [
            [
                'className' => \Skom\MigrationExtend\Migration\PropertyHelpers\ConvertDateTimeToTimestampPropertyHelper::class,
                'configuration' => [

                ]
            ]
        ]
    ];
}
