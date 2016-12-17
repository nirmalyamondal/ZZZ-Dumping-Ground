<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_learntubeglossary_domain_model_glossaryitem'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_learntubeglossary_domain_model_glossaryitem']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, description, category',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, description;;;richtext:rte_transform[mode=ts_links], category, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_learntubeglossary_domain_model_glossaryitem',
				'foreign_table_where' => 'AND tx_learntubeglossary_domain_model_glossaryitem.pid=###CURRENT_PID### AND tx_learntubeglossary_domain_model_glossaryitem.sys_language_uid IN (-1,0)',
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

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:learntube_glossary/Resources/Private/Language/locallang_db.xlf:tx_learntubeglossary_domain_model_glossaryitem.title',
			'config' => array(
				'type' => 'input',
				'size' => 255,
				'eval' => 'trim'
			)
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:learntube_glossary/Resources/Private/Language/locallang_db.xlf:tx_learntubeglossary_domain_model_glossaryitem.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
			),
			'defaultExtras' => 'richtext[]:rte_transform[mode=ts_links]'
		),
		'category' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:learntube_glossary/Resources/Private/Language/locallang_db.xlf:tx_learntubeglossary_domain_model_glossaryitem.category',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_learntubeglossary_domain_model_glossarycategory',
                                'foreign_table_where' => 'AND (sys_language_uid=CAST("###REC_FIELD_sys_language_uid###" AS UNSIGNED) OR sys_language_uid = "-1") AND tx_learntubeglossary_domain_model_glossarycategory.hidden=0 ORDER BY tx_learntubeglossary_domain_model_glossarycategory.title',
				'minitems' => 1,
				'maxitems' => 1,
				'size' => 1,
				'items' => array(
				),
			)
		),
		
	),
);
