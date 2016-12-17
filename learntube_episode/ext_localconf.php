<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'LEARNTUBE.' . $_EXTKEY,
	'Pi1',
	array(
		'Episode' => 'index, latest, last, archive, detail, subscription, subpost, unsubscription, unsubpost, activation',
	),
	// non-cacheable actions
	array(
		'Episode' => 'index, latest, last, archive, detail, subscription, subpost, unsubscription, unsubpost, activation',
	)
);
