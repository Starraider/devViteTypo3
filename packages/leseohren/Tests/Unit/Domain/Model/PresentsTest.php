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
class PresentsTest extends UnitTestCase
{
    /**
     * @var \SKom\Leseohren\Domain\Model\Presents|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \SKom\Leseohren\Domain\Model\Presents::class,
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
    public function getGift_dateReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getGift_date()
        );
    }

    /**
     * @test
     */
    public function setGift_dateForDateTimeSetsGift_date(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setGift_date($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('gift_date'));
    }

    /**
     * @test
     */
    public function getGivenReturnsInitialValueForBool(): void
    {
        self::assertFalse($this->subject->getGiven());
    }

    /**
     * @test
     */
    public function setGivenForBoolSetsGiven(): void
    {
        $this->subject->setGiven(true);

        self::assertEquals(true, $this->subject->_get('given'));
    }

    /**
     * @test
     */
    public function getGiftReturnsInitialValueForGift(): void
    {
        self::assertEquals(
            null,
            $this->subject->getGift()
        );
    }

    /**
     * @test
     */
    public function setGiftForGiftSetsGift(): void
    {
        $giftFixture = new \SKom\Leseohren\Domain\Model\Gift();
        $this->subject->setGift($giftFixture);

        self::assertEquals($giftFixture, $this->subject->_get('gift'));
    }
}
