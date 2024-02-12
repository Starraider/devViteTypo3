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
class OrganizationTest extends UnitTestCase
{
    /**
     * @var \SKom\Leseohren\Domain\Model\Organization|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \SKom\Leseohren\Domain\Model\Organization::class,
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
    public function getNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName(): void
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('name'));
    }

    /**
     * @test
     */
    public function getContactPersonReturnsInitialValueForPerson(): void
    {
        self::assertEquals(
            null,
            $this->subject->getContactPerson()
        );
    }

    /**
     * @test
     */
    public function setContactPersonForPersonSetsContactPerson(): void
    {
        $contactPersonFixture = new \SKom\Leseohren\Domain\Model\Person();
        $this->subject->setContactPerson($contactPersonFixture);

        self::assertEquals($contactPersonFixture, $this->subject->_get('contactPerson'));
    }
}
