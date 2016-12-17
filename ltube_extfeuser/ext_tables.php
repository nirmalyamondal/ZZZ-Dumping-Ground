<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Extend FE User');


$tempColumns = array (
	'tx_ltubeextfeuser_gender' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_gender',		
		'config' => array (
			'type' => 'select',
			'items' => array (
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_gender.I.0', '0'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_gender.I.1', '1'),
			),
			'size' => 1,	
			'maxitems' => 1,
		)
	),
	'tx_ltubeextfeuser_salutation' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_salutation',		
		'config' => array (
			'type' => 'select',
			'items' => array (
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_salutation.I.0', '0'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_salutation.I.1', '1'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_salutation.I.2', '2'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_salutation.I.3', '3'),
			),
			'size' => 1,	
			'maxitems' => 1,
		)
	),	
	"tx_ltubeextfeuser_newsletter" => Array (		
		"exclude" => 1,		
		"label" => "LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_newsletter",		
		"config" => Array (
			"type" => "check",			
            'default' => 0,
		)
	),
	'tx_ltubeextfeuser_ztype' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_ztype',		
		'config' => array (
			'type' => 'radio',
			'items' => array (
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_ztype.I.0', '0'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_ztype.I.1', '1'),
			),
		)
	),
	'tx_ltubeextfeuser_function' => array(		
		'exclude' => 0,		
		'label' => 'LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_function',		
		'config' => array(
			'type' => 'select',
			'items' => array (
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_function.I.0', '0'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_function.I.1', '1'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_function.I.2', '2'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_function.I.3', '3'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_function.I.4', '4'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_function.I.5', '5'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_function.I.6', '6'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_function.I.7', '7'),
			),
			'size' => 1,	
			'maxitems' => 1,
		)
	),
	'tx_ltubeextfeuser_department' => array(		
		'exclude' => 0,		
		'label' => 'LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_department',		
		'config' => array(
			'type' => 'select',
			'items' => array (
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_department.I.0', '0'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_department.I.1', '1'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_department.I.2', '2'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_department.I.3', '3'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_department.I.4', '4'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_department.I.5', '5'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_department.I.6', '6'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_department.I.7', '7'),
				array('LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_department.I.8', '8'),
			),
			'size' => 1,	
			'maxitems' => 1,
		)
	),
	'tx_ltubeextfeuser_zentrum' => array (
		'exclude' => 0,
		'label' => 'LLL:EXT:ltube_extfeuser/locallang_db.xml:tx_ltubeextfeuser_zentrum',
		'config' => array (
			'type' => 'select',
			'items' => array (
				array('- Bitte wählen Sie Ihr Zentrum aus -',0),
			),
			'foreign_table' => 'tx_ltubezentren_detail',
			'foreign_table_where' => 'ORDER BY tx_ltubezentren_detail.namezentrums',
			'size' => 1,
			'minitems' => 0,
			'maxitems' => 1,
		)
	),
  );

t3lib_div::loadTCA('fe_users');
t3lib_extMgm::addTCAcolumns('fe_users',$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes('fe_users','tx_ltubeextfeuser_gender,tx_ltubeextfeuser_salutation;;;;1-1-1,tx_ltubeextfeuser_newsletter,tx_ltubeextfeuser_ztype,tx_ltubeextfeuser_function,tx_ltubeextfeuser_department,tx_ltubeextfeuser_zentrum');

?>