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
class GiftControllerTest extends UnitTestCase
{
    /**
     * @var \SKom\Leseohren\Controller\GiftController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\SKom\Leseohren\Controller\GiftController::class))
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
    public function listActionFetchesAllGiftsFromRepositoryAndAssignsThemToView(): void
    {
        $allGifts = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $giftRepository = $this->getMockBuilder(\SKom\Leseohren\Domain\Repository\GiftRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $giftRepository->expects(self::once())->method('findAll')->will(self::returnValue($allGifts));
        $this->subject->_set('giftRepository', $giftRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('gifts', $allGifts);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenGiftToView(): void
    {
        $gift = new \SKom\Leseohren\Domain\Model\Gift();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('gift', $gift);

        $this->subject->showAction($gift);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenGiftToGiftRepository(): void
    {
        $gift = new \SKom\Leseohren\Domain\Model\Gift();

        $giftRepository = $this->getMockBuilder(\SKom\Leseohren\Domain\Repository\GiftRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $giftRepository->expects(self::once())->method('add')->with($gift);
        $this->subject->_set('giftRepository', $giftRepository);

        $this->subject->createAction($gift);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenGiftToView(): void
    {
        $gift = new \SKom\Leseohren\Domain\Model\Gift();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('gift', $gift);

        $this->subject->editAction($gift);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenGiftInGiftRepository(): void
    {
        $gift = new \SKom\Leseohren\Domain\Model\Gift();

        $giftRepository = $this->getMockBuilder(\SKom\Leseohren\Domain\Repository\GiftRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $giftRepository->expects(self::once())->method('update')->with($gift);
        $this->subject->_set('giftRepository', $giftRepository);

        $this->subject->updateAction($gift);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenGiftFromGiftRepository(): void
    {
        $gift = new \SKom\Leseohren\Domain\Model\Gift();

        $giftRepository = $this->getMockBuilder(\SKom\Leseohren\Domain\Repository\GiftRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $giftRepository->expects(self::once())->method('remove')->with($gift);
        $this->subject->_set('giftRepository', $giftRepository);

        $this->subject->deleteAction($gift);
    }
}
