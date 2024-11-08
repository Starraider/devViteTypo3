<?php
declare(strict_types=1);
namespace Skom\MigrationExtend\Migration\Importer;

use In2code\Migration\Migration\Importer\AbstractImporter;
use In2code\Migration\Migration\Importer\ImporterInterface;

/**
 * Class EventSpeakerImporter
 */
class EventSpeakerImporter extends AbstractImporter implements ImporterInterface
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
    protected string $tableName = 'tx_leseohren_speakerevent_person_mm';

    /**
     * Table to import from
     *
     * @var string
     */
    protected string $tableNameOld = '08_Fortbildungen_Referenten';

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
        'Referenten' => 'uid_foreign',
        'Fortbildungen' => 'uid_local',
    ];

    /**
     * Hardcode some properties
     *
     * @var array
     */
    protected array $values = [

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
