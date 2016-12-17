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
class Flashcard extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * fcardName
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $fcardName;

	/**
	 * feContent
	 *
	 * @var \string
	 */
	protected $feContent;

	/**
	 * beContent
	 *
	 * @var \string
	 */
	protected $beContent;

	/**
	 * feFontColor
	 *
	 * @var \string
	 */
	protected $feFontColor;

	/**
	 * beFontColor
	 *
	 * @var \string
	 */
	protected $beFontColor;

	/**
	 * feBgColor
	 *
	 * @var \string
	 */
	protected $feBgColor;

	/**
	 * beBgColor
	 *
	 * @var \string
	 */
	protected $beBgColor;

	/**
	 * flipDir
	 *
	 * @var \integer
	 */
	protected $flipDir;

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
	 * Returns the fcardName
	 *
	 * @return \string $fcardName
	 */
	public function getFcardName() {
		return $this->fcardName;
	}

	/**
	 * Sets the fcardName
	 *
	 * @param \string $fcardName
	 * @return void
	 */
	public function setFcardName($fcardName) {
		$this->fcardName = $fcardName;
	}

	/**
	 * Returns the feContent
	 *
	 * @return \string $feContent
	 */
	public function getFeContent() {
		return $this->feContent;
	}

	/**
	 * Sets the feContent
	 *
	 * @param \string $feContent
	 * @return void
	 */
	public function setFeContent($feContent) {
		$this->feContent = $feContent;
	}

	/**
	 * Returns the beContent
	 *
	 * @return \string $beContent
	 */
	public function getBeContent() {
		return $this->beContent;
	}

	/**
	 * Sets the beContent
	 *
	 * @param \string $beContent
	 * @return void
	 */
	public function setBeContent($beContent) {
		$this->beContent = $beContent;
	}

	/**
	 * Returns the feFontColor
	 *
	 * @return \string $feFontColor
	 */
	public function getFeFontColor() {
		return $this->feFontColor;
	}

	/**
	 * Sets the feFontColor
	 *
	 * @param \string $feFontColor
	 * @return void
	 */
	public function setFeFontColor($feFontColor) {
		$this->feFontColor = $feFontColor;
	}

	/**
	 * Returns the beFontColor
	 *
	 * @return \string $beFontColor
	 */
	public function getBeFontColor() {
		return $this->beFontColor;
	}

	/**
	 * Sets the beFontColor
	 *
	 * @param \string $beFontColor
	 * @return void
	 */
	public function setBeFontColor($beFontColor) {
		$this->beFontColor = $beFontColor;
	}

	/**
	 * Returns the feBgColor
	 *
	 * @return \string $feBgColor
	 */
	public function getFeBgColor() {
		return $this->feBgColor;
	}

	/**
	 * Sets the feBgColor
	 *
	 * @param \string $feBgColor
	 * @return void
	 */
	public function setFeBgColor($feBgColor) {
		$this->feBgColor = $feBgColor;
	}

	/**
	 * Returns the beBgColor
	 *
	 * @return \string $beBgColor
	 */
	public function getBeBgColor() {
		return $this->beBgColor;
	}

	/**
	 * Sets the beBgColor
	 *
	 * @param \string $beBgColor
	 * @return void
	 */
	public function setBeBgColor($beBgColor) {
		$this->beBgColor = $beBgColor;
	}

	/**
	 * Returns the flipDir
	 *
	 * @return \integer $flipDir
	 */
	public function getFlipDir() {
		return $this->flipDir;
	}

	/**
	 * Sets the flipDir
	 *
	 * @param \integer $flipDir
	 * @return void
	 */
	public function setFlipDir($flipDir) {
		$this->flipDir = $flipDir;
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