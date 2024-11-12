<?php
declare(strict_types=1);
namespace Skom\MigrationExtend\Migration\Importer;

use In2code\Migration\Migration\Importer\AbstractImporter;
use In2code\Migration\Migration\Importer\ImporterInterface;

/**
 * Class RegistrationImporter
 */
class RegistrationImporter extends AbstractImporter implements ImporterInterface
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
    protected string $tableName = 'tx_leseohren_domain_model_registration';

    /**
     * Table to import from
     *
     * @var string
     */
    protected string $tableNameOld = '09_Personen_Fortbildungen';

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
        'Personen' => 'person',
        'Fortbildungen' => 'event',
    ];

    /**
     * Hardcode some properties
     *
     * @var array
     */
    protected array $values = [
        'registration_date' => '-2208974256',
        'onwaitlist' => '0',
        'pid' => '13' // store presents into this page
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

    ];
}
