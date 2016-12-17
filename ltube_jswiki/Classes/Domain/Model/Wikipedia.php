<?php
namespace TYPO3\LtubeJswiki\Domain\Model;

/***************************************************************
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
 *
 *
 * @package ltube_jswiki
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Wikipedia extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * wikiTitle
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $wikiTitle;

	/**
	 * showTitle
	 *
	 * @var \string
	 */
	protected $showTitle;

	/**
	 * maxThumbnails
	 *
	 * @var \integer
	 */
	protected $maxThumbnails;

	/**
	 * cutFirstInfoTableRows
	 *
	 * @var \integer
	 */
	protected $cutFirstInfoTableRows;

	/**
	 * maxInfoTableRows
	 *
	 * @var \integer
	 */
	protected $maxInfoTableRows;

	/**
	 * thumbMaxWidth
	 *
	 * @var \integer
	 */
	protected $thumbMaxWidth;

	/**
	 * thumbMaxHeight
	 *
	 * @var \integer
	 */
	protected $thumbMaxHeight;

	/**
	 * Returns the wikiTitle
	 *
	 * @return \string $wikiTitle
	 */
	public function getWikiTitle() {
		return $this->wikiTitle;
	}

	/**
	 * Sets the wikiTitle
	 *
	 * @param \string $wikiTitle
	 * @return void
	 */
	public function setWikiTitle($wikiTitle) {
		$this->wikiTitle = $wikiTitle;
	}

	/**
	 * Returns the showTitle
	 *
	 * @return \string $showTitle
	 */
	public function getShowTitle() {
		return $this->showTitle;
	}

	/**
	 * Sets the showTitle
	 *
	 * @param \string $showTitle
	 * @return void
	 */
	public function setShowTitle($showTitle) {
		$this->showTitle = $showTitle;
	}

	/**
	 * Returns the maxThumbnails
	 *
	 * @return \integer $maxThumbnails
	 */
	public function getMaxThumbnails() {
		return $this->maxThumbnails;
	}

	/**
	 * Sets the maxThumbnails
	 *
	 * @param \integer $maxThumbnails
	 * @return void
	 */
	public function setMaxThumbnails($maxThumbnails) {
		$this->maxThumbnails = $maxThumbnails;
	}

	/**
	 * Returns the cutFirstInfoTableRows
	 *
	 * @return \integer $cutFirstInfoTableRows
	 */
	public function getCutFirstInfoTableRows() {
		return $this->cutFirstInfoTableRows;
	}

	/**
	 * Sets the cutFirstInfoTableRows
	 *
	 * @param \integer $cutFirstInfoTableRows
	 * @return void
	 */
	public function setCutFirstInfoTableRows($cutFirstInfoTableRows) {
		$this->cutFirstInfoTableRows = $cutFirstInfoTableRows;
	}

	/**
	 * Returns the maxInfoTableRows
	 *
	 * @return \integer $maxInfoTableRows
	 */
	public function getMaxInfoTableRows() {
		return $this->maxInfoTableRows;
	}

	/**
	 * Sets the maxInfoTableRows
	 *
	 * @param \integer $maxInfoTableRows
	 * @return void
	 */
	public function setMaxInfoTableRows($maxInfoTableRows) {
		$this->maxInfoTableRows = $maxInfoTableRows;
	}

	/**
	 * Returns the thumbMaxWidth
	 *
	 * @return \integer $thumbMaxWidth
	 */
	public function getThumbMaxWidth() {
		return $this->thumbMaxWidth;
	}

	/**
	 * Sets the thumbMaxWidth
	 *
	 * @param \integer $thumbMaxWidth
	 * @return void
	 */
	public function setThumbMaxWidth($thumbMaxWidth) {
		$this->thumbMaxWidth = $thumbMaxWidth;
	}

	/**
	 * Returns the thumbMaxHeight
	 *
	 * @return \integer $thumbMaxHeight
	 */
	public function getThumbMaxHeight() {
		return $this->thumbMaxHeight;
	}

	/**
	 * Sets the thumbMaxHeight
	 *
	 * @param \integer $thumbMaxHeight
	 * @return void
	 */
	public function setThumbMaxHeight($thumbMaxHeight) {
		$this->thumbMaxHeight = $thumbMaxHeight;
	}

}
?>