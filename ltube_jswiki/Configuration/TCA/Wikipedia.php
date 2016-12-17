<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_ltubejswiki_domain_model_wikipedia'] = array(
	'ctrl' => $TCA['tx_ltubejswiki_domain_model_wikipedia']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, wiki_title, show_title, max_thumbnails, cut_first_info_table_rows, max_info_table_rows, thumb_max_width, thumb_max_height',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, wiki_title, show_title, max_thumbnails, cut_first_info_table_rows, max_info_table_rows, thumb_max_width, thumb_max_height,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_ltubejswiki_domain_model_wikipedia',
				'foreign_table_where' => 'AND tx_ltubejswiki_domain_model_wikipedia.pid=###CURRENT_PID### AND tx_ltubejswiki_domain_model_wikipedia.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
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
		'wiki_title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:tx_ltubejswiki_domain_model_wikipedia.wiki_title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'show_title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:tx_ltubejswiki_domain_model_wikipedia.show_title',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:yes', 'true'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:no', 'false'),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'max_thumbnails' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:tx_ltubejswiki_domain_model_wikipedia.max_thumbnails',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:zero', '0'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:one', '1'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:two', '2'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:three', '3'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:four', '4'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:five', '5'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:six', '6'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:seven', '7'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:eight', '8'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:nine', '9'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:ten', '10'),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'cut_first_info_table_rows' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:tx_ltubejswiki_domain_model_wikipedia.cut_first_info_table_rows',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:zero', '0'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:one', '1'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:two', '2'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:three', '3'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:four', '4'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:five', '5'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:six', '6'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:seven', '7'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:eight', '8'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:nine', '9'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:ten', '10'),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'max_info_table_rows' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:tx_ltubejswiki_domain_model_wikipedia.max_info_table_rows',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:zero', '0'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:one', '1'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:two', '2'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:three', '3'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:four', '4'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:five', '5'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:six', '6'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:seven', '7'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:eight', '8'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:nine', '9'),
					array('LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:ten', '10'),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'thumb_max_width' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:tx_ltubejswiki_domain_model_wikipedia.thumb_max_width',
			'config' => array(
				'type' => 'input',
				'size' => 3,
				'eval' => 'int'
			),
		),
		'thumb_max_height' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:tx_ltubejswiki_domain_model_wikipedia.thumb_max_height',
			'config' => array(
				'type' => 'input',
				'size' => 3,
				'eval' => 'int'
			),
		),
	),
);

?>