<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'IFF User PDF Generate'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'IFF User PDF Generate');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubeiffuserpdf_domain_model_pdfgenerate', 'EXT:ltube_iffuserpdf/Resources/Private/Language/locallang_csh_tx_ltubeiffuserpdf_domain_model_pdfgenerate.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubeiffuserpdf_domain_model_pdfgenerate');
$GLOBALS['TCA']['tx_ltubeiffuserpdf_domain_model_pdfgenerate'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_iffuserpdf/Resources/Private/Language/locallang_db.xlf:tx_ltubeiffuserpdf_domain_model_pdfgenerate',
		'label' => 'pdftitle',
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
		'searchFields' => 'pdftitle,pdffile,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/PdfGenerate.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubeiffuserpdf_domain_model_pdfgenerate.gif'
	),
);
