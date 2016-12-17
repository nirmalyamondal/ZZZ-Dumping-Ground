<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2015 LEARNTUBE! GbR - Contact: mail@learntube.de
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
 * This function displays a selector with nested categories.
 * Plugin 'Language Test Exam' for the 'learntube_fesepisode' extension.
 *
 *
 * @author	Nirmalya Mondal <nmondal@learntube.de>
 * @package TYPO3
 * @subpackage tx_learntubefesepisode
 */
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 *
 *
 *
 * TOTAL FUNCTIONS: 2
 * (This index is automatically created/updated by the extension "learntube_fesepisode")
 *
 */



	/**
	 * this class displays a option list of Exam level.
	 *
	 */
class tx_learntubefesepisode_flexform {

	function _display_all_episode($config) {
		$config['items']	= $this->_fetch_custom_fields();
	return $config;
	}

	function _fetch_custom_fields(){
		$columns   	= 'uid,name';
		$table  	= 'tx_learntubefesepisode_domain_model_episode';
		$where		= 'deleted=0 AND hidden=0';		
		$groupBy	= '';
		$orderBy	= 'name';
		$limit		= '';
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit);
		if (!$res) { // check for sql error
			echo('<hr>\[File:'.__FILE__.' Func:'.__FUNCTION__.' Line:'.__LINE__.'] SQL Error:'.$GLOBALS['TYPO3_DB']->SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit));
			return FALSE;
		}
		$num_rows	= $GLOBALS['TYPO3_DB']->sql_num_rows($res);
		if($num_rows < 1){	return FALSE;	}
		$data_tree	= array();
		//$data_tree[0][0] =	'No Test';
		//$data_tree[0][1] =	'notest';
		while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
			$data_tree[$row['uid']][0]	= $row['name'];
			$data_tree[$row['uid']][1]	= $row['uid'];
		}
	return $data_tree;
	}//_fetch_custom_fields

	
}//eoc

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/learntube_fesepisode/class.tx_learntubefesepisode_flexform.php']){
    include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/learntube_fesepisode/class.tx_learntubefesepisode_flexform.php']);
}
?>