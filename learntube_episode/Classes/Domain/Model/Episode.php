<?php
namespace LEARNTUBE\LearntubeEpisode\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *    (c) 2015 LEARNTUBE! GbR - Contact: mail@learntube.de
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
 * Containing Episode Data
 */
class Episode extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 * 
	 * @var string
	 */
	protected $name = '';

	/**
	 * sdescription
	 * 
	 * @var string
	 */
	protected $sdescription = '';

	/**
	 * description
	 * 
	 * @var string
	 */
	protected $description = '';

	/**
	 * image
	 * 
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $image = NULL;

	/**
	 * ialttext
	 * 
	 * @var string
	 */
	protected $ialttext = '';

	/**
	 * edate
	 * 
	 * @var \DateTime
	 */
	protected $edate = NULL;

	/**
	 * detailpage
	 * 
	 * @var integer
	 */
	protected $detailpage = 0;

	/**
	 * category
	 * 
	 * @var integer
	 */
	protected $category = 0;

	/**
	 * sent
	 * 
	 * @var boolean
	 */
	protected $sent = FALSE;

	/**
      * @var string
      * @validate \SJBR\SrFreecap\Validation\Validator\CaptchaValidator
      */
     protected $captchaResponse;

	/**
	 * Returns the name
	 * 
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 * 
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the sdescription
	 * 
	 * @return string $sdescription
	 */
	public function getSdescription() {
		return $this->sdescription;
	}

	/**
	 * Sets the sdescription
	 * 
	 * @param string $sdescription
	 * @return void
	 */
	public function setSdescription($sdescription) {
		$this->sdescription = $sdescription;
	}

	/**
	 * Returns the description
	 * 
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 * 
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the image
	 * 
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 * 
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 * @return void
	 */
	public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
		$this->image = $image;
	}

	/**
	 * Returns the ialttext
	 * 
	 * @return string $ialttext
	 */
	public function getIalttext() {
		return $this->ialttext;
	}

	/**
	 * Sets the ialttext
	 * 
	 * @param string $ialttext
	 * @return void
	 */
	public function setIalttext($ialttext) {
		$this->ialttext = $ialttext;
	}

	/**
	 * Returns the edate
	 * 
	 * @return \DateTime $edate
	 */
	public function getEdate() {
		return $this->edate;
	}

	/**
	 * Sets the edate
	 * 
	 * @param \DateTime $edate
	 * @return void
	 */
	public function setEdate(\DateTime $edate) {
		$this->edate = $edate;
	}

	/**
	 * Returns the detailpage
	 * 
	 * @return integer $detailpage
	 */
	public function getDetailpage() {
		return $this->detailpage;
	}

	/**
	 * Sets the detailpage
	 * 
	 * @param integer $detailpage
	 * @return void
	 */
	public function setDetailpage($detailpage) {
		$this->detailpage = $detailpage;
	}

	/**
	 * Returns the category
	 * 
	 * @return integer $category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Sets the category
	 * 
	 * @param integer $category
	 * @return void
	 */
	public function setCategory($category) {
		$this->category = $category;
	}

	/**
	 * Returns the sent
	 * 
	 * @return boolean $sent
	 */
	public function getSent() {
		return $this->sent;
	}

	/**
	 * Sets the sent
	 * 
	 * @param boolean $sent
	 * @return void
	 */
	public function setSent($sent) {
		$this->sent = $sent;
	}

	/**
	 * Returns the boolean state of sent
	 * 
	 * @return boolean
	 */
	public function isSent() {
		return $this->sent;
	}

	/**
      * Sets the captchaResponse
      *
      * @param string $captchaResponse
      * @return void
      */
     public function setCaptchaResponse($captchaResponse) {
             $this->captchaResponse = $captchaResponse;
     }

     /**
      * Getter for captchaResponse
      *
      * @return string
      */
     public function getCaptchaResponse() {
             return $this->captchaResponse;
     }

}