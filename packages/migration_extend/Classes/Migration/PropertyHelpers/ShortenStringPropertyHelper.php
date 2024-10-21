<?php
declare(strict_types=1);
namespace Skom\MigrationExtend\Migration\PropertyHelpers;

use In2code\Migration\Migration\PropertyHelpers\AbstractPropertyHelper;
use In2code\Migration\Migration\PropertyHelpers\PropertyHelperInterface;
/**
 * Class ShortenStringPropertyHelper
 * If title is longer then 255 character, shorten it and add "..." at the end.
 *
 */
class ShortenStringPropertyHelper extends AbstractPropertyHelper implements PropertyHelperInterface
{

    /**
     * Check if this configuration keys are given
     *
     * @var array
     */
    protected $checkForConfiguration = [

    ];

    /**
     * @return void
     */
    public function manipulate(): void
    {
        $string = $this->getProperty();
        $string = mb_strimwidth($string, 0, 251, "...");
        $this->setProperty($string);
    }

    /**
     * @return bool
     */
    public function shouldMigrate(): bool
    {
        if (strlen($this->getProperty()) > 254) {
            return true;
        }
        return false;
    }
}
