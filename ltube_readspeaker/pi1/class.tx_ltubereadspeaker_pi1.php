<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2012 Nirmalya Mondal <nmondal@learntube.de>
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

//require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'Learntube Redmine' for the 'ltube_readspeaker' extension.
 *
 * @author    Nirmalya Mondal <nmondal@learntube.de>
 * @package    TYPO3
 * @subpackage    tx_ltubereadspeaker
 */
class tx_ltubereadspeaker_pi1 extends \TYPO3\CMS\Frontend\Plugin\AbstractPlugin {
    var $prefixId      = 'tx_ltubereadspeaker_pi1';        // Same as class name
    var $scriptRelPath = 'pi1/class.tx_ltubereadspeaker_pi1.php';    // Path to this script relative to the extension dir.
    var $extKey        = 'ltube_readspeaker';    // The extension key.
    var $pi_checkCHash = true;
    
    /**
     * The main method of the PlugIn
     *
     * @param    string        $content: The PlugIn content
     * @param    array        $conf: The PlugIn configuration
     * @return    The content that is displayed on the website
     */
    function main($content, $conf) {
        $this->conf = $conf;
        $this->pi_setPiVarDefaults();
        $this->pi_loadLL();
        
        $readspeaker_yn    = $GLOBALS['TSFE']->page['tx_ltubereadspeaker_readspeaker'];
        if(!$readspeaker_yn){ return FALSE; }

        $this->_load_js_settings();
        $content    = '';
        $content    = $this->_load_template_settings();
    
    return $this->pi_wrapInBaseClass($content);
    }

    function _load_js_settings(){
        /*$base_href        = t3lib_div::getIndpEnv('TYPO3_SITE_URL');
        $ext_path        = t3lib_extMgm::siteRelPath($this->extKey);
        $js_dir_path    = $base_href.$ext_path.'jscript/';
        $js_files        = 'jcarousellite_1.0.1.pack.js,jquery.lightbox_me.js,ltube_eeee.js';
        $js_file_arr    = @explode(",",$js_files);
        $header_data_js    = '';
        $header_data_js    .= '<script src="'.http://f1.eu.readspeaker.com/script/6422/rs_embhl_v2_de_de.js.'" type="text/javascript"></script>';
        foreach($js_file_arr as $file_key=>$file_value){
            $header_data_js    .= "<script type=\"text/javascript\" src=\"".$js_dir_path.$file_value."\"></script>\n\t";
        }*/
        $header_data_js		= '<script src="'.$this->conf['javascript'].'" type="text/javascript"></script>';
		$header_data_js		.= '<script type="text/javascript">
								<!--
									rs.settings.usePost=true;
								//-->
								</script>';
        $GLOBALS['TSFE']->additionalHeaderData[$this->prefixId.'_header_js'] = $header_data_js;
    }//_load_js_settings

    function _load_template_settings(){
        $template           = $this->cObj->fileResource($this->conf['template']);    
        $readspeaker_tmpl   = $this->cObj->getSubpart($template, "###readspeaker_tmpl###");
        $base_url           = t3lib_div::getIndpEnv('TYPO3_SITE_URL');
		$cur_lang			= $GLOBALS['TSFE']->config['config']['language'];
		if($cur_lang == 'en'){ 
			$cur_lang_temp =  'us'; 
		}else{
			$cur_lang_temp =  $cur_lang; 
		}
        $fb_url_conf        = array(
                                'parameter' =>$GLOBALS["TSFE"]->id, 
                               //'additionalParams' => '&user='.$GLOBALS['TSFE']->fe_user->user['username'].'&pass='.$GLOBALS['TSFE']->fe_user->user['password'].'&logintype=login&pid='.$GLOBALS['TSFE']->fe_user->user['pid'],
                                'useCacheHash' => 0,                      
                            );
                            //print_r($GLOBALS['TSFE']->fe_user->user);
        $page_url            = $base_url.$this->cObj->typoLink_URL($fb_url_conf); 
        $marker                = array();
        $marker['url_enc']    = urlencode($page_url);
        //$marker['url_enc']    = $page_url;
		$marker['lang_key']    = $cur_lang.'_'.$cur_lang_temp;
    return $this->cObj->substituteMarkerArray($readspeaker_tmpl,$marker,'###|###', array());        
    }//_load_template_settings


}//

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ltube_readspeaker/pi1/class.tx_ltubereadspeaker_pi1.php'])    {
    include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ltube_readspeaker/pi1/class.tx_ltubereadspeaker_pi1.php']);
}

?>