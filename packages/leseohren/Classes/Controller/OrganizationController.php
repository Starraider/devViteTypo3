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
 * OrganizationController
 */
class OrganizationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * @param \SKom\Leseohren\Domain\Repository\OrganizationRepository $organizationRepository
     */
    public function injectOrganizationRepository(\SKom\Leseohren\Domain\Repository\OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
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
        $organizations = $this->organizationRepository->findAll();
        $this->view->assign('organizations', $organizations);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \SKom\Leseohren\Domain\Model\Organization $organization
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\SKom\Leseohren\Domain\Model\Organization $organization): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('organization', $organization);
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
     * @param \SKom\Leseohren\Domain\Model\Organization $newOrganization
     */
    public function createAction(\SKom\Leseohren\Domain\Model\Organization $newOrganization)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->organizationRepository->add($newOrganization);
        return $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \SKom\Leseohren\Domain\Model\Organization $organization
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("organization")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\SKom\Leseohren\Domain\Model\Organization $organization): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('organization', $organization);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \SKom\Leseohren\Domain\Model\Organization $organization
     */
    public function updateAction(\SKom\Leseohren\Domain\Model\Organization $organization)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->organizationRepository->update($organization);
        return $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \SKom\Leseohren\Domain\Model\Organization $organization
     */
    public function deleteAction(\SKom\Leseohren\Domain\Model\Organization $organization)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->organizationRepository->remove($organization);
        return $this->redirect('list');
    }
}
