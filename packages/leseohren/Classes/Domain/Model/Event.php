<?php

declare(strict_types=1);

namespace SKom\Leseohren\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Domain\Model\Category;
/**
 * This file is part of the "Leseohren" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Sven Kalbhenn <sven@skom.de>, SKom
 */
/**
 * Event
 */
class Event extends AbstractEntity
{

    /**
     * @var ObjectStorage<Category>
     */
    public $categories;

    /**
     * title
     *
     * @var string
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected $title = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * startDate
     *
     * @var \DateTime
     */
    protected $startDate = null;

    /**
     * endDate
     *
     * @var \DateTime
     */
    protected $endDate = null;

    /**
     * location
     *
     * @var string
     */
    protected $location = '';

    /**
     * Participants
     *
     * @var ObjectStorage<Person>
     */
    #[Lazy]
    protected $participants = null;

    /**
     * maxparticipants
     *
     * @var int
     */
    protected $maxparticipants = 0;

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
    public function initializeObject(): void
    {
        $this->participants = $this->participants ?: new ObjectStorage();
    }

    /**
     * Add category to an event
     */
    public function addCategory(Category $category): void
    {
        $this->categories->attach($category);
    }

    /**
     * Set categories
     */
    public function setCategories(ObjectStorage $categories): void
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
     * Remove category from event
     */
    public function removeCategory(Category $category): void
    {
        $this->categories->detach($category);
    }

    /**
     * Returns the title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Returns the startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Sets the startDate
     *
     * @return void
     */
    public function setStartDate(\DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * Returns the endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Sets the endDate
     *
     * @return void
     */
    public function setEndDate(\DateTime $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * Returns the location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the location
     *
     * @return void
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /**
     * Adds a Person
     *
     * @return void
     */
    public function addParticipant(Person $participant): void
    {
        $this->participants->attach($participant);
    }

    /**
     * Removes a Person
     *
     * @param Person $participantToRemove The Person to be removed
     * @return void
     */
    public function removeParticipant(Person $participantToRemove): void
    {
        $this->participants->detach($participantToRemove);
    }

    /**
     * Returns the Participants
     *
     * @return ObjectStorage<Person>
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * Sets the Participants
     *
     * @param ObjectStorage<Person> $participants
     * @return void
     */
    public function setParticipants(ObjectStorage $participants): void
    {
        $this->participants = $participants;
    }

    /**
     * Returns the maxparticipants
     *
     * @return int
     */
    public function getMaxparticipants()
    {
        return $this->maxparticipants;
    }

    /**
     * Sets the maxparticipants
     *
     * @return void
     */
    public function setMaxparticipants(int $maxparticipants): void
    {
        $this->maxparticipants = $maxparticipants;
    }
}
