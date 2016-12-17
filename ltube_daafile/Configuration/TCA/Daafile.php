<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_ltubedaafile_domain_model_daafile'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_ltubedaafile_domain_model_daafile']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, title, sphoto',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, title, sphoto, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(

		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ltube_daafile/Resources/Private/Language/locallang_db.xlf:tx_ltubedaafile_domain_model_daafile.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'required,trim'
			),
		),		
		'sphoto' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ltube_daafile/Resources/Private/Language/locallang_db.xlf:tx_ltubedaafile_domain_model_daafile.sphoto',
			"config" => Array (
				"type" => "group",
				"internal_type" => "file",
				//"allowed" => "",	
				"disallowed" => "inc,conf,sql,cgi,htaccess,php,php3,php4,php5",
				"max_size" => 2000,	
				"uploadfolder" => "uploads/tx_ltubedaafile",
				"show_thumbs" => 1,
				"size" => 1,	
				"minitems" => 1,
				"maxitems" => 1,
			)
		),		
	),
);

?>