<?php
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

//require_once(t3lib_extMgm::extPath('ltube_printpages')."class.tx_ltubeprintpages_base.php");
require_once('typo3conf/ext/ltube_printpages/class.tx_ltubeprintpages_base.php');

/**
 * Plugin 'Learntube Print pages' for the 'ltube_printpages' extension.
 *
 * @author	Nirmalya Mondal <nmondal@learntube.de>
 * @package	TYPO3
 * @subpackage	tx_ltubeprintpages
 */
class tx_ltubeprintpages_pi2 extends tx_ltubeprintpages_base {
	public $prefixId      = 'tx_ltubeprintpages_pi2';		// Same as class name
	public $scriptRelPath = 'pi2/class.tx_ltubeprintpages_pi2.php';	// Path to this script relative to the extension dir.
	public $extKey        = 'ltube_printpages';	// The extension key.
	
	var $pi2_flex_settings		= array();
	var $default_storage_folder	= 'fileadmin/ltube_printpages';
	var $file_suffix;
	var $cut_marker				= 'ltb_print_area';
	var $typo3tempdir			= 'typo3temp/ltube_printpages';
	var $language_array			= array();

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

		$this->pi_initPIflexForm();
		$this->_remove_http_and_last_slash();
		$this->_set_flexform_values_pi2();
		$this->_get_set_all_languages();
		//Loading via Typoscript
		//$this->_include_header_js();
		//$this->_include_header_CSS();
		$this->_fetch_all_shortcut_pages_hidden_css();
		if(isset($this->piVars['submit']) && ($this->piVars['submit'] == 'show_tree')){
			echo $this->_display_page_tree();
			die();
		}		

		if(isset($this->piVars['submit']) && ($this->piVars['submit'] == 'submit_multi_print')){
			$content	= $this->_show_print_pages($this->piVars['pages']);
		return $content;
		}
	if(isset($this->piVars['submit_this']) && ($this->piVars['submit_this'] == 'submit_multi_print_this')){
			$content	= $this->_show_print_pages($this->piVars['pages']);
		return $content;
		}
	
