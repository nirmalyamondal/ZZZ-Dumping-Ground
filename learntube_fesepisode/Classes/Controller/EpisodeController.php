<?php
namespace TYPO3\LearntubeFesepisode\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Nirmalya Mondal <enirmalya@learntube.de>, Learntube GbR!
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
 * EpisodeController
 */
class EpisodeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * episodeRepository
	 * 
	 * @var \TYPO3\LearntubeFesepisode\Domain\Repository\EpisodeRepository
	 * @inject
	 */
	protected $episodeRepository = NULL;

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
	 * action index
	 * 
	 * @return void
	 */
	public function indexAction() {
		//$episodes = $this->episodeRepository->findAll();	print_r($episodes); //die();
		$dataFromRepo				= $this->episodeRepository->findALLdata();	//print_r($dataFromRepo);
		//foreach($dataFromRepo as $object)	{
			print_r($this->episodeRepository);
		//}
		//print_r($this->settings);
		$what_to_display	= $this->settings['what_to_display'];
		if($what_to_display) {
            switch($what_to_display) {
                case 'latest':
                    $this->latestView($dataFromRepo); 
					//$this->redirect('latest');
                break;              
                case 'last':
                    $this->lastView($dataFromRepo);
                break;
                case 'archive':
                    $this->archiveView($dataFromRepo);
                break;
                case 'detail':
                    $this->detailView($dataFromRepo);
                break; 
				case 'subscription':
                    $this->subscriptionView();
                break;				
			}
		}
	}

	/**
	 * View latest
	 *
	 * @param 
	 * @return void
	 */
	public function latestView($dataFromRepo) {
		$latestEpisode	= @end($dataFromRepo);	//print_r($latestEpisode);
		//$saView					= $this->objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
		$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
		$templatePathAndFilename	= $templateRootPath.'Episode\Latest.html';
		$this->view->setTemplatePathAndFilename($templatePathAndFilename);
		//$this->view->assignMultiple($variables);
		//$this->view = $emailView->render();
		$this->view->assign('episodes', 'latestxxx');
	}

	/**
	 * View last
	 * 
	 * @param 
	 * @return void
	*/ 
	public function lastView($dataFromRepo) {	//Last 4 Episodes
		$episodeLarray[0]			= @end($dataFromRepo);
		$episodeLarray[1]			= @prev($dataFromRepo);	
		$episodeLarray[2]			= @prev($dataFromRepo);
		$episodeLarray[3]			= @prev($dataFromRepo);	//print_r($episodeLarray);
		$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
		$templatePathAndFilename	= $templateRootPath.'Episode\Last.html';
		$this->view->setTemplatePathAndFilename($templatePathAndFilename);
		
		$this->view->assign('episodesLastFour', $episodeLarray);
	}


	/**
	 * View archive
	 * 
	 * @param $episode
	 * @return void
	 */
	public function archiveView($dataFromRepo) {
		$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
		$templatePathAndFilename	= $templateRootPath.'Episode\Archive.html';
		$this->view->setTemplatePathAndFilename($templatePathAndFilename);
		$this->view->assign('episodes', 'archivexxx');
	}

	/**
	 * View detail
	 * 
	 * @param $episode
	 * @return void
	 */
	public function detailView($dataFromRepo) {
		$show_in_detail		= $this->settings['show_in_detail'];
		foreach($dataFromRepo as $itemK=>$itemV){
			if($itemV['uid'] == $show_in_detail) {
				$detailEpisode	= $itemV; 
			}
		}
		//print_r($detailEpisode);
		//echo '$show_in_detail='.$show_in_detail;
		$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
		$templatePathAndFilename	= $templateRootPath.'Episode\Detail.html';
		$this->view->setTemplatePathAndFilename($templatePathAndFilename);
		$this->view->assign('episodes', 'detailxxx');
	}

	/**
	 * View subscription
	 * 
	 * @param $episode
	 * @return void
	 */
	public function subscriptionView() {
		$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
		$templatePathAndFilename	= $templateRootPath.'Episode\Subscription.html';
		$this->view->setTemplatePathAndFilename($templatePathAndFilename);
		$this->view->assign('episodes', 'subscriptionxxx');
	}


}