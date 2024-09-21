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
 * Class GetLanguagesPropertyHelper
 */
class GetIBANPropertyHelper extends AbstractPropertyHelper implements PropertyHelperInterface
{
    /**
     * @throws DBALException
     */
    public function manipulate(): void
    {
        //$this->log->addMessage('Table:'.$this->table.' Property:'.(int)$this->getPropertyFromRecord('_migrated_uid'));
        $queryBuilder = DatabaseUtility::getConnectionForTable($this->table);
        $sql = 'SELECT IBAN FROM 01_Mitglieder WHERE Personen=' . (int)$this->getPropertyFromRecord('_migrated_uid');
        $value = (string)$queryBuilder->executeQuery($sql)->fetchOne();
        if ($value != '') {
            $this->log->addMessage('Replace ' . $this->getProperty() . ' with ' . $value . ' in ' . __CLASS__);
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
