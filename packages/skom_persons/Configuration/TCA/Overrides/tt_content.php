<?php
defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'SkomPersons',
    'Person_list',
    'Personen Liste'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'SkomPersons',
    'Person_view',
    'Personen View'
);
