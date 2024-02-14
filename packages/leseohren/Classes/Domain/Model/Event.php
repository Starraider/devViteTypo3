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
 * Event
 */
class Event extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
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
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SKom\Leseohren\Domain\Model\Person>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $Participants = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
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
        $this->Participants = $this->Participants ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
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
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
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
     * @param \DateTime $startDate
     * @return void
     */
    public function setStartDate(\DateTime $startDate)
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
     * @param \DateTime $endDate
     * @return void
     */
    public function setEndDate(\DateTime $endDate)
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
     * @param string $location
     * @return void
     */
    public function setLocation(string $location)
    {
        $this->location = $location;
    }

    /**
     * Adds a Person
     *
     * @param \SKom\Leseohren\Domain\Model\Person $Participant
     * @return void
     */
    public function addParticipant(\SKom\Leseohren\Domain\Model\Person $Participant)
    {
        $this->Participants->attach($Participant);
    }

    /**
     * Removes a Person
     *
     * @param \SKom\Leseohren\Domain\Model\Person $ParticipantToRemove The Person to be removed
     * @return void
     */
    public function removeParticipant(\SKom\Leseohren\Domain\Model\Person $ParticipantToRemove)
    {
        $this->Participants->detach($ParticipantToRemove);
    }

    /**
     * Returns the Participants
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SKom\Leseohren\Domain\Model\Person>
     */
    public function getParticipants()
    {
        return $this->Participants;
    }

    /**
     * Sets the Participants
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SKom\Leseohren\Domain\Model\Person> $Participants
     * @return void
     */
    public function setParticipants(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $Participants)
    {
        $this->Participants = $Participants;
    }
}
