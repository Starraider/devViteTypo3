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
 * Class GetStatusVPPropertyHelper
 */
class GetStatusVPPropertyHelper extends AbstractPropertyHelper implements PropertyHelperInterface
{
    /**
     * Standard -> status = 0 (aktiv)
     * pausiert -> status = 1 (pausiert)
     * ausgeschieden_seit -> status = 2 (ausgeschieden)
     * checked
     * @throws DBALException
     */
    public function manipulate(): void
    {
        //$this->log->addMessage('Start Migration of ' . $this->getProperty() . ' in ' . __CLASS__);
        $queryBuilder = DatabaseUtility::getConnectionForTable($this->table);
        $sql = 'SELECT aktiv, pausiert, pausiert_seit, pausiert_bis, ausgeschieden_seit FROM 01_Vorlesepaten WHERE Personen=' . (int)$this->getPropertyFromRecord('_migrated_uid');
        $result = $queryBuilder->executeQuery($sql);
        $todayDateTime = new \DateTime();
        $today = $todayDateTime->getTimestamp();
        while ($row = $result->fetchAssociative()) {
            if($row['pausiert_seit'] != '') {
                $pausiert_seit = strtotime($row['pausiert_seit']);
            }else{
                $pausiert_seit = '';
            }
            if($row['pausiert_bis'] != '') {
                $pausiert_bis = strtotime($row['pausiert_bis']);
            }else{
                $pausiert_bis = '';
            }
            if($row['ausgeschieden_seit'] != '') {
                $ausgeschieden_seit = strtotime($row['ausgeschieden_seit']);
            }else{
                $ausgeschieden_seit = '';
            }
            //$this->log->addMessage('Row ' . $row['aktiv'].'|'.$row['pausiert'].'|'.$pausiert_seit.'|'.$pausiert_bis.'|'.$ausgeschieden_seit);
            $value = '';
            if ($row['aktiv'] == 1) {
                $value = '0';
            }
            if ($row['pausiert'] == 1 && $pausiert_seit != '' && $pausiert_bis == '' ) {
                $value = '1';
            }
            if ($row['pausiert'] == 1 && $pausiert_seit != '' && $pausiert_bis > $today ) {
                $value = '1';
            }
            if ($ausgeschieden_seit != '') {
                $value = '2';
            }
        }
        if ($value != '') {
            // if($value != '0') {
            //     $this->log->addMessage('Status '. $value .' fuer ' . $this->getPropertyFromRecord('_migrated_uid'));
            // }
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
