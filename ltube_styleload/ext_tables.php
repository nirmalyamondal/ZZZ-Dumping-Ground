<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}



$tempColumns = array (
	"tx_ltubestyleload_file" => Array (		
		"exclude" => 1,		
		"label" => "LLL:EXT:ltube_styleload/locallang_db.xml:pages.tx_ltubestyleload_file",		
		"config" => Array (
			"type" => "group",
			"internal_type" => "file",
			"allowed" => "css",	
			"max_size" => 2000,	
			"uploadfolder" => "uploads/tx_ltubestyleload",
			"show_thumbs" => 1,
			"size" => 1,	
			"minitems" => 0,
			"maxitems" => 1,
		)
	),
	"tx_ltubestyleload_parent" => Array (		
		"exclude" => 1,		
		"label" => "LLL:EXT:ltube_styleload/locallang_db.xml:pages.tx_ltubestyleload_parent",		
		"config" => Array (
			"type" => "check",
		)
	),
);


t3lib_div::loadTCA('pages');
t3lib_extMgm::addTCAcolumns('pages',$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes('pages','tx_ltubestyleload_file;;;;1-1-1, tx_ltubestyleload_parent');

t3lib_extMgm::addStaticFile($_EXTKEY,'static/ltube_styleload/', 'ltube_styleload');


t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key,pages';

####################################################################
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'T3e Stylesheet Loader'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Learntube Stylesheet Loader');
