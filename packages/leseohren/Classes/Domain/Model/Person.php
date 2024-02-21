<?php

declare(strict_types=1);

namespace SKom\Leseohren\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
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
 * Person
 */
class Person extends AbstractEntity
{

    /**
     * @var ObjectStorage<Category>
     */
    public $categories;

    /**
     * gender
     *
     * @var int
     */
    protected $gender = 0;

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
     * birthday
     *
     * @var \DateTime
     */
    protected $birthday = null;

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
     * phoneLandline
     *
     * @var string
     */
    protected $phoneLandline = '';

    /**
     * phoneMobile
     *
     * @var string
     */
    protected $phoneMobile = '';

    /**
     * email
     *
     * @var string
     */
    protected $email = '';

    /**
     * whatsapp
     *
     * @var string
     */
    protected $whatsapp = '';

    /**
     * notes
     *
     * @var string
     */
    protected $notes = '';

    /**
     * status
     *
     * @var int
     */
    protected $status = 0;

    /**
     * statusbeginDate
     *
     * @var \DateTime
     */
    protected $statusbeginDate = null;

    /**
     * statusendDate
     *
     * @var \DateTime
     */
    protected $statusendDate = null;

    /**
     * travelOptions
     *
     * @var int
     */
    protected $travelOptions = 0;

    /**
     * languages
     *
     * @var int
     */
    protected $languages = 0;

    /**
     * preferenceAgegroup
     *
     * @var int
     */
    protected $preferenceAgegroup = 0;

    /**
     * preferenceOrganizationType
     *
     * @var int
     */
    protected $preferenceOrganizationType = 0;

    /**
     * paymentMethod
     *
     * @var int
     */
    protected $paymentMethod = 0;

    /**
     * iban
     *
     * @var string
     */
    protected $iban = '';

    /**
     * swift
     *
     * @var string
     */
    protected $swift = '';

    /**
     * accountOwner
     *
     * @var string
     */
    protected $accountOwner = '';

    /**
     * bankname
     *
     * @var string
     */
    protected $bankname = '';

    /**
     * paypal
     *
     * @var string
     */
    protected $paypal = '';

    /**
     * fileFuehrungszeugnis
     *
     * @var FileReference
     */
    #[Cascade(['value' => 'remove'])]
    protected $fileFuehrungszeugnis = null;

    /**
     * fileMandat
     *
     * @var FileReference
     */
    #[Cascade(['value' => 'remove'])]
    protected $fileMandat = null;

    /**
     * fileOthers
     *
     * @var FileReference
     */
    #[Cascade(['value' => 'remove'])]
    protected $fileOthers = null;

    /**
     * Geschenke
     *
     * @var ObjectStorage<Present>
     */
    #[Cascade(['value' => 'remove'])]
    #[Lazy]
    protected $Donations = null;

    /**
     * Blackboards
     *
     * @var ObjectStorage<Blackboard>
     */
    #[Cascade(['value' => 'remove'])]
    #[Lazy]
    protected $Blackboards = null;

    /**
     * __construct
     */
    public function __construct()
    {
        $this->categories = new ObjectStorage();
        $this->initializeObject();
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
        $this->Donations = $this->Donations ?: new ObjectStorage();
        $this->Blackboards = $this->Blackboards ?: new ObjectStorage();
    }

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
     * Remove category from person
     */
    public function removeCategory(Category $category)
    {
        $this->categories->detach($category);
    }

