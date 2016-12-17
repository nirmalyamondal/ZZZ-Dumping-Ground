<?php
namespace Typo3\LtubeDaafd\Controller;

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
 * DaafdController
 */
class DaafdController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * daafdRepository
	 * 
	 * @var \Typo3\LtubeDaafd\Domain\Repository\DaafdRepository
	 * @inject
	 */
	protected $daafdRepository = NULL;

	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
		$daafds = $this->daafdRepository->findAll();
		//print_r($daafds);
		$this->view->assign('daafds', $daafds);

		$cObj			= $this->configurationManager->getContentObject();
		$currentUid		= $cObj->data['uid'];		

		$dataFromRepo	= $this->daafdRepository->findDaafd($currentUid);

		$daafds	= array();
		foreach ($dataFromRepo as $object){
			$daafds[$object->getUid()]['uid']		= $object->getUid();
			$daafds[$object->getUid()]['title']		= $object->getTitle();
			//$daafds[$object->getUid()]['description']	= $object->getDescription();
			//$daafds[$object->getUid()]['linktext']	= $object->getLinktext();
			//$daafds[$object->getUid()]['linkurl']		= $object->getLinkurl()?$cObj->typoLink_URL(array('parameter' => $object->getLinkurl())):'';
			//$daafds[$object->getUid()]['sphoto']		= $object->getSphoto()?'<img src="uploads/tx_ltubedaafd/'.$object->getSphoto().'" alt="" title="" border="0" />':'';
			//$daafds[$object->getUid()]['hint']		= $this->hintRepository->findHints($object->getUid());
		}
		print_r($daafds);
		$this->view->assign('daafds', $daafds);
	}

}