<?php
namespace LEARNTUBE\LearntubeGlossary\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Nirmalya Mondal <nmondal@learntube.de>, Learntube GbR!
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
 * GlossaryItemController
 */
class GlossaryItemController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * glossaryItemRepository
	 * 
	 * @var \LEARNTUBE\LearntubeGlossary\Domain\Repository\GlossaryItemRepository
	 * @inject
	 */
	protected $glossaryItemRepository = NULL;

	/**
	 * action initialize
	 * 
	 * @see TYPO3\CMS\Extbase\Mvc\Controller.ActionController::initializeAction()
	*/
	public function initializeAction(){	
		parent::initializeAction();
		$this->config = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		$this->objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
	}


	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
		$glossaryItemsArray = $this->glossaryItemRepository->findAll();
		
		//Filter Glossary by seleted Category
		$glossaryItemsCategory	= array();
		foreach($glossaryItemsArray as $glossaryItemsArrayObj) {
			if($glossaryItemsArrayObj->getCategory() == $this->settings['show_category']){
				$glossaryItemsCategory[$glossaryItemsArrayObj->getUid()]['uid']			= $glossaryItemsArrayObj->getUid();
				$glossaryItemsCategory[$glossaryItemsArrayObj->getUid()]['title']		= $glossaryItemsArrayObj->getTitle();
				$glossaryItemsCategory[$glossaryItemsArrayObj->getUid()]['description']	= $glossaryItemsArrayObj->getDescription();
				$glossaryItemsCategory[$glossaryItemsArrayObj->getUid()]['initial']		= $glossaryItemsArrayObj->getTitle()[0];
			}
		}
		
		if($this->settings['show_random'] == 1){
			shuffle($glossaryItemsCategory);
			$this->view->assign('show_random', $this->settings['show_random']);		
			$this->view->assign('glossaryItems', $glossaryItemsCategory);
		}else{
			//print_r($glossaryItemsCategory);	print_r($this->settings); die();
			$letters	= Array(1=>'A', 2=>'B', 3=>'C', 4=>'D', 5=>'E', 6=>'F', 7=>'G', 8=>'H', 9=>'I', 10=>'J', 11=>'K', 12=>'L', 13=>'M',
							14=>'N', 15=>'O', 16=>'P', 17=>'Q', 18=>'R', 19=>'S', 20=>'T', 21=>'U', 22=>'V', 23=>'W', 24=>'X', 25=>'Y', 26=>'Z');
			$glossaryItems	= array();
			foreach($letters as $lettersKey=>$lettersValue) {
				foreach($glossaryItemsCategory as $glossaryICKey=>$glossaryICValue) {
					if($lettersValue == $glossaryICValue['initial']){
						//$glossaryItems[$lettersValue][$glossaryICKey]['uid']			= $glossaryICValue['uid'];
						$glossaryItems[$lettersValue][$glossaryICKey]['title']			= $glossaryICValue['title'];
						$glossaryItems[$lettersValue][$glossaryICKey]['description']	= $glossaryICValue['description'];
						//$glossaryItems[$lettersValue][$glossaryICKey]['initial']		= $glossaryICValue['initial'];
					}
				}
				if(!$glossaryItems[$lettersValue]){
					$glossaryItems[$lettersValue]	= '';
				}
			}//foreach($letters

			//print_r($glossaryItems); die();
			$this->view->assign('show_random', $this->settings['show_random']);		
			$this->view->assign('glossaryItems', $glossaryItems);	
		}//else
	
	}

}