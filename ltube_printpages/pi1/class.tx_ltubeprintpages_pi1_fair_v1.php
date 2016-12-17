<?php

//Set Execution time to 5Min 
//set_time_limit(300);
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Nirmalya Mondal <nmondal@learntube.de>
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

// require_once(PATH_tslib . 'class.tslib_pibase.php');

require_once(t3lib_extMgm::extPath('ltube_printpages')."class.tx_ltubeprintpages_base.php");

/**
 * Plugin 'Learntube Print Page Generation' for the 'ltube_printpages' extension.
 *
 * @author	Nirmalya Mondal <nmondal@learntube.de>
 * @package	TYPO3
 * @subpackage	tx_ltubeprintpages
 */
class tx_ltubeprintpages_pi1 extends tx_ltubeprintpages_base {
	public $prefixId      = 'tx_ltubeprintpages_pi1';		// Same as class name
	public $scriptRelPath = 'pi1/class.tx_ltubeprintpages_pi1.php';	// Path to this script relative to the extension dir.
	public $extKey        = 'ltube_printpages';	// The extension key.
	
	var $pi1_flex_settings	= array();
	var $pi1_pagestocreate	= array();
	var $default_storage_folder	= 'fileadmin/ltube_printpages';
	var $file_suffix;
	//1:Standard, 2:Advanced, 3:External Url, 4:Shortcut, 5:Not in menu, 6: Backend User Section, 7:Mountpoint, 199:Menu Seperator, 254:Sys Folder, 255:Recycler  
	var $doktype_string		= '1,2';
	var $language_array		= array();

	/**
	 * The main method of the Plugin.
	 *
	 * @param string $content The Plugin content
	 * @param array $conf The Plugin configuration
	 * @return string The content that is displayed on the website
	 */
	public function main($content, array $conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		$this->pi_USER_INT_obj = 1;	// Configuring so caching is not expected. This value means that no cHash params are ever set. We do this, because it's a USER_INT object!
		if(!function_exists('curl_init')){ return $this->pi_wrapInBaseClass('Sorry cURL is not installed!');	}
		if(!$GLOBALS["TSFE"]->fe_user->user['uid']){ 
			//return $this->pi_wrapInBaseClass('Login Needed !!! to execute Print Multiple Pages!'); 
		}
		$this->pi_initPIflexForm();
		$this->_remove_http_and_last_slash();
		$this->_set_flexform_values_pi1();//print_r($this->pi1_flex_settings); die();
		if(!$this->pi1_flex_settings['storage_folder'] || !$this->pi1_flex_settings['uid'] || !$this->pi1_flex_settings['user_pid'] || !$this->pi1_flex_settings['login_id'] || !$this->pi1_flex_settings['root_page']){
			//return $this->pi_wrapInBaseClass($this->pi_getLL('flexform_error'));
		}
		
		//$this->_login_user_automatically('typo3india');
		$this->_get_set_all_languages();
		$this->_process_pageid_n_files();
		$content	= $this->_login_t3_site_via_curl();

	return $this->pi_wrapInBaseClass($content);
	}//main()

	/**
	 * tx_ltubeprintpages_pi1::_process_pageid_n_files
	 *
	 * @package
	 * @author Nirmalya
	 * @copyright Copyright (c) 2011
	 * @version $Id$
	 * @access public
	 */	
	function _process_pageid_n_files(){
		$files_directory	= $this->pi1_flex_settings['storage_folder']?$this->pi1_flex_settings['storage_folder']:$this->default_storage_folder;
		$base_url			= t3lib_div::getIndpEnv('TYPO3_SITE_URL');
		$file_suffix		= $this->file_suffix; //echo '$file_suffix='.$file_suffix;
		$fetch_all_t3_uids	= $this->_fetch_all_subpages_ts_pi1(); //echo '$fetch_all_t3_uids='.$fetch_all_t3_uids;
		$fetch_all_t3_pages	= $this->_fetch_all_t3_pages($fetch_all_t3_uids);		
		$fetch_all_t3_files	= $this->_directory_to_array($files_directory,TRUE);
		//print_r($fetch_all_t3_pages);	//print_r($fetch_all_t3_files);
		foreach($fetch_all_t3_pages as $page_id=>$lastmodified){
			$file_name	= $page_id.$file_suffix;
			if(($fetch_all_t3_files[$file_name]['lastupdated'] < $lastmodified) && ($page_id != $GLOBALS['TSFE']->id)) {
				$this->pi1_pagestocreate[$page_id]	= $page_id;
			}
		}
		//print_r($this->pi1_pagestocreate);//exit();
	}//_process_pageid_n_files


