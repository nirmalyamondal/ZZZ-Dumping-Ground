<?php
namespace TYPO3\LearntubeFesepisode\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Nirmalya Mondal <enirmalya@learntube.de>, Learntube GbR!
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
 * EpisodeCategory
 */
class EpisodeCategory extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 * 
	 * @var string
	 */
	protected $name = '';

	/**
	 * icon
	 * 
	 * @var string
	 */
	protected $icon = '';

	/**
	 * iconalttext
	 * 
	 * @var string
	 */
	protected $iconalttext = '';

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
	 * Returns the icon
	 * 
	 * @return string $icon
	 */
	public function getIcon() {
		return $this->icon;
	}

	/**
	 * Sets the icon
	 * 
	 * @param string $icon
	 * @return void
	 */
	public function setIcon($icon) {
		$this->icon = $icon;
	}

	/**
	 * Returns the iconalttext
	 * 
	 * @return string $iconalttext
	 */
	public function getIconalttext() {
		return $this->iconalttext;
	}

	/**
	 * Sets the iconalttext
	 * 
	 * @param string $iconalttext
	 * @return void
	 */
	public function setIconalttext($iconalttext) {
		$this->iconalttext = $iconalttext;
	}

}