<?php

namespace LTUBE\LtubeSubscription\Controller;


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
 * SubscriptionController
 * 
 * @package TYPO3
 * @subpackage LTUBE
 * @author Nirmalya Mondal <nmondal@learntube.de>
 * @copyright (c) 2015, LEARNTUBE! GbR
 */
class SubscriptionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
    
     /**
	 * pageRepository
	 *
	 * @var \LTUBE\LtubeSubscription\Domain\Repository\PageRepository
	 * @inject
	 */
	protected $pageRepository = NULL;

     /**
	 * priceRepository
	 *
	 * @var \LTUBE\LtubeSubscription\Domain\Repository\PriceRepository
	 * @inject
	 */
	protected $priceRepository = NULL;
        
     /**
	 * subscriptionRepository
	 *
	 * @var \LTUBE\LtubeSubscription\Domain\Repository\SubscriptionRepository
	 * @inject
	 */
	protected $subscriptionRepository = NULL;
        
     /**
	 * topicRepository
	 *
	 * @var \LTUBE\LtubeSubscription\Domain\Repository\TopicRepository
	 * @inject
	 */
	protected $topicRepository = NULL;
	
	/**
	 * userRepository
	 *
	 * @var \LTUBE\LtubeSubscription\Domain\Repository\UserRepository
	 * @inject
	 */
	protected $userRepository = NULL;

	/**
	 * usertopicRepository
	 *
	 * @var \LTUBE\LtubeSubscription\Domain\Repository\UsertopicRepository
	 * @inject
	 */
	protected $usertopicRepository = NULL;        
  

        
        
        /**
         * action initialize
         * @see \TYPO3\CMS\Extbase\Mvc\Controller\initializeAction
         * 
         */
        public function initializeAction() {
            
            parent::initializeAction();
			$feuser		= $GLOBALS['TSFE']->fe_user->user['uid'];
			if(!$feuser){ return FALSE; }

			//$GLOBALS['TSFE']->additionalHeaderData[''] = '<link rel="stylesheet" type="text/css" href="typo3conf/ext/ltube_subscription/Resources/Public/Css/Subscription.css">';
			//$querySettings = $this->subscriptionRepository->createQuery()->getQuerySettings();
			//$querySettings->setRespectStoragePage(FALSE);
			//$this->subscriptionRepository->setDefaultQuerySettings($querySettings);
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
			$moodle_feuser		= $GLOBALS['TSFE']->fe_user->user['tx_ltubesubscription_moodle'];
			if(!$moodle_feuser){ return FALSE; }
			$pageId		= $GLOBALS['TSFE']->id;
			$topicUid	= $this->findTopicContainerPageRecursive($pageId);
			if(!$topicUid){ return FALSE; }
			$priceUid	= 0;
			$duration	= 0;
			$pid		= $this->settings['usertopicPid']?$this->settings['usertopicPid']:1;
			$vtopic		= $GLOBALS['TSFE']->fe_user->user['tx_ltubetopicsystem_topic'];
			$btopic		= $GLOBALS['TSFE']->fe_user->user['tx_ltubetopicsystem_btopic'];
			//$ftopic		= $GLOBALS['TSFE']->fe_user->user['tx_ltubetopicsystem_ftopic'];
			//Check User-Topic relation : fe_users
			if($btopic){	// Already Have some topics/courses
				$btopic_array	= @explode(",",$btopic);
				if(!in_array($topicUid, $btopic_array)){ // Still Not Subscribed
					$this->userRepository->updateFeUserTopic($feuser, $topicUid, $vtopic, $btopic);
				}				
			} else {	// Still Not Subscribed
				$this->userRepository->updateFeUserTopic($feuser, $topicUid, $vtopic, $btopic);
			}
			//Check User-Topic-Price relation : tx_ltubetopicsystem_usertopic
			$usertopic = $this->usertopicRepository->findUsertopic($feuser, $topicUid); //print_r($usertopic);
			if(count($usertopic) >= 1) {	//Already Subscribed
				//$this->usertopicRepository->updateUsertopic($feuser, $topicUid, $priceUid, $duration, $pid);
			} else {
				$this->usertopicRepository->addUsertopic($feuser, $topicUid, $priceUid, $duration, $pid);
			}
		}        
  
        
        
     /**
	 * Get Course Uid (recursive call)
	 *
	 * @param integer $uid
	 * @return integer
	 */
	public function findTopicContainerPageRecursive($uid){
		$pgModel = $this->pageRepository->findByUid($uid);
		$topic = $pgModel->getTxLtubetopicsystemTopic();
		$doktype = $pgModel->getDoktype();
		if($topic == 0 && $doktype == 1){
			$parent = $pgModel->getPid();
			return $this->findTopicContainerPageRecursive($parent);
		}else{
			return $topic;
		}
	}

	
}