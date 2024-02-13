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
 * PresentController
 */
class PresentController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

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
        $presents = $this->presentRepository->findAll();
        $this->view->assign('presents', $presents);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \SKom\Leseohren\Domain\Model\Present $present
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\SKom\Leseohren\Domain\Model\Present $present): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('present', $present);
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
     * @param \SKom\Leseohren\Domain\Model\Present $newPresent
     */
    public function createAction(\SKom\Leseohren\Domain\Model\Present $newPresent)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->presentRepository->add($newPresent);
        return $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \SKom\Leseohren\Domain\Model\Present $present
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("present")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\SKom\Leseohren\Domain\Model\Present $present): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('present', $present);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \SKom\Leseohren\Domain\Model\Present $present
     */
    public function updateAction(\SKom\Leseohren\Domain\Model\Present $present)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->presentRepository->update($present);
        return $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \SKom\Leseohren\Domain\Model\Present $present
     */
    public function deleteAction(\SKom\Leseohren\Domain\Model\Present $present)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->presentRepository->remove($present);
        return $this->redirect('list');
    }
}
