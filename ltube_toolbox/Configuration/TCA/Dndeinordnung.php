<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_ltubetoolbox_domain_model_dndeinordnung'] = array(
	'ctrl' => $TCA['tx_ltubetoolbox_domain_model_dndeinordnung']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, dnd_card_name, dnd_card_content, dnd_card_bgcolor, dnd_card_match_column, parentid, parenttable',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, dnd_card_name, dnd_card_content, dnd_card_bgcolor, dnd_card_match_column'),
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
				'foreign_table' => 'tx_ltubetoolbox_domain_model_dndeinordnung',
				'foreign_table_where' => 'AND tx_ltubetoolbox_domain_model_dndeinordnung.pid=###CURRENT_PID### AND tx_ltubetoolbox_domain_model_dndeinordnung.sys_language_uid IN (-1,0)',
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
		'dnd_card_name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_dndeinordnung.dnd_card_name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'dnd_card_content' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_dndeinordnung.dnd_card_content',
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
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
			'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
		),
		'dnd_card_bgcolor' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_dndeinordnung.dnd_card_bgcolor',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'wizards' => array(
					'colorpick' => array(
						'type' => 'colorbox',
						'title' => 'Color picker',
						'script' => 'wizard_colorpicker.php',
						'dim' => '20x20',
						'tableStyle' => 'border: solid 1px black; margin-left: 20px;',
						'JSopenParams' => 'height=550,width=365,status=0,menubar=0,scrollbars=1',
						'exampleImg' => 'gfx/wizard_colorpickerex.jpg',
					),
				),
			),
		),
		'dnd_card_match_column' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_dndeinordnung.dnd_card_match_column',
			'config' => array(
				'type' => 'select',
				'items' => array(
					Array("LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:einordnung.match_column.I.0", "1"),
					Array("LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:einordnung.match_column.I.1", "2"),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => 'required'
			),
		),
		'parentid' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_dndeinordnung.parentid',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'parenttable' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_dndeinordnung.parenttable',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
	),
);

?>