	/**
	 * tx_ltubeprintpages_pi1::_login_t3_site_via_curl
	 *
	 * @package
	 * @author Nirmalya
	 * @copyright Copyright (c) 2011
	 * @version $Id$
	 * @access public
	 */
	function _login_t3_site_via_curl(){
		$uid			= $this->pi1_flex_settings['username'];
		$users			= $this->_fetch_username_password($uid); //print_r($users); die();
		$username		= $users['username'];
		$password		= $users['password'];
		$user_pid		= $this->pi1_flex_settings['user_pid'];
		$login_id		= $this->pi1_flex_settings['login_id'];
		$storage_folder	= $this->pi1_flex_settings['storage_folder']?$this->pi1_flex_settings['storage_folder']:$this->default_storage_folder;
		$base_url		= t3lib_div::getIndpEnv('TYPO3_SITE_URL');
		$file_suffix	= $this->file_suffix;
		$post_vars		= "&logintype=login&pid=".$user_pid."&user=".$username."&pass=".$password; 
		$cookie			= "cookie.txt"; 
		$login_url		= $base_url."/index.php?id=".$login_id; 

		//init curl
		$ch = curl_init();
		//Set the URL to work with
		curl_setopt($ch, CURLOPT_URL, $login_url);
		//ENABLE HTTP POST
		curl_setopt($ch, CURLOPT_POST, 1);
		//Set the post parameters
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vars);
		//Handle cookies for the login
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);

		//Setting CURLOPT_RETURNTRANSFER variable to 1 will force cURL
		//not to print out the results of its query.
		//Instead, it will return the results as a string return value
		//from curl_exec() instead of the usual true/false.
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		//execute the request (the login)
		$store = curl_exec($ch);
		
		foreach($this->language_array as $language_key=>$language_id){	//Foreach languages		
			foreach($this->pi1_pagestocreate as $page_key=>$page_id){	//Foreach Pages
				$page_url	= $base_url."/index.php?id=".$page_id."&L=".$language_key; 
				$file_name	= $page_id.$file_suffix; 
				$file_path	= $this->default_storage_folder.'/'.$file_name.$language_id.'.html'; 
				curl_setopt($ch, CURLOPT_POST, 0);
				curl_setopt($ch, CURLOPT_URL, $page_url);
				$page		= curl_exec($ch);
				$fp			= fopen($file_path, "w");
				fwrite($fp, $page);			
				fclose($fp);
			}//pagearray
		}//langarray
		
		curl_close($ch);
	}//_login_t3_site_via_curl

	/**
	 * tx_ltubeprintpages_pi1::_fetch_all_subpages_ts_pi1
	 *
	 * @package
	 * @author Nirmalya
	 * @copyright Copyright (c) 2011
	 * @version $Id$
	 * @access public
	 */
	function _fetch_all_subpages_ts_pi1(){
		//get TS
		$ts_raw		= $this->conf['subpages'];	
		$ts_raw_dot	= $this->conf['subpages.'];	
		$ts_raw_dot['special.']['value'] = $this->pi1_flex_settings['root_page'];
		if($this->pi1_flex_settings['exclude_pages']){	$ts_raw_dot['excludeUidList']	 = $this->pi1_flex_settings['exclude_pages'];		}		
		//parse TS
		$tsParser = t3lib_div::makeInstance('t3lib_TSparser');
		$tsParser->parse($ts_raw);		
		$result = $tsParser->setup;
		//print_r($ts_raw_dot);
		//render output
	return $this->cObj->cObjGetSingle($ts_raw, $ts_raw_dot);
	}//_fetch_all_subpages_ts_pi1


	/**
	 * tx_ltubeprintpages_pi1::_fetch_username_password
	 *
	 * @package
	 * @author Nirmalya
	 * @copyright Copyright (c) 2011
	 * @version $Id$
	 * @access public
	 */
	function _fetch_username_password($uid){
		$columns   	= 'username,password';
		$table  	= 'fe_users';
		$where		= "1=1 AND uid =".$uid;
		$groupBy	= '';
		$orderBy	= '';
		$limit		= '';
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit);
		if (!$res) {	//check for sql error
			echo('<hr>\[File:'.__FILE__.' Func:'.__FUNCTION__.' Line:'.__LINE__.'] SQL Error:'.$GLOBALS['TYPO3_DB']->SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit));
			return FALSE;
		}
		$num_rows	= $GLOBALS['TYPO3_DB']->sql_num_rows($res);
		if($num_rows < 1){	return FALSE;	}
		while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
			return $row;
		}
	}//_fetch_username_password


	function _login_user_automatically($username){
		if(!$GLOBALS["TSFE"]->fe_user->user['uid']){
			//Do FE User Loin
			$GLOBALS['TSFE']->fe_user->checkPid = 0;
			$info	= $GLOBALS['TSFE']->fe_user->getAuthInfoArray(); 
			$user	= $GLOBALS['TSFE']->fe_user->fetchUserRecord($info['db_user'],$username);
			$GLOBALS['TSFE']->fe_user->createUserSession($user);
			$GLOBALS["TSFE"]->fe_user->loginSessionStarted = TRUE;
			$GLOBALS["TSFE"]->fe_user->user = $GLOBALS["TSFE"]->fe_user->fetchUserSession();
		}
	}//_login_user_automatically


}//eof

if (defined('TYPO3_MODE') && isset($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/ltube_printpages/pi1/class.tx_ltubeprintpages_pi1.php'])) {
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/ltube_printpages/pi1/class.tx_ltubeprintpages_pi1.php']);
}

?>