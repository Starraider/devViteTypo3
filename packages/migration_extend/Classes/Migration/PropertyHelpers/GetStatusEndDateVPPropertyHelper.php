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
 * Set statusend_date
 * checked
 * Class GetStatusEndDateVPPropertyHelper
 */
class GetStatusEndDateVPPropertyHelper extends AbstractPropertyHelper implements PropertyHelperInterface
{
    /**
     * @throws DBALException
     */
    public function manipulate(): void
    {
        //$this->log->addMessage('Start Migration of ' . $this->getProperty() . ' in ' . __CLASS__);
        $queryBuilder = DatabaseUtility::getConnectionForTable($this->table);
        $sql = 'SELECT pausiert, pausiert_seit, pausiert_bis FROM 01_Vorlesepaten WHERE Personen=' . (int)$this->getPropertyFromRecord('_migrated_uid');
        $result = $queryBuilder->executeQuery($sql);
        $todayDateTime = new \DateTime();
        $today = $todayDateTime->getTimestamp();
        while ($row = $result->fetchAssociative()) {
            $value = '';
            $status = '0';
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
            if ($row['pausiert'] == 1 && $pausiert_seit != '' && $pausiert_bis > $today ) {
                $value = $pausiert_bis;
                $status = '1';
            }
        }
        if ($value != '') {
            //$this->log->addMessage('Status '. $status .' fuer ' . $this->getPropertyFromRecord('_migrated_uid').' until: '.$value);
            //$this->log->addMessage('Replace ' . $this->getProperty() . ' with '. $value .' in ' . __CLASS__);
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
