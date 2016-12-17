<?php
namespace TYPO3\LearntubePdfcertificate\Controller;


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
 * PdfCertificateController
 */
class PdfCertificateController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * pdfCertificateRepository
	 * 
	 * @var \TYPO3\LearntubePdfcertificate\Domain\Repository\PdfCertificateRepository
	 * @inject
	 */
	protected $pdfCertificateRepository = NULL;

	 /**
	 * pageRepository
	 *
	 * @var \TYPO3\LearntubePdfcertificate\Domain\Repository\PageRepository
	 * @inject
	 */
	protected $pageRepository = NULL;


		/**
         * action initialize
         * @see \TYPO3\CMS\Extbase\Mvc\Controller\initializeAction
         * 
         */
        public function initializeAction() {
            
            parent::initializeAction();
			//$feuser		= $GLOBALS['TSFE']->fe_user->user['uid'];
			//if(!$feuser){ return FALSE; }
        }

	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
		$feuser		= $GLOBALS['TSFE']->fe_user->user['uid'];
		if(!$feuser){ return FALSE; }
		
		$cObj							= $this->configurationManager->getContentObject();
		$ttcontent						= $cObj->data['uid'];
		$pageId							= $GLOBALS['TSFE']->id;
		$fbcaption						= $this->settings['flex_certificate_fbtitle'];//?$this->settings['flex_certificate_fbtitle']:'Ich bin jetzt offizieller «Basel-Kenner»!';
		$fbtext							= $this->settings['flex_certificate_fbtext'];//?$this->settings['flex_certificate_fbtext']:'Ich habe gerade das erste Level des «Du bist Basel»-Trainings beendet, bei dem ich mich zum Basel-Botschafter ausbilde! Mach mit und teile deine Begeisterung für Basel. www.dubistbasel.com';
		$flex_storage_folder			= $this->settings['flex_storage_folder']?$this->settings['flex_storage_folder']:'fileadmin/course_certificate/';
		$upload_directory				= 'uploads/tx_learntubepdfcertificate/';
		$flex_storage_page				= $this->settings['flex_storage_page']?$this->settings['flex_storage_page']:$pageId;
		$flex_certificate_linklabel		= strip_tags($this->settings['flex_certificate_linklabel']);
		$pdf_file_name					= $GLOBALS['TSFE']->fe_user->user['username'].'_'.$pageId.'_'.$ttcontent.'.pdf';
		//$topicUid						= $this->findTopicContainerPageRecursive($pageId); //echo '$topicUid='.$topicUid; die();print_r($this->settings);
		$pdfCertificates['fileSrc']		= $flex_storage_folder.$pdf_file_name;
		$pdfCertificates['linkLabel']	= $flex_certificate_linklabel?$GLOBALS['TSFE']->csConvObj->conv($flex_certificate_linklabel, 'utf-8', 'iso-8859-1'):'Download Certificate';
		//$pdfCertificates['fbcaption']	= urlencode($GLOBALS['TSFE']->csConvObj->conv($fbcaption, 'utf-8', 'iso-8859-1'));
		//$pdfCertificates['fbtext']		= urlencode($GLOBALS['TSFE']->csConvObj->conv($fbtext, 'utf-8', 'iso-8859-1'));
		$pdfCertificates['fbcaption']	= $fbcaption;
		$pdfCertificates['fbtext']		= $fbtext;
		$pdfCertificates['fbshowhide']	= 'none';
		if(($fbcaption != '') && ($fbtext !='')) {	
			$pdfCertificates['fbshowhide']	= 'block';
		}
		//Now Check IF certificate Exist
		$isCertificateExist				= $this->checkUserPDFContentRelation($pageId,$ttcontent);
		if(!$isCertificateExist || !file_exists(PATH_site.$flex_storage_folder.$pdf_file_name)) { //Certificate Exist Show Download Link			
			$PdfObject					= \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('fpdfi');
			//$this->objectContainer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\Container\Container::class);
			//$PdfObject						= $this->objectManager->create('fpdfi');
			$PdfObject->fpdfi_fileDir		= $flex_storage_folder;
			$PdfObject->fpdfi_uploadDir		= $upload_directory;		
			$PdfObject->fpdfi_fileName		= $pdf_file_name;
			$dirAbs							= PATH_site.$PdfObject->fpdfi_fileDir;
			if(!is_dir($dirAbs)) {	@mkdir($dirAbs, 0755);	}
			$PdfObject->fpdfi_textText1		= $GLOBALS['TSFE']->csConvObj->conv(strip_tags($this->settings['flex_certificate_text1']), 'utf-8', 'iso-8859-1');
			$PdfObject->fpdfi_colorText1	= $this->settings['flex_text1_tcolor']?$this->settings['flex_text1_tcolor']:'#000000';
			$PdfObject->fpdfi_textText2		= $GLOBALS['TSFE']->csConvObj->conv(strip_tags($this->settings['flex_certificate_text2']), 'utf-8', 'iso-8859-1');
			$PdfObject->fpdfi_colorText2	= $this->settings['flex_text2_tcolor']?$this->settings['flex_text2_tcolor']:'#000000';
			$PdfObject->fpdfi_textTitle		= $GLOBALS['TSFE']->csConvObj->conv(strip_tags($this->settings['flex_certificate_title']), 'utf-8', 'iso-8859-1');
			$PdfObject->fpdfi_colorTitle	= $this->settings['flex_title_tcolor']?$this->settings['flex_title_tcolor']:'#000000';
			$PdfObject->fpdfi_textName		= $GLOBALS['TSFE']->csConvObj->conv(strip_tags($GLOBALS['TSFE']->fe_user->user['first_name'].' '.$GLOBALS['TSFE']->fe_user->user['last_name']), 'utf-8', 'iso-8859-1');
			$PdfObject->fpdfi_colorName		= $this->settings['flex_username_tcolor']?$this->settings['flex_username_tcolor']:'#000000';
			$PdfObject->fpdfi_textDate		= 'Basel, '.date("d").'.'.date("m").'.'.date("Y");
			$PdfObject->fpdfi_colorDate		= $this->settings['flex_date_tcolor']?$this->settings['flex_date_tcolor']:'#000000';
			$PdfObject->fpdfi_imageBack		= $this->settings['flex_certificate_image'] ? $PdfObject->fpdfi_uploadDir.$this->settings['flex_certificate_image'] : 'typo3conf/ext/learntube_pdfcertificate/Resources/Private/jpgs/DiplomVorlageWeb-page-001.jpg';
			//$PdfObject->fpdfi_checkGroup	= $this->settings['flex_certificate_group'];
			//$PdfObject->fpdfi_textGroup	= $this->getUserGroupTitle($GLOBALS['TSFE']->fe_user->user['usergroup']);
			$PdfObject->fpdfi_checkVcode	= $this->settings['flex_certificate_vcode'];	
			//$pdfCertificates				= $this->pdfCertificateRepository->findAll();
			$PdfObject->fpdfi_controller(); //echo '$pdfCertificates='.$pdfCertificates;
			$this->addUserPDFContentRelation($pageId,$ttcontent,$flex_storage_page);
		}
		$this->view->assign('pdfCertificates', $pdfCertificates);	
	}


	/**
     * Fetch checkUserPDFContentRelation
     * 
     * @param int $uid
     * @return void
     */
	function checkUserPDFContentRelation($pageId,$ttcontent){
		$table		= 'tx_learntubepdfcertificate_domain_model_items';
		$where		= "feuser=".$GLOBALS['TSFE']->fe_user->user['uid'].' AND ttcontent='.$ttcontent.' AND srcpageid='.$pageId.' AND hidden=0 AND deleted=0';
		$res		= $GLOBALS['TYPO3_DB']->exec_SELECTquery('uid', $table, $where , '', '', 1);
		if (!$res) { return FALSE;	}
		$num_rows	= $GLOBALS['TYPO3_DB']->sql_num_rows($res);
		if($num_rows < 1){	return FALSE;	}
		$row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
	return $row['uid'];
	}

	/**
     * Fetch addUserPDFContentRelation
     * 
     * @param int $uid
     * @return void
     */
	function addUserPDFContentRelation($pageId,$ttcontent,$flex_storage_page){
		$table					= 'tx_learntubepdfcertificate_domain_model_items';
		$mArray['feuser']		= $GLOBALS['TSFE']->fe_user->user['uid'];
		$mArray['datetime']		= time();
		$mArray['ttcontent']	= $ttcontent;
		$mArray['srcpageid']	= $pageId;
		$mArray['tstamp']		= time();
		$mArray['crdate']		= time();
		$mArray['pid']			= $flex_storage_page;
		$res		= $GLOBALS['TYPO3_DB']->exec_INSERTquery($table,$mArray);
		if (!$res) {
			echo '<hr>Error: [File:'.__FILE__.' Func:'.__FUNCTION__.' Line:'.__LINE__.'] SQL='.$GLOBALS['TYPO3_DB']->INSERTquery($table,$mArray); //exit();
			return FALSE;
		}
		$where	= '1=1 AND deleted=0 AND hidden=0';
		$resx	= $GLOBALS['TYPO3_DB']->exec_SELECTquery('max(uid) as muid', $table, $where, $groupBy, $orderBy, $limit);
		$row	= $GLOBALS['TYPO3_DB']->sql_fetch_assoc($resx);
	return $row['muid'];//mysql_insert_id();
	}

}