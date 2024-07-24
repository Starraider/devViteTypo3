CREATE TABLE tx_leseohren_domain_model_person (
	gender int(11) DEFAULT '0' NOT NULL,
	firstname varchar(255) NOT NULL DEFAULT '',
	lastname varchar(255) NOT NULL DEFAULT '',
	title varchar(255) NOT NULL DEFAULT '',
	job varchar(255) NOT NULL DEFAULT '',
	street1 varchar(255) NOT NULL DEFAULT '',
	street2 varchar(255) NOT NULL DEFAULT '',
	zip varchar(255) NOT NULL DEFAULT '',
	city varchar(255) NOT NULL DEFAULT '',
	district varchar(255) NOT NULL DEFAULT '',
	phone_landline varchar(255) NOT NULL DEFAULT '',
	phone_mobile varchar(255) NOT NULL DEFAULT '',
	email varchar(255) NOT NULL DEFAULT '',
	whatsapp varchar(255) NOT NULL DEFAULT '',
	notes text NOT NULL DEFAULT '',
	status int(11) DEFAULT '0' NOT NULL,
	travel_options int(11) DEFAULT '0' NOT NULL,
	languages varchar(255) NOT NULL DEFAULT '',
	preference_agegroup text NOT NULL DEFAULT '',
	preference_organization_type text NOT NULL DEFAULT '',
	payment_method int(11) DEFAULT '0' NOT NULL,
	iban varchar(255) NOT NULL DEFAULT '',
	swift varchar(255) NOT NULL DEFAULT '',
	account_owner varchar(255) NOT NULL DEFAULT '',
	bankname varchar(255) NOT NULL DEFAULT '',
	paypal varchar(255) NOT NULL DEFAULT '',
	file_fuehrungszeugnis int(11) unsigned NOT NULL DEFAULT '0',
	file_mandat int(11) unsigned NOT NULL DEFAULT '0',
	file_others int(11) unsigned NOT NULL DEFAULT '0',
	donations int(11) unsigned NOT NULL DEFAULT '0',
	blackboards int(11) unsigned NOT NULL DEFAULT '0',
	events int(11) unsigned NOT NULL DEFAULT '0',
	organizations int(11) unsigned NOT NULL DEFAULT '0',
);

CREATE TABLE tx_leseohren_domain_model_organization (
	name varchar(255) NOT NULL DEFAULT '',
	street1 varchar(255) NOT NULL DEFAULT '',
	street2 varchar(255) NOT NULL DEFAULT '',
	zip varchar(255) NOT NULL DEFAULT '',
	city varchar(255) NOT NULL DEFAULT '',
	district varchar(255) NOT NULL DEFAULT '',
	phone1 varchar(255) NOT NULL DEFAULT '',
	phone2 varchar(255) NOT NULL DEFAULT '',
	email varchar(255) NOT NULL DEFAULT '',
	url varchar(255) NOT NULL DEFAULT '',
	whatsapp varchar(255) NOT NULL DEFAULT '',
	opening_hours text NOT NULL DEFAULT '',
	notes text NOT NULL DEFAULT '',
	reading_times text NOT NULL DEFAULT '',
	vp_languages varchar(255) NOT NULL DEFAULT '',
	vp_number int(11) NOT NULL DEFAULT '0',
	vlpaten int(11) unsigned NOT NULL DEFAULT '0',
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
