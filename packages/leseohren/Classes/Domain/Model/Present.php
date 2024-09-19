<?php

declare(strict_types=1);

namespace SKom\Leseohren\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;

/**
 * This file is part of the "Leseohren" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Sven Kalbhenn <sven@skom.de>, SKom
 */
/**
 * Schenkungen
 */
class Present extends AbstractEntity
{
    /**
     * @var ObjectStorage<Person>
     */
    public $person;

    /**
     * gift_date
     *
     * @var \DateTime
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected $giftDate = null;

    /**
     * given
     *
     * @var bool
     */
    protected $given = false;

    /**
     * gift
     *
     * @var Gift
     */
    protected $gift = null;

    /**
     * Returns the gift_date
     *
     * @return \DateTime
     */
    public function getGiftDate()
    {
        return $this->giftDate;
    }

    /**
     * Sets the gift_date
     *
     * @return void
     */
    public function setGiftDate(\DateTime $giftDate): void
    {
        $this->giftDate = $giftDate;
    }

    /**
     * Returns the given
     *
     * @return bool
     */
    public function getGiven()
    {
        return $this->given;
    }

    /**
     * Sets the given
     *
     * @return void
     */
    public function setGiven(bool $given): void
    {
        $this->given = $given;
    }

    /**
     * Returns the boolean state of given
     *
     * @return bool
     */
    public function isGiven()
    {
        return $this->given;
    }

    /**
     * Returns the gift
     *
     * @return Gift
     */
    public function getGift()
    {
        return $this->gift;
    }

    /**
     * Sets the gift
     *
     * @return void
     */
    public function setGift(Gift $gift): void
    {
        $this->gift = $gift;
    }
}
