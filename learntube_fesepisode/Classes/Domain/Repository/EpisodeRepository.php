<?php
namespace TYPO3\LearntubeFesepisode\Domain\Repository;


/*use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Storage\Typo3DbQueryParser;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
*/
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
 * The repository for Episodes
 */
class EpisodeRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * initializeObject
	 *
	 * @return
	 */
	/*public function initializeObject() {
		//get the settings
		//$querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
		// @var $defaultQuerySettings Tx_Extbase_Persistence_Typo3QuerySettings
        $defaultQuerySettings = $this->objectManager->get('Tx_Extbase_Persistence_Typo3QuerySettings');
        // go for $defaultQuerySettings = $this->createQuery()->getQuerySettings(); if you want to make use of the TS persistence.storagePid with defaultQuerySettings(), see #51529 for details

        // don't add the pid constraint
        $querySettings->setRespectStoragePage(FALSE);
		//$querySettings->setStoragePageIds(array(1=>11));
        // don't add fields from enablecolumns constraint
        $querySettings->setRespectEnableFields(TRUE);		
        // add deleted rows to the result
        //$querySettings->setIncludeDeleted(TRUE);
        // don't add sys_language_uid constraint
        $querySettings->setRespectSysLanguage(FALSE);
		// perform translation to dedicated language
        //$querySettings->setSysLanguageUid(1);
        $this->setDefaultQuerySettings($querySettings);
	}*/

	public function initializeObject() {
    	$this->querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
    	$this->querySettings->setRespectStoragePage(FALSE);
    	$this->setDefaultQuerySettings($this->querySettings);
    }

	/**
	 * find Episode data
	 *
	 * @param 
	 * @return $row
	 */
	public function findALLdata() {	
	//public function findAll() {		
		$query = $this->createQuery();
    	/*$constraints[] = $query->equals('deleted', 0);
        $constraints[] = $query->equals('hidden', 0);    	    	
    	$query->matching(
            $query->logicalAnd($constraints)
    	);*/				
		$query->setLimit((integer)999);
		$query->setOrderings(array('name' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));	//ORDER_ASCENDING
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		//$query->getOrderings(array("crdate" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));	//ORDER_ASCENDING		
		/*$queryParser = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Storage\\Typo3DbQueryParser');
		DebuggerUtility::var_dump($queryParser->parseQuery($query));
    	//$row	= $query->execute();*/		
		$row	= $query->execute(true);
		//$GLOBALS['TYPO3_DB']->debugOutput = true;
	return $row;
	}

}