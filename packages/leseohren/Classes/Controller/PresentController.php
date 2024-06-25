<?php

declare(strict_types=1);

namespace SKom\Leseohren\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Psr\Http\Message\ResponseInterface;
use SKom\Leseohren\Domain\Model\Present;
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
 * PresentController
 */
class PresentController extends ActionController
{
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
        $presents = $this->presentRepository->findAll();
        $this->view->assign('presents', $presents);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @return ResponseInterface
     */
    public function showAction(Present $present): ResponseInterface
    {
        $this->view->assign('present', $present);
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
    public function createAction(Present $newPresent)
    {
        $this->addFlashMessage('Die neue Schenkung wurde erfolgreich gespeichert.', '', ContextualFeedbackSeverity::OK);
        $this->presentRepository->add($newPresent);
        return $this->redirect('list');
    }

    /**
     * action edit
     *
     * @return ResponseInterface
     */
    #[IgnoreValidation(['value' => 'present'])]
    public function editAction(Present $present): ResponseInterface
    {
        $this->view->assign('present', $present);
        return $this->htmlResponse();
    }

    /**
     * action update
     */
    public function updateAction(Present $present)
    {
        $this->addFlashMessage('Die Änderungen wurden erfolgreich gespeichert.', '', ContextualFeedbackSeverity::OK);
        $this->presentRepository->update($present);
        return $this->redirect('list');
    }

    /**
     * action delete
     */
    public function deleteAction(Present $present)
    {
        $this->addFlashMessage('Die Schenkung wurde erfolgreich gelöscht.', '', ContextualFeedbackSeverity::OK);
        $this->presentRepository->remove($present);
        return $this->redirect('list');
    }
}
