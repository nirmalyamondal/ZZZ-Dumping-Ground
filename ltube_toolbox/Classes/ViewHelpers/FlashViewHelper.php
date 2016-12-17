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
	class Tx_LtubeToolbox_ViewHelpers_FlashViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
		
		protected $settings;

		/**
		 * @param Tx_Extbase_Configuration_ConfigurationManager $configurationManager
		 * @return void
		 */
		public function injectConfigurationManager(Tx_Extbase_Configuration_ConfigurationManager $configurationManager) {
			$this->settings = $configurationManager->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);
			if (empty($this->settings)) {
				throw new Exception('No configuration found for Flashcard view helper');
			}
		}

		/**
		 * Initialize arguments
		 *
		 * @return void
		 */
		public function initializeArguments() {
			$this->registerArgument('obj');
			$this->registerArgument('cycle');
		}

		/**
		 * Renders raw content in given case
		 *
		 * @param string $case Upper or lower
		 * @param string $content Content
		 * @return string Raw content
		 */
		public function render() {
			$arguments		= $this->arguments;
			$feContent		= $arguments['obj']->getFeContent();
			$feFontColor	= $arguments['obj']->getFeFontColor();
			$feBgColor		= $arguments['obj']->getFeBgColor();
			$flipDir		= $arguments['obj']->getFlipDir();
			$cycle			= $arguments['cycle'];
			$width			= $this->settings['flashcardwidth'];
			$height			= $this->settings['flashcardheight'];
			$cardWidth		= $width.'px';
			$cardHeight		= $height.'px';
			$innerWidth		= $width-40;
			$innerHeight	= $height-40;
			$innerCardWidth	= $innerWidth.'px';
			$innerCardHeight= $innerHeight.'px';
			
			$feBgColor		= $feBgColor ? $feBgColor : '#bebebe';
			$feFontColor	= $feFontColor ? $feFontColor : '#ffffff';
			$flipDir		= $flipDir ? $flipDir : 1;
							
			$flashcard		= "<div id='flashcard$cycle' class='flashcard' style='background:$feBgColor;width:$cardWidth;height:$cardHeight;margin:0px;padding:0px;color:$feFontColor' onclick='flipcard($cycle,$flipDir)' > <div id='innerFlashcard$cycle' class='innerFlashcard' style='float:left;width:$innerCardWidth;height:$innerCardHeight;margin:20px;padding:0px;' >".$feContent."</div></div>";
			
		return $flashcard;
		}//function render()

	}//class
?>