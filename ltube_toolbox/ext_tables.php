<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Pi1',
	'Ltube Toolbox'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Learntube Toolbox');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_flashcard', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_flashcard.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_flashcard');
$TCA['tx_ltubetoolbox_domain_model_flashcard'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_flashcard',
		'label' => 'fcard_name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'fcard_name,fe_content,be_content,fe_font_color,be_font_color,fe_bg_color,be_bg_color,flip_dir,parentid,parenttable,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Flashcard.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubetoolbox_domain_model_flashcard.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_dndeinordnung', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_dndeinordnung.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_dndeinordnung');
$TCA['tx_ltubetoolbox_domain_model_dndeinordnung'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_dndeinordnung',
		'label' => 'dnd_card_name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'dnd_card_name,dnd_card_content,dnd_card_bgcolor,dnd_card_match_column,parentid,parenttable,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Dndeinordnung.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubetoolbox_domain_model_dndeinordnung.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_dndeinordngfeedback', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_dndeinordngfeedback.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_dndeinordngfeedback');
$TCA['tx_ltubetoolbox_domain_model_dndeinordngfeedback'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_dndeinordngfeedback',
		'label' => 'feedback_message',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'feedback_message,parentid,parenttable,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Dndeinordngfeedback.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubetoolbox_domain_model_dndeinordngfeedback.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_dndzuordnung', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_dndzuordnung.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_dndzuordnung');
$TCA['tx_ltubetoolbox_domain_model_dndzuordnung'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_dndzuordnung',
		'label' => 'dnd_card_name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'dnd_card_name,dnd_card_left_content,dnd_card_right_content,dnd_card_bg_color,parentid,parenttable,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Dndzuordnung.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubetoolbox_domain_model_dndzuordnung.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_dndzuordnungfeedback', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_dndzuordnungfeedback.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_dndzuordnungfeedback');
$TCA['tx_ltubetoolbox_domain_model_dndzuordnungfeedback'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_dndzuordnungfeedback',
		'label' => 'feedback_message',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'feedback_message,parentid,parenttable,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Dndzuordnungfeedback.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubetoolbox_domain_model_dndzuordnungfeedback.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_quiz', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_quiz.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_quiz');
$TCA['tx_ltubetoolbox_domain_model_quiz'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_quiz',
		'label' => 'question',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'question,answer1,answer2,answer3,answer4,hint,right_ans_feedback,right_answer,parentid,parenttable,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Quiz.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubetoolbox_domain_model_quiz.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_questionhintanswer', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_questionhintanswer.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_questionhintanswer');
$TCA['tx_ltubetoolbox_domain_model_questionhintanswer'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_questionhintanswer',
		'label' => 'question',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'question,answer,hint,parentid,parenttable,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Questionhintanswer.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubetoolbox_domain_model_questionhintanswer.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_hint', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_hint.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_hint');
$TCA['tx_ltubetoolbox_domain_model_hint'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_hint',
		'label' => 'hint',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'hint,parentid,parenttable,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Hint.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubetoolbox_domain_model_hint.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_dndrank', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_dndrank.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_dndrank');
$TCA['tx_ltubetoolbox_domain_model_dndrank'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_dndrank',
		'label' => 'question',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'question,answer,parentid,parenttable,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Dndrank.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubetoolbox_domain_model_dndrank.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_dndrankanswer', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_dndrankanswer.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_dndrankanswer');
$TCA['tx_ltubetoolbox_domain_model_dndrankanswer'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_dndrankanswer',
		'label' => 'answer',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'answer,parentid,parenttable,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Dndrankanswer.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubetoolbox_domain_model_dndrankanswer.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_hangmanquestion', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_hangmanquestion.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_hangmanquestion');
$TCA['tx_ltubetoolbox_domain_model_hangmanquestion'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_hangmanquestion',
		'label' => 'question',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'question,amount_of_try,answer,parentid,parenttable,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Hangmanquestion.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubetoolbox_domain_model_hangmanquestion.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_hangmananswer', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_hangmananswer.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_hangmananswer');
$TCA['tx_ltubetoolbox_domain_model_hangmananswer'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_hangmananswer',
		'label' => 'answer',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'answer,parentid,parenttable,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Hangmananswer.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubetoolbox_domain_model_hangmananswer.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_chart', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_chart.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_chart');
$TCA['tx_ltubetoolbox_domain_model_chart'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_chart',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'sortby' => 'sorting',
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,description,value,color,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Chart.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_ltubetoolbox_domain_model_chart.gif'
	),
);




















$flashcardColumns = array (
  	'tx_flashcard_inline' => array (		
  		'exclude' => 1,		
  		'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:flashcard_record',		
  		'config' => array (
      	  'type' => 'inline',
  			'languageMode' => 'inherit',
      		'foreign_table' => 'tx_ltubetoolbox_domain_model_flashcard',
			'foreign_field' => 'parentid',
      		'foreign_table_field' => 'parenttable',
    		'appearance' => array (
  				'useSortable' => 1,
  				'showPossibleLocalizationRecords' => 1,
  				'showAllLocalizationLink' => 1,
  				'showSynchronizationLink' => 1,
  				'newRecordLinkPosition' => 'bottom',
   		   ),
        'behaviour' => array( 
  				'localizationMode' => 'select',
  				'localizeChildrenAtParentLocalization' => 1,
        ), 
  		)
  	),
  );

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$flashcardColumns,1);





$dndEinordnungColumns = array (
  	'tx_dnd_einordnung_inline' => array (		
  		'exclude' => 1,		
  		'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:einordnung_record',		
  		'config' => array (
      	  'type' => 'inline',
  			'languageMode' => 'inherit',
      		'foreign_table' => 'tx_ltubetoolbox_domain_model_dndeinordnung',
			'foreign_field' => 'parentid',
      		'foreign_table_field' => 'parenttable',
    		'appearance' => array (
  				'useSortable' => 1,
  				'showPossibleLocalizationRecords' => 1,
  				'showAllLocalizationLink' => 1,
  				'showSynchronizationLink' => 1,
  				'newRecordLinkPosition' => 'bottom',
   		   ),
        'behaviour' => array( 
  				'localizationMode' => 'select',
  				'localizeChildrenAtParentLocalization' => 1,
        ), 
  		)
  	),
  );

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$dndEinordnungColumns,1);


$dndEinordnungFeedbackColumns = array (
  	'tx_dnd_einordnung_feedback_inline' => array (		
  		'exclude' => 1,		
  		'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:einordnung_feedback_record',		
  		'config' => array (
      	  'type' => 'inline',
  			'languageMode' => 'inherit',
      		'foreign_table' => 'tx_ltubetoolbox_domain_model_dndeinordngfeedback',
			'foreign_field' => 'parentid',
      		'foreign_table_field' => 'parenttable',
    		'appearance' => array (
  				'useSortable' => 1,
  				'showPossibleLocalizationRecords' => 1,
  				'showAllLocalizationLink' => 1,
  				'showSynchronizationLink' => 1,
  				'newRecordLinkPosition' => 'bottom',
   		   ),
			'behaviour' => array( 
					'localizationMode' => 'select',
					'localizeChildrenAtParentLocalization' => 1,
			), 
  		)
  	),
  );

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$dndEinordnungFeedbackColumns,1);






$dndZuordnungColumns = array (
  	'tx_dnd_zuordnung_inline' => array (		
  		'exclude' => 1,		
  		'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:zuordnung_record',		
  		'config' => array (
      	  'type' => 'inline',
  			'languageMode' => 'inherit',
      		'foreign_table' => 'tx_ltubetoolbox_domain_model_dndzuordnung',
			'foreign_field' => 'parentid',
      		'foreign_table_field' => 'parenttable',
    		'appearance' => array (
  				'useSortable' => 1,
  				'showPossibleLocalizationRecords' => 1,
  				'showAllLocalizationLink' => 1,
  				'showSynchronizationLink' => 1,
  				'newRecordLinkPosition' => 'bottom',
   		   ),
			'behaviour' => array( 
					'localizationMode' => 'select',
					'localizeChildrenAtParentLocalization' => 1,
			), 
  		)
  	),
  );

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$dndZuordnungColumns,1);



$dndZuordnungFeedbackColumns = array (
  	'tx_dnd_zuordnung_feedback_inline' => array (		
  		'exclude' => 1,		
  		'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:zuordnung_feedback_record',		
  		'config' => array (
      	  'type' => 'inline',
  			'languageMode' => 'inherit',
      		'foreign_table' => 'tx_ltubetoolbox_domain_model_dndzuordnungfeedback',
			'foreign_field' => 'parentid',
      		'foreign_table_field' => 'parenttable',
    		'appearance' => array (
  				'useSortable' => 1,
  				'showPossibleLocalizationRecords' => 1,
  				'showAllLocalizationLink' => 1,
  				'showSynchronizationLink' => 1,
  				'newRecordLinkPosition' => 'bottom',
   		   ),
			'behaviour' => array( 
					'localizationMode' => 'select',
					'localizeChildrenAtParentLocalization' => 1,
			), 
  		)
  	),
  );

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$dndZuordnungFeedbackColumns,1);









$quizColumns = array (
  	'tx_quiz_inline' => array (		
  		'exclude' => 1,		
  		'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:quiz_record',		
  		'config' => array (
      	  'type' => 'inline',
  			'languageMode' => 'inherit',
      		'foreign_table' => 'tx_ltubetoolbox_domain_model_quiz',
			'foreign_field' => 'parentid',
      		'foreign_table_field' => 'parenttable',
    		'appearance' => array (
  				'useSortable' => 1,
  				'showPossibleLocalizationRecords' => 1,
  				'showAllLocalizationLink' => 1,
  				'showSynchronizationLink' => 1,
  				'newRecordLinkPosition' => 'bottom',
   		   ),
			'behaviour' => array( 
					'localizationMode' => 'select',
					'localizeChildrenAtParentLocalization' => 1,
			), 
  		)
  	),
  );

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$quizColumns,1);





$quesHintAnsColumns = array (
  	'tx_ques_hint_ans_inline' => array (		
  		'exclude' => 1,		
  		'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:question_hint_answer_record',		
  		'config' => array (
      	  'type' => 'inline',
  			'languageMode' => 'inherit',
      		'foreign_table' => 'tx_ltubetoolbox_domain_model_questionhintanswer',
			'foreign_field' => 'parentid',
      		'foreign_table_field' => 'parenttable',
    		'appearance' => array (
  				'useSortable' => 1,
  				'showPossibleLocalizationRecords' => 1,
  				'showAllLocalizationLink' => 1,
  				'showSynchronizationLink' => 1,
  				'newRecordLinkPosition' => 'bottom',
   		   ),
			'behaviour' => array( 
					'localizationMode' => 'select',
					'localizeChildrenAtParentLocalization' => 1,
			), 
  		)
  	),
  );

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$quesHintAnsColumns,1);






$dndRankColumns = array (
  	'tx_dnd_rank_inline' => array (		
  		'exclude' => 1,		
  		'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:dnd_ranking_record',		
  		'config' => array (
      	  'type' => 'inline',
  			'languageMode' => 'inherit',
      		'foreign_table' => 'tx_ltubetoolbox_domain_model_dndrank',
			'foreign_field' => 'parentid',
      		'foreign_table_field' => 'parenttable',
    		'appearance' => array (
  				'useSortable' => 1,
  				'showPossibleLocalizationRecords' => 1,
  				'showAllLocalizationLink' => 1,
  				'showSynchronizationLink' => 1,
  				'newRecordLinkPosition' => 'bottom',
   		   ),
			'behaviour' => array( 
					'localizationMode' => 'select',
					'localizeChildrenAtParentLocalization' => 1,
			), 
  		)
  	),
  );

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$dndRankColumns,1);





