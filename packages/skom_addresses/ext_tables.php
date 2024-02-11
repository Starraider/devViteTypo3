<?php
defined('TYPO3') or die('Access denied.');
call_user_func(
    function(){
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
            'skom.skom_addresses',
            'web',
            'Addresses',
            'bottom',
            ['Person' => 'list'],
            [
                'access' => 'systemMaintainer',
                'icon' => 'EXT:skom-addresses/Resources/Public/Icons/icon_module.svg',
                'labels' => 'EXT:skom-addresses/Resources/Privat/Language/locallang_mod.xlf'
            ]
        );
    }
);
