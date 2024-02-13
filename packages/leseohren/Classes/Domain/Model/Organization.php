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
 * Organisation
 */
class Organization extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * Name der Organisation
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = '';

    /**
     * Kontaktperson
     *
     * @var \SKom\Leseohren\Domain\Model\Person
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $contactPerson = null;

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
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the contactPerson
     *
     * @return \SKom\Leseohren\Domain\Model\Person
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
    }

    /**
     * Sets the contactPerson
     *
     * @param \SKom\Leseohren\Domain\Model\Person $contactPerson
     * @return void
     */
    public function setContactPerson(\SKom\Leseohren\Domain\Model\Person $contactPerson)
    {
        $this->contactPerson = $contactPerson;
    }
}
