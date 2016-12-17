<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'LMS3 Episode'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Episode Management');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_learntubeepisode_domain_model_category', 'EXT:learntube_episode/Resources/Private/Language/locallang_csh_tx_learntubeepisode_domain_model_category.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_learntubeepisode_domain_model_category');
$GLOBALS['TCA']['tx_learntubeepisode_domain_model_category'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:learntube_episode/Resources/Private/Language/locallang_db.xlf:tx_learntubeepisode_domain_model_category',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,icon,iconalttext,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Category.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_learntubeepisode_domain_model_category.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_learntubeepisode_domain_model_episode', 'EXT:learntube_episode/Resources/Private/Language/locallang_csh_tx_learntubeepisode_domain_model_episode.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_learntubeepisode_domain_model_episode');
$GLOBALS['TCA']['tx_learntubeepisode_domain_model_episode'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:learntube_episode/Resources/Private/Language/locallang_db.xlf:tx_learntubeepisode_domain_model_episode',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,sdescription,description,image,ialttext,edate,detailpage,category,sent,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Episode.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_learntubeepisode_domain_model_episode.gif'
	),
);

$tempColumns = array (
	'tx_learntubeepisode_subscribe' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:ltube_episodesubscribe/locallang_db.xml:tt_address.tx_learntubeepisode_subscribe',		
		'config' => array (
			'type' => 'check',
		)
	),
	'tx_learntubeepisode_sdate' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:ltube_episodesubscribe/locallang_db.xml:tt_address.tx_learntubeepisode_sdate',		
		'config' => array (
			'type'     => 'input',
			'size'     => '8',
			'max'      => '20',
			'eval'     => 'date',
			'checkbox' => '0',
			'default'  => '0'
		)
	),
	'tx_learntubeepisode_episode' => array (		
		'exclude' => 0,		
		'label' => 'LLL:EXT:ltube_episodesubscribe/locallang_db.xml:tt_address.tx_learntubeepisode_episode',		
		'config' => array (
			'type' => 'select',	
			'foreign_table' => 'tx_learntubeepisode_domain_model_episode',	
			//'foreign_table_where' => 'AND tx_learntubeepisode_domain_model_episode.pid=###STORAGE_PID### ORDER BY tx_learntubeepisode_domain_model_episode.name',	
			'foreign_table_where' => 'ORDER BY tx_learntubeepisode_domain_model_episode.name',	
			'size' => 1,	
			'minitems' => 0,
			'maxitems' => 100,
		)
	),
);


/*ENABLE tt_address Plugin */
/*
t3lib_div::loadTCA('tt_address');
t3lib_extMgm::addTCAcolumns('tt_address',$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes('tt_address','tx_learntubeepisode_subscribe;;;;1-1-1, tx_learntubeepisode_sdate, tx_learntubeepisode_episode');
*/


//class for displaying the category tree in BE forms.
include_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY).'class.tx_learntubeepisode_flexform.php');

/**for FlexForm Pi1**/
$pluginSignature = str_replace('_', '', $_EXTKEY) . '_pi1';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:'.$_EXTKEY.'/Configuration/FlexForms/flexform_learntubeepisode_pi1.xml');