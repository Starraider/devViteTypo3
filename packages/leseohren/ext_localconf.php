<?php

defined('TYPO3') || die();

(static function () {
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

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Leseohren',
        'Events',
        [
            \SKom\Leseohren\Controller\EventController::class => 'list, listPast, index, show, new, create, edit, update, delete'
        ],
        // non-cacheable actions
        [
            \SKom\Leseohren\Controller\EventController::class => 'new, create, edit, update, delete'
        ]
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Leseohren',
        'Blackboards',
        [
            \SKom\Leseohren\Controller\BlackboardController::class => 'list, index, show, new, create, edit, update, delete, deletegoperson'
        ],
        // non-cacheable actions
        [
            \SKom\Leseohren\Controller\BlackboardController::class => 'new, create, edit, update, delete, deletegoperson'
        ]
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Leseohren',
        'PersonDashboard',
        [
            \SKom\Leseohren\Controller\PersonDashboardController::class => 'birthdays'
        ],
        // non-cacheable actions
        [
            \SKom\Leseohren\Controller\PersonDashboardController::class => ''
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
                    events {
                        iconIdentifier = leseohren-plugin-events
                        title = LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_events.name
                        description = LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_events.description
                        tt_content_defValues {
                            CType = list
                            list_type = leseohren_events
                        }
                    }
                    blackboards {
                        iconIdentifier = leseohren-plugin-blackboards
                        title = LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_blackboards.name
                        description = LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_blackboards.description
                        tt_content_defValues {
                            CType = list
                            list_type = leseohren_blackboards
                        }
                    }
                    persondashboard {
                        iconIdentifier = leseohren-plugin-events
                        title = LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_persondashboard.name
                        description = LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_persondashboard.description
                        tt_content_defValues {
                            CType = list
                            list_type = leseohren_persondashboard
                        }
                    }
                }
                show = *
            }
        }'
    );
    // Register TypeConverter for file upload
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter(
        \SKom\Leseohren\Property\TypeConverter\UploadedFileReferenceConverter::class
    );
})();
