<?php

declare(strict_types=1);

namespace SKom\Leseohren\Domain\Model;


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
class Present extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * gift_date
     *
     * @var \DateTime
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $gift_date = null;

    /**
     * given
     *
     * @var bool
     */
    protected $given = false;

    /**
     * gift
     *
     * @var \SKom\Leseohren\Domain\Model\Gift
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $gift = null;

    /**
     * Returns the gift_date
     *
     * @return \DateTime
     */
    public function getGift_date()
    {
        return $this->gift_date;
    }

    /**
     * Sets the gift_date
     *
     * @param \DateTime $gift_date
     * @return void
     */
    public function setGift_date(\DateTime $gift_date)
    {
        $this->gift_date = $gift_date;
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
     * @param bool $given
     * @return void
     */
    public function setGiven(bool $given)
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
     * @return \SKom\Leseohren\Domain\Model\Gift
     */
    public function getGift()
    {
        return $this->gift;
    }

    /**
     * Sets the gift
     *
     * @param \SKom\Leseohren\Domain\Model\Gift $gift
     * @return void
     */
    public function setGift(\SKom\Leseohren\Domain\Model\Gift $gift)
    {
        $this->gift = $gift;
    }
}
