<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Pi1',
	array(
		'Episode' => 'index, list, show, latest, archive, subscription',		
		//'Episode' => 'index',		
	),
	// non-cacheable actions
	array(
		'Episode' => 'index, list, show, latest, archive, subscription',		
		//'Episode' => 'index',		
	)
);
