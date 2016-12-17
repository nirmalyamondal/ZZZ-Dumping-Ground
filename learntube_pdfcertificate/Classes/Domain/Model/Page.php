<?php
namespace TYPO3\LearntubePdfcertificate\Domain\Model;

/***************************************************************
*
*  Copyright notice
*
*  (c) 2015 LEARNTUBE! GbR - Contact: mail@learntube.de
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
 * Page
 * 
 * @package TYPO3
 * @subpackage LTUBE
 * @author Nirmalya Mondal <nmondal@learntube.de>
 * @copyright (c) 2015, LEARNTUBE! GbR
 */
class Page extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * txLearntubetopicsystemTopic
	 *
	 * @var integer
	 */
	protected $txLearntubetopicsystemTopic = 0;

	/**
	 * doktype
	 *
	 * @var integer
	 */
	protected $doktype = 0;

	/**
	 * Returns the txLearntubetopicsystemTopic
	 *
	 * @return integer $txLearntubetopicsystemTopic
	 */
	public function getTxLearntubetopicsystemTopic() {
		return $this->txLearntubetopicsystemTopic;
	}

	/**
	 * Sets the txLearntubetopicsystemTopic
	 *
	 * @param integer $txLearntubetopicsystemTopic
	 * @return void
	 */
	public function setTxLearntubetopicsystemTopic($txLearntubetopicsystemTopic) {
		$this->txLearntubetopicsystemTopic = $txLearntubetopicsystemTopic;
	}

	/**
	 * Returns the doktype
	 *
	 * @param integer $doktype
	 */
	public function getDoktype(){
		return $this->doktype;
	}

	/**
	 * Sets the doktype
	 *
	 * @param integer $doktype
	 * @return void
	 */
	public function setDoktype($doktype) {
		$this->doktype = $doktype;
	}

}