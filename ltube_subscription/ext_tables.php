<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'LMS3 Course Auto-Subscription'
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'LMS3 Course Auto-Subscription');


$tempColumns = array(
	'tx_ltubesubscription_moodle' => array(		
		'exclude' => 0,		
		'label' => 'LLL:EXT:ltube_subscription/Resources/Private/Language/locallang_db.xlf:fe_users.tx_ltubesubscription_moodle',		
		'config' => array(
			'type' => 'check',
			'default' => 0,
		)
	),
);


t3lib_div::loadTCA('fe_users');
t3lib_extMgm::addTCAcolumns('fe_users',$tempColumns,1);
t3lib_extMgm::addToAllTCAtypes('fe_users','tx_ltubesubscription_moodle;;;;1-1-1');