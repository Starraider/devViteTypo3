CREATE TABLE tx_leseohren_domain_model_person (
	firstname varchar(255) NOT NULL DEFAULT '',
	lastname varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_leseohren_domain_model_organization (
	name varchar(255) NOT NULL DEFAULT '',
	contact_person int(11) unsigned DEFAULT '0'
);
