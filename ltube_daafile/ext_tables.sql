#
# Table structure for table 'tx_ltubedaafile_domain_model_daafile'
#
CREATE TABLE tx_ltubedaafile_domain_model_daafile (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) DEFAULT '' NOT NULL,
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
	tx_daafile_inline int(11) DEFAULT '0' NOT NULL,
);