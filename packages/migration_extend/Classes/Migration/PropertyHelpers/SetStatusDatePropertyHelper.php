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
 * Class GetStatusDateVPPropertyHelper
 */
class SetStatusDatePropertyHelper extends AbstractPropertyHelper implements PropertyHelperInterface
{
    /**
     * Set empty statusbegin_date and statuschange_date to current date
     * checked
     * @throws DBALException
     */
    public function manipulate(): void
    {
        //$this->log->addMessage('Start Migration of ' . $this->getProperty() . ' in ' . __CLASS__);
        $queryBuilder = DatabaseUtility::getConnectionForTable($this->table);
        $sql = 'SELECT status, statusbegin_date, statuschange_date FROM tx_leseohren_domain_model_person WHERE uid=' . (int)$this->getPropertyFromRecord('_migrated_uid');
        $result = $queryBuilder->executeQuery($sql);
        $todayDateTime = new \DateTime();
        $today = $todayDateTime->getTimestamp();
        while ($row = $result->fetchAssociative()) {
            //$this->log->addMessage('Row ' . $row['aktiv'].'|'.$row['pausiert'].'|'.$pausiert_seit.'|'.$pausiert_bis.'|'.$ausgeschieden_seit);
            $value = '';
            $status = '';
            if (($row['statusbegin_date'] == 0) OR ($row['statuschange_date'] == 0)) {
                $value = $today;
                $status = $row['status'];
            }
        }
        if ($value != '') {
            //$this->log->addMessage('Status '. $status .' fuer ' . $this->getPropertyFromRecord('_migrated_uid').' with date: '.$value);
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
