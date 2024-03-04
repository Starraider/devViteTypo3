<?php

declare(strict_types=1);

namespace SKom\Leseohren\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use SKom\Leseohren\Domain\Repository\GiftRepository;
use Psr\Http\Message\ResponseInterface;
use SKom\Leseohren\Domain\Model\Gift;
use TYPO3\CMS\Core\Type\ContextualFeedbackSeverity;
use TYPO3\CMS\Extbase\Annotation\IgnoreValidation;

/**
 * This file is part of the "Leseohren" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Sven Kalbhenn <sven@skom.de>, SKom
 */

/**
 * GiftController
 */
class GiftController extends ActionController
{
    /**
     * giftRepository
     *
     * @var GiftRepository
     */
    protected $giftRepository = null;

    public function injectGiftRepository(GiftRepository $giftRepository)
    {
        $this->giftRepository = $giftRepository;
    }

    /**
     * action index
     *
     * @return ResponseInterface
     */
    public function indexAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action list
     *
     * @return ResponseInterface
     */
    public function listAction(): ResponseInterface
    {
        $gifts = $this->giftRepository->findAll();
        $this->view->assign('gifts', $gifts);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @return ResponseInterface
     */
    public function showAction(Gift $gift): ResponseInterface
    {
        $this->view->assign('gift', $gift);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     * @return ResponseInterface
     */
    public function newAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action create
     */
    public function createAction(Gift $newGift)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', ContextualFeedbackSeverity::WARNING);
        $this->giftRepository->add($newGift);
        return $this->redirect('list');
    }

    /**
     * action edit
     *
     * @return ResponseInterface
     */
    #[IgnoreValidation(['value' => 'gift'])]
    public function editAction(Gift $gift): ResponseInterface
    {
        $this->view->assign('gift', $gift);
        return $this->htmlResponse();
    }

    /**
     * action update
     */
    public function updateAction(Gift $gift)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', ContextualFeedbackSeverity::WARNING);
        $this->giftRepository->update($gift);
        return $this->redirect('list');
    }

    /**
     * action delete
     */
    public function deleteAction(Gift $gift)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', ContextualFeedbackSeverity::WARNING);
        $this->giftRepository->remove($gift);
        return $this->redirect('list');
    }
}
