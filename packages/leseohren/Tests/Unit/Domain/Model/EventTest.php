<?php

declare(strict_types=1);

namespace SKom\Leseohren\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Sven Kalbhenn <sven@skom.de>
 */
class EventTest extends UnitTestCase
{
    /**
     * @var \SKom\Leseohren\Domain\Model\Event|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \SKom\Leseohren\Domain\Model\Event::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription(): void
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('description'));
    }

    /**
     * @test
     */
    public function getStartDateReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getStartDate()
        );
    }

    /**
     * @test
     */
    public function setStartDateForDateTimeSetsStartDate(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setStartDate($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('startDate'));
    }

    /**
     * @test
     */
    public function getEndDateReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getEndDate()
        );
    }

    /**
     * @test
     */
    public function setEndDateForDateTimeSetsEndDate(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setEndDate($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('endDate'));
    }

    /**
     * @test
     */
    public function getLocationReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getLocation()
        );
    }

    /**
     * @test
     */
    public function setLocationForStringSetsLocation(): void
    {
        $this->subject->setLocation('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('location'));
    }

    /**
     * @test
     */
    public function getParticipantsReturnsInitialValueForPerson(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getParticipants()
        );
    }

    /**
     * @test
     */
    public function setParticipantsForObjectStorageContainingPersonSetsParticipants(): void
    {
        $Participant = new \SKom\Leseohren\Domain\Model\Person();
        $objectStorageHoldingExactlyOneParticipants = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneParticipants->attach($Participant);
        $this->subject->setParticipants($objectStorageHoldingExactlyOneParticipants);

        self::assertEquals($objectStorageHoldingExactlyOneParticipants, $this->subject->_get('Participants'));
    }

    /**
     * @test
     */
    public function addParticipantToObjectStorageHoldingParticipants(): void
    {
        $Participant = new \SKom\Leseohren\Domain\Model\Person();
        $ParticipantsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $ParticipantsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($Participant));
        $this->subject->_set('Participants', $ParticipantsObjectStorageMock);

        $this->subject->addParticipant($Participant);
    }

    /**
     * @test
     */
    public function removeParticipantFromObjectStorageHoldingParticipants(): void
    {
        $Participant = new \SKom\Leseohren\Domain\Model\Person();
        $ParticipantsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $ParticipantsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($Participant));
        $this->subject->_set('Participants', $ParticipantsObjectStorageMock);

        $this->subject->removeParticipant($Participant);
    }
}
