<?php
namespace Typo3\LtubeWegaccordion\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Nirmalya Mondal <typo3india@gmail.com>, Learntube
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
 * Accordiondata
 */
class Accordion extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

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
	 * descriptiontwo
	 * 
	 * @var string
	 */
	protected $descriptiontwo = '';

	/**
	 * Returns the title
	 * 
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 * 
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
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
	 * Returns the descriptiontwo
	 * 
	 * @return string $descriptiontwo
	 */
	public function getDescriptiontwo() {
		return $this->descriptiontwo;
	}

	/**
	 * Sets the descriptiontwo
	 * 
	 * @param string $descriptiontwo
	 * @return void
	 */
	public function setDescriptiontwo($descriptiontwo) {
		$this->descriptiontwo = $descriptiontwo;
	}

}

?>