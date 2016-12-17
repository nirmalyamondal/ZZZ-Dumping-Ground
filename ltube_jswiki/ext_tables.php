<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'T3e Wiki'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Learntube jQuery Wikipedia');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubejswiki_domain_model_wikipedia', 'EXT:ltube_jswiki/Resources/Private/Language/locallang_csh_tx_ltubejswiki_domain_model_wikipedia.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubejswiki_domain_model_wikipedia');
$TCA['tx_ltubejswiki_domain_model_wikipedia'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:tx_ltubejswiki_domain_model_wikipedia',
		'label' => 'wiki_title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'wiki_title,show_title,max_thumbnails,cut_first_info_table_rows,max_info_table_rows,thumb_max_width,thumb_max_height,,parentid,parenttable,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Wikipedia.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubejswiki_domain_model_wikipedia.gif'
	),
);

/***IRRE***/
$wikipediaColumns = array (
  	'tx_wikipedia_inline' => array (		
  		'exclude' => 1,		
  		'label' => 'LLL:EXT:ltube_jswiki/Resources/Private/Language/locallang_db.xlf:wikipedia_record',		
  		'config' => array (
      	  'type' => 'inline',
  			'languageMode' => 'inherit',
      		'foreign_table' => 'tx_ltubejswiki_domain_model_wikipedia',
			'foreign_field' => 'parentid',
      		'foreign_table_field' => 'parenttable',
    		'appearance' => array (
  				'useSortable' => 1,
  				'showPossibleLocalizationRecords' => 1,
  				'showAllLocalizationLink' => 1,
  				'showSynchronizationLink' => 1,
  				'newRecordLinkPosition' => 'bottom',
   		   ),
        'behaviour' => array( 
  				'localizationMode' => 'select',
  				'localizeChildrenAtParentLocalization' => 1,
        ), 
  		)
  	),
  );

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$wikipediaColumns,1);

$pluginSignature = str_replace('_', '', $_EXTKEY) . '_pi1';
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature ] = '';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'tx_wikipedia_inline';

?>