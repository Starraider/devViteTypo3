<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => true,
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'name',
        'iconfile' => 'EXT:leseohren/Resources/Public/Icons/tx_leseohren_domain_model_organization.svg',
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'types' => [
        '1' => ['showitem' => '
            --div--;Organization,
                name,
                contact_person,
                --palette--;;addressPalette,
                --palette--;;contactPalette,
                categories,
                notes,
            --div--;Vorlesepaten,
                vp_number, vlpaten, reading_times, vp_languages,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                hidden,
                starttime,
                endtime'],
    ],
    'palettes' => [
        'addressPalette' => [
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.addressPalette.description',
            'showitem' => 'street1, street2, --linebreak--, zip, city, district',
        ],
        'contactPalette' => [
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.contactPalette.description',
            'showitem' => 'phone1, phone2, --linebreak--, email, url, --linebreak--, opening_hours, whatsapp',
        ],
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
                        'label' => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'datetime',
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
                'type' => 'datetime',
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
            'config' => [
                'type' => 'category',
                'treeConfig' => [
                    'startingPoints' => '10',
                    'nonSelectableLevels' => '0',
                ],
            ],
        ],
        'name' => [
            'exclude' => false,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.name',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.name.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true,
                'default' => ''
            ],
        ],
        'street1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.street1',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.street1.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'street2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.street2',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.street2.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'zip' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.zip',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.zip.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.city',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.city.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'district' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.district',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.district.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => 'Sonstige', 'value' => 'Sonstige'],
                    ['label' => 'Bad Cannstatt', 'value' => 'Bad Cannstatt'],
                    ['label' => 'Birkach', 'value' => 'Birkach'],
                    ['label' => 'Botnang', 'value' => 'Botnang'],
                    ['label' => 'Degerloch', 'value' => 'Degerloch'],
                    ['label' => 'Feuerbach', 'value' => 'Feuerbach'],
                    ['label' => 'Hedelfingen', 'value' => 'Hedelfingen'],
                    ['label' => 'Möhringen', 'value' => 'Möhringen'],
                    ['label' => 'Mühlhausen', 'value' => 'Mühlhausen'],
                    ['label' => 'Münster', 'value' => 'Münster'],
                    ['label' => 'Obertürkheim', 'value' => 'Obertürkheim'],
                    ['label' => 'Plieningen', 'value' => 'Plieningen'],
                    ['label' => 'Sillenbuch', 'value' => 'Sillenbuch'],
                    ['label' => 'Stammheim', 'value' => 'Stammheim'],
                    ['label' => 'Stuttgart‐Mitte', 'value' => 'Stuttgart‐Mitte'],
                    ['label' => 'Stuttgart‐Nord', 'value' => 'Stuttgart‐Nord'],
                    ['label' => 'Stuttgart‐Ost', 'value' => 'Stuttgart‐Ost'],
                    ['label' => 'Stuttgart‐Süd', 'value' => 'Stuttgart‐Süd'],
                    ['label' => 'Stuttgart‐West', 'value' => 'Stuttgart‐West'],
                    ['label' => 'Untertürkheim', 'value' => 'Untertürkheim'],
                    ['label' => 'Vaihingen', 'value' => 'Vaihingen'],
                    ['label' => 'Wangen', 'value' => 'Wangen'],
                    ['label' => 'Weilimdorf', 'value' => 'Weilimdorf'],
                    ['label' => 'Zuffenhausen', 'value' => 'Zuffenhausen'],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'phone1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.phone1',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.phone1.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'phone2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.phone2',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.phone2.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.email',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.email.description',
            'config' => [
                'type' => 'email',
                'size' => 30,
                'eval' => 'nospace',
                'default' => ''
            ]
        ],
        'url' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.url',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.url.description',
            'config' => [
                'type' => 'link',
            ]
        ],
        'whatsapp' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.whatsapp',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.whatsapp.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'opening_hours' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.opening_hours',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.opening_hours.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 5,
                'eval' => 'trim',
                'default' => ''
            ]
        ],
        'notes' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.notes',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.notes.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'default' => ''
            ]
        ],
        'reading_times' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.reading_times',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.reading_times.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 5,
                'eval' => 'trim',
                'default' => ''
            ]
        ],
        'vp_languages' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.vp_languages',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.vp_languages.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'items' => [
                    ['label' => 'Deutsch','value' => '0'],
                    ['label' => 'Englisch','value' => '1'],
                    ['label' => 'Französisch','value' => '2'],
                    ['label' => 'Italienisch','value' => '3'],
                    ['label' => 'Spanisch','value' => '4'],
                    ['label' => 'Türkisch','value' => '5'],
                    ['label' => 'Russisch','value' => '6'],
                    ['label' => 'Arabisch','value' => '7'],
                    ['label' => 'Farsi/Persisch','value' => '8'],
                    ['label' => 'Sonstiges','value' => '9'],
                ],
            ],
        ],
        'vp_number' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.vp_number',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.vp_number.description',
            'config' => [
                'type' => 'number',
                'size' => 4,
                'default' => 0
            ]
        ],
        'vlpaten' => [
            'exclude' => false,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.vlpaten',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.vlpaten.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_leseohren_domain_model_person',
                'MM' => 'tx_leseohren_organization_person_mm',
                'size' => 10,
                'autoSizeMax' => 20,
            ],
        ],
        'contact_person' => [
            'exclude' => false,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.contact_person',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_organization.contact_person.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'tx_leseohren_domain_model_person',
                'default' => 0,
                'minitems' => 0,
                'maxitems' => 1,
            ],

        ],

    ],
];
