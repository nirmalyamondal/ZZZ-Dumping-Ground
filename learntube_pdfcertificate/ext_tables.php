<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

/*\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'LMS3 Course Certificate'
);

$pluginSignature = str_replace('_', '', $_EXTKEY) . '_pi1';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:'.$_EXTKEY.'/Configuration/FlexForms/flexform_learntubepdfcertificate_pi1.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'LMS3 Course Certificate');
*/


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_learntubepdfcertificate_domain_model_items', 'EXT:learntube_pdfcertificate/Resources/Private/Language/locallang_csh_tx_learntubepdfcertificate_domain_model_items.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_learntubepdfcertificate_domain_model_items');
$GLOBALS['TCA']['tx_learntubepdfcertificate_domain_model_items'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:learntube_pdfcertificate/Resources/Private/Language/locallang_db.xlf:tx_learntubepdfcertificate_domain_model_items',
		'label' => 'feuser',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'feuser,datetime,ttcontent,srcpageid,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY).'Configuration/TCA/PdfCertificate.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY).'Resources/Public/Icons/tx_learntubepdfcertificate_domain_model_items.gif'
	),
);