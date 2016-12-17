<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Pi1',
	array(
		'Flashcard' => 'list',
		'Dndeinordnung' => 'list',
		'Dndeinordngfeedback' => 'list',
		'Dndzuordnung' => 'list',
		'Dndzuordnungfeedback' => 'list',
		'Quiz' => 'list',
		'Questionhintanswer' => 'list',
		'Hint' => 'list',
		'Dndrank' => 'list',
		'Dndrankanswer' => 'list',
		'Hangmanquestion' => 'list',
		'Hangmananswer' => 'list',
		'Chart' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Flashcard' => 'list',
		'Dndeinordnung' => 'list',
		'Dndeinordngfeedback' => 'list',
		'Dndzuordnung' => 'list',
		'Dndzuordnungfeedback' => 'list',
		'Quiz' => 'list',
		'Questionhintanswer' => 'list',
		'Hint' => 'list',
		'Dndrank' => 'list',
		'Dndrankanswer' => 'list',
		'Hangmanquestion' => 'list',
		'Hangmananswer' => 'list',
		'Chart' => 'list',
		
	)
);

?>