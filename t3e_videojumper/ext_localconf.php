<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'T3e.' . $_EXTKEY,
	'T3eVideoJumper',
	array(
		'Video' => 'default'
	),
	// non-cacheable actions
	array(

	)
);

?>
