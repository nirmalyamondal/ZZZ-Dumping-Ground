<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'LEARNTUBE.' . $_EXTKEY,
	'Pi1',
	array(
		'GlossaryItem' => 'list',
		
	),
	// non-cacheable actions
	array(
		'GlossaryItem' => 'list',
		
	)
);
