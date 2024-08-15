<?php

defined('TYPO3') || die();

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionUtility::registerPlugin(
    'Leseohren',
    'Personen',
    'Personen'
);

ExtensionUtility::registerPlugin(
    'Leseohren',
    'Organizations',
    'Organizations'
);

ExtensionUtility::registerPlugin(
    'Leseohren',
    'Events',
    'Events'
);

ExtensionUtility::registerPlugin(
    'Leseohren',
    'Blackboards',
    'Blackboards'
);

$personDashboardPluginSignature = ExtensionUtility::registerPlugin(
    'Leseohren',
    'PersonDashboard',
    'PersonDashboard'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$personDashboardPluginSignature] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue(
    $personDashboardPluginSignature,
    'FILE:EXT:leseohren/Configuration/FlexForms/Leseohren_PersonDashboard.xml'
);

$holidayPluginSignature = ExtensionUtility::registerPlugin(
    'Leseohren',
    'Holidays',
    'Holidays',
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$holidayPluginSignature] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue(
    $holidayPluginSignature,
    'FILE:EXT:leseohren/Configuration/FlexForms/Leseohren_Holidays.xml'
);
