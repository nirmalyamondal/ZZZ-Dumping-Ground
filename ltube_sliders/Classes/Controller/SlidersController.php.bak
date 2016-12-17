<?php
namespace TYPO3\LtubeSliders\Controller;

/***************************************************************
 *
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
 * SlidersController
 */
class SlidersController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * slidersRepository
	 * 
	 * @var \TYPO3\LtubeSliders\Domain\Repository\SlidersRepository
	 * @inject
	 */
	protected $slidersRepository = NULL;

	/**
	 * action list
	 * 
	 * @param TYPO3\LtubeSliders\Domain\Model\Sliders
	 * @return void
	 */
	public function listAction() {
		//$listings = $this->listingRepository->findAll();
		//$this->view->assign('listings', $listings);
		$cObj			= $this->configurationManager->getContentObject();
		$currentUid		= $cObj->data['uid'];		

		$dataFromRepo	= $this->slidersRepository->findSliders($currentUid);

		$sliderss	= array();
		foreach ($dataFromRepo as $object)	{
			$sliderss[$object->getUid()]['uid']			= $object->getUid();
			$sliderss[$object->getUid()]['title']		= $object->getTitle();
			$sliderss[$object->getUid()]['description']	= $object->getDescription();
			$sliderss[$object->getUid()]['linktext']	= $object->getLinktext();
			$sliderss[$object->getUid()]['linkurl']		= $object->getLinkurl()?$cObj->typoLink_URL(array('parameter' => $object->getLinkurl())):'';
			$sliderss[$object->getUid()]['sphoto']		= $object->getSphoto()?'<img src="uploads/tx_ltubesliders/'.$object->getSphoto().'" alt="" title="" border="0" />':'';
			//$sliderss[$object->getUid()]['hint']		= $this->hintRepository->findHints($object->getUid());
		}
		$this->view->assign('sliderss', $sliderss);

		$pageRenderer = $GLOBALS['TSFE']->getPageRenderer();
		$pageRenderer->addJsFooterFile('http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js');
		$pageRenderer->addJsFooterFile('typo3conf/ext/ltube_sliders/Resources/Public/js/jquery.cycle.js');
		$pageRenderer->addJsFooterFile('typo3conf/ext/ltube_sliders/Resources/Public/js/jquery.cycle.conf.js');
		$pageRenderer->addCssFile('typo3conf/ext/ltube_sliders/Resources/Public/css/ltube_sliders.css'); 
	}

}

?>