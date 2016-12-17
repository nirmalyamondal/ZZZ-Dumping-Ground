<?php
namespace TYPO3\LtubeJswiki\Domain\Repository;

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
class WikipediaRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * Life cycle method.
	 *
	 * @return void
	 */
	public function initializeObject() {
		$querySettings = $this->objectManager->create('Tx_Extbase_Persistence_Typo3QuerySettings');
		$querySettings->setRespectStoragePage(TRUE);
		$querySettings->setStoragePageIds(array(1=>$GLOBALS['TSFE']->id));
		$this->setDefaultQuerySettings($querySettings);
	}//initializeObject


	/**
	 * find Wikipedia
	 *
	 * @param $currentUid
	 * @return
	 */
	public function findWikipedia($currentUid) {
		$query	= $this->createQuery();
		$row	= $query->matching($query->equals('parentid', $currentUid))
			         ->execute();
	return $row;
	}//findDndrank

}
?>