<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Daa File Download'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Daa File Download');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubedaafile_domain_model_daafile', 'EXT:ltube_daafile/Resources/Private/Language/locallang_csh_tx_ltubedaafile_domain_model_daafile.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubedaafile_domain_model_daafile');
$GLOBALS['TCA']['tx_ltubedaafile_domain_model_daafile'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_daafile/Resources/Private/Language/locallang_db.xlf:tx_ltubedaafile_domain_model_daafile',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,sphoto,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Daafile.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubedaafile_domain_model_daafile.gif'
	),
);


/***IRRE***/
$daafileColumns = array (
  	'tx_daafile_inline' => array (		
  		'exclude' => 1,		
  		'label' => 'LLL:EXT:ltube_daafile/Resources/Private/Language/locallang_db.xlf:daafile_record',		
  		'config' => array (
      	  'type' => 'inline',
  			'languageMode' => 'inherit',
      		'foreign_table' => 'tx_ltubedaafile_domain_model_daafile',
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
t3lib_extMgm::addTCAcolumns('tt_content',$daafileColumns,1);

$pluginSignature = str_replace('_', '', $_EXTKEY) . '_pi1';
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature ] = '';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'tx_daafile_inline';

?>