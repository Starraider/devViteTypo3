<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:skom_persons/Resources/Private/Language/locallang_db.xlf:tx_skompersons_domain_model_person',
        'label' => 'firstname',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'firstname',
        'iconfile' => 'EXT:skom_persons/Resources/Public/Icons/tx_skompersons_domain_model_person.gif',
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'types' => [
        '1' => ['showitem' => 'firstname, categories, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'categories' => [
            'config'=> [
                'type' => 'category',
            ],
        ],

        'firstname' => [
            'exclude' => false,
            'label' => 'LLL:EXT:skom_persons/Resources/Private/Language/locallang_db.xlf:tx_skompersons_domain_model_person.firstname',
            'description' => 'LLL:EXT:skom_persons/Resources/Private/Language/locallang_db.xlf:tx_skompersons_domain_model_person.firstname.description',
            'config' => [
                'type' => 'input',
                'size' => 0,
                'eval' => 'trim',
                'default' => ''
            ],
        ],

    ],
];
