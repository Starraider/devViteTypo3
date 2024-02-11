<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'SkomPersons',
        'Person_list',
        [
            \SKom\SkomPersons\Controller\PersonController::class => 'list, create, update, delete'
        ],
        // non-cacheable actions
        [
            \SKom\SkomPersons\Controller\PersonController::class => 'create, update, delete'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    person_list {
                        iconIdentifier = skom_persons-plugin-person_list
                        title = LLL:EXT:skom_persons/Resources/Private/Language/locallang_db.xlf:tx_skom_persons_person_list.name
                        description = LLL:EXT:skom_persons/Resources/Private/Language/locallang_db.xlf:tx_skom_persons_person_list.description
                        tt_content_defValues {
                            CType = list
                            list_type = skompersons_person_list
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
