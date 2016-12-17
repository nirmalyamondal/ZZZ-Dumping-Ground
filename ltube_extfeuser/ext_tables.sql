#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (
	tx_ltubeextfeuser_gender tinytext NOT NULL,
	tx_ltubeextfeuser_salutation tinyint(4) DEFAULT '0' NOT NULL,
	tx_ltubeextfeuser_newsletter tinyint(4) unsigned DEFAULT '0' NOT NULL,
	tx_ltubeextfeuser_ztype tinyint(4) DEFAULT '0' NOT NULL,
	tx_ltubeextfeuser_function tinyint(4) DEFAULT '0' NOT NULL,
	tx_ltubeextfeuser_department tinyint(4) DEFAULT '0' NOT NULL,
	tx_ltubeextfeuser_zentrum tinyint(4) DEFAULT '0' NOT NULL,
);