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

    public function __construct()
    {
        $this->categories = new ObjectStorage();
    }

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
}
