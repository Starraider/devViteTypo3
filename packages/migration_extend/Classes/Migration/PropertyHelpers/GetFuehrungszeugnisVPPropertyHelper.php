<?php

declare(strict_types=1);

/*
 * Copyright by Sven Kalbhenn (sven@skom.de).
 * See LICENSE that was shipped with this package.
 */

namespace Skom\MigrationExtend\Migration\PropertyHelpers;

use Doctrine\DBAL\DBALException;
use In2code\Migration\Migration\PropertyHelpers\AbstractPropertyHelper;
use In2code\Migration\Migration\PropertyHelpers\PropertyHelperInterface;
use In2code\Migration\Utility\DatabaseUtility;

/**
 * Class GetFuehrungszeugnisVPPropertyHelper
 */
class GetFuehrungszeugnisVPPropertyHelper extends AbstractPropertyHelper implements PropertyHelperInterface
{
    /**
     * Fuehrungszeugnis -> fuehrungszeugnis_checked = 1
     * checked
     * @throws DBALException
     */
    public function manipulate(): void
    {
        //$this->log->addMessage('Start Migration of ' . $this->getProperty() . ' in ' . __CLASS__);
        $queryBuilder = DatabaseUtility::getConnectionForTable($this->table);
        $sql = 'SELECT Fuehrungszeugnis FROM 01_Vorlesepaten WHERE Personen=' . (int)$this->getPropertyFromRecord('_migrated_uid');
        $value = (string)$queryBuilder->executeQuery($sql)->fetchOne();
        if ($value == '1') {
            //$this->log->addMessage('Fuehrungszeugnis checked: '. $value .' fuer ' . $this->getPropertyFromRecord('_migrated_uid'));
            $this->setProperty($value);
        }
    }

    /**
     * @return bool
     */
    public function shouldMigrate(): bool
    {
        return true;
    }
}
