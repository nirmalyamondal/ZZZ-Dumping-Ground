<?php
namespace TYPO3\LtubeToolbox\Domain\Model;

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
class Dndzuordnung extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * dndCardName
	 *
	 * @var \string
	 */
	protected $dndCardName;

	/**
	 * dndCardLeftContent
	 *
	 * @var \string
	 */
	protected $dndCardLeftContent;

	/**
	 * dndCardRightContent
	 *
	 * @var \string
	 */
	protected $dndCardRightContent;

	/**
	 * dndCardBgColor
	 *
	 * @var \string
	 */
	protected $dndCardBgColor;

	/**
	 * parentid
	 *
	 * @var \integer
	 */
	protected $parentid;

	/**
	 * parenttable
	 *
	 * @var \string
	 */
	protected $parenttable;

	/**
	 * Returns the dndCardName
	 *
	 * @return \string $dndCardName
	 */
	public function getDndCardName() {
		return $this->dndCardName;
	}

	/**
	 * Sets the dndCardName
	 *
	 * @param \string $dndCardName
	 * @return void
	 */
	public function setDndCardName($dndCardName) {
		$this->dndCardName = $dndCardName;
	}

	/**
	 * Returns the dndCardLeftContent
	 *
	 * @return \string $dndCardLeftContent
	 */
	public function getDndCardLeftContent() {
		return $this->dndCardLeftContent;
	}

	/**
	 * Sets the dndCardLeftContent
	 *
	 * @param \string $dndCardLeftContent
	 * @return void
	 */
	public function setDndCardLeftContent($dndCardLeftContent) {
		$this->dndCardLeftContent = $dndCardLeftContent;
	}

	/**
	 * Returns the dndCardRightContent
	 *
	 * @return \string $dndCardRightContent
	 */
	public function getDndCardRightContent() {
		return $this->dndCardRightContent;
	}

	/**
	 * Sets the dndCardRightContent
	 *
	 * @param \string $dndCardRightContent
	 * @return void
	 */
	public function setDndCardRightContent($dndCardRightContent) {
		$this->dndCardRightContent = $dndCardRightContent;
	}

	/**
	 * Returns the dndCardBgColor
	 *
	 * @return \string $dndCardBgColor
	 */
	public function getDndCardBgColor() {
		return $this->dndCardBgColor;
	}

	/**
	 * Sets the dndCardBgColor
	 *
	 * @param \string $dndCardBgColor
	 * @return void
	 */
	public function setDndCardBgColor($dndCardBgColor) {
		$this->dndCardBgColor = $dndCardBgColor;
	}

	/**
	 * Returns the parentid
	 *
	 * @return \integer $parentid
	 */
	public function getParentid() {
		return $this->parentid;
	}

	/**
	 * Sets the parentid
	 *
	 * @param \integer $parentid
	 * @return void
	 */
	public function setParentid($parentid) {
		$this->parentid = $parentid;
	}

	/**
	 * Returns the parenttable
	 *
	 * @return \string $parenttable
	 */
	public function getParenttable() {
		return $this->parenttable;
	}

	/**
	 * Sets the parenttable
	 *
	 * @param \string $parenttable
	 * @return void
	 */
	public function setParenttable($parenttable) {
		$this->parenttable = $parenttable;
	}

}
?>