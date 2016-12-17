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
class QuizController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * quizRepository
	 *
	 * @var \TYPO3\LtubeToolbox\Domain\Repository\QuizRepository
	 * @inject
	 */
	protected $quizRepository;


	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$cObj = $this->configurationManager->getContentObject();
		$currentUid = $cObj->data['uid'];
		$divIdOfCE	= 'c'.$currentUid;
		
		$cur_lang		= $GLOBALS['TSFE']->config['config']['language'];
		$this->_process_quiz_style($divIdOfCE);

		$dataFromRepo	= $this->quizRepository->findQuizCard($currentUid);
		$quiz_no		= $this->quizRepository->countByParentid($currentUid);
		
		$resultArray = array(); 
		foreach ($dataFromRepo as $object){
			$resultArray[$object->getUid()]['uid']			= $object->getUid();
			$resultArray[$object->getUid()]['question']		= $object->getQuestion();
			$resultArray[$object->getUid()]['answer1']		= $object->getAnswer1();
			$resultArray[$object->getUid()]['answer2']		= $object->getAnswer2();
			$resultArray[$object->getUid()]['answer3']		= $object->getAnswer3();
			$resultArray[$object->getUid()]['answer4']		= $object->getAnswer4();
			$resultArray[$object->getUid()]['hint']			= $object->getHint();
			$resultArray[$object->getUid()]['feedback']		= $object->getRightAnsFeedback();
			$resultArray[$object->getUid()]['right_answer']	= $object->getRightAnswer();
		}
		//echo '<pre>'; echo '$currentUid='.$currentUid; echo '<hr>'; print_r($resultArray); echo '<pre>';
		shuffle($resultArray);
		$this->view->assign('quizzes', $resultArray);
		$this->view->assign('quiz_no', $quiz_no);
		$this->view->assign('divIdOfCE', $divIdOfCE);
		$this->view->assign('cur_lang', $cur_lang);
	}

	
	function _process_quiz_style($divIdOfCE){
		$pageRenderer = $GLOBALS['TSFE']->getPageRenderer();
		if($this->settings['include_toolbox_css'] == 1){$pageRenderer->addCssFile($this->settings['toolbox_css']);}
		if($this->settings['include_flexipage_js'] == 1){$pageRenderer->addJsFile($this->settings['flexipage_js']);}
		if($this->settings['inclde_quiz_js'] == 1){$pageRenderer->addJsFile($this->settings['quiz_js']);}

		$width				= $this->settings['quizcardWidth'];
		$height				= $this->settings['quizcardHeight'];
		$quizBgColor		= $this->settings['quizBgColor'];
		$answerBgColor		= $this->settings['quizcardBgColor'];
		$quizCardWidth		= $width - 40;
		$quizCardHeight		= $height - 40;
		$quizCardWidthPx	= $quizCardWidth.'px';
		$quizCardHeightPx	= $quizCardHeight.'px';
		$quizQuesWidth		= $width * 2 + 4;
		$quizQuesWidthPx	= $quizQuesWidth.'px';
		$quizWidth			= $quizQuesWidth + 20;
		$quizWidthPx		= $quizWidth.'px';
		$quizPagerWidth		= $quizQuesWidth + 25;
		$quizPagerWidthPx	= $quizPagerWidth.'px';
		$quizMsgWidth		= $quizQuesWidth - 64;
		$quizMsgWidthPx		= $quizMsgWidth.'px';
		$quizPagerLiWidth	= $quizQuesWidth / 3;
		$quizPagerLiWidthPx	= $quizPagerLiWidth.'px';
		
		$cardStyle	= "<style type='text/css'>   /*<![CDATA[*/ ";
		$cardStyle	.= "#$divIdOfCE #quiz_start, #$divIdOfCE #tx_toolbox_quiz, #$divIdOfCE #quiz_result{background-color:$quizBgColor;} #$divIdOfCE ul.pager{padding-left:17px !important;} #$divIdOfCE #tx_toolbox_quiz .answer{width:$quizCardWidthPx; height:$quizCardHeightPx;background:$answerBgColor;} #$divIdOfCE ul.pager li.counter{text-align:center;} #$divIdOfCE ul.pager li.next{text-align:right;} #$divIdOfCE ul.pager li.disabled button{color:#7F7F7F !important;} #$divIdOfCE ul.pager .prev button, #$divIdOfCE ul.pager .next button{background:none !important; border:2px solid #000 !important; font-size:16px; color:#000000 !important; -moz-box-shadow:none !important; -webkit-box-shadow:none !important;-moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px;}";
		$cardStyle	.=" /*]]>*/ </style>";

		$GLOBALS['TSFE']->additionalHeaderData[$divIdOfCE.'_quiz_header_css'] = $cardStyle;


		$quizJs		= "<script type='text/javascript'> /*<![CDATA[*/ ";
		$quizJs		.= "jQuery(function(jQuery){ _set_quiz_width('$divIdOfCE');  });";
		$quizJs		.= "jQuery(window).on('resize', function(){ _set_quiz_width('$divIdOfCE'); });";
		$quizJs		.= "jQuery(window).on('scroll', function(){ _set_quiz_width('$divIdOfCE'); });";
		$quizJs		.= " /*]]>*/ </script>";

		$GLOBALS['TSFE']->additionalHeaderData[$divIdOfCE.'_quiz_header_js'] = $quizJs;
	}


}
?>