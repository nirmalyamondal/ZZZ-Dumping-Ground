<?php
namespace Typo3\LtubeDaafd\Domain\Repository;

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
 * The repository for Daafds
 */
class DaafdRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

		public function initializeObject() {
	  // get the settings
	 //$querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
	 $querySettings = $this->objectManager->create('Tx_Extbase_Persistence_Typo3QuerySettings');
	$querySettings->setRespectStoragePage(TRUE);
	$querySettings->setStoragePageIds(array(1=>$GLOBALS['TSFE']->id));
	 
	  // store the settings as default-values
	  $this->setDefaultQuerySettings($querySettings);
	}

	/**
	 * find Daafd
	 *
	 * @param $currentUid
	 * @return
	 */
	public function findDaafd($currentUid) {		
		$query	= $this->createQuery();
		$row	= $query->matching($query->equals('parentid', 1))
			         ->execute();
		/*$limit	= 9999;
		$query = $this->createQuery();
        $query->matching($query->equals('parentid', $currentUid));
        $query->setOrderings(array('uid' => Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING));
        $query->setLimit((integer)$limit);
        $row = $query->execute();*/
	return $row;
	}//findDaafd
}