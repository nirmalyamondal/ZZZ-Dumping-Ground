<?php
namespace Typo3\LtubeWegaccordion\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Nirmalya Mondal <typo3india@gmail.com>, Learntube
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
 * AccordionController
 */
class AccordionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * accordionRepository
	 * 
	 * @var \Typo3\LtubeWegaccordion\Domain\Repository\AccordionRepository
	 * @inject
	 */
	protected $accordionRepository = NULL;

	/**
	 * action list
	 * 
	 * @param Typo3\LtubeWegaccordion\Domain\Model\Accordion
	 * @return void
	 */
	public function listAction() {
		//$accordiondatas = $this->accordiondataRepository->findAll();
		//$this->view->assign('accordiondatas', $accordiondatas);
		$cObj			= $this->configurationManager->getContentObject();
		$currentUid		= $cObj->data['uid'];		

		$dataFromRepo	= $this->accordionRepository->findAccordion($currentUid);
		$accordions	= array();
		foreach ($dataFromRepo as $object){
			$accordions[$object->getUid()]['uid']			= $object->getUid();
			$accordions[$object->getUid()]['title']			= $object->getTitle();
			$accordions[$object->getUid()]['description']	= $object->getDescription();
			$accordions[$object->getUid()]['descriptiontwo']= $object->getDescriptiontwo();
		}
		$this->view->assign('accordions', $accordions);
	}

}

?>