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
class Dndeinordnung extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * dndCardName
	 *
	 * @var \string
	 */
	protected $dndCardName;

	/**
	 * dndCardContent
	 *
	 * @var \string
	 */
	protected $dndCardContent;

	/**
	 * dndCardBgcolor
	 *
	 * @var \string
	 */
	protected $dndCardBgcolor;

	/**
	 * dndCardMatchColumn
	 *
	 * @var \integer
	 */
	protected $dndCardMatchColumn;

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
	 * Returns the dndCardContent
	 *
	 * @return \string $dndCardContent
	 */
	public function getDndCardContent() {
		return $this->dndCardContent;
	}

	/**
	 * Sets the dndCardContent
	 *
	 * @param \string $dndCardContent
	 * @return void
	 */
	public function setDndCardContent($dndCardContent) {
		$this->dndCardContent = $dndCardContent;
	}

	/**
	 * Returns the dndCardBgcolor
	 *
	 * @return \string $dndCardBgcolor
	 */
	public function getDndCardBgcolor() {
		return $this->dndCardBgcolor;
	}

	/**
	 * Sets the dndCardBgcolor
	 *
	 * @param \string $dndCardBgcolor
	 * @return void
	 */
	public function setDndCardBgcolor($dndCardBgcolor) {
		$this->dndCardBgcolor = $dndCardBgcolor;
	}

	/**
	 * Returns the dndCardMatchColumn
	 *
	 * @return \integer $dndCardMatchColumn
	 */
	public function getDndCardMatchColumn() {
		return $this->dndCardMatchColumn;
	}

	/**
	 * Sets the dndCardMatchColumn
	 *
	 * @param \integer $dndCardMatchColumn
	 * @return void
	 */
	public function setDndCardMatchColumn($dndCardMatchColumn) {
		$this->dndCardMatchColumn = $dndCardMatchColumn;
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