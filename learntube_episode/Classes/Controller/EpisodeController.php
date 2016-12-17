<?php
namespace LEARNTUBE\LearntubeEpisode\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 LEARNTUBE! GbR - Contact: mail@learntube.de
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
	 * @var \LEARNTUBE\LearntubeEpisode\Domain\Repository\EpisodeRepository
	 * @inject
	 */
	protected $episodeRepository = NULL;

	/**
	 * categoryRepository
	 * 
	 * @var \LEARNTUBE\LearntubeEpisode\Domain\Repository\CategoryRepository
	 * @inject
	 */
	protected $categoryRepository = NULL;


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
		$what_to_display	= $this->settings['what_to_display'];		
		$episodes	= $this->episodeRepository->findAll();	//print_r($episodes);
		$categories = $this->categoryRepository->findAll();	//print_r($categories);

		$categoryArray	= array();
		foreach($categories as $categoryObject){	
			$categoryArray[$categoryObject->getUid()]['uid']			= $categoryObject->getUid();
			$categoryArray[$categoryObject->getUid()]['name']			= $categoryObject->getName();
			$categoryArray[$categoryObject->getUid()]['icon']			= $categoryObject->getIcon();
			$categoryArray[$categoryObject->getUid()]['iconAlt']		= $categoryObject->getIconalttext();
		}//print_r($categoryArray);
		
		$episodeArray	= array();
		foreach($episodes as $episodeObject){
			$episodeArray[$episodeObject->getUid()]['uid']			= $episodeObject->getUid();
			$episodeArray[$episodeObject->getUid()]['name']			= $episodeObject->getName();
			$episodeArray[$episodeObject->getUid()]['sdescription']	= $episodeObject->getSdescription();
			$episodeArray[$episodeObject->getUid()]['description']	= $episodeObject->getDescription();
			//$episodeArray[$episodeObject->getUid()]['image']		= $episodeObject->getImage()?$episodeObject->getImage()->getOriginalResource()->getIdentifier():'';
			$episodeArray[$episodeObject->getUid()]['imageObject']	= $episodeObject->getImage();
			$episodeArray[$episodeObject->getUid()]['ialttext']		= $episodeObject->getIalttext();
			$episodeArray[$episodeObject->getUid()]['edate']		= $episodeObject->getEdate();
			$episodeArray[$episodeObject->getUid()]['detailpage']	= $episodeObject->getDetailpage();
			$episodeArray[$episodeObject->getUid()]['catname']		= $categoryArray[$episodeObject->getCategory()]['name'];
			$episodeArray[$episodeObject->getUid()]['caticonObject']= $categoryArray[$episodeObject->getCategory()]['icon'];
			$episodeArray[$episodeObject->getUid()]['caticonAlt']	= $categoryArray[$episodeObject->getCategory()]['iconAlt'];
			//print_r($episodeObject->getImage()->getUid()); 
			//print_r($episodeObject->getImage()->getOriginalResource()->getName()); 
			//print_r($episodeObject->getEdate());
		}	//print_r($episodeArray); die();

		if($what_to_display) {
            switch($what_to_display) {
                case 'latest':
                    $this->latestAction($episodeArray); 
                break;              
                case 'last':
                    $this->lastAction($episodeArray);
                break;
                case 'archive':	//listing
                    $this->archiveAction($episodeArray);
                break;
                case 'detail':
                    $this->detailAction($episodeArray);
                break; 
				case 'subscription':
                    $this->subscriptionAction();
                break;
				case 'unsubscription':
                    $this->unsubscriptionAction();
                break;
				case 'activation':
                    $this->activationAction();
                break;				
				/*
				case 'subpost':
                    $this->subpostAction();
                break;				
				case 'unsubpost':
                    $this->unsubpostAction();
                break;
				
				*/
			}
		}
	}


	/**
	 * action latest
	 * 
	 * @return void
	 */
	public function latestAction($episodeArray) {
		$latestEpisode				= @end($episodeArray);	//print_r($latestEpisode);
		$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
		$templatePathAndFilename	= $templateRootPath.'Episode\Latest.html';
		$this->view->setTemplatePathAndFilename($templatePathAndFilename);
		$this->view->assign('episodes', $latestEpisode);		
	}

	/**
	 * action last
	 * 
	 * @param \LEARNTUBE\LearntubeEpisode\Domain\Model\Episode $episode
	 * @return void
	 */
	public function lastAction($episodeArray) {	
		$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
		$templatePathAndFilename	= $templateRootPath.'Episode\Last.html';
		$this->view->setTemplatePathAndFilename($templatePathAndFilename);		
		$this->view->assign('allEpisodes', $episodeArray);
	}

	/**
	 * action archive
	 * @param \LEARNTUBE\LearntubeEpisode\Domain\Model\Episode $episode
	 * @return void
	 */
	public function archiveAction($episodeArray) {
		$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
		$templatePathAndFilename	= $templateRootPath.'Episode\Archive.html';
		$this->view->setTemplatePathAndFilename($templatePathAndFilename);	
		$this->view->assign('allEpisodes', $episodeArray);
	}

	/**
	 * action detail
	 * 
	 * @param \LEARNTUBE\LearntubeEpisode\Domain\Model\Episode $episode
	 * @return void
	 */
	public function detailAction($episodeArray) {
		$episodeUid					= $this->settings['show_in_detail'];
		$episodeDetail				= $episodeArray[$episodeUid];	//print_r($episodeDetail);
		$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
		$templatePathAndFilename	= $templateRootPath.'Episode\Detail.html';
		$this->view->setTemplatePathAndFilename($templatePathAndFilename);
		$this->view->assign('allEpisodes', $episodeArray);
	}

	/**
	 * action subscription
	 * 
	 * @return void
	 */
	public function subscriptionAction() {		
		if(!\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('sr_freecap')){ 
			$this->addFlashMessage('Please Install sr_freecap Extension!');	
		}
		$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
		$templatePathAndFilename	= $templateRootPath.'Episode\Subscription.html';
		$this->view->setTemplatePathAndFilename($templatePathAndFilename);	
		$fname						= $GLOBALS['TSFE']->fe_user->user['first_name']?$GLOBALS['TSFE']->fe_user->user['first_name']:'';
		$lname						= $GLOBALS['TSFE']->fe_user->user['last_name']?$GLOBALS['TSFE']->fe_user->user['last_name']:'';
		$email						= $GLOBALS['TSFE']->fe_user->user['email']?$GLOBALS['TSFE']->fe_user->user['email']:'';
		$this->view->assign('fname', $fname);
		$this->view->assign('lname', $lname);
		$this->view->assign('email', $email);
	}

	/**
	 * action subpost
	 * 
	 * @return void
	 */
	public function subpostAction() {
		$postParams		= \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_learntubeepisode_pi1');//print_r($postParams); die();		
		$ttgender		= $postParams['newSubscription']['gender'];
		$ttemail		= $postParams['newSubscription']['email'];
		$ttfirst_name	= \TYPO3\CMS\Core\Utility\GeneralUtility::removeXSS($postParams['newSubscription']['fname']);
		$ttlast_name	= \TYPO3\CMS\Core\Utility\GeneralUtility::removeXSS($postParams['newSubscription']['lname']);
		$ttcaptcha		= $postParams['newSubscription']['captchaResponse'];
		$ttname			= $ttfirst_name.' '.$ttlast_name;
		$failure		= FALSE;
		if(!$ttfirst_name){	
			$failure	= TRUE;
			$fnameError	= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('error.fname', $this->extensionName,'');
			$this->addFlashMessage($fnameError,$messageTitle = '', $severity = \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR, $storeInSession = FALSE);	
		}
		if(!$ttlast_name){	
			$failure	= TRUE;
			$lnameError	= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('error.lname', $this->extensionName,'');
			$this->addFlashMessage($lnameError,$messageTitle = '', $severity = \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR, $storeInSession = FALSE);	
		}
		$ttemailvalid	= \TYPO3\CMS\Core\Utility\GeneralUtility::validEmail($ttemail);
		if(!$ttemailvalid){	
			$failure	= TRUE;
			$emailError	= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('error.email', $this->extensionName,'');
			$this->addFlashMessage($emailError,$messageTitle = '', $severity = \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR, $storeInSession = FALSE);	
		}else{
			$emailArrayExist	= $this->checkEmailExist($ttemail);
			if(is_array($emailArrayExist)){	
				$failure			= TRUE;
				$emailExistError	= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('error.emailExist', $this->extensionName,'');
				$this->addFlashMessage($emailExistError, $messageTitle='', $severity=\TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR, $storeInSession=FALSE);	
			}
		}
		$freeCap = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('SJBR\\SrFreecap\\PiBaseApi');
		if(!$freeCap->checkWord($ttcaptcha)) {
			$failure		= TRUE; 
			$captchaError	= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('error.captcha', $this->extensionName,'');
			$this->addFlashMessage($captchaError,$messageTitle = '', $severity = \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR, $storeInSession = FALSE);
		}
		/*
		$result = $this->getControllerContext()->getRequest()->getOriginalRequestMappingResults();
		$error = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Validation\Error', $ttemail, time());
		$result->forProperty('newSubscription.email')->addError($error);
		$this->getControllerContext()->getRequest()->setOriginalRequestMappingResults($result);
		*/
		if($failure){
			$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
			$templatePathAndFilename	= $templateRootPath.'Episode\Subscription.html';
			$this->view->setTemplatePathAndFilename($templatePathAndFilename);			
			$this->view->assign('fname', $ttfirst_name);
			$this->view->assign('lname', $ttlast_name);
			$this->view->assign('email', $ttemail);
		}else{
			$this->subscribeEmail($ttgender,$ttfirst_name,$ttlast_name,$ttemail);
			$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
			$templatePathAndFilename	= $templateRootPath.'Episode\Subpost.html';
			$this->view->setTemplatePathAndFilename($templatePathAndFilename);		
		}
	}

	/**
	 * action unsubscription
	 * 
	 * @return void
	 */
	public function unsubscriptionAction() {
		$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
		$templatePathAndFilename	= $templateRootPath.'Episode\Unsubscription.html';
		$this->view->setTemplatePathAndFilename($templatePathAndFilename);
		$email						= $GLOBALS['TSFE']->fe_user->user['email']?$GLOBALS['TSFE']->fe_user->user['email']:'';
		$this->view->assign('email', $email);
	}

	/**
	 * action unsubpost
	 * 
	 * @return void
	 */
	public function unsubpostAction() {
		$postParams		= \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_learntubeepisode_pi1');
		$ttemail		= $postParams['delSubscription']['email'];
		$ttcaptcha		= $postParams['delSubscription']['captchaResponse'];
		$ttemailvalid	= \TYPO3\CMS\Core\Utility\GeneralUtility::validEmail($ttemail);
		$failure		= FALSE;
		if(!$ttemailvalid){	
			$failure	= TRUE;
			$emailError	= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('error.email', $this->extensionName,'');
			$this->addFlashMessage($emailError,$messageTitle = '', $severity = \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR, $storeInSession = FALSE);	
		}else{
			$emailArrayExist	= $this->checkEmailExist($ttemail);
			if(!is_array($emailArrayExist)){	
				$failure			= TRUE;
				$emailExistError	= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('error.emailNotExist', $this->extensionName,'');
				$this->addFlashMessage($emailExistError, $messageTitle='', $severity=\TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR, $storeInSession=FALSE);	
			}
		}
		$freeCap = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('SJBR\\SrFreecap\\PiBaseApi');
		if(!$freeCap->checkWord($ttcaptcha)) {
			$failure		= TRUE; 
			$captchaError	= \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('error.captcha', $this->extensionName,'');
			$this->addFlashMessage($captchaError,$messageTitle = '', $severity = \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR, $storeInSession = FALSE);
		}
		if($failure){
			$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
			$templatePathAndFilename	= $templateRootPath.'Episode\Unsubscription.html';
			$this->view->setTemplatePathAndFilename($templatePathAndFilename);			
			$this->view->assign('email', $ttemail);
		}else{
			$this->unsubscribeEmail($emailArrayExist);
			$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
			$templatePathAndFilename	= $templateRootPath.'Episode\Unsubpost.html';
			$this->view->setTemplatePathAndFilename($templatePathAndFilename);
		}
	}

	/**
	 * action activate
	 * 
	 * @return void
	 */
	public function activationAction() {
		//http://localhost/t3740/index.php?id=21&tx_learntubeepisode_pi1[ltbepihash]=3ebbf376cb3b144465dbd953c146951f1
		$gpParams			= \TYPO3\CMS\Core\Utility\GeneralUtility::_GP('tx_learntubeepisode_pi1');
		//print_r($gpParams);
		if($gpParams['ltbepihash'] && (strlen($gpParams['ltbepihash']) == 33 )) {
			$ttuid		= substr($gpParams['ltbepihash'], -1);
			$md5email	= substr($gpParams['ltbepihash'], 0,32);
			$ttRecord	= $this->getAddressRecordByUid($ttuid);
			//echo md5($ttRecord['email']);echo '<hr>'.$md5email;
			if(is_array($ttRecord) && (md5($ttRecord['email']) == $md5email)) {
				$this->updateAddressRecordByUid($ttRecord['uid']);
				$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
				$templatePathAndFilename	= $templateRootPath.'Episode\Activation.html';
				$this->view->setTemplatePathAndFilename($templatePathAndFilename);		
				//$this->view->assign('episodes', '');
			}
		}
	}


	/*Auxiliary Functions*/
	function checkEmailExist($email) {
		if(!$email){ return FALSE; }
		return \TYPO3\CMS\Backend\Utility\BackendUtility::getRecordRaw('tt_address', "email='".$email."'", '*');	//Fetch First Record Only
	}

	function getAddressRecordByUid($uid) {
		if(!$uid){ return FALSE; }
		return \TYPO3\CMS\Backend\Utility\BackendUtility::getRecordRaw('tt_address', "uid=".$uid, '*');	//Fetch First Record Only
	}

	function updateAddressRecordByUid($uid) {
		$table					= 'tt_address';
		$uArray['deleted']		= 0;
		$uArray['hidden']		= 0;
		$res = $GLOBALS['TYPO3_DB']->exec_UPDATEquery($table,"uid=".$uid,$uArray);
		if(!$res) {
		  echo '<hr>Error: [File:'.__FILE__.' Func:'.__FUNCTION__.' Line:'.__LINE__.'] SQL='.$GLOBALS['TYPO3_DB']->UPDATEquery($table,"uid=".$uid,$uArray);
		  return FALSE;
		}
		$affectedRows	= $GLOBALS['TYPO3_DB']->sql_affected_rows();
		if($affectedRows >= 1){	return TRUE;	}
	return FALSE;
	}

	function subscribeEmail($ttgender,$ttfirst_name,$ttlast_name,$ttemail){
		$episodes		= $this->episodeRepository->findAll();	//print_r($episodes);
		$episodeIdArray	= array();
		foreach($episodes as $episodeObject){
			$episodeIdArray[$episodeObject->getUid()]	= $episodeObject->getUid();
		}
		$currentTime			= time();
		$table  				= 'tt_address';
		$iArray					= array();
		$iArray['hidden']		= 1;
		$iArray['deleted']		= 0;		
		$iArray['gender']		= $ttgender;
		$iArray['first_name']	= $ttfirst_name;
		$iArray['last_name']	= $ttlast_name;
		$iArray['email']		= $ttemail;
		$iArray['name']			= $ttfirst_name.' '.$ttlast_name;
		$iArray['tstamp']		= $currentTime;		
		$iArray['pid']			= $this->settings['tt_address_pid']?$this->settings['tt_address_pid']:$GLOBALS['TSFE']->id;
		$iArray['tx_learntubefesepisode_episode']	= @implode(",",$episodeIdArray);
		$iArray['tx_learntubefesepisode_subscribe']	= 1;
		$iArray['tx_learntubefesepisode_sdate']		= $currentTime;
		$res = $GLOBALS['TYPO3_DB']->exec_INSERTquery($table, $iArray);
		if(!$res) { //check for sql error
			echo('<hr>\[File:'.__FILE__.' Func:'.__FUNCTION__.' Line:'.__LINE__.'] SQL Error:'.$GLOBALS['TYPO3_DB']->INSERTquery($table, $iArray));
			return FALSE;
		}	
		$ttuid			= $GLOBALS['TYPO3_DB']->sql_insert_id();
		//$affectedRows	= $GLOBALS['TYPO3_DB']->sql_affected_rows();
		//if($affectedRows >= 1){	//Send Activation Link mail
			$emailF		= $this->settings['femail']?$this->settings['femail']:$TYPO3_CONF_VARS['MAIL']['defaultMailFromAddress'];
			$nameF		= $this->settings['fname']?$this->settings['fname']:$TYPO3_CONF_VARS['MAIL']['defaultMailFromName'];
			$subject	= $this->settings['fsubject']?$this->settings['fsubject']:\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('subscribe.subject', $this->extensionName,'');	
			$bodyUser	= $this->mailRender($ttfirst_name,$ttlast_name,$gender,$ttemail,$ttuid,'MailActivationUser.html');
			$bodyAdmin	= $this->mailRender('FES','Admin','Mr.',$ttemail,$ttuid,'MailActivationAdmin.html');  //echo '$bodyUser='.$bodyUser;
			$this->episodeMailer($emailF,$nameF,$ttemail,$ttfirst_name,$subject,$bodyUser,$attachment='');	//To User
			$this->episodeMailer($emailF,$nameF,$emailF,$nameF,$subject,$bodyAdmin,$attachment='');			//To Admin
		//}
	}


	function unsubscribeEmail($emailArrayExist){
		$table					= 'tt_address';
		//$uArray['deleted']	= 1;
		$uArray['hidden']		= 1;
		$res = $GLOBALS['TYPO3_DB']->exec_UPDATEquery($table,"uid='".$emailArrayExist['uid']."'",$uArray);
		if(!$res) {
		  echo '<hr>Error: [File:'.__FILE__.' Func:'.__FUNCTION__.' Line:'.__LINE__.'] SQL='.$GLOBALS['TYPO3_DB']->UPDATEquery($table,"uid='".$emailArrayExist['uid']."'",$uArray);
		  return FALSE;
		}
		//$affectedRows	= $GLOBALS['TYPO3_DB']->sql_affected_rows();
		//if($affectedRows >= 1){	//Send De-Activation Success mail
			$ttemail		= $emailArrayExist['email'];
			$fname			= $emailArrayExist['first_name'];
			$lname			= $emailArrayExist['last_name'];
			$fnamelname		= $emailArrayExist['first_name'].' '.$emailArrayExist['last_name'];
			$gender			= 'Herr';
			if($emailArrayExist['gender'] == 'f'){ $gender	= 'Frau'; }
			$ttuid			= $emailArrayExist['uid'];
			$emailF			= $this->settings['femail']?$this->settings['femail']:$TYPO3_CONF_VARS['MAIL']['defaultMailFromAddress'];
			$nameF			= $this->settings['fname']?$this->settings['fname']:$TYPO3_CONF_VARS['MAIL']['defaultMailFromName'];
			$subject		= $this->settings['fsubject']?$this->settings['fsubject']:\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('unsubscribe.subject', $this->extensionName,'');
			$bodyUser		= $this->mailRender($fname,$lname,$gender,$ttemail,$ttuid,'MailDeActivationUser.html');
			//echo '$bodyUser='.$bodyUser;
			$bodyAdmin		= $this->mailRender('FES','Admin','Mr.',$ttemail,$ttuid,'MailDeActivationAdmin.html');
			$this->episodeMailer($emailF,$nameF,$ttemail,$fnamelname,$subject,$bodyUser,$attachment='');	//To User
			$this->episodeMailer($emailF,$nameF,$emailF,$nameF,$subject,$bodyAdmin,$attachment='');			//To Admin
		//}
	}

	function mailRender($fname,$lname,$gender,$email,$ttuid,$templateName) {	
		$variables['mail'] = array(	'fname' => $fname,
									'lname' => $lname,
									 'gender' => $gender,
									 'pageUid' => $this->settings['activationpage']?$this->settings['activationpage']:$GLOBALS['TSFE']->id,
									 'pihash' => md5($email).$ttuid,
									 'email' => $email,	
									);		
		//$extbaseFrameworkConfiguration = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		//$templateRootPath = \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($extbaseFrameworkConfiguration['view']['templateRootPath']);
		$templateRootPath			= \TYPO3\CMS\Core\Utility\GeneralUtility::getFileAbsFileName($this->config['view']['templateRootPath']);
		$templatePathAndFilename	= $templateRootPath.'Episode'.'/'.$templateName;	//echo '$templatePathAndFilename='.$templatePathAndFilename;
		$emailView					= $this->objectManager->get('TYPO3\\CMS\\Fluid\\View\\StandaloneView');
		$emailView->setTemplatePathAndFilename($templatePathAndFilename);
		$emailView->assignMultiple($variables);
	return $emailView->render();
	}	//

	function episodeMailer($emailF,$nameF,$emailT,$nameT,$subject,$body,$attachment){
		//echo '$emailF='.$emailF.'$nameF='.$nameF.'$email='.$emailT.'$nameT='.$nameT;
		$mail = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Mail\\MailMessage');
		$mail->setFrom(array($emailF => $nameF));
		$mail->setTo(array($emailT => $nameT));
		$mail->setSubject($subject);
		//if($attachment){
			//Create the attachment
			//* Note that you can technically leave the content-type parameter out
			//$attachment = \Swift_Attachment::fromPath('/path/to/image.jpg', 'image/jpeg');
			//(optional) setting the filename
			//$attachment->setFilename('cool.jpg');
			//Attach it to the message
			//$mail->attach($attachment);
		//}
		$mail->setBody($body,'text/html');
		$mail->send();
		//if($mail->isSent()){ return TRUE; }
	}	//


}//end of class
