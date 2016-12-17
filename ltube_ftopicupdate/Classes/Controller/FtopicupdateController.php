<?php

namespace LTUBE\LtubeFtopicupdate\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Nirmalya Mondal <nmondal@learntube.de>, LEARNTUBE! GbR
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
 * FtopicupdateController
 * 
 * @package TYPO3
 * @subpackage LTUBE
 * @author Nirmalya Mondal <nmondal@learntube.de>
 * @copyright (c) 2015, LEARNTUBE! GbR
 */
class FtopicupdateController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
    
     /**
	 * pageRepository
	 *
	 * @var \LTUBE\LtubeFtopicupdate\Domain\Repository\PageRepository
	 * @inject
	 */
	protected $pageRepository = NULL;

     /**
	 * reportRepository
	 *
	 * @var \LTUBE\LtubeFtopicupdate\Domain\Repository\ReportRepository
	 * @inject
	 */
	protected $reportRepository = NULL;
        
     /**
	 * ftopicupdateRepository
	 *
	 * @var \LTUBE\LtubeFtopicupdate\Domain\Repository\FtopicupdateRepository
	 * @inject
	 */
	protected $ftopicupdateRepository = NULL;
        
     /**
	 * topicRepository
	 *
	 * @var \LTUBE\LtubeFtopicupdate\Domain\Repository\TopicRepository
	 * @inject
	 */
	protected $topicRepository = NULL;
	
	/**
	 * userRepository
	 *
	 * @var \LTUBE\LtubeFtopicupdate\Domain\Repository\UserRepository
	 * @inject
	 */
	protected $userRepository = NULL;
        
        
        /**
         * action initialize
         * @see \TYPO3\CMS\Extbase\Mvc\Controller\initializeAction
         * 
         */
        public function initializeAction() {
            
            parent::initializeAction();
			$feuser		= $GLOBALS['TSFE']->fe_user->user['uid'];
			if(!$feuser){ return FALSE; }
        }

		/**
		 * action info
		 *
		 * @return void
		 */
		public function infoAction() {
			//print_r($this->settings);
			$feuser		= $GLOBALS['TSFE']->fe_user->user['uid'];
			if(!$feuser){ return FALSE; }

			$pageId		= $GLOBALS['TSFE']->id;
			$topicUid	= $this->findTopicContainerPageRecursive($pageId); //echo '$topicUid='.$topicUid; //die();
			if(!$topicUid){ return FALSE; }
			$tStatus		= $this->topicRepository->getTopicStatus($topicUid); //echo '$tStatus='.$tStatus; //die();
			if(!$tStatus){	return FALSE; }	//When topic is Either Hidden or Deleted
			$topicModel		= $this->topicRepository->findByUid($topicUid);
			$topicCredit	= $topicModel->getCreditpoint(); //echo '$topicCredit='.$topicCredit; //die();
			if(!$topicCredit){	return FALSE; }
			$userCredit		= $this->reportRepository->getFeUserCreditpoint($feuser, $topicUid); //echo '$userCredit='.$userCredit; //die();
			if(!$userCredit){	return FALSE; }	//User didn't get Creditpoint for this topic
			if($userCredit < $topicCredit){	return FALSE; }	//Unable to Qualify for certificate or finished topic
			$ftopic		= $GLOBALS['TSFE']->fe_user->user['tx_ltubetopicsystem_ftopic'];  //echo '$ftopic='.$ftopic; //die();
			if(!$ftopic){	$this->userRepository->updateFeUserFtopic($feuser, $topicUid, ''); }
			//Check if Finished Topic already in ftopic DB
			$ftopic_array	= @explode(",",$ftopic);
			if(in_array($topicUid, $ftopic_array)){	return FALSE;	}//Finished Topic already in ftopic DB				
			$this->userRepository->updateFeUserFtopic($feuser, $topicUid, $ftopic);
		}        
  
        
        
     /**
	 * Get Course Uid (recursive call)
	 *
	 * @param integer $uid
	 * @return integer
	 */
	public function findTopicContainerPageRecursive($uid){
		$pgModel	= $this->pageRepository->findByUid($uid);
		$topic		= $pgModel->getTxLtubetopicsystemTopic();
		$doktype	= $pgModel->getDoktype();
		if($topic == 0 && $doktype == 1){
			$parent = $pgModel->getPid();
			return $this->findTopicContainerPageRecursive($parent);
		}else{
			return $topic;
		}
	}

	
}