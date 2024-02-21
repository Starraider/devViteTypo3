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
        'iconfile' => 'EXT:leseohren/Resources/Public/Icons/tx_leseohren_domain_model_person.gif',
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'types' => [
        '1' => ['showitem' => '
                --div--;Person,
                    firstname, lastname, gender, birthday,
                    --palette--;;addressPalette,
                    --palette--;;contactPalette,
                    notes,
                --div--;Information,
                    --palette--;;statusPalette,
                    travel_options, languages,
                    --palette--;;preferencePalette,
                --div--;Payment,
                    payment_method,
                    --palette--;;bankaccountPalette,
                    paypal,
                --div--;Files,
                    file_fuehrungszeugnis, file_mandat, file_others,
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
            'showitem' => 'status, statusbegin_date, statusend_date',
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
            'config'=> [
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
                    ['label' => '-- bitte wählen --', 'value' => 0],
                    ['label' => 'weiblich', 'value' => 1],
                    ['label' => 'männlich', 'value' => 2],
                    ['label' => 'divers', 'value' => 3],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],

        'firstname' => [
            'exclude' => false,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.firstname',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.firstname.description',
            'config' => [
                'type' => 'input',
                'size' => 0,
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
                'size' => 0,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'birthday' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.birthday',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.birthday.description',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'required' => true,
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
                    ['label' => 'aktiv', 'value' => 0],
                    ['label' => 'pausiert', 'value' => 1],
                    ['label' => 'ausgeschieden', 'value' => 2],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
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
                    ['label' => 'Auto/Motorrad', 'value' => 0],
                    ['label' => 'Bus/Bahn', 'value' => 1],
                    ['label' => 'Fahrrad', 'value' => 2],
                    ['label' => 'zu Fuß', 'value' => 3],
                    ['label' => 'Sonstiges', 'value' => 4],
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
                    ['label' => '0-4', 'value' => 0],
                    ['label' => '4-8', 'value' => 1],
                    ['label' => '8-12', 'value' => 2],
                    ['label' => '12-18', 'value' => 3],
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
                    ['label' => 'Kindergarten', 'value' => 0],
                    ['label' => 'Schule', 'value' => 1],
                    ['label' => 'Bibliothek', 'value' => 2],
                    ['label' => 'Buchhandlung', 'value' => 3],
                    ['label' => 'Leseheimat', 'value' => 4],
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
                    ['label' => 'Bank transfer', 'value' => 0],
                    ['label' => 'Direct debit', 'value' => 1],
                    ['label' => 'Paypal', 'value' => 2],
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
                'maxitems' => 20,
                'allowed' => 'pdf,doc,docx,xls,xlsx,txt,md,zip,tar,gz'
            ],
        ],
        'file_mandat' => [
            'exclude' => true,
            'label' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.file_mandat',
            'description' => 'LLL:EXT:leseohren/Resources/Private/Language/locallang_db.xlf:tx_leseohren_domain_model_person.file_mandat.description',
            'config' => [
                'type' => 'file',
                'maxitems' => 20,
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

    ],
];
