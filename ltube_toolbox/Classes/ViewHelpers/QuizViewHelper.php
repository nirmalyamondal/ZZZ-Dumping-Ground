<?php
	/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Pranab Ojha <pranab.edims@gmail.com>, Learntube
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
	 * Case view helper
	 */
	class Tx_LtubeToolbox_ViewHelpers_QuizViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
		
		protected $settings;

		/**
		 * @param Tx_Extbase_Configuration_ConfigurationManager $configurationManager
		 * @return void
		 */
		public function injectConfigurationManager(Tx_Extbase_Configuration_ConfigurationManager $configurationManager) {
			$this->settings = $configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);
			if (empty($this->settings)) {
				throw new Exception('No configuration found for Quiz view helper');
			}
		}

		/**
		 * Initialize arguments
		 *
		 * @return void
		 */
		public function initializeArguments() {
			//$this->registerArgument('obj');
			//$this->registerArgument('cycle');
		}

		/**
		 * Renders raw content in given case
		 *
		 * @param string $case Upper or lower
		 * @param string $content Content
		 * @return string Raw content
		 */
		public function render() {
			$width				= $this->settings['quizcardWidth'];
			$height				= $this->settings['quizcardHeight'];
			$answerBgColor		= $this->settings['quizcardBgColor'];
			$quizCardWidth		= $width - 40;
			$quizCardHeight		= $height - 40;
			$quizCardWidthPx	= $quizCardWidth.'px';
			$quizCardHeightPx	= $quizCardHeight.'px';
			$quizQuesWidth		= $width * 2 + 4;
			$quizQuesWidthPx	= $quizQuesWidth.'px';
			$quizPagerWidth		= $quizQuesWidth + 25;
			$quizPagerWidthPx	= $quizPagerWidth.'px';
			$quizMsgWidth		= $quizQuesWidth - 64;
			$quizMsgWidthPx		= $quizMsgWidth.'px';
			$quizPagerLiWidth	= $quizQuesWidth / 3;
			$quizPagerLiWidthPx	= $quizPagerLiWidth.'px';
			
			$cardStyle	= "<style type='text/css'>   /*<![CDATA[*/ ";
			$cardStyle	.= "#tx_toolbox_quiz .qustion{width:$quizQuesWidthPx;} ul.pager{width:$quizPagerWidthPx !important;padding-left:15px !important;} #tx_toolbox_quiz .message{width:$quizMsgWidthPx;} #tx_toolbox_quiz .answer{width:$quizCardWidthPx; height:$quizCardHeightPx;background:$answerBgColor;}  ul.pager li{width:$quizPagerLiWidthPx !important;} ul.pager li.counter{text-align:center;} ul.pager li.next{text-align:right;} ul.pager li.disabled button{color:#7F7F7F !important;} ul.pager .prev button, ul.pager .next button{background:none !important; border:2px solid #000 !important; font-size:16px; color:#000000 !important; -moz-box-shadow:none !important; -webkit-box-shadow:none !important;-moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px;}";
			$cardStyle	.=" /*]]>*/ </style>";
			
		return $cardStyle;			
		}//function render()




	}//class
?>