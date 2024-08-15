<?php

declare(strict_types=1);

namespace SKom\Leseohren\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;


use TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * This file is part of the "Leseohren" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Sven Kalbhenn <sven@skom.de>, SKom
 */
/**
 * The repository for people
 */
class PersonRepository extends Repository
{
    public function initializeObject(): void
    {
        $querySettings = GeneralUtility::makeInstance(Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($querySettings);
    }

    /**
     * Find all persons having a birthday today
     *
     * @param string $interval Number of days to look ahead
     * @return QueryResultInterface
     */
    public function upcomingBirthdays($interval = '7')
    {
        $query = $this->createQuery();
        $sql = 'SELECT uid, pid, firstname, lastname, title, birthday, gender, email FROM tx_leseohren_domain_model_person WHERE DATE_ADD(FROM_UNIXTIME(birthday), INTERVAL YEAR(CURDATE())-YEAR(FROM_UNIXTIME(birthday)) + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(FROM_UNIXTIME(birthday)),1,0)YEAR) BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL '.$interval.' DAY)';
        $query->statement($sql);
        //$query->setOrderings(['birthday' => QueryInterface::ORDER_ASCENDING]);
        /*
        SELECT * FROM `tx_leseohren_domain_model_person` WHERE DATE_ADD(FROM_UNIXTIME(birthday), INTERVAL YEAR(CURDATE())-YEAR(FROM_UNIXTIME(birthday)) + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(FROM_UNIXTIME(birthday)),1,0)YEAR) BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY);
        $query->statement($statement, array $parameters = [])
        */
        return $query->execute();
    }

    /**
     * Find all persons whose status will change the next 7 days
     *
     * @param string $interval Number of days to look ahead
     * @return QueryResultInterface
     */
    public function upcomingStatusChange($interval = '7')
    {
        $today = new \DateTime('today');
        $thisweek = new \DateTime('today');
        $thisweek = $thisweek->modify('+'.$interval.' days');
        $query = $this->createQuery();
        $query->matching(
            $query->between('statusend_date', $today, $thisweek)
        );
        $query->setOrderings(['statusend_date' => QueryInterface::ORDER_ASCENDING]);

        // $typo3DbQueryParser = GeneralUtility::makeInstance(Typo3DbQueryParser::class);
        // $queryBuilder = $typo3DbQueryParser->convertQueryToDoctrineQueryBuilder($query);
        // DebuggerUtility::var_dump($queryBuilder->getSQL());
        // DebuggerUtility::var_dump($queryBuilder->getParameters());

        return $query->execute();
    }

    protected $defaultOrderings = [
        'lastname' => QueryInterface::ORDER_ASCENDING,
        'firstname' => QueryInterface::ORDER_ASCENDING
    ];
}
