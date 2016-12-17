<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Typo3.' . $_EXTKEY,
	'Pi1',
	array(
		'Accordion' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Accordion' => 'list',
		
	)
);
?>