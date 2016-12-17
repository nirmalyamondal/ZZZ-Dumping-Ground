<?php
defined('TYPO3_MODE') or die();

/***************
 * Plugin
 */
//$_EXTKEY	= 'learntube_pdfcertificate';
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'learntube_pdfcertificate',
	'Pi1',
	'LMS3 Course Certificate'
);

$pluginSignature = str_replace('_', '', $_EXTKEY) . '_pi1';
//$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['learntubepdfcertificate_pi1'] = 'recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['learntubepdfcertificate_pi1'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('learntubepdfcertificate_pi1', 'FILE:EXT:learntube_pdfcertificate/Configuration/FlexForms/flexform_learntubepdfcertificate_pi1.xml');

/***************
 * Default TypoScript
 */

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('learntube_pdfcertificate', 'Configuration/TypoScript', 'LMS3 Course Certificate');