#
# Table structure for table 'tx_ltubejswiki_domain_model_wikipedia'
#
CREATE TABLE tx_ltubejswiki_domain_model_wikipedia (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	wiki_title varchar(255) DEFAULT '' NOT NULL,
	show_title varchar(255) DEFAULT '0' NOT NULL,
	max_thumbnails int(11) DEFAULT '0' NOT NULL,
	cut_first_info_table_rows int(11) DEFAULT '0' NOT NULL,
	max_info_table_rows int(11) DEFAULT '0' NOT NULL,
	thumb_max_width int(11) DEFAULT '0' NOT NULL,
	thumb_max_height int(11) DEFAULT '0' NOT NULL,

	parentid int(11) DEFAULT '0' NOT NULL,
	parenttable tinytext NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
	KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
	tx_wikipedia_inline int(11) DEFAULT '0' NOT NULL,
);