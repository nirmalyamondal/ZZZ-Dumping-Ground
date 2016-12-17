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
	class Tx_LtubeToolbox_ViewHelpers_FcardButtonViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
		
		/**
		 * Initialize arguments
		 *
		 * @return void
		 */
		public function initializeArguments() {
			$this->registerArgument('obj');
			$this->registerArgument('cycle');
			$this->registerArgument('btnlabel');
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
			$beContent		= $arguments['obj']->getBeContent();
			$feBgColor		= $arguments['obj']->getFeBgColor();
			$beBgColor		= $arguments['obj']->getBeBgColor();
			$feFontColor	= $arguments['obj']->getFeFontColor();
			$beFontColor	= $arguments['obj']->getBeFontColor();
			$flipDir		= $arguments['obj']->getFlipDir();
			$cycle			= $arguments['cycle'];
			$btn_label		= $arguments['btnlabel'];
			
			$tempFlashcardfefcolor	= $this->settings['flashcardfefcolor']?$this->settings['flashcardfefcolor']:'#bebebe';
			$tempFlashcardfebcolor	= $this->settings['flashcardfebcolor']?$this->settings['flashcardfebcolor']:'#ffffff';
			$tempFlashcardbefcolor	= $this->settings['flashcardbefcolor']?$this->settings['flashcardbefcolor']:'#84786A';
			$tempFlashcardbebcolor	= $this->settings['flashcardbebcolor']?$this->settings['flashcardbebcolor']:'#ffffff';
			//$tempFlashcardfefcolor	= $this->settings['flashcardfefcolor']?$this->settings['flashcardfefcolor']:1;

			$feBgColor		= $feBgColor ? $feBgColor : $tempFlashcardfebcolor;
			$feFontColor	= $feFontColor ? $feFontColor : $tempFlashcardfefcolor;
			$beBgColor		= $beBgColor ? $beBgColor : $tempFlashcardbebcolor;
			$beFontColor	= $beFontColor ? $beFontColor : $tempFlashcardbefcolor;
			$flipDir		= $flipDir ? $flipDir : 1;
			

			switch($flipDir){
				case 1:
					$button	= "<div class='flipPad'id='flipPad".$cycle."'>";
					$button	.= "<button class='tx_toolbox_left tx_toolbox_backend' rel='rl' onclick='flipcard($cycle,1)' color='$beFontColor' rev='$beBgColor'>$btn_label</button>
					<div class='tx_toolbox_left_content'>$beContent</div>";
					$button	.= "<button class='tx_toolbox_right tx_toolbox_frontend' rel='lr' onclick='flipcard($cycle,2)' color='$feFontColor' rev='$feBgColor' style='display:none;'>$btn_label</button>
					<div class='tx_toolbox_right_content'>$feContent</div>";
					$button	.= "</div>";
				break;

				case 2:
					$button	= "<div class='flipPad' id='flipPad".$cycle."'>";
					$button	.= "<button class='tx_toolbox_right tx_toolbox_backend' rel='lr' onclick='flipcard($cycle,2)' color='$beFontColor' rev='$beBgColor'>$btn_label</button>
					<div class='tx_toolbox_right_content'>$beContent</div>";
					$button	.= "<button class='tx_toolbox_left tx_toolbox_frontend' rel='rl' onclick='flipcard($cycle,1)' color='$feFontColor' rev='$feBgColor' style='display:none;'>$btn_label</button>
					<div class='tx_toolbox_left_content'>$feContent</div>";
					$button	.= "</div>";
				break;

				case 3:
					$button	= "<div class='flipPad' id='flipPad".$cycle."'>";
					$button	.= "<button class='tx_toolbox_top tx_toolbox_backend' rel='bt' onclick='flipcard($cycle,3)' color='$beFontColor' rev='$beBgColor'>$btn_label</button>
					<div class='tx_toolbox_top_content'>$beContent</div>";
					$button	.= "<button class='tx_toolbox_bottom tx_toolbox_frontend' rel='tb' onclick='flipcard($cycle,4)' color='$feFontColor' rev='$feBgColor' style='display:none;'>$btn_label</button>
					<div class='tx_toolbox_bottom_content'>$feContent</div>";
					$button	.= "</div>";
				break;

				case 4:
					$button	= "<div class='flipPad' id='flipPad".$cycle."'>";
					$button	.= "<button class='tx_toolbox_bottom tx_toolbox_backend' rel='tb' onclick='flipcard($cycle,4)' color='$beFontColor' rev='$beBgColor'>$btn_label</button>
					<div class='tx_toolbox_bottom_content'>$beContent</div>";
					$button	.= "<button class='tx_toolbox_top tx_toolbox_frontend' rel='bt' onclick='flipcard($cycle,3)' color='$feFontColor' rev='$feBgColor' style='display:none;'>$btn_label</button>
					<div class='tx_toolbox_top_content'>$feContent</div>";
					$button	.= "</div>";
				break;
			}
			return $button;
			
		}//function render()

	}//class
?>