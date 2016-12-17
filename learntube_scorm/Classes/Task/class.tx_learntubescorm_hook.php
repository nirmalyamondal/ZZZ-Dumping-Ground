<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2015 Learntube GmbH <nmondal@learntube.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
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
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */


/**
 * Service "Typo3 SCORM SSO HOOK" for the "learntube_scorm" extension.
 *
 * @author	Learntube <nmondal@learntube.de>
 * @package	TYPO3
 * @subpackage	tx_learntubescorm
 */
class tx_learntubescorm_hook {
	var $prefixId			= 'tx_learntubescorm_hook';		// Same as class name
	var $scriptRelPath		= 'class.tx_learntubescorm_hook.php';	// Path to this script relative to the extension dir.
	var $extKey				= 'learntube_scorm';	// The extension key.
	var $scormuser			= array();
	var $scormt3ecourses	= array();

	function _learntubeT3user2scorm() {	
		$feuserUid	= $GLOBALS['TSFE']->fe_user->user['uid'];
		if(!$feuserUid){	return TRUE;	}
		$username			= $GLOBALS['TSFE']->fe_user->user['username'];		//learnerid
		$firstname			= $GLOBALS['TSFE']->fe_user->user['first_name'];	//learnerfirstname
		$lastname			= $GLOBALS['TSFE']->fe_user->user['last_name'];		//learnerlastname
		$email				= $GLOBALS['TSFE']->fe_user->user['email'];			//email, courseid
		if(($firstname == '') || ($lastname == '') || ($email == '')) { return TRUE; }		
		$this->_fetch_all_scormuser_relations($feuserUid);
		$this->_get_scorm_t3e_courses();
		//echo '$username='.$username; exit();
		$confArr			= unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['learntube_scorm']);	//print_r($confArr);		
		$wwwroot			= $GLOBALS['TSFE']->tmpl->setup['config.']['baseURL'];
		$ServiceUrl			= $confArr['scormcloudurl'];
		$AppId				= $confArr['scormcloudappid'];
		$SecretKey			= $confArr['scormcloudsecretkey'];
		$Origin				= $confArr['scormcloudorigin'];
		$CourseIdDefault	= $confArr['courseiddefault'];
		$ScormService		= \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('ScormEngineService',$ServiceUrl,$AppId,$SecretKey,$Origin);
		$courseService		= $ScormService->getCourseService();

		$ScormService		= new ScormEngineService($ServiceUrl,$AppId,$SecretKey,$Origin);
		$regService			= $ScormService->getRegistrationService();
		$learnerId			= $username;
		$learnerFirstName	= $firstname;
		$learnerLastName	= $lastname;
		$email				= $email;
		foreach($this->scormt3ecourses as $t3eCourseKey=>$t3eCourseValue){
			//if((!in_array($t3eCourseKey,$this->scormuser) || !is_array(($this->scormuser)) {
			if(!in_array($t3eCourseKey,$this->scormuser)) {
				$regId			= uniqid(rand(), true);
				$courseId		= $t3eCourseValue;
				$scorm_local	= $t3eCourseKey;
				$regService->CreateRegistration($regId, $courseId, $learnerId, $learnerFirstName, $learnerLastName, $email);
				$this->_create_fe_user_registration($regId,$courseId,$scorm_local);
			}
		}
		$regService->UpdateLearnerInfo($learnerId,$learnerFirstName,$learnerLastName);
	}


	function _create_fe_user_registration($regId,$scorm_cloud,$scorm_local){
		$scorm_local			= $scorm_local?$scorm_local:0;
		$confArr				= unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['learntube_scorm']);//print_r($confArr);
		$table  				= 'tx_learntubescorm_domain_model_scormuser';
		$iArray					= array();
		$iArray['hidden']		= 0;
		$iArray['deleted']		= 0;
		$iArray['t3user_id']	= $GLOBALS['TSFE']->fe_user->user['uid'];
		$iArray['reg_id']		= $regId;
		$iArray['scorm_cloud']	= $scorm_cloud;
		$iArray['scorm_local']	= $scorm_local;
		$iArray['tstamp']		= time();
		$iArray['crdate']		= time();
		$iArray['cruser_id']	= 1;
		$iArray['pid']			= $confArr['scormcloudstorage'];
		$res = $GLOBALS['TYPO3_DB']->exec_INSERTquery($table, $iArray);
		if (!$res) { //check for sql error
			//echo('<hr>\[File:'.__FILE__.' Func:'.__FUNCTION__.' Line:'.__LINE__.'] SQL Error:'.$GLOBALS['TYPO3_DB']->SELECTquery($table, $iArray));
			return FALSE;
		}		
	return TRUE;
	}//_create_fe_user_registration


	function _fetch_all_scormuser_relations($feuseruid){
		if(!$feuseruid){ return FALSE; }
		$columns   	= 'uid,reg_id,scorm_cloud,scorm_local';
		$table		= 'tx_learntubescorm_domain_model_scormuser';
		$where	  	= 'deleted=0 AND hidden=0 AND t3user_id='.$feuseruid;
		$groupBy	= '';
		$orderBy	= '';
		$limit		= '';
		$res		= $GLOBALS['TYPO3_DB']->exec_SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit);
		if(!$res) {
		  //echo '<hr>Error: [File:'.__FILE__.' Func:'.__FUNCTION__.' Line:'.__LINE__.'] SQL='.$GLOBALS['TYPO3_DB']->UPDATEquery($table,"uid=".$GLOBALS['TSFE']->fe_user->user['uid'],$updateArray);
		  return FALSE;
		}
		$num_rows	= $GLOBALS['TYPO3_DB']->sql_num_rows($res);
		if($num_rows < 1){	 return FALSE;	}
		while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
			//$this->scormuser[$row['uid']]	= $row;
			$this->scormuser[$row['uid']]	= $row['scorm_local'];
		}
	} //_fetch_all_scormuser_relations


	function _get_scorm_t3e_courses(){
		$columns   	= 'uid,cloud_id';
		$table  	= 'tx_learntubescorm_domain_model_scormcourse';
		$where		= 'deleted=0 AND hidden=0';
		$groupBy	= '';
		$orderBy	= '';
		$limit		= '';
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit);
		if (!$res) { //check for sql error
			//echo('<hr>\[File:'.__FILE__.' Func:'.__FUNCTION__.' Line:'.__LINE__.'] SQL Error:'.$GLOBALS['TYPO3_DB']->SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit));
			return FALSE;
		}
		$num_rows	= $GLOBALS['TYPO3_DB']->sql_num_rows($res);	//echo 'I m here';
		if($num_rows < 1){	 return FALSE;	}		
		while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
			$this->scormt3ecourses[$row['uid']] = $row['cloud_id'];			
		}
	}//_get_scorm_t3e_courses


}//eoc


if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/learntube_scorm/class.tx_learntubescorm_hook.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/learntube_scorm/class.tx_learntubescorm_hook.php']);
}

?>