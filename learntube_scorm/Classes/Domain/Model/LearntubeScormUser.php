<?php
namespace TYPO3\LearntubeScorm\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Nirmalya Mondal <nmondal@learntube.de>, LEARNTUBE! GbR
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
 * LearntubeScormUser
 * 
 * @package TYPO3
 * @subpackage TYPO3
 * @author Nirmalya Mondal <nmondal@learntube.de>
 * @copyright (c) 2015, LEARNTUBE! GbR
 */
class LearntubeScormUser extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * t3userId
	 *
	 * @var integer
	 */
	protected $t3userId = 0;


	/**
	 * Returns the t3userId
	 *
	 * @return integer $t3userId
	 */
	public function getT3userId() {
		return $this->t3userId;
	}

	/**
	 * Sets the t3userId
	 *
	 * @param integer $t3userId
	 * @return void
	 */
	public function setT3userId($t3userId) {
		$this->t3userId = $t3userId;
	}

}