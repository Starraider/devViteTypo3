<?php

declare(strict_types=1);

namespace SKom\SkomPersons\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class PersonTest extends UnitTestCase
{
    /**
     * @var \SKom\SkomPersons\Domain\Model\Person|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \SKom\SkomPersons\Domain\Model\Person::class,
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
    public function getFirstnameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getFirstname()
        );
    }

    /**
     * @test
     */
    public function setFirstnameForStringSetsFirstname(): void
    {
        $this->subject->setFirstname('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('firstname'));
    }
}
