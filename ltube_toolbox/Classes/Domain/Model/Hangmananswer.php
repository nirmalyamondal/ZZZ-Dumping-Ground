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
class Hangmananswer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * answer
	 *
	 * @var \string
	 */
	protected $answer;

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
	 * Returns the answer
	 *
	 * @return \string $answer
	 */
	public function getAnswer() {
		return $this->answer;
	}

	/**
	 * Sets the answer
	 *
	 * @param \string $answer
	 * @return void
	 */
	public function setAnswer($answer) {
		$this->answer = $answer;
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