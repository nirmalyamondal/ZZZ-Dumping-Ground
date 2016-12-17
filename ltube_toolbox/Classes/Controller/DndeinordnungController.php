<?php
namespace TYPO3\LtubeToolbox\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Pranab Ojha <pojha@learntube.in>, Learntube
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
 *
 *
 * @package ltube_toolbox
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class DndeinordnungController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	
	/**
	 * dndeinordnungRepository
	 *
	 * @var \TYPO3\LtubeToolbox\Domain\Repository\DndeinordnungRepository
	 * @inject
	 */
	protected $dndeinordnungRepository;
	

	/**
	 * dndeinordngfeedbackRepository
	 *
	 * @var \TYPO3\LtubeToolbox\Domain\Repository\DndeinordngfeedbackRepository
	 * @inject
	 */
	protected $dndeinordngfeedbackRepository;


	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$cObj			= $this->configurationManager->getContentObject();
		$currentUid		= $cObj->data['_LOCALIZED_UID']?$cObj->data['_LOCALIZED_UID']:$cObj->data['uid'];
		$cur_lang		= $GLOBALS['TSFE']->config['config']['language'];
		$dataFromRepo	= $this->dndeinordnungRepository->findEinordnungDndCard($currentUid);
		$leftColumn		= $this->dndeinordnungRepository->countByDndCardMatchColumn(1);
		$rightColumn	= $this->dndeinordnungRepository->countByDndCardMatchColumn(2);

		$resultArray = array();
		foreach ($dataFromRepo as $object){
			$resultArray[$object->getUid()]['uid']			= $object->getUid();
			$resultArray[$object->getUid()]['Content']		= $object->getDndCardContent();
			$resultArray[$object->getUid()]['BgColor']		= $object->getDndCardBgcolor();
			$resultArray[$object->getUid()]['MatchCol']		= $object->getDndCardMatchColumn();
		}
		$this->view->assign('dndcardEinordnungs', $resultArray);
		$this->view->assign('cur_lang', $cur_lang);
		$this->view->assign('leftColumn', $leftColumn);
		$this->view->assign('cur_lang', $cur_lang);
		$this->view->assign('rightColumn', $rightColumn);
		$this->view->assign('cur_lang', $cur_lang);


		$feedback_data	= $this->dndeinordngfeedbackRepository->findEinordnungFeedbackMsg($currentUid);
		$feedback_array = array();
		foreach($feedback_data as $feedback_object){
			$feedback_array['msg']		= $feedback_object->getFeedbackMessage();
		}

		$this->view->assign('feedbackMsg', $feedback_array);
		$this->view->assign('cur_lang', $cur_lang);
		$pageRenderer = $GLOBALS['TSFE']->getPageRenderer();
		if($this->settings['include_toolbox_css'] == 1){$pageRenderer->addCssFile($this->settings['toolbox_css']);}
		if($this->settings['inclde_drag_n_drop_js'] == 1){$pageRenderer->addJsFile($this->settings['drag_n_drop_js']);}
	}
	


}
?>