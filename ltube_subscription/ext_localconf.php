<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'LTUBE.' . $_EXTKEY,
	'Pi1',
	array(
            'Subscription' => 'info',	
	),
	// non-cacheable actions
	array(
            'Subscription' => 'info',
	)
);
