<?php

declare(strict_types=1);

namespace SKom\Leseohren\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use SKom\Leseohren\Domain\Repository\PersonRepository;
use Psr\Http\Message\ResponseInterface;
use SKom\Leseohren\Domain\Model\Person;
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
 * PersonController
 */
class PersonController extends ActionController
{

    /**
     * personRepository
     *
     * @var PersonRepository
     */
    protected $personRepository = null;

    public function injectPersonRepository(PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
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
        $people = $this->personRepository->findAll();
        $this->view->assign('people', $people);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @return ResponseInterface
     */
    public function showAction(Person $person): ResponseInterface
    {
        $this->view->assign('person', $person);
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
    public function createAction(Person $newPerson)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', ContextualFeedbackSeverity::WARNING);
        $this->personRepository->add($newPerson);
        return $this->redirect('list');
    }

    /**
     * action edit
     *
     * @return ResponseInterface
     */
    #[IgnoreValidation(['value' => 'person'])]
    public function editAction(Person $person): ResponseInterface
    {
        $this->view->assign('person', $person);
        return $this->htmlResponse();
    }

    /**
     * action update
     */
    public function updateAction(Person $person)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', ContextualFeedbackSeverity::WARNING);
        $this->personRepository->update($person);
        return $this->redirect('list');
    }

    /**
     * action delete
     */
    public function deleteAction(Person $person)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', ContextualFeedbackSeverity::WARNING);
        $this->personRepository->remove($person);
        return $this->redirect('list');
    }
}
