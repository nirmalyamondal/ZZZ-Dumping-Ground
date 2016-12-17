<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_ltubesliders_domain_model_sliders'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_ltubesliders_domain_model_sliders']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, title, description, linktext, linkurl, sphoto',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, title, description;;;richtext:rte_transform[mode=ts_links], linktext, linkurl, sphoto, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
			'label' => 'LLL:EXT:ltube_sliders/Resources/Private/Language/locallang_db.xlf:tx_ltubesliders_domain_model_sliders.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ltube_sliders/Resources/Private/Language/locallang_db.xlf:tx_ltubesliders_domain_model_sliders.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'linktext' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ltube_sliders/Resources/Private/Language/locallang_db.xlf:tx_ltubesliders_domain_model_sliders.linktext',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'linkurl' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ltube_sliders/Resources/Private/Language/locallang_db.xlf:tx_ltubesliders_domain_model_sliders.linkurl',
			'config' => array(
				'type' => 'group',	
				'internal_type' => 'db',	
				'allowed' => 'pages',	
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'sphoto' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:ltube_sliders/Resources/Private/Language/locallang_db.xlf:tx_ltubesliders_domain_model_sliders.sphoto',
			"config" => Array (
				"type" => "group",
				"internal_type" => "file",
				"allowed" => "jpg,gif,png",	
				"max_size" => 2000,	
				"uploadfolder" => "uploads/tx_ltubesliders",
				"show_thumbs" => 1,
				"size" => 1,	
				"minitems" => 0,
				"maxitems" => 1,
			)
		),		
	),
);

?>