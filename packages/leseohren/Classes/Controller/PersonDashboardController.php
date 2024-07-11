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
class PersonDashboardController extends ActionController
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

    /**
     * action birthdays
     *
     * @return ResponseInterface
     */
    public function birthdaysAction(): ResponseInterface
    {
        $categories = $this->categoryRepository->findByParent('1');
        $this->view->assign('categories', $categories);
        $people = $this->personRepository->upcomingBirthdays();
        $this->view->assign('people', $people);
        return $this->htmlResponse();
    }

}
