<?php

declare(strict_types=1);

namespace SKom\Leseohren\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
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
class Organization extends AbstractEntity
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
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected $name = '';

    /**
     * street1
     *
     * @var string
     */
    protected $street1 = '';

    /**
     * street2
     *
     * @var string
     */
    protected $street2 = '';

    /**
     * zip
     *
     * @var string
     */
    protected $zip = '';

    /**
     * city
     *
     * @var string
     */
    protected $city = '';

    /**
     * district
     *
     * @var int
     */
    protected $district = 0;

    /**
     * phone1
     *
     * @var string
     */
    protected $phone1 = '';

    /**
     * phone2
     *
     * @var string
     */
    protected $phone2 = '';

    /**
     * email
     *
     * @var string
     */
    protected $email = '';

    /**
     * url
     *
     * @var string
     */
    protected $url = '';

    /**
     * whatsapp
     *
     * @var string
     */
    protected $whatsapp = '';

    /**
     * openingHours
     *
     * @var string
     */
    protected $openingHours = '';

    /**
     * notes
     *
     * @var string
     */
    protected $notes = '';

    /**
     * readingTimes
     *
     * @var string
     */
    protected $readingTimes = '';

    /**
     * vpLanguages
     *
     * @var string
     */
    protected $vpLanguages = '';

    /**
     * vpNumber
     *
     * @var int
     */
    protected $vpNumber = 0;

    /**
     * Kontaktperson
     *
     * @var Person
     */
    #[Lazy]
    protected $contactPerson = null;

    /**
     * Add category to a blog
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
     * Remove category from organisation
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
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

/**
     * Returns the street1
     *
     * @return string
     */
    public function getStreet1()
    {
        return $this->street1;
    }

    /**
     * Sets the street1
     *
     * @return void
     */
    public function setStreet1(string $street1)
    {
        $this->street1 = $street1;
    }

    /**
     * Returns the street2
     *
     * @return string
     */
    public function getStreet2()
    {
        return $this->street2;
    }

    /**
     * Sets the street2
     *
     * @return void
     */
    public function setStreet2(string $street2)
    {
        $this->street2 = $street2;
    }

    /**
     * Returns the zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Sets the zip
     *
     * @return void
     */
    public function setZip(string $zip)
    {
        $this->zip = $zip;
    }

    /**
     * Returns the city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the city
     *
     * @return void
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * Returns the district
     *
     * @return int
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Sets the district
     *
     * @return void
     */
    public function setDistrict(int $district)
    {
        $this->district = $district;
    }

    /**
     * Returns the phone1
     *
     * @return string
     */
    public function getPhone1()
    {
        return $this->phone1;
    }

    /**
     * Sets the phone1
     *
     * @return void
     */
    public function setPhone1(string $phone1)
    {
        $this->phone1 = $phone1;
    }

    /**
     * Returns the phone2
     *
     * @return string
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * Sets the phone2
     *
     * @return void
     */
    public function setPhone2(string $phone2)
    {
        $this->phone2 = $phone2;
    }

    /**
     * Returns the email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @return void
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Returns the url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the url
     *
     * @return void
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * Returns the whatsapp
     *
     * @return string
     */
    public function getWhatsapp()
    {
        return $this->whatsapp;
    }

    /**
     * Sets the whatsapp
     *
     * @return void
     */
    public function setWhatsapp(string $whatsapp)
    {
        $this->whatsapp = $whatsapp;
    }

    /**
     * Returns the openingHours
     *
     * @return string
     */
    public function getOpeningHours()
    {
        return $this->openingHours;
    }

    /**
     * Sets the openingHours
     *
     * @return void
     */
    public function setOpeningHours(string $openingHours)
    {
        $this->openingHours = $openingHours;
    }

    /**
     * Returns the notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets the notes
     *
     * @return void
     */
    public function setNotes(string $notes)
    {
        $this->notes = $notes;
    }

    /**
     * Returns the readingTimes
     *
     * @return string
     */
    public function getReadingTimes()
    {
        return $this->readingTimes;
    }

    /**
     * Sets the readingTimes
     *
     * @return void
     */
    public function setReadingTimes(string $readingTimes)
    {
        $this->readingTimes = $readingTimes;
    }

    /**
     * Returns the vpLanguages
     *
     * @return string
     */
    public function getVpLanguages()
    {
        return $this->vpLanguages;
    }

    /**
     * Sets the vpLanguages
     *
     * @return void
     */
    public function setVpLanguages(string $vpLanguages)
    {
        $this->vpLanguages = $vpLanguages;
    }

    /**
     * Returns the vpNumber
     *
     * @return int
     */
    public function getVpNumber()
    {
        return $this->vpNumber;
    }

    /**
     * Sets the vpNumber
     *
     * @return void
     */
    public function setVpNumber(int $vpNumber)
    {
        $this->vpNumber = $vpNumber;
    }

    /**
     * Returns the contactPerson
     *
     * @return Person
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
    }

    /**
     * Sets the contactPerson
     *
     * @return void
     */
    public function setContactPerson(Person $contactPerson)
    {
        $this->contactPerson = $contactPerson;
    }
}
