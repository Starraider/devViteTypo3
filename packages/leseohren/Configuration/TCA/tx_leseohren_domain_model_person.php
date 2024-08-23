<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person',
        'label' => 'lastname',
        'label_alt' => 'firstname',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => true,
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'firstname,lastname',
        'iconfile' => 'EXT:leseohren/Resources/Public/Icons/tx_leseohren_domain_model_person.svg',
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'types' => [
        '1' => ['showitem' => '
                --div--;Person,
                    firstname, lastname, gender, title, job, birthday,
                    --palette--;;addressPalette,
                    --palette--;;contactPalette,
                    notes,
                --div--;Categories,
                    categories,
                --div--;Information,
                    --palette--;;statusPalette,
                    travel_options, languages,
                    --palette--;;preferencePalette,
                    organizations,
                --div--;Payment,
                    payment_method,
                    --palette--;;bankaccountPalette,
                    paypal,
                --div--;Files,
                    file_fuehrungszeugnis, fuehrungszeugnis_checked, file_mandat, file_others,
                --div--;Events,
                    events,
                --div--;Gifts,
                    donations,
                --div--;Blackboards,
                    blackboards,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    hidden,
                    starttime,
                    endtime'],
    ],
    'palettes' => [
        'addressPalette' => [
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.addressPalette.description',
            'showitem' => 'street1, --linebreak--, street2, --linebreak--, zip, city, district',
        ],
        'contactPalette' => [
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.contactPalette.description',
            'showitem' => 'phone_landline, phone_mobile, --linebreak--, email, whatsapp',
        ],
        'statusPalette' => [
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.statusPalette.description',
            'showitem' => 'status, statuschange_date, --linebreak--, statusbegin_date, statusend_date',
        ],
        'preferencePalette' => [
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.preferencePalette.description',
            'showitem' => 'preference_agegroup, preference_organization_type',
        ],
        'bankaccountPalette' => [
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.bankaccountPalette.description',
            'showitem' => 'iban, swift, --linebreak--, account_owner, bankname',
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
                    'startingPoints' => '1',
                    'nonSelectableLevels' => 0,
                ],
            ],
        ],

        'gender' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.gender',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.gender.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.gender.0', 'value' => 0],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.gender.1', 'value' => 1],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.gender.2', 'value' => 2],
                ],
                'size' => 1,
                'maxitems' => 1,
                'required' => true,
                'eval' => ''
            ],
        ],

        'firstname' => [
            'exclude' => false,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.firstname',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.firstname.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'lastname' => [
            'exclude' => false,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.lastname',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.lastname.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => '',
                'required' => true
            ],
        ],
        'title' => [
            'exclude' => false,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.title',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.title.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => '',
                'required' => false
            ],
        ],
        'job' => [
            'exclude' => false,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.job',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.job.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => '',
                'required' => false
            ],
        ],
        'birthday' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.birthday',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.birthday.description',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'required' => false,
                'size' => 20,
                'default' => 0,
            ],
        ],
        'street1' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.street1',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.street1.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'street2' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.street2',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.street2.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'zip' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.zip',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.zip.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.city',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.city.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'district' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.district',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.district.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.0', 'value' => 'Sonstige'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.1', 'value' => 'Bad Cannstatt'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.2', 'value' => 'Birkach'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.3', 'value' => 'Botnang'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.4', 'value' => 'Degerloch'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.5', 'value' => 'Feuerbach'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.6', 'value' => 'Hedelfingen'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.7', 'value' => 'Möhringen'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.8', 'value' => 'Mühlhausen'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.9', 'value' => 'Münster'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.10', 'value' => 'Obertürkheim'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.11', 'value' => 'Plieningen'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.12', 'value' => 'Sillenbuch'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.13', 'value' => 'Stammheim'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.14', 'value' => 'Stuttgart‐Mitte'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.15', 'value' => 'Stuttgart‐Nord'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.16', 'value' => 'Stuttgart‐Ost'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.17', 'value' => 'Stuttgart‐Süd'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.18', 'value' => 'Stuttgart‐West'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.19', 'value' => 'Untertürkheim'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.20', 'value' => 'Vaihingen'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.21', 'value' => 'Wangen'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.22', 'value' => 'Weilimdorf'],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.district.23', 'value' => 'Zuffenhausen'],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'phone_landline' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.phone_landline',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.phone_landline.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'phone_mobile' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.phone_mobile',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.phone_mobile.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'email' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.email',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.email.description',
            'config' => [
                'type' => 'email',
                'eval' => 'nospace,email',
            ]
        ],
        'whatsapp' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.whatsapp',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.whatsapp.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'notes' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.notes',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.notes.description',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 10,
                'eval' => 'trim',
                'default' => ''
            ]
        ],
        'status' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.status',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.status.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.status.0', 'value' => 0],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.status.1', 'value' => 1],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.status.2', 'value' => 2],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'statuschange_date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.statuschange_date',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.statuschange_date.description',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'required' => true,
                'size' => 20,
                'default' => 0,
            ],
        ],
        'statusbegin_date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.statusbegin_date',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.statusbegin_date.description',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'required' => true,
                'size' => 20,
                'default' => 0,
            ],
        ],
        'statusend_date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.statusend_date',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.statusend_date.description',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'required' => false,
                'size' => 20,
                'default' => 0,
            ],
        ],
        'travel_options' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.travel_options',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.travel_options.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.travelOptions.0', 'value' => 0],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.travelOptions.1', 'value' => 1],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.travelOptions.2', 'value' => 2],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.travelOptions.3', 'value' => 3],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.travelOptions.4', 'value' => 4],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.travelOptions.5', 'value' => 5],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'languages' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.languages',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.languages.description',
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
        'preference_agegroup' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.preference_agegroup',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.preference_agegroup.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'items' => [
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.ageGroup.0', 'value' => 0],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.ageGroup.1', 'value' => 1],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.ageGroup.2', 'value' => 2],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.ageGroup.3', 'value' => 3],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.ageGroup.4', 'value' => 4],
                ],
            ],
        ],
        'preference_organization_type' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.preference_organization_type',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.preference_organization_type.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectCheckBox',
                'items' => [
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.orgType.0', 'value' => 0],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.orgType.1', 'value' => 1],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.orgType.2', 'value' => 2],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.orgType.3', 'value' => 3],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.orgType.4', 'value' => 4],
                ],
            ],
        ],
        'payment_method' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.payment_method',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.payment_method.description',
            'onChange' => 'reload',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.paymentMethod.0', 'value' => 0],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.paymentMethod.1', 'value' => 1],
                    ['label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang.xlf:tx_leseohren.paymentMethod.2', 'value' => 2],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'iban' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.iban',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.iban.description',
            'displayCond' => 'FIELD:payment_method:!=:2',
            'config' => [
                'type' => 'input',
                'size' => 34,
                'min' => 14,
                'max' => 22,
                'eval' => 'alphanum,upper,nospace',
                'default' => ''
            ],
        ],
        'swift' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.swift',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.swift.description',
            'displayCond' => 'FIELD:payment_method:!=:2',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'min' => 8,
                'max' => 11,
                'eval' => 'alphanum,upper,nospace',
                'default' => ''
            ],
        ],
        'account_owner' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.account_owner',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.account_owner.description',
            'displayCond' => 'FIELD:payment_method:!=:2',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'bankname' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.bankname',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.bankname.description',
            'displayCond' => 'FIELD:payment_method:!=:2',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'paypal' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.paypal',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.paypal.description',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
            'displayCond' => 'FIELD:payment_method:=:2',
        ],
        'file_fuehrungszeugnis' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.file_fuehrungszeugnis',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.file_fuehrungszeugnis.description',
            'config' => [
                'type' => 'file',
                'maxitems' => 1,
                'allowed' => 'pdf,doc,docx,xls,xlsx,txt,md,zip,tar,gz'
            ],
        ],
        'fuehrungszeugnis_checked' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.fuehrungszeugnis_checked',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.fuehrungszeugnis_checked.description',
            'config' => [
                'type' => 'check',
                'items' => [
                    [
                        'geprüft',
                    ],
                ],
            ],
        ],
        'file_mandat' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.file_mandat',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.file_mandat.description',
            'config' => [
                'type' => 'file',
                'maxitems' => 1,
                'allowed' => 'pdf,doc,docx,xls,xlsx,txt,md,zip,tar,gz'
            ],
        ],
        'file_others' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.file_others',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.file_others.description',
            'config' => [
                'type' => 'file',
                'maxitems' => 20,
                'allowed' => 'pdf,doc,docx,xls,xlsx,txt,md,zip,tar,gz'
            ],
        ],
        'donations' => [
            'exclude' => false,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.donations',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.donations.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_leseohren_domain_model_present',
                'foreign_field' => 'person',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 1,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
        'blackboards' => [
            'exclude' => false,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.blackboards',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.blackboards.description',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_leseohren_domain_model_blackboard',
                'foreign_field' => 'person',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 1,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
        'events' => [
            'exclude' => false,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_event.participants',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_event.participants.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_leseohren_domain_model_event',
                'MM' => 'tx_leseohren_event_person_mm',
                'MM_opposite_field' => 'participants',
                'size' => 10,
                'autoSizeMax' => 20,
            ],
        ],
        'organizations' => [
            'exclude' => false,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.organizations',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.organizations.description',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_leseohren_domain_model_organization',
                'MM' => 'tx_leseohren_organization_person_mm',
                'MM_opposite_field' => 'organizations',
                'size' => 10,
                'autoSizeMax' => 20,
            ],
        ],

    ],
];
