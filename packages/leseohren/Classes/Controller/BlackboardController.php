<?php

declare(strict_types=1);

namespace SKom\Leseohren\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use SKom\Leseohren\Domain\Repository\BlackboardRepository;
use Psr\Http\Message\ResponseInterface;
use SKom\Leseohren\Domain\Model\Blackboard;
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
 * BlackboardController
 */
class BlackboardController extends ActionController
{

    /**
     * blackboardRepository
     *
     * @var BlackboardRepository
     */
    protected $blackboardRepository = null;

    public function injectBlackboardRepository(BlackboardRepository $blackboardRepository)
    {
        $this->blackboardRepository = $blackboardRepository;
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
        $blackboards = $this->blackboardRepository->findAll();
        $this->view->assign('blackboards', $blackboards);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @return ResponseInterface
     */
    public function showAction(Blackboard $blackboard): ResponseInterface
    {
        $this->view->assign('blackboard', $blackboard);
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
    public function createAction(Blackboard $newBlackboard)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', ContextualFeedbackSeverity::WARNING);
        $this->blackboardRepository->add($newBlackboard);
        return $this->redirect('list');
    }

    /**
     * action edit
     *
     * @return ResponseInterface
     */
    #[IgnoreValidation(['value' => 'blackboard'])]
    public function editAction(Blackboard $blackboard): ResponseInterface
    {
        $this->view->assign('blackboard', $blackboard);
        return $this->htmlResponse();
    }

    /**
     * action update
     */
    public function updateAction(Blackboard $blackboard)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', ContextualFeedbackSeverity::WARNING);
        $this->blackboardRepository->update($blackboard);
        return $this->redirect('list');
    }

    /**
     * action delete
     */
    public function deleteAction(Blackboard $blackboard)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', ContextualFeedbackSeverity::WARNING);
        $this->blackboardRepository->remove($blackboard);
        return $this->redirect('list');
    }
}
