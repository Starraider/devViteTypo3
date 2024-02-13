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
class PresentsControllerTest extends UnitTestCase
{
    /**
     * @var \SKom\Leseohren\Controller\PresentsController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\SKom\Leseohren\Controller\PresentsController::class))
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

        $presentsRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $presentsRepository->expects(self::once())->method('findAll')->will(self::returnValue($allPresents));
        $this->subject->_set('presentsRepository', $presentsRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('presents', $allPresents);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenPresentsToView(): void
    {
        $presents = new \SKom\Leseohren\Domain\Model\Presents();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('presents', $presents);

        $this->subject->showAction($presents);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenPresentsToPresentsRepository(): void
    {
        $presents = new \SKom\Leseohren\Domain\Model\Presents();

        $presentsRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $presentsRepository->expects(self::once())->method('add')->with($presents);
        $this->subject->_set('presentsRepository', $presentsRepository);

        $this->subject->createAction($presents);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenPresentsToView(): void
    {
        $presents = new \SKom\Leseohren\Domain\Model\Presents();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('presents', $presents);

        $this->subject->editAction($presents);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenPresentsInPresentsRepository(): void
    {
        $presents = new \SKom\Leseohren\Domain\Model\Presents();

        $presentsRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $presentsRepository->expects(self::once())->method('update')->with($presents);
        $this->subject->_set('presentsRepository', $presentsRepository);

        $this->subject->updateAction($presents);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenPresentsFromPresentsRepository(): void
    {
        $presents = new \SKom\Leseohren\Domain\Model\Presents();

        $presentsRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $presentsRepository->expects(self::once())->method('remove')->with($presents);
        $this->subject->_set('presentsRepository', $presentsRepository);

        $this->subject->deleteAction($presents);
    }
}
