<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Learntube Glossary'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Learntube Glossary');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_learntubeglossary_domain_model_glossarycategory', 'EXT:learntube_glossary/Resources/Private/Language/locallang_csh_tx_learntubeglossary_domain_model_glossarycategory.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_learntubeglossary_domain_model_glossarycategory');
$GLOBALS['TCA']['tx_learntubeglossary_domain_model_glossarycategory'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:learntube_glossary/Resources/Private/Language/locallang_db.xlf:tx_learntubeglossary_domain_model_glossarycategory',
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
		'searchFields' => 'title,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/GlossaryCategory.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_learntubeglossary_domain_model_glossarycategory.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_learntubeglossary_domain_model_glossaryitem', 'EXT:learntube_glossary/Resources/Private/Language/locallang_csh_tx_learntubeglossary_domain_model_glossaryitem.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_learntubeglossary_domain_model_glossaryitem');
$GLOBALS['TCA']['tx_learntubeglossary_domain_model_glossaryitem'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:learntube_glossary/Resources/Private/Language/locallang_db.xlf:tx_learntubeglossary_domain_model_glossaryitem',
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
		'searchFields' => 'title,description,category,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/GlossaryItem.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_learntubeglossary_domain_model_glossaryitem.gif'
	),
);


//class for displaying the category tree in BE forms.
include_once(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY).'class.tx_learntubeglossary_flexform.php');

/**for FlexForm Pi1**/
$pluginSignature = str_replace('_', '', $_EXTKEY) . '_pi1';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:'.$_EXTKEY.'/Configuration/FlexForms/flexform_learntubeglossary_pi1.xml');