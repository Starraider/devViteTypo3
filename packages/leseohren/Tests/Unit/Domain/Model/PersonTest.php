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
class PersonTest extends UnitTestCase
{
    /**
     * @var \SKom\Leseohren\Domain\Model\Person|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \SKom\Leseohren\Domain\Model\Person::class,
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

    /**
     * @test
     */
    public function getLastnameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getLastname()
        );
    }

    /**
     * @test
     */
    public function setLastnameForStringSetsLastname(): void
    {
        $this->subject->setLastname('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('lastname'));
    }
}
