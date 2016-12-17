<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2004 Nirmalya Mandal <typo3india@gmail.com>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
* Baseclass for all frontend Plugins 'Topic System' for the 'ltube_printpages' extension.
*
* @author	Nirmalya Mondal (http://www.nirmalya.info) <typo3india@gmail.com>
*/

//require_once(PATH_tslib."class.tslib_pibase.php");


class tx_ltubeprintpages_base extends \TYPO3\CMS\Frontend\Plugin\AbstractPlugin	{
	var $extKey = "ltube_printpages";	// The extension key.


	/**
	 * tx_ltubeprintpages_base::_include_header_js
	 *
	 * @package
	 * @author Nirmalya
	 * @copyright Copyright (c) 2011
	 * @version $Id$
	 * @access public
	 */
	function _include_header_js($js_file_pi){
		$base_href		= t3lib_div::getIndpEnv('TYPO3_SITE_URL');
		$ext_path		= t3lib_extMgm::siteRelPath($this->extKey);
		$js_dir_path	= $base_href.$ext_path.'jscript/';
		//$js_files		= 'jquery-1.2.6.js,ltube_printpages.js';
        $js_files		= 'ltube_printpages.js';
		$js_file_arr	= @explode(",",$js_files);
		$header_data_js	= '';
		foreach($js_file_arr as $file_key=>$file_value){
			$header_data_js	.= "<script type=\"text/javascript\" src=\"".$js_dir_path.$file_value."\"></script>\n\t";
		}
		$GLOBALS['TSFE']->additionalHeaderData[$this->prefixId.'_header_js'] = $header_data_js;
	}//_include_header_js


	/**
	 * tx_ltubeprintpages_base::_include_header_CSS
	 *
	 * @package
	 * @author Nirmalya
	 * @copyright Copyright (c) 2011
	 * @version $Id$
	 * @access public
	 */
	function _include_header_CSS(){
		$base_href		= t3lib_div::getIndpEnv('TYPO3_SITE_URL');
		$ext_path		= t3lib_extMgm::siteRelPath($this->extKey);
		$header_data_css	=  '<link rel="stylesheet" type="text/css" href="'.$base_href.$ext_path.'css/ltube_printpages.css">';
		$GLOBALS['TSFE']->additionalHeaderData[$this->prefixId.'_header_css'] = $header_data_css;
	}//_include_header_CSS

	/**
	 * tx_ltubeprintpages_base::_fetch_all_t3_pages()
	 *
	 * @param
	 * @param
	 * @return
	 **/
	function _fetch_all_t3_pages($page_uids){
		if(!$page_uids){ return FALSE; }
		$columns   	= 'uid,tstamp';
		$table  	= 'pages';
		$where		= "1=1 AND doktype IN ('".$this->doktype_string."') AND uid IN(".$page_uids.")".$this->cObj->enableFields($table);
		$groupBy	= '';
		$orderBy	= '';
		$limit		= '';
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit);
		if (!$res) { //check for sql error
			echo('<hr>\[File:'.__FILE__.' Func:'.__FUNCTION__.' Line:'.__LINE__.'] SQL Error:'.$GLOBALS['TYPO3_DB']->SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit));
			return FALSE;
		}
		$num_rows	= $GLOBALS['TYPO3_DB']->sql_num_rows($res);
		if($num_rows < 1){	 return FALSE;	}
		$return_data_array	= array();
		while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
			$return_data_array[$row['uid']]	= $row['tstamp'];
		}
	return $return_data_array;
	}

	/**
	 * tx_ltubeprintpages_base::_directory_to_array()
	 *
	 * @param
	 * @param
	 * @return
	 **/
	function _directory_to_array($directory, $recursive) {
		$array_items	= array();
		if($handle = opendir($directory)){
			while(FALSE !== ($file = readdir($handle))){
				if(($file != ".") && ($file != "..")){
					if(is_dir($directory."/".$file)){
						if($recursive) {
							$array_items	= array_merge($array_items, $this->_directory_to_array($directory."/".$file, $recursive));
						}
						//Do Not Include Directories
						/*$file_uid								= basename($file,".jpg");
						$file			= $directory."/".$file;
						$array_items[$file_uid]	= preg_replace("/\/\//si", "/", $file);*/
					}else{
						$file_only_name							= basename($file,".html");
						//$file_uid								= str_replace($this->file_suffix, '', $file_only_name);
						$file_uid								= $file_only_name;
						$file									= $directory."/".$file;
						$array_items[$file_uid]['name']			= preg_replace("/\/\//si", "/", $file);
						$array_items[$file_uid]['lastupdated']	= filemtime($file);						
					}
				}
			}
			closedir($handle);
		}
    return $array_items;
	}

	/**
	 * tx_ltubeprintpages_base::_remove_http_and_last_slash()
	 *
	 * @param
	 * @param
	 * @return
	 **/	
	function _remove_http_and_last_slash(){
		$base_url			= t3lib_div::getIndpEnv('TYPO3_SITE_URL');
		$disallowed_array	= array("http://", "https://", "/", ".","_","-");
		$this->file_suffix	= str_replace($disallowed_array, '', $base_url);
	}//_remove_http_and_last_slash


	/**
	 * tx_ltubeprintpages_base::_set_flexform_values_pi2()
	 *
	 * @param
	 * @param
	 * @return
	 **/
	function _set_flexform_values_pi2(){
		$this->pi2_flex_settings['storage_folder']	= $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'storage_folder', 'vDEF');
		$this->pi2_flex_settings['root_page']		= $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'root_page', 'vDEF');
		$this->pi2_flex_settings['exclude_pages']	= $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'exclude_pages', 'vDEF');
	}//_set_flexform_values_pi2

	
	/**
	 * tx_ltubeprintpages_base::_set_flexform_values_pi1()
	 *
	 * @param
	 * @param
	 * @return
	 **/
	function _set_flexform_values_pi1(){
		$this->pi1_flex_settings['storage_folder']	= $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'storage_folder', 'vDEF');
		$this->pi1_flex_settings['username']		= $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'username', 'vDEF');
		$this->pi1_flex_settings['user_pid']		= $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'user_pid', 'vDEF');
		$this->pi1_flex_settings['login_id']		= $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'login_id', 'vDEF');
		$this->pi1_flex_settings['root_page']		= $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'root_page', 'vDEF');
		$this->pi1_flex_settings['exclude_pages']	= $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'exclude_pages', 'vDEF');
	}//_set_flexform_values_pi1

	function _get_set_all_languages(){
		$columns   	= 'uid,flag';
		$table  	= 'sys_language';
		$where		= "1=1 AND hidden = 0";
		$groupBy	= '';
		$orderBy	= '';
		$limit		= '';
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit);
		if (!$res) { //check for sql error
			echo('<hr>\[File:'.__FILE__.' Func:'.__FUNCTION__.' Line:'.__LINE__.'] SQL Error:'.$GLOBALS['TYPO3_DB']->SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit));
			return FALSE;
		}
		//Consider 0 for Default
		$data_array	= array(0=>"");
		$num_rows	= $GLOBALS['TYPO3_DB']->sql_num_rows($res); 
		if($num_rows < 1){	 $this->language_array	= $data_array;	}
		while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
			$data_array[$row['uid']]	= substr($row['flag'], 0, 2);
		}
	$this->language_array	= $data_array;
	}


}//end of base class

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ltube_printpages/class.tx_ltubeprintpages_base.php'])	{
}
?>