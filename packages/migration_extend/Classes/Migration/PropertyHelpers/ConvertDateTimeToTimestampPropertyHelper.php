<?php
declare(strict_types=1);
namespace Skom\MigrationExtend\Migration\PropertyHelpers;

use In2code\Migration\Migration\PropertyHelpers\AbstractPropertyHelper;
use In2code\Migration\Migration\PropertyHelpers\PropertyHelperInterface;
/**
 * Class ConvertDateTimeToTimestampPropertyHelper
 * Converts a DateTime to a Unix timestamp
 *
 */
class ConvertDateTimeToTimestampPropertyHelper extends AbstractPropertyHelper implements PropertyHelperInterface
{

    /**
     * Check if this configuration keys are given
     *
     * @var array
     */
    protected array $checkForConfiguration = [

    ];

    /**
     * @return void
     */
    public function manipulate(): void
    {
        $dateTime = $this->getProperty();
        if (strtotime($dateTime) === false) {
            $timeStamp = -2208974256;
        } else {
            $timeStamp = strtotime($dateTime);
        }
        $this->setProperty($timeStamp);
    }

    /**
     * @return bool
     */
    public function shouldMigrate(): bool
    {
        return true;
    }
}
