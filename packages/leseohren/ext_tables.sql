CREATE TABLE tx_leseohren_domain_model_person (
	firstname varchar(255) NOT NULL DEFAULT '',
	lastname varchar(255) NOT NULL DEFAULT '',
	donations int(11) unsigned NOT NULL DEFAULT '0',
	blackboards int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_leseohren_domain_model_organization (
	name varchar(255) NOT NULL DEFAULT '',
	contact_person int(11) unsigned DEFAULT '0'
);

CREATE TABLE tx_leseohren_domain_model_gift (
	title varchar(255) NOT NULL DEFAULT '',
	description text NOT NULL DEFAULT ''
);

CREATE TABLE tx_leseohren_domain_model_present (
	person int(11) unsigned DEFAULT '0' NOT NULL,
	given smallint(1) unsigned NOT NULL DEFAULT '0',
	gift int(11) unsigned DEFAULT '0'
);

CREATE TABLE tx_leseohren_domain_model_blackboard (
	person int(11) unsigned DEFAULT '0' NOT NULL,
	title varchar(255) NOT NULL DEFAULT '',
	description text NOT NULL DEFAULT ''
);

CREATE TABLE tx_leseohren_domain_model_event (
	title varchar(255) NOT NULL DEFAULT '',
	description text NOT NULL DEFAULT '',
	location text NOT NULL DEFAULT '',
	participants int(11) unsigned NOT NULL DEFAULT '0'
);
