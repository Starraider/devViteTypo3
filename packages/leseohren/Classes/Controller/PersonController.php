<?php

declare(strict_types=1);

namespace SKom\Leseohren\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use SKom\Leseohren\Domain\Repository\PersonRepository;
use Psr\Http\Message\ResponseInterface;
use SKom\Leseohren\Domain\Model\Person;
use TYPO3\CMS\Core\Type\ContextualFeedbackSeverity;
use TYPO3\CMS\Extbase\Annotation\IgnoreValidation;
//use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Core\Utility\DebugUtility;
use SKom\Leseohren\Domain\Repository\CategoryRepository;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;


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
     * categoryRepository
     *
     * @var CategoryRepository
     */
    protected $categoryRepository = null;

    public function injectCategoryRepository(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function __construct(PersistenceManager $persistenceManager)
    {
        $this->persistenceManager = $persistenceManager;
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
        $categories = $this->categoryRepository->findByParent('1');
        $this->view->assign('categories', $categories);
        return $this->htmlResponse();
    }

    /**
     * initialize create action
     *
     * @param void
     */
    public function initializeCreateAction() {
        $this->arguments->getArgument('newPerson')
            ->getPropertyMappingConfiguration()->forProperty('*')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'d.m.Y');
        $this->arguments->getArgument('newPerson')->getPropertyMappingConfiguration()->setTargetTypeForSubProperty('languages', 'array');
        $this->arguments->getArgument('newPerson')->getPropertyMappingConfiguration()->setTargetTypeForSubProperty('preferenceAgegroup', 'array');
        $this->arguments->getArgument('newPerson')->getPropertyMappingConfiguration()->setTargetTypeForSubProperty('preferenceOrganizationType', 'array');
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
        // ToDo: Read Parent-ID from Settings
        $categories = $this->categoryRepository->findByParent('1');
        $this->view->assign('categories', $categories);
        $this->view->assign('person', $person);
        return $this->htmlResponse();
    }

    /**
     * initialize update action
     *
     * @param void
     */
    public function initializeUpdateAction() {
        $this->arguments->getArgument('person')
            ->getPropertyMappingConfiguration()->forProperty('*')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter',\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT,'d.m.Y');
        $this->arguments->getArgument('person')->getPropertyMappingConfiguration()->setTargetTypeForSubProperty('languages', 'array');
        $this->arguments->getArgument('person')->getPropertyMappingConfiguration()->setTargetTypeForSubProperty('preferenceAgegroup', 'array');
        $this->arguments->getArgument('person')->getPropertyMappingConfiguration()->setTargetTypeForSubProperty('preferenceOrganizationType', 'array');
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
        $this->addFlashMessage('Die Person wurde erfolgreich aus der Datenbank entfernt!', '', ContextualFeedbackSeverity::INFO);
        return $this->redirect('list');
    }
}
