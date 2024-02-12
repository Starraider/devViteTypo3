<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Leseohren',
        'Personen',
        [
            \SKom\Leseohren\Controller\PersonController::class => 'list, index, show, new, create, edit, update, delete'
        ],
        // non-cacheable actions
        [
            \SKom\Leseohren\Controller\PersonController::class => 'new, create, edit, update, delete'
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Leseohren',
        'Organizations',
        [
            \SKom\Leseohren\Controller\OrganizationController::class => 'list, index, show, new, create, edit, update, delete'
        ],
        // non-cacheable actions
        [
            \SKom\Leseohren\Controller\OrganizationController::class => 'new, create, edit, update, delete'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    personen {
                        iconIdentifier = leseohren-plugin-personen
                        title = LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_personen.name
                        description = LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_personen.description
                        tt_content_defValues {
                            CType = list
                            list_type = leseohren_personen
                        }
                    }
                    organizations {
                        iconIdentifier = leseohren-plugin-organizations
                        title = LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_organizations.name
                        description = LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_organizations.description
                        tt_content_defValues {
                            CType = list
                            list_type = leseohren_organizations
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
