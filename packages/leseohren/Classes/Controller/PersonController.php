<?php

declare(strict_types=1);

namespace SKom\Leseohren\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use SKom\Leseohren\Domain\Repository\PersonRepository;
use Psr\Http\Message\ResponseInterface;
use SKom\Leseohren\Domain\Model\Person;
use TYPO3\CMS\Core\Type\ContextualFeedbackSeverity;
use TYPO3\CMS\Extbase\Annotation\IgnoreValidation;
use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;

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
        $this->personRepository->add($newPerson);
        $this->addFlashMessage('Die neue Person wurde erfolgreich gespeichert!', '', ContextualFeedbackSeverity::OK);
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
        $this->personRepository->update($person);
        $this->addFlashMessage('Die Änderungen wurden erfolgreich gespeichert!', '', ContextualFeedbackSeverity::OK);
        return $this->redirect('list');
    }

    /**
     * action delete
     */
    public function deleteAction(Person $person)
    {
        $this->personRepository->remove($person);
        $this->addFlashMessage('Die Person wurde aus der Datenbank entfernt!', '', ContextualFeedbackSeverity::INFO);
        return $this->redirect('list');
    }
}
