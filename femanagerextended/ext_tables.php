<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\GeneralUtility::loadTCA('fe_users');
$TCA['fe_users']['ctrl']['type'] = 'tx_extbase_type';
$tmpFeUsersColumns = array(
	'tnc_id' => array(
		'exclude' => 1,
		'label' =>
			'LLL:EXT:femanagerextended/Resources/Private/Language/locallang_db.xlf:tx_femanagerextended_domain_model_user.tnc_id',
		'config' => array(
			"type" => "check",			
            'default' => 0,
		),
	),
	'tx_extbase_type' => array(
		'config' => array(
			'type' => 'input',
			'default' => '0'
		)
	)
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users', $tmpFeUsersColumns, 1);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('fe_users', 'tnc_id');