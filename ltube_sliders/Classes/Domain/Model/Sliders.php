<?php
namespace TYPO3\LtubeSliders\Domain\Model;

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
 * Listing
 */
class Sliders extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 * 
	 * @var string
	 */
	protected $title = '';

	/**
	 * description
	 * 
	 * @var string
	 */
	protected $description = '';

	/**
	 * linktext
	 * 
	 * @var string
	 */
	protected $linktext = '';

	/**
	 * linkurl
	 * 
	 * @var string
	 */
	protected $linkurl = '';


	/**
	 * sphoto
	 * 
	 * @var string
	 */
	protected $sphoto = '';


	/**
	 * Returns the title
	 * 
	 * @return string title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 * 
	 * @param string $title
	 * @return string title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the description
	 * 
	 * @return string description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 * 
	 * @param string $description
	 * @return string description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the linktext
	 * 
	 * @return string linktext
	 */
	public function getLinktext() {
		return $this->linktext;
	}

	/**
	 * Sets the linktext
	 * 
	 * @param string $linktext
	 * @return string linktext
	 */
	public function setLinktext($linktext) {
		$this->linktext = $linktext;
	}

	/**
	 * Returns the linkurl
	 * 
	 * @return string linkurl
	 */
	public function getLinkurl() {
		return $this->linkurl;
	}

	/**
	 * Sets the linkurl
	 * 
	 * @param string $linkurl
	 * @return string linkurl
	 */
	public function setLinkurl($linkurl) {
		$this->linkurl = $linkurl;
	}


	/**
	 * Returns the sphoto
	 * 
	 * @return string sphoto
	 */
	public function getSphoto() {
		return $this->sphoto;
	}

	/**
	 * Sets the linkurl
	 * 
	 * @param string $sphoto
	 * @return string sphoto
	 */
	public function setSphoto($sphoto) {
		$this->sphoto = $sphoto;
	}


}

?>