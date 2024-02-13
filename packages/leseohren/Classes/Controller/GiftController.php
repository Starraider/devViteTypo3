<?php

declare(strict_types=1);

namespace SKom\Leseohren\Controller;


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
class GiftController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * giftRepository
     *
     * @var \SKom\Leseohren\Domain\Repository\GiftRepository
     */
    protected $giftRepository = null;

    /**
     * @param \SKom\Leseohren\Domain\Repository\GiftRepository $giftRepository
     */
    public function injectGiftRepository(\SKom\Leseohren\Domain\Repository\GiftRepository $giftRepository)
    {
        $this->giftRepository = $giftRepository;
    }

    /**
     * action index
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function indexAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $gifts = $this->giftRepository->findAll();
        $this->view->assign('gifts', $gifts);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \SKom\Leseohren\Domain\Model\Gift $gift
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\SKom\Leseohren\Domain\Model\Gift $gift): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('gift', $gift);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {
        return $this->htmlResponse();
    }

    /**
     * action create
     *
     * @param \SKom\Leseohren\Domain\Model\Gift $newGift
     */
    public function createAction(\SKom\Leseohren\Domain\Model\Gift $newGift)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->giftRepository->add($newGift);
        return $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \SKom\Leseohren\Domain\Model\Gift $gift
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("gift")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\SKom\Leseohren\Domain\Model\Gift $gift): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('gift', $gift);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \SKom\Leseohren\Domain\Model\Gift $gift
     */
    public function updateAction(\SKom\Leseohren\Domain\Model\Gift $gift)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->giftRepository->update($gift);
        return $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \SKom\Leseohren\Domain\Model\Gift $gift
     */
    public function deleteAction(\SKom\Leseohren\Domain\Model\Gift $gift)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->giftRepository->remove($gift);
        return $this->redirect('list');
    }
}
