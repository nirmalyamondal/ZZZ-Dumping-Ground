<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_learntubepdfcertificate_domain_model_items'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_learntubepdfcertificate_domain_model_items']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, feuser, datetime, ttcontent, srcpageid',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, feuser, datetime, ttcontent, srcpageid, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
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

		'feuser' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:learntube_pdfcertificate/Resources/Private/Language/locallang_db.xlf:tx_learntubepdfcertificate_domain_model_items.feuser',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingleBox',
				'items' => array(
					array('-- Label --', 0),
				),
				"foreign_table" => "fe_users",	
				"foreign_table_where" => "ORDER BY fe_users.username",	
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'datetime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:learntube_pdfcertificate/Resources/Private/Language/locallang_db.xlf:tx_learntubepdfcertificate_domain_model_items.datetime',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'ttcontent' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:learntube_pdfcertificate/Resources/Private/Language/locallang_db.xlf:tx_learntubepdfcertificate_domain_model_items.ttcontent',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'srcpageid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:learntube_pdfcertificate/Resources/Private/Language/locallang_db.xlf:tx_learntubepdfcertificate_domain_model_items.srcpageid',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		
	),
);
