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
class BlackboardControllerTest extends UnitTestCase
{
    /**
     * @var \SKom\Leseohren\Controller\BlackboardController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\SKom\Leseohren\Controller\BlackboardController::class))
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
    public function listActionFetchesAllBlackboardsFromRepositoryAndAssignsThemToView(): void
    {
        $allBlackboards = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $blackboardRepository = $this->getMockBuilder(\SKom\Leseohren\Domain\Repository\BlackboardRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $blackboardRepository->expects(self::once())->method('findAll')->will(self::returnValue($allBlackboards));
        $this->subject->_set('blackboardRepository', $blackboardRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('blackboards', $allBlackboards);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenBlackboardToView(): void
    {
        $blackboard = new \SKom\Leseohren\Domain\Model\Blackboard();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('blackboard', $blackboard);

        $this->subject->showAction($blackboard);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenBlackboardToBlackboardRepository(): void
    {
        $blackboard = new \SKom\Leseohren\Domain\Model\Blackboard();

        $blackboardRepository = $this->getMockBuilder(\SKom\Leseohren\Domain\Repository\BlackboardRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $blackboardRepository->expects(self::once())->method('add')->with($blackboard);
        $this->subject->_set('blackboardRepository', $blackboardRepository);

        $this->subject->createAction($blackboard);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenBlackboardToView(): void
    {
        $blackboard = new \SKom\Leseohren\Domain\Model\Blackboard();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('blackboard', $blackboard);

        $this->subject->editAction($blackboard);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenBlackboardInBlackboardRepository(): void
    {
        $blackboard = new \SKom\Leseohren\Domain\Model\Blackboard();

        $blackboardRepository = $this->getMockBuilder(\SKom\Leseohren\Domain\Repository\BlackboardRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $blackboardRepository->expects(self::once())->method('update')->with($blackboard);
        $this->subject->_set('blackboardRepository', $blackboardRepository);

        $this->subject->updateAction($blackboard);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenBlackboardFromBlackboardRepository(): void
    {
        $blackboard = new \SKom\Leseohren\Domain\Model\Blackboard();

        $blackboardRepository = $this->getMockBuilder(\SKom\Leseohren\Domain\Repository\BlackboardRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $blackboardRepository->expects(self::once())->method('remove')->with($blackboard);
        $this->subject->_set('blackboardRepository', $blackboardRepository);

        $this->subject->deleteAction($blackboard);
    }
}
