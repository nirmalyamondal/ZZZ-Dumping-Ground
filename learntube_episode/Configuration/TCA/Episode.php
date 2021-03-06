<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_learntubeepisode_domain_model_episode'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_learntubeepisode_domain_model_episode']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, sdescription, description, image, ialttext, edate, detailpage, category, sent',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, sdescription, description;;;richtext:rte_transform[mode=ts_links], image, ialttext, edate, detailpage, category, sent, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
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
				'foreign_table' => 'tx_learntubeepisode_domain_model_episode',
				'foreign_table_where' => 'AND tx_learntubeepisode_domain_model_episode.pid=###CURRENT_PID### AND tx_learntubeepisode_domain_model_episode.sys_language_uid IN (-1,0)',
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

		'name' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:learntube_episode/Resources/Private/Language/locallang_db.xlf:tx_learntubeepisode_domain_model_episode.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'sdescription' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:learntube_episode/Resources/Private/Language/locallang_db.xlf:tx_learntubeepisode_domain_model_episode.sdescription',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
				'eval' => 'trim'
			),
		),
		'description' => array(
			'exclude' => 1,
			'l10n_mode' => 'noCopy',
			'label' => 'LLL:EXT:learntube_episode/Resources/Private/Language/locallang_db.xlf:tx_learntubeepisode_domain_model_episode.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 5,
			),
			'defaultExtras' => 'richtext[]:rte_transform[mode=ts_links]'
		),
		'image' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:learntube_episode/Resources/Private/Language/locallang_db.xlf:tx_learntubeepisode_domain_model_episode.image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'image',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		'ialttext' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:learntube_episode/Resources/Private/Language/locallang_db.xlf:tx_learntubeepisode_domain_model_episode.ialttext',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'edate' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:learntube_episode/Resources/Private/Language/locallang_db.xlf:tx_learntubeepisode_domain_model_episode.edate',
			'config' => array(
				'type' => 'input',
				'size' => 10,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'detailpage' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:learntube_episode/Resources/Private/Language/locallang_db.xlf:tx_learntubeepisode_domain_model_episode.detailpage',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'pages',
				'size' => 1,
				'maxitems' => 1,
				'minitems' => 0,
				'show_thumbs'=> 1
			)
		),
		'category' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:learntube_episode/Resources/Private/Language/locallang_db.xlf:tx_learntubeepisode_domain_model_episode.category',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_learntubeepisode_domain_model_category',
                                'foreign_table_where' => 'AND (sys_language_uid=CAST("###REC_FIELD_sys_language_uid###" AS UNSIGNED) OR sys_language_uid = "-1") AND tx_learntubeepisode_domain_model_category.hidden=0 ORDER BY tx_learntubeepisode_domain_model_category.name',
				'minitems' => 1,
				'maxitems' => 1,
				'size' => 1,
				'items' => array(
				),
			)
		),
		'sent' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:learntube_episode/Resources/Private/Language/locallang_db.xlf:tx_learntubeepisode_domain_model_episode.sent',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		
	),
);
