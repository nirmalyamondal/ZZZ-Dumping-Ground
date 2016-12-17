<?php
namespace TYPO3\LtubeJswiki\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Nirmalya Mondal <nmondal@learntube.de>, Learntube
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
 * @package ltube_jswiki
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class WikipediaController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * wikipediaRepository
	 *
	 * @var \TYPO3\LtubeJswiki\Domain\Repository\WikipediaRepository
	 * @inject
	 */
	protected $wikipediaRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {

		$cObj			= $this->configurationManager->getContentObject();
		$currentUid		= $cObj->data['uid'];		
		$dataFromRepo	= $this->wikipediaRepository->findWikipedia($currentUid);

		$wikipedias		= array();
		foreach ($dataFromRepo as $object){
			$wikipedias[$object->getUid()]['uid']			= $object->getUid();
			$wikipedias[$object->getUid()]['wikiTitle']		= $object->getWikiTitle();
			$wikipedias[$object->getUid()]['showTitle']		= $object->getShowTitle();
			$wikipedias[$object->getUid()]['maxThumbnails']		= $object->getMaxThumbnails();
			$wikipedias[$object->getUid()]['cutFirstInfoTableRows']		= $object->getCutFirstInfoTableRows();
			$wikipedias[$object->getUid()]['maxInfoTableRows']		= $object->getMaxInfoTableRows();
			$wikipedias[$object->getUid()]['thumbMaxWidth']		= $object->getThumbMaxWidth();
			$wikipedias[$object->getUid()]['thumbMaxHeight']		= $object->getThumbMaxHeight();
			//$wikipedias[$object->getUid()]['hint']			= $this->hintRepository->findHints($object->getUid());
		}

		//$wikipedias = $this->wikipediaRepository->findAll();
		$this->view->assign('wikipedias', $wikipedias);

		$pageRenderer = $GLOBALS['TSFE']->getPageRenderer();
		//$pageRenderer->addJsFile('http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js');
		$pageRenderer->addJsFile('typo3conf/ext/ltube_jswiki/Resources/Public/js/jquery.wikipedia.js');
		//$pageRenderer->addJsFile('typo3conf/ext/ltube_jswiki/Resources/Public/js/Wikipedia.js');
		$pageRenderer->addCssFile('typo3conf/ext/ltube_jswiki/Resources/Public/css/jquery.wikipedia.css'); 
	}

}
?>