	return $this->pi_wrapInBaseClass($content);
	}//main()
	

	/**
	 * tx_ltubeprintpages_pi2::_display_page_tree()
	 *
	 * @package
	 * @author Nirmalya
	 * @copyright Copyright (c) 2011
	 * @version $Id$
	 * @access public
	 */
	function _display_page_tree(){
		$template 			= $this->cObj->fileResource($this->conf['template']);
		$printpages_tree	= $this->cObj->getSubpart($template,'###printpages_tree_form###');
		$print_uid			= $this->conf['print_uid']?$this->conf['print_uid']:$GLOBALS['TSFE']->id;
		$marker	= array();
		$marker['page_tree']				= $this->_fetch_all_subpages_ts_pi2();
		$marker['header_text']				= $this->pi_getLL('header_text');
		$marker['header_description']		= $this->pi_getLL('header_description');
		$marker['button_pagetree_submit']	= $this->pi_getLL('button_pagetree_submit');
		$marker['button_pagetree_submit_this']	= $this->pi_getLL('button_pagetree_submit_this');
		$marker['action_url']				= $this->pi_getPageLink($print_uid,'',array('type'=>'102'));
		$marker['uid']						= $GLOBALS['TSFE']->id;
	return $this->cObj->substituteMarkerArray($printpages_tree,$marker,'###|###', array());	
	}


	/**
	 * tx_ltubeprintpages_pi2::_fetch_all_subpages_ts_pi2
	 *
	 * @package
	 * @author Nirmalya
	 * @copyright Copyright (c) 2011
	 * @version $Id$
	 * @access public
	 */
	function _fetch_all_subpages_ts_pi2(){
		//get TS
		$ts_raw		= $this->conf['subpages'];	
		$ts_raw_dot	= $this->conf['subpages.'];	
		//$ts_raw_dot['special.']['value'] = $this->pi2_flex_settings['root_page'];
		$root_pid	= $this->_find_print_root_page();
		$ts_raw_dot['special.']['value'] = $root_pid?$root_pid:$GLOBALS['TSFE']->id;
		if($this->pi2_flex_settings['exclude_pages']){	$ts_raw_dot['excludeUidList']	 = $this->pi2_flex_settings['exclude_pages'];		}		
		//parse TS
		$tsParser = t3lib_div::makeInstance('t3lib_TSparser');
		$tsParser->parse($ts_raw);		
		$result = $tsParser->setup;
		//render output
	return $this->cObj->cObjGetSingle($ts_raw, $ts_raw_dot);
	}//_fetch_all_subpages_ts_pi2


	/**
	 * tx_ltubeprintpages_pi2::_show_print_pages
	 *
	 * @package
	 * @author Nirmalya
	 * @copyright Copyright (c) 2011
	 * @version $Id$
	 * @access public
	 */
	function _show_print_pages($data_arr){
		//print_r($data_arr);
		//echo $GLOBALS['TSFE']->config['config']['language']; //de,en,nl
		//echo $GLOBALS['TSFE']->sys_language_uid;			// 0,1,2
		$sys_language_uid	= $GLOBALS['TSFE']->config['config']['sys_language_uid'];
		$cur_lang_string	= $this->language_array[$sys_language_uid];
		//echo '$cur_lang_string='.$cur_lang_string;
		$print_string		= '';
		foreach($data_arr as $arr_key=>$page_id){
			if($page_id != $GLOBALS['TSFE']->id){
				$storage_folder	= $this->pi2_flex_settings['storage_folder']?$this->pi2_flex_settings['storage_folder']:$this->default_storage_folder;
				$file_path		= $storage_folder.'/'.$page_id.$this->file_suffix.$cur_lang_string.'.html';
				$print_string	.= $this->_cut_part_from_this_file($file_path);
			}
		}
		$template 				= $this->cObj->fileResource($this->conf['print_template']);
		$marker					= array();
		$marker['page_content']	= $print_string;
		$printable_content		= $this->cObj->substituteMarkerArray($template,$marker,'###|###', array());
	return $printable_content;
	}//_show_print_pages
	

	/**
	 * tx_ltubeprintpages_pi2::_cut_part_from_this_file
	 *
	 * @package
	 * @author Nirmalya
	 * @copyright Copyright (c) 2011
	 * @version $Id$
	 * @access public
	 */
	function _cut_part_from_this_file($file_path){
		$template 		= $this->cObj->fileResource($file_path);
		$cut_marker		= $this->cut_marker;
	return $this->cObj->getSubpart($template,'###'.$cut_marker.'###');		
	}//_cut_part_from_this_file

	
	/**
	 * tx_ltubeprintpages_pi2::_fetch_all_shortcut_pages_hidden_css
	 *
	 * @package
	 * @author Nirmalya
	 * @copyright Copyright (c) 2011
	 * @version $Id$
	 * @access public
	 */
	function _fetch_all_shortcut_pages_hidden_css(){
		$columns   	= 'uid';
		$table  	= 'pages';
		$where		= "1=1 AND doktype=4";
		$groupBy	= '';
		$orderBy	= '';
		$limit		= '';
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit);
		if (!$res) {	//check for sql error
			echo('<hr>\[File:'.__FILE__.' Func:'.__FUNCTION__.' Line:'.__LINE__.'] SQL Error:'.$GLOBALS['TYPO3_DB']->SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit));
			return FALSE;
		}
		$num_rows		= $GLOBALS['TYPO3_DB']->sql_num_rows($res);
		if($num_rows < 1){	return FALSE;	}
		$return_string	= '';
		while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
			$return_string	= $return_string?$return_string.',input[type="checkbox"].is_it_shortcut_'.$row['uid']:'input[type="checkbox"].is_it_shortcut_'.$row['uid'];
		}
		$GLOBALS['TSFE']->additionalHeaderData[$this->prefixId.'_header_css_two'] = 
			'<style type="text/css">/*<![CDATA[*/'.
				$return_string.'{ display:none; }
			/*]]>*/</style>';
	}//_fetch_all_shortcut_pages_hidden_css


	/**
	 * tx_ltubeprintpages_pi2::_find_print_root_page()
	 *
	 * @package
	 * @author Nirmalya
	 * @copyright Copyright (c) 2013
	 * @version $Id$
	 * @access public
	 */
	function _find_print_root_page(){
		if($GLOBALS['TSFE']->page['tx_ltubeprintpages_yn'] >= 1){ return $GLOBALS['TSFE']->id; }
		//Checking Parent page of current page
		$parent_uid	= $GLOBALS['TSFE']->page['pid'];
		$columns   	= 'pid,tx_ltubeprintpages_yn';
		$table  	= 'pages';
		//$where	= 'tx_ltubeprintpages_yn >=1 AND uid='.$parent_uid.$this->cObj->enableFields($table);
		$where		= 'uid='.$parent_uid.$this->cObj->enableFields($table);
		$groupBy	= '';
		$orderBy	= '';
		$limit		= '';
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit);
		if (!$res) { // check for sql error
				echo('<hr>\[File:'.__FILE__.' Func:'.__FUNCTION__.' Line:'.__LINE__.'] SQL Error:'.$GLOBALS['TYPO3_DB']->SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit));
				return FALSE;
		}
		$num_rows	= $GLOBALS['TYPO3_DB']->sql_num_rows($res);		
		$data_rows	= $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);	
		if(($num_rows >= 1) && ($data_rows['tx_ltubeprintpages_yn'] >= 1)){	 return $parent_uid;	}
	return $this->_find_print_root_page_recursive($data_rows['pid']);
	}

	function _find_print_root_page_recursive($uid){
		if(!$uid){ return FALSE; }
		$columns   	= 'pid,tx_ltubeprintpages_yn';
		$table  	= 'pages';
		//$where		= 'tx_ltubeprintpages_yn >=1 AND uid='.$parent_uid.$this->cObj->enableFields($table);
		$where		= 'uid='.$uid.$this->cObj->enableFields($table);
		$groupBy	= '';
		$orderBy	= '';
		$limit		= '';
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit);
		if (!$res) { // check for sql error
				echo('<hr>\[File:'.__FILE__.' Func:'.__FUNCTION__.' Line:'.__LINE__.'] SQL Error:'.$GLOBALS['TYPO3_DB']->SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit));
				return FALSE;
		}
		$num_rows	= $GLOBALS['TYPO3_DB']->sql_num_rows($res);
		$data_rows	= $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
		if(($num_rows >= 1) && ($data_rows['tx_ltubeprintpages_yn'] >= 1)){ return $uid;	}
	return $this->_find_print_root_page_recursive($data_rows['pid']);
	}


}//eoc


if (defined('TYPO3_MODE') && isset($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/ltube_printpages/pi2/class.tx_ltubeprintpages_pi2.php'])) {
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/ltube_printpages/pi2/class.tx_ltubeprintpages_pi2.php']);
}

?>