$hangmanColumns = array (
  	'tx_hangman_inline' => array (		
  		'exclude' => 1,		
  		'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:hangman_record',		
  		'config' => array (
      	  'type' => 'inline',
  			'languageMode' => 'inherit',
      		'foreign_table' => 'tx_ltubetoolbox_domain_model_hangmanquestion',
			'foreign_field' => 'parentid',
      		'foreign_table_field' => 'parenttable',
    		'appearance' => array (
  				'useSortable' => 1,
  				'showPossibleLocalizationRecords' => 1,
  				'showAllLocalizationLink' => 1,
  				'showSynchronizationLink' => 1,
  				'newRecordLinkPosition' => 'bottom',
   		   ),
			'behaviour' => array( 
					'localizationMode' => 'select',
					'localizeChildrenAtParentLocalization' => 1,
			), 
  		)
  	),
  );

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$hangmanColumns,1);







$chartColumns = array (
  	'tx_chart_inline' => array (		
  		'exclude' => 1,		
  		'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:chart_record',		
  		'config' => array (
      	  'type' => 'inline',
  			'languageMode' => 'inherit',
      		'foreign_table' => 'tx_ltubetoolbox_domain_model_chart',
			'foreign_field' => 'parentid',
      		'foreign_table_field' => 'parenttable',
    		'appearance' => array (
  				'useSortable' => 1,
  				'showPossibleLocalizationRecords' => 1,
  				'showAllLocalizationLink' => 1,
  				'showSynchronizationLink' => 1,
  				'newRecordLinkPosition' => 'bottom',
   		   ),
			'behaviour' => array( 
					'localizationMode' => 'select',
					'localizeChildrenAtParentLocalization' => 1,
			), 
  		)
  	),
  );

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content',$chartColumns,1);








