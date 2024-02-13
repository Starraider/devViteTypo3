<?php

declare(strict_types=1);

namespace SKom\Leseohren\Domain\Model;

use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * This file is part of the "Leseohren" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Sven Kalbhenn <sven@skom.de>, SKom
 */

/**
 * Person
 */
class Person extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * @var ObjectStorage<Category>
     */
    public $categories;


    /**
     * Vorname
     *
     * @var string
     */
    protected $firstname = '';

    /**
     * lastname
     *
     * @var string
     */
    protected $lastname = '';

    /**
     * Geschenke
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SKom\Leseohren\Domain\Model\Present>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $Donations = null;

    /**
     * __construct
     */
    public function __construct()
    {
        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
        $this->categories = new ObjectStorage();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->Donations = $this->Donations ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Add category to a blog
     *
     * @param Category $category
     */
    public function addCategory(Category $category)
    {
        $this->categories->attach($category);
    }

    /**
     * Set categories
     */
    public function setCategories(ObjectStorage $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Get categories
     */
    public function getCategories(): ObjectStorage
    {
        return $this->categories;
    }

    /**
     * Remove category from person
     */
    public function removeCategory(Category $category)
    {
        $this->categories->detach($category);
    }

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

    /**
     * Returns the lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Sets the lastname
     *
     * @param string $lastname
     * @return void
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Adds a Present
     *
     * @param \SKom\Leseohren\Domain\Model\Present $Donation
     * @return void
     */
    public function addDonation(\SKom\Leseohren\Domain\Model\Present $Donation)
    {
        $this->Donations->attach($Donation);
    }

    /**
     * Removes a Present
     *
     * @param \SKom\Leseohren\Domain\Model\Present $DonationToRemove The Present to be removed
     * @return void
     */
    public function removeDonation(\SKom\Leseohren\Domain\Model\Present $DonationToRemove)
    {
        $this->Donations->detach($DonationToRemove);
    }

    /**
     * Returns the Donations
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SKom\Leseohren\Domain\Model\Present>
     */
    public function getDonations()
    {
        return $this->Donations;
    }

    /**
     * Sets the Donations
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SKom\Leseohren\Domain\Model\Present> $Donations
     * @return void
     */
    public function setDonations(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $Donations)
    {
        $this->Donations = $Donations;
    }
}
