<?php

declare(strict_types=1);

namespace SKom\SkomPersons\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Http\ForwardResponse;

/**
 * This file is part of the "skom_persons" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024
 */

/**
 * PersonController
 */
class PersonController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * personRepository
     *
     * @var \SKom\SkomPersons\Domain\Repository\PersonRepository
     */
    protected $personRepository = null;

    /**
     * @param \SKom\SkomPersons\Domain\Repository\PersonRepository $personRepository
     */
    public function injectPersonRepository(\SKom\SkomPersons\Domain\Repository\PersonRepository $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $people = $this->personRepository->findAll();
        $this->view->assign('people', $people);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \SKom\SkomPersons\Domain\Model\Person $person
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\SKom\SkomPersons\Domain\Model\Person $person): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('person', $person);
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
     * @param \SKom\SkomPersons\Domain\Model\Person $newPerson
     */
    public function createAction(\SKom\SkomPersons\Domain\Model\Person $newPerson)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Type\ContextualFeedbackSeverity::WARNING);
        $this->personRepository->add($newPerson);
        return $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \SKom\SkomPersons\Domain\Model\Person $person
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("person")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\SKom\SkomPersons\Domain\Model\Person $person): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('person', $person);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \SKom\SkomPersons\Domain\Model\Person $person
     */
    public function updateAction(\SKom\SkomPersons\Domain\Model\Person $person)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Type\ContextualFeedbackSeverity::WARNING);
        $this->personRepository->update($person);
        return $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \SKom\SkomPersons\Domain\Model\Person $person
     */
    public function deleteAction(\SKom\SkomPersons\Domain\Model\Person $person)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Type\ContextualFeedbackSeverity::WARNING);
        $this->personRepository->remove($person);
        return $this->redirect('list');
    }
}
