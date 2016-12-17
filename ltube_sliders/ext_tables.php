<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'T3e Aqualug Slider'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'LTB Sliders');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubesliders_domain_model_sliders', 'EXT:ltube_sliders/Resources/Private/Language/locallang_csh_tx_ltubesliders_domain_model_sliders.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubesliders_domain_model_sliders');
$GLOBALS['TCA']['tx_ltubesliders_domain_model_sliders'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_sliders/Resources/Private/Language/locallang_db.xlf:tx_ltubesliders_domain_model_sliders',
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
		'searchFields' => 'title,description,linktext,linkurl,sphoto,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Sliders.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubesliders_domain_model_sliders.gif'
	),
);


/***IRRE***/
$slidersColumns = array (
  	'tx_sliders_inline' => array (		
  		'exclude' => 1,		
  		'label' => 'LLL:EXT:ltube_sliders/Resources/Private/Language/locallang_db.xlf:sliders_record',		
  		'config' => array (
      	  'type' => 'inline',
  			'languageMode' => 'inherit',
      		'foreign_table' => 'tx_ltubesliders_domain_model_sliders',
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
t3lib_extMgm::addTCAcolumns('tt_content',$slidersColumns,1);

$pluginSignature = str_replace('_', '', $_EXTKEY) . '_pi1';
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature ] = '';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'tx_sliders_inline';

?>