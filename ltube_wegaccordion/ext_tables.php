<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Wegweiser Accordion'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Wegweiser Accordion');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubewegaccordion_domain_model_accordion', 'EXT:ltube_wegaccordion/Resources/Private/Language/locallang_csh_tx_ltubewegaccordion_domain_model_accordion.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubewegaccordion_domain_model_accordion');
$GLOBALS['TCA']['tx_ltubewegaccordion_domain_model_accordion'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_wegaccordion/Resources/Private/Language/locallang_db.xlf:tx_ltubewegaccordion_domain_model_accordion',
		'label' => 'title',
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
		'searchFields' => 'title,description,descriptiontwo,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Accordion.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubewegaccordion_domain_model_accordion.gif'
	),
);

/***IRRE***/
$accordionColumns = array (
  	'tx_accordion_inline' => array (		
  		'exclude' => 1,		
  		'label' => 'LLL:EXT:ltube_wegaccordion/Resources/Private/Language/locallang_db.xlf:tx_ltubewegaccordion_domain_model_accordion.wegaccordion_record',		
  		'config' => array (
      	  'type' => 'inline',
  			'languageMode' => 'inherit',
      		'foreign_table' => 'tx_ltubewegaccordion_domain_model_accordion',
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
t3lib_extMgm::addTCAcolumns('tt_content',$accordionColumns,1);

$pluginSignature = str_replace('_', '', $_EXTKEY) . '_pi1';
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature ] = '';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'tx_accordion_inline';

?>