    /**
     * Returns the gender
     *
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Sets the gender
     *
     * @return void
     */
    public function setGender(int $gender)
    {
        $this->gender = $gender;
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
     * @return void
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Returns the birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Sets the birthday
     *
     * @return void
     */
    public function setBirthday(\DateTime $birthday)
    {
        $this->birthday = $birthday;
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
     * Returns the phoneLandline
     *
     * @return string
     */
    public function getPhoneLandline()
    {
        return $this->phoneLandline;
    }

    /**
     * Sets the phoneLandline
     *
     * @return void
     */
    public function setPhoneLandline(string $phoneLandline)
    {
        $this->phoneLandline = $phoneLandline;
    }

    /**
     * Returns the phoneMobile
     *
     * @return string
     */
    public function getPhoneMobile()
    {
        return $this->phoneMobile;
    }

    /**
     * Sets the phoneMobile
     *
     * @return void
     */
    public function setPhoneMobile(string $phoneMobile)
    {
        $this->phoneMobile = $phoneMobile;
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
     * Returns the status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status
     *
     * @return void
     */
    public function setStatus(int $status)
    {
        $this->status = $status;
    }

    /**
     * Returns the statusbeginDate
     *
     * @return \DateTime
     */
    public function getStatusbeginDate()
    {
        return $this->statusbeginDate;
    }

    /**
     * Sets the statusbeginDate
     *
     * @return void
     */
    public function setStatusbeginDate(\DateTime $statusbeginDate)
    {
        $this->statusbeginDate = $statusbeginDate;
    }

    /**
     * Returns the statusendDate
     *
     * @return \DateTime
     */
    public function getStatusendDate()
    {
        return $this->statusendDate;
    }

    /**
     * Sets the statusendDate
     *
     * @return void
     */
    public function setStatusendDate(\DateTime $statusendDate)
    {
        $this->statusendDate = $statusendDate;
    }

    /**
     * Returns the travelOptions
     *
     * @return int
     */
    public function getTravelOptions()
    {
        return $this->travelOptions;
    }

    /**
     * Sets the travelOptions
     *
     * @return void
     */
    public function setTravelOptions(int $travelOptions)
    {
        $this->travelOptions = $travelOptions;
    }

    /**
     * Returns the languages
     *
     * @return int
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Sets the languages
     *
     * @return void
     */
    public function setLanguages(int $languages)
    {
        $this->languages = $languages;
    }

    /**
     * Returns the preferenceAgegroup
     *
     * @return int
     */
    public function getPreferenceAgegroup()
    {
        return $this->preferenceAgegroup;
    }

    /**
     * Sets the preferenceAgegroup
     *
     * @return void
     */
    public function setPreferenceAgegroup(int $preferenceAgegroup)
    {
        $this->preferenceAgegroup = $preferenceAgegroup;
    }

    /**
     * Returns the preferenceOrganizationType
     *
     * @return int
     */
    public function getPreferenceOrganizationType()
    {
        return $this->preferenceOrganizationType;
    }

    /**
     * Sets the preferenceOrganizationType
     *
     * @return void
     */
    public function setPreferenceOrganizationType(int $preferenceOrganizationType)
    {
        $this->preferenceOrganizationType = $preferenceOrganizationType;
    }

    /**
     * Returns the paymentMethod
     *
     * @return int
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Sets the paymentMethod
     *
     * @return void
     */
    public function setPaymentMethod(int $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * Returns the iban
     *
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Sets the iban
     *
     * @return void
     */
    public function setIban(string $iban)
    {
        $this->iban = $iban;
    }

    /**
     * Returns the swift
     *
     * @return string
     */
    public function getSwift()
    {
        return $this->swift;
    }

    /**
     * Sets the swift
     *
     * @return void
     */
    public function setSwift(string $swift)
    {
        $this->swift = $swift;
    }

    /**
     * Returns the accountOwner
     *
     * @return string
     */
    public function getAccountOwner()
    {
        return $this->accountOwner;
    }

    /**
     * Sets the accountOwner
     *
     * @return void
     */
    public function setAccountOwner(string $accountOwner)
    {
        $this->accountOwner = $accountOwner;
    }

    /**
     * Returns the bankname
     *
     * @return string
     */
    public function getBankname()
    {
        return $this->bankname;
    }

    /**
     * Sets the bankname
     *
     * @return void
     */
    public function setBankname(string $bankname)
    {
        $this->bankname = $bankname;
    }

    /**
     * Returns the paypal
     *
     * @return string
     */
    public function getPaypal()
    {
        return $this->paypal;
    }

    /**
     * Sets the paypal
     *
     * @return void
     */
    public function setPaypal(string $paypal)
    {
        $this->paypal = $paypal;
    }

    /**
     * Returns the fileFuehrungszeugnis
     *
     * @return FileReference
     */
    public function getFileFuehrungszeugnis()
    {
        return $this->fileFuehrungszeugnis;
    }

    /**
     * Sets the fileFuehrungszeugnis
     *
     * @return void
     */
    public function setFileFuehrungszeugnis(FileReference $fileFuehrungszeugnis)
    {
        $this->fileFuehrungszeugnis = $fileFuehrungszeugnis;
    }

    /**
     * Returns the fileMandat
     *
     * @return FileReference
     */
    public function getFileMandat()
    {
        return $this->fileMandat;
    }

    /**
     * Sets the fileMandat
     *
     * @return void
     */
    public function setFileMandat(FileReference $fileMandat)
    {
        $this->fileMandat = $fileMandat;
    }

    /**
     * Returns the fileOthers
     *
     * @return FileReference
     */
    public function getFileOthers()
    {
        return $this->fileOthers;
    }

    /**
     * Sets the fileOthers
     *
     * @return void
     */
    public function setFileOthers(FileReference $fileOthers)
    {
        $this->fileOthers = $fileOthers;
    }

    /**
     * Adds a Present
     *
     * @return void
     */
    public function addDonation(Present $Donation)
    {
        $this->Donations->attach($Donation);
    }

    /**
     * Removes a Present
     *
     * @param Present $DonationToRemove The Present to be removed
     * @return void
     */
    public function removeDonation(Present $DonationToRemove)
    {
        $this->Donations->detach($DonationToRemove);
    }

    /**
     * Returns the Donations
     *
     * @return ObjectStorage<Present>
     */
    public function getDonations()
    {
        return $this->Donations;
    }

    /**
     * Sets the Donations
     *
     * @param ObjectStorage<Present> $Donations
     * @return void
     */
    public function setDonations(ObjectStorage $Donations)
    {
        $this->Donations = $Donations;
    }

    /**
     * Adds a Blackboard
     *
     * @return void
     */
    public function addBlackboard(Blackboard $Blackboard)
    {
        $this->Blackboards->attach($Blackboard);
    }

    /**
     * Removes a Blackboard
     *
     * @param Blackboard $BlackboardToRemove The Blackboard to be removed
     * @return void
     */
    public function removeBlackboard(Blackboard $BlackboardToRemove)
    {
        $this->Blackboards->detach($BlackboardToRemove);
    }

    /**
     * Returns the Blackboards
     *
     * @return ObjectStorage<Blackboard>
     */
    public function getBlackboards()
    {
        return $this->Blackboards;
    }

    /**
     * Sets the Blackboards
     *
     * @param ObjectStorage<Blackboard> $Blackboards
     * @return void
     */
    public function setBlackboards(ObjectStorage $Blackboards)
    {
        $this->Blackboards = $Blackboards;
    }
}
