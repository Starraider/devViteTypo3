<?php

declare(strict_types=1);

namespace SKom\Leseohren\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Extbase\Persistence\Repository;
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
 * The repository for people
 */
class PersonRepository extends Repository
{
    public function initializeObject()
    {
        $querySettings = GeneralUtility::makeInstance(Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($querySettings);
    }

    /**
     * Find all persons having a birthday today
     *
     * @return QueryResultInterface
     */
    public function upcomingBirthdays()
    {
        $query = $this->createQuery();
        $query->matching(
            $query->greaterThanOrEqual('birthday', new \DateTime('today'))
        );
        $query->setOrderings(['birthday' => QueryInterface::ORDER_ASCENDING]);
        return $query->execute();
    }

    protected $defaultOrderings = [
        'lastname' => QueryInterface::ORDER_ASCENDING,
        'firstname' => QueryInterface::ORDER_ASCENDING
    ];
}
