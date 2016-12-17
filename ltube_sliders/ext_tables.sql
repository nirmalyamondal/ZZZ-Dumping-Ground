#
# Table structure for table 'tx_ltubesliders_domain_model_sliders'
#
CREATE TABLE tx_ltubesliders_domain_model_sliders (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
	description text NOT NULL,
	linktext varchar(255) DEFAULT '' NOT NULL,
	linkurl varchar(255) DEFAULT '' NOT NULL,
	sphoto tinytext NOT NULL,

	parentid int(11) DEFAULT '0' NOT NULL,
	parenttable tinytext NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),

);

#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
	tx_sliders_inline int(11) DEFAULT '0' NOT NULL,
);