<?php

declare(strict_types=1);

namespace SKom\Leseohren\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Type\ContextualFeedbackSeverity;
use TYPO3\CMS\Extbase\Annotation\IgnoreValidation;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use SKom\Leseohren\Domain\Repository\EventRepository;
use SKom\Leseohren\Domain\Repository\CategoryRepository;
use SKom\Leseohren\Domain\Model\Event;

/**
 * This file is part of the "Leseohren" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2024 Sven Kalbhenn <sven@skom.de>, SKom
 */

/**
 * EventController
 */
class EventController extends ActionController
{
    /**
     * persistenceManager
     *
     * @var PersistenceManager
     */
    protected $persistenceManager = null;

    /**
     * eventRepository
     *
     * @var EventRepository
     */
    protected $eventRepository = null;

    /**
     * categoryRepository
     *
     * @var CategoryRepository
     */
    protected $categoryRepository = null;

    public function __construct(PersistenceManager $persistenceManager, EventRepository $eventRepository, CategoryRepository $categoryRepository)
    {
        $this->persistenceManager = $persistenceManager;
        $this->eventRepository = $eventRepository;
        $this->categoryRepository = $categoryRepository;
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
        $events = $this->eventRepository->findUpcomingEvents();
        $this->view->assign('events', $events);
        return $this->htmlResponse();
    }

    /**
     * action listPast
     *
     * @return ResponseInterface
     */
    public function listPastAction(): ResponseInterface
    {
        $events = $this->eventRepository->findPastEvents();
        $this->view->assign('events', $events);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @return ResponseInterface
     */
    public function showAction(Event $event): ResponseInterface
    {
        $this->view->assign('event', $event);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     * @return ResponseInterface
     */
    public function newAction(): ResponseInterface
    {
        $categories = $this->categoryRepository->findBy(['parent' => '18']);
        $this->view->assign('categories', $categories);
        return $this->htmlResponse();
    }

    /**
     * initialize create action
     *
     * @param void
     */
    public function initializeCreateAction(): void
    {
        $this->arguments->getArgument('newEvent')
            ->getPropertyMappingConfiguration()->forProperty('*')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
    }

    /**
     * action create
     */
    public function createAction(Event $newEvent)
    {
        $this->addFlashMessage('Das neue Event wurde erfolgreich gespeichert.', '', ContextualFeedbackSeverity::OK);
        $this->eventRepository->add($newEvent);
        return $this->redirect('list');
    }

    /**
     * action edit
     *
     * @return ResponseInterface
     */
    #[IgnoreValidation(['value' => 'event'])]
    public function editAction(Event $event): ResponseInterface
    {
        // ToDo: Read Parent-ID from Settings
        $categories = $this->categoryRepository->findBy(['parent' => '18']);
        $this->view->assign('categories', $categories);
        $this->view->assign('event', $event);
        return $this->htmlResponse();
    }

    /**
     * initialize update action
     *
     * @param void
     */
    public function initializeUpdateAction(): void
    {
        $this->arguments->getArgument('event')
            ->getPropertyMappingConfiguration()->forProperty('*')->setTypeConverterOption('TYPO3\\CMS\\Extbase\\Property\\TypeConverter\\DateTimeConverter', \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
    }

    /**
     * action update
     */
    public function updateAction(Event $event)
    {
        $this->addFlashMessage('Die Änderungen wurden erfolgreich gespeichert.', '', ContextualFeedbackSeverity::OK);
        $this->eventRepository->update($event);
        return $this->redirect('list');
    }

    /**
     * action delete
     */
    public function deleteAction(Event $event)
    {
        $this->addFlashMessage('Das Event wurde erfolgreich gelöscht.', '', ContextualFeedbackSeverity::OK);
        $this->eventRepository->remove($event);
        return $this->redirect('list');
    }
}
