<?php
namespace TYPO3\LtubeDaafile\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Nirmalya Mondal <nmondal@learntube.de>, Learntube
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
 * DaafileController
 */
class DaafileController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * daafileRepository
	 * 
	 * @var \TYPO3\LtubeDaafile\Domain\Repository\DaafileRepository
	 * @inject
	 */
	protected $daafileRepository = NULL;

	/**
	 * action list
	 * 
	 * @param TYPO3\LtubeDaafile\Domain\Model\Daafile
	 * @return void
	 */
	public function listAction() {
		$requested_file	= $_REQUEST['ltube_daafile']['file']; //echo '$requested_file='.$requested_file;
		if($requested_file){	$this->downloadAction($requested_file);  }
		//$listings = $this->listingRepository->findAll();
		//$this->view->assign('listings', $listings);
		$cObj			= $this->configurationManager->getContentObject();
		$currentUid		= $cObj->data['uid'];		

		$dataFromRepo	= $this->daafileRepository->findDaafile($currentUid);
		$thisPageId		= $GLOBALS['TSFE']->id;
		$daafiles	= array();
		foreach ($dataFromRepo as $object){
			if($object->getSphoto()){
				$daafiles[$object->getUid()]['uid']			= $object->getUid();
				$daafiles[$object->getUid()]['title']		= $object->getTitle();
				$daafiles[$object->getUid()]['sphoto']		= '<a href="uploads/tx_ltubedaafile/'.$object->getSphoto().'" target="_new">';
				$daafiles[$object->getUid()]['file']		= $object->getSphoto();
				//$daafiles[$object->getUid()]['anchor']		= $thisPageId.'&ltube_daafile[uid]='.$object->getUid().'">';
			}
		}
		$this->view->assign('daafiles', $daafiles);

		$pageRenderer = $GLOBALS['TSFE']->getPageRenderer();
		$pageRenderer->addCssFile('typo3conf/ext/ltube_daafile/Resources/Public/css/ltube_daafile.css'); 
	}

	 public function downloadAction($fileName) {
		 
		$file = 'uploads/tx_ltubedaafile/'.$fileName;
        if(is_file($file)) {
            $fileLen    = filesize($file);          
            $ext        = strtolower(substr(strrchr($fileName, '.'), 1));

            switch($ext) {
                case 'txt':
                    $cType = 'text/plain'; 
                break;              
                case 'pdf':
                    $cType = 'application/pdf'; 
                break;
                case 'exe':
                    $cType = 'application/octet-stream';
                break;
                case 'zip':
                    $cType = 'application/zip';
                break;
                case 'doc':
                    $cType = 'application/msword';
                break;
                case 'xls':
                    $cType = 'application/vnd.ms-excel';
                break;
                case 'ppt':
                    $cType = 'application/vnd.ms-powerpoint';
                break;
                case 'gif':
                    $cType = 'image/gif';
                break;
                case 'png':
                    $cType = 'image/png';
                break;
                case 'jpeg':
                case 'jpg':
                    $cType = 'image/jpg';
                break;
                case 'mp3':
                    $cType = 'audio/mpeg';
                break;
                case 'wav':
                    $cType = 'audio/x-wav';
                break;
                case 'mpeg':
                case 'mpg':
                case 'mpe':
                    $cType = 'video/mpeg';
                break;
                case 'mov':
                    $cType = 'video/quicktime';
                break;
                case 'avi':
                    $cType = 'video/x-msvideo';
                break;

                //forbidden filetypes
                case 'inc':
                case 'conf':
                case 'sql':                 
                case 'cgi':
                case 'htaccess':
                case 'php':
                case 'php3':
                case 'php4':                        
                case 'php5':
                exit;

                default:
                    $cType = 'application/force-download';
                break;
            }

            $headers = array(
                'Pragma'                    => 'public', 
                'Expires'                   => 0, 
                'Cache-Control'             => 'must-revalidate, post-check=0, pre-check=0',
                'Cache-Control'             => 'public',
                'Content-Description'       => 'File Transfer',
                'Content-Type'              => $cType,
                'Content-Disposition'       => 'attachment; filename="'. $fileName .'"',
                'Content-Transfer-Encoding' => 'binary', 
                'Content-Length'            => $fileLen         
            );

            foreach($headers as $header => $data)
                $this->response->setHeader($header, $data); 

            $this->response->sendHeaders();                 
            @readfile($file);   
			exit;
        }   
	 }

}

?>