<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Learntube Page Icons');

/*
// Define a new doktype
$customPageDoktype		= 71;
//$customPageIcon		= $relativeExtensionPath . 'Resources/Public/Icons/pagetype71.png';
// Add the new doktype to the list of page types
$customPageIcon		= '../typo3conf/ext/ltube_pageicon/Resources/Public/Icons/pagetype71.png';

$GLOBALS['PAGES_TYPES'][$customPageDoktype] = array(
        'type' => 'sys',
        'icon' => $customPageIcon,
        'allowedTables' => '*'
);
// Add the new doktype to the page type selector
$GLOBALS['TCA']['pages']['columns']['doktype']['config']['items'][] = array(
        'LLL:EXT:ltube_pageicon/Resources/Private/Language/locallang.xlf:page_type_71',
        $customPageDoktype,
        $customPageIcon
);
// Add the icon for the new doktype
\TYPO3\CMS\Backend\Sprite\SpriteManager::addTcaTypeIcon('pages', $customPageDoktype, $customPageIcon);
// Add the new doktype to the list of types available from the new page menu at the top of the page tree
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
        'options.pageTree.doktypesToShowInNewPageDragArea := addToList('.$customPageDoktype.')'
);
*/
$TCA['pages']['columns']['module']['config']['items'][] = array('T3e Module Config', 't3eltb1', '../typo3conf/ext/ltube_pageicon/Resources/Public/Icons/pagetype_t3eltb1.png');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-t3eltb1', '../typo3conf/ext/ltube_pageicon/Resources/Public/Icons/pagetype_t3eltb1.png');
$ICON_TYPES['t3eltb1']['icon'] = '../typo3conf/ext/ltube_pageicon/Resources/Public/Icons/pagetype_t3eltb1.png';

/*
*****
SHOULD BE LESS THEN 200
*****
$TCA['pages']['columns']['module']['config']['items'][] = array('Pagetype 97', 'pagetype97', '../fileadmin/elearning/images/pageicons/pagetype97.png');
$ICON_TYPES['pagetype97']['icon'] = '../fileadmin/elearning/images/pageicons/pagetype97.png';
*/
?>