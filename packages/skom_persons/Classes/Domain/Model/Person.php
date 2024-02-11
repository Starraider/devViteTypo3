<?php

declare(strict_types=1);

namespace SKom\SkomPersons\Domain\Model;


/**
 * This file is part of the "skom_persons" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 
 */

/**
 * Person
 */
class Person extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * Vorname
     *
     * @var string
     */
    protected $firstname = '';

    /**
     * Returns the firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Sets the firstname
     *
     * @param string $firstname
     * @return void
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }
}
