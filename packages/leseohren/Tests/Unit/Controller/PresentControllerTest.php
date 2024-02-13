<?php

declare(strict_types=1);

namespace SKom\Leseohren\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author Sven Kalbhenn <sven@skom.de>
 */
class PresentControllerTest extends UnitTestCase
{
    /**
     * @var \SKom\Leseohren\Controller\PresentController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\SKom\Leseohren\Controller\PresentController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllPresentsFromRepositoryAndAssignsThemToView(): void
    {
        $allPresents = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $presentRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $presentRepository->expects(self::once())->method('findAll')->will(self::returnValue($allPresents));
        $this->subject->_set('presentRepository', $presentRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('presents', $allPresents);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenPresentToView(): void
    {
        $present = new \SKom\Leseohren\Domain\Model\Present();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('present', $present);

        $this->subject->showAction($present);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenPresentToPresentRepository(): void
    {
        $present = new \SKom\Leseohren\Domain\Model\Present();

        $presentRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $presentRepository->expects(self::once())->method('add')->with($present);
        $this->subject->_set('presentRepository', $presentRepository);

        $this->subject->createAction($present);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenPresentToView(): void
    {
        $present = new \SKom\Leseohren\Domain\Model\Present();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('present', $present);

        $this->subject->editAction($present);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenPresentInPresentRepository(): void
    {
        $present = new \SKom\Leseohren\Domain\Model\Present();

        $presentRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $presentRepository->expects(self::once())->method('update')->with($present);
        $this->subject->_set('presentRepository', $presentRepository);

        $this->subject->updateAction($present);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenPresentFromPresentRepository(): void
    {
        $present = new \SKom\Leseohren\Domain\Model\Present();

        $presentRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $presentRepository->expects(self::once())->method('remove')->with($present);
        $this->subject->_set('presentRepository', $presentRepository);

        $this->subject->deleteAction($present);
    }
}
