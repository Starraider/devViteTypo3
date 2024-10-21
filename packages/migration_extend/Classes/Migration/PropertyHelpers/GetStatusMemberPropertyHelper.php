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
 * Class GetStatusMemberPropertyHelper
 */
class GetStatusMemberPropertyHelper extends AbstractPropertyHelper implements PropertyHelperInterface
{
    /**
     * Membership has ended -> status = 2 (ausgeschieden)
     * checked
     * @throws DBALException
     */
    public function manipulate(): void
    {
        //$this->log->addMessage('Start Migration of ' . $this->getProperty() . ' in ' . __CLASS__);
        $queryBuilder = DatabaseUtility::getConnectionForTable($this->table);
        $sql = 'SELECT austrittsdatum FROM 01_Mitglieder WHERE Personen=' . (int)$this->getPropertyFromRecord('_migrated_uid');
        $value = (string)$queryBuilder->executeQuery($sql)->fetchOne();
        if ($value != '') {
            //$this->log->addMessage('Membership has ended for: ' . $this->getPropertyFromRecord('_migrated_uid'));
            //$this->log->addMessage('Replace ' . $this->getProperty() . ' with 2 in ' . __CLASS__);
            $this->setProperty('2');
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
