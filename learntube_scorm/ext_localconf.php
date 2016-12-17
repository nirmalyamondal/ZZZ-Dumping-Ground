<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Pi1',
	array(		
		'LearntubeScormfe' => 'play,result',
	),
	// non-cacheable actions
	array(
		'LearntubeScormfe' => 'play,result',		
	)
);

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['felogin']['login_confirmed'][] = 'EXT:learntube_scorm/Classes/Task/class.tx_learntubescorm_hook.php:tx_learntubescorm_hook->_learntubeT3user2scorm';