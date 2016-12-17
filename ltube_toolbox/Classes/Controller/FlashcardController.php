<?php
namespace TYPO3\LtubeToolbox\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Pranab Ojha <pojha@learntube.in>, Learntube
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package ltube_toolbox
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class FlashcardController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * flashcardRepository
	 *
	 * @var \TYPO3\LtubeToolbox\Domain\Repository\FlashcardRepository
	 * @inject
	 */
	protected $flashcardRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$cObj = $this->configurationManager->getContentObject();
		$currentUid = $cObj->data['_LOCALIZED_UID']?$cObj->data['_LOCALIZED_UID']:$cObj->data['uid'];
		$divIdOfCE	= 'c'.$currentUid;
		
		$cur_lang		= $GLOBALS['TSFE']->config['config']['language'];

		$flashcards = $this->flashcardRepository->findByParentid($currentUid);
		
		
		$resultArray = array();
		foreach ($flashcards as $object){
			$resultArray[$object->getUid()]['uid']				= $object->getUid();
			$resultArray[$object->getUid()]['fcardName']		= $object->getFcardName();
			$resultArray[$object->getUid()]['feContent']		= $object->getFeContent();
			$resultArray[$object->getUid()]['beContent']		= $object->getBeContent();
			$resultArray[$object->getUid()]['feFontColor']		= $object->getFeFontColor();
			$resultArray[$object->getUid()]['beFontColor']		= $object->getBeFontColor();
			$resultArray[$object->getUid()]['feBgColor']		= $object->getFeBgColor();
			$resultArray[$object->getUid()]['beBgColor']		= $object->getBeBgColor();
			$resultArray[$object->getUid()]['flipDir']			= $object->getFlipDir();
		}
		$this->view->assign('flashcards', $flashcards);
		$this->view->assign('cur_lang', $cur_lang);

		$pageRenderer = $GLOBALS['TSFE']->getPageRenderer();
		if($this->settings['include_toolbox_css'] == 1){$pageRenderer->addCssFile($this->settings['toolbox_css']);}
		if($this->settings['inclde_flip_min_js'] == 1){$pageRenderer->addJsFile($this->settings['flip_min_js']);}
		if($this->settings['inclde_flipcard_js'] == 1){$pageRenderer->addJsFile($this->settings['flipcard_js']);}
		if($this->settings['include_flexipage_js'] == 1){$pageRenderer->addJsFile($this->settings['flexipage_js']);}

		$cardStyle	= "<style type='text/css'>   /*<![CDATA[*/ ";
		$cardStyle	.= "#$divIdOfCE div.tx-ltube-toolbox ul.pager{width:290px;} ";
		$cardStyle	.=" /*]]>*/ </style>";

		$GLOBALS['TSFE']->additionalHeaderData[$divIdOfCE.'_flashcard_header_css'] = $cardStyle;
	}

}
?>