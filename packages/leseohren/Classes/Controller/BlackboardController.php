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
 * BlackboardController
 */
class BlackboardController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * blackboardRepository
     *
     * @var \SKom\Leseohren\Domain\Repository\BlackboardRepository
     */
    protected $blackboardRepository = null;

    /**
     * @param \SKom\Leseohren\Domain\Repository\BlackboardRepository $blackboardRepository
     */
    public function injectBlackboardRepository(\SKom\Leseohren\Domain\Repository\BlackboardRepository $blackboardRepository)
    {
        $this->blackboardRepository = $blackboardRepository;
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
        $blackboards = $this->blackboardRepository->findAll();
        $this->view->assign('blackboards', $blackboards);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \SKom\Leseohren\Domain\Model\Blackboard $blackboard
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\SKom\Leseohren\Domain\Model\Blackboard $blackboard): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('blackboard', $blackboard);
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
     * @param \SKom\Leseohren\Domain\Model\Blackboard $newBlackboard
     */
    public function createAction(\SKom\Leseohren\Domain\Model\Blackboard $newBlackboard)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->blackboardRepository->add($newBlackboard);
        return $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \SKom\Leseohren\Domain\Model\Blackboard $blackboard
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("blackboard")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\SKom\Leseohren\Domain\Model\Blackboard $blackboard): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('blackboard', $blackboard);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \SKom\Leseohren\Domain\Model\Blackboard $blackboard
     */
    public function updateAction(\SKom\Leseohren\Domain\Model\Blackboard $blackboard)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->blackboardRepository->update($blackboard);
        return $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \SKom\Leseohren\Domain\Model\Blackboard $blackboard
     */
    public function deleteAction(\SKom\Leseohren\Domain\Model\Blackboard $blackboard)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->blackboardRepository->remove($blackboard);
        return $this->redirect('list');
    }
}
