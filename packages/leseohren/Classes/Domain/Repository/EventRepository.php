<?php

declare(strict_types=1);

namespace SKom\Leseohren\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * This file is part of the "Leseohren" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Sven Kalbhenn <sven@skom.de>, SKom
 */
/**
 * The repository for Events
 */
class EventRepository extends Repository
{
    protected $defaultOrderings = [
        'start_date' => QueryInterface::ORDER_DESCENDING
    ];


    /**
     * Find upcoming events
     *
     * @return QueryResultInterface
     */
    public function findUpcomingEvents(): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching(
            $query->greaterThanOrEqual('end_date', new \DateTime())
        );
        $result = $query->execute();
        return $result;
    }
    /**
     * Find upcoming events
     *
     * @return QueryResultInterface
     */
    public function findPastEvents(): QueryResultInterface
    {
        $query = $this->createQuery();
        $query->matching(
            $query->lessThan('end_date', new \DateTime())
        );
        //$query->getQuerySettings()->setIgnoreEnableFields(true);
        //$query->getQuerySettings()->setEnableFieldsToBeIgnored(['disabled']);
        $result = $query->execute();

        // Debugging
        //$typo3DbQueryParser = GeneralUtility::makeInstance(Typo3DbQueryParser::class);
        //$queryBuilder = $typo3DbQueryParser->convertQueryToDoctrineQueryBuilder($query);
        //DebugUtility::debug($queryBuilder->getSQL());
        //DebugUtility::debug($queryBuilder->getParameters());

        return $result;
    }
}
