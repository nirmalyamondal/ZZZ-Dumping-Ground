<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Nirmalya Mondal <nmondal@learntube.de>
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
 * Plugin 'Language Test Exam' for the 'learntube_glossary' extension.
 *
 *
 * @author	Nirmalya Mondal
 * @package TYPO3
 * @subpackage tx_learntubeglossary
 */
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 *
 *
 *
 * TOTAL FUNCTIONS: 10
 * (This index is automatically created/updated by the extension "learntube_glossary")
 *
 */

class tx_learntubeglossary_flexform {

		function _display_category($config) {
			
			$dateloc_array	= tx_learntubeglossary_flexform::_fetch_datelocation();
			//$config['items'] = array_merge($config['items'], $dateloc_array);
			//$config['items'] = $dateloc_array;
			$config['items'] = array_merge($dateloc_array,$config['items']);
		
		}//main



		function _fetch_datelocation(){
			$columns   	= 'uid,title';
			$table  	= 'tx_learntubeglossary_domain_model_glossarycategory';
			$where		= 'deleted=0 AND hidden=0';		
			$groupBy	= '';
			$orderBy	= 'title';
			$limit		= '';
			$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit);
			if (!$res) { // check for sql error
				echo('<hr>\[File:'.__FILE__.' Func:'.__FUNCTION__.' Line:'.__LINE__.'] SQL Error:'.$GLOBALS['TYPO3_DB']->SELECTquery($columns, $table, $where, $groupBy, $orderBy, $limit));
				return FALSE;
			}
			//$num_rows	= $GLOBALS['TYPO3_DB']->sql_num_rows($res);
			$data_tree	= array();
			while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
				$data_tree_tmp		= array();
				$data_tree_tmp[0]	= $row['title'];
				$data_tree_tmp[1]	= $row['uid'];
				$data_tree[]		= $data_tree_tmp;
			}
		return $data_tree;
		}//_fetch_tree_structure

	


}
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/learntube_glossary/class.tx_learntubeglossary_flexform.php']){
    include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/learntube_glossary/class.tx_learntubeglossary_flexform.php']);
}
?>