include_once(t3lib_extMgm::extPath($_EXTKEY).'toolbox.php');

$pluginSignature = str_replace('_', '', $_EXTKEY) . '_pi1';

$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature ] = '';

$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature ] = 'pi_flexform';

t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' .$_EXTKEY . '/Configuration/FlexForms/flexform_ltubetoolbox_pi1.xml');









$ltb_content_array	= $_REQUEST['edit']['tt_content'];
@reset($ltb_content_array);
$ltb_content_id = @key($ltb_content_array);
$ltb_content_id = @str_replace(',','',$ltb_content_id);

$flex_data =  $_REQUEST['data']['tt_content'][$ltb_content_id]['pi_flexform']['data']['sDEF']['lDEF']['switchableControllerActions']['vDEF'];
$flex_data	= $flex_data?$flex_data:_get_flexform_selected_field_toolbox($ltb_content_id);

if($flex_data == 'Flashcard->list'){
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform, tx_flashcard_inline';
}
if($flex_data == 'Dndeinordnung->list'){
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform, tx_dnd_einordnung_inline, tx_dnd_einordnung_feedback_inline';
}
if($flex_data == 'Dndzuordnung->list'){
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform, tx_dnd_zuordnung_inline, tx_dnd_zuordnung_feedback_inline';
}
if($flex_data == 'Quiz->list'){
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform, tx_quiz_inline';
}
if($flex_data == 'Questionhintanswer->list'){
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform, tx_ques_hint_ans_inline';
}
if($flex_data == 'Dndrank->list'){
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform, tx_dnd_rank_inline';
}
if($flex_data == 'Hangmanquestion->list'){
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform, tx_hangman_inline';
}
if($flex_data == 'Chart->list'){
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform, tx_chart_inline';
}
?>