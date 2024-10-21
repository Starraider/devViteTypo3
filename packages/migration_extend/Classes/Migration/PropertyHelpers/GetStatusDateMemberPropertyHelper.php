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
 * Class GetStatusDateMemberPropertyHelper
 */
class GetStatusDateMemberPropertyHelper extends AbstractPropertyHelper implements PropertyHelperInterface
{
    /**
     * Membership has ended at -> statusbegin_date and statuschange_date
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
            $timeStamp = strtotime($value);
            //$this->log->addMessage('Membership has ended for: ' . $this->getPropertyFromRecord('_migrated_uid').' with date: '.$value);
            //$this->log->addMessage('Replace ' . $this->getProperty() . ' with ' . $value . ' in ' . __CLASS__);
            $this->setProperty($timeStamp);
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
