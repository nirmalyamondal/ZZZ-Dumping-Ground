<?php

namespace LTUBE\LtubeSubscription\Domain\Repository;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Nirmalya Mondal <nmondal@learntube.de>, LEARNTUBE! GmbH
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
 * The repository for Usertopic
 * 
 * @package TYPO3
 * @subpackage LTUBE
 * @author Nirmalya Mondal <nmondal@learntube.de>
 * @copyright (c) 2015, LEARNTUBE! GmbH
 */
class UsertopicRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

    public function initializeObject() {
    	$querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
    	$querySettings->setRespectStoragePage(FALSE);
    	$this->setDefaultQuerySettings($querySettings);
    }

    /**
     * Find usertopic object by a Course and an User 
     * 
     * @param integer $userUid
     * @param integer $courseUid     
     * @return Object
     * 
     */
    public function findUsertopic($userUid, $courseUid){     
        $query			= $this->createQuery();
    	$constraints[]	= $query->equals('courseuid', $courseUid);
        $constraints[]	= $query->equals('useruid', $userUid);    	    	
    	$query->matching(
            $query->logicalAnd($constraints)
    	);
	return $query->execute();
    //return $query->execute()->getFirst();
    }

    /**
     * Add usertopic data
     * 
     * @param integer $userUid
     * @param integer $courseUuid
     * @param integer $priceUid
     * @param integer $duration
	 * @param integer $pid
     * @return void
     */
    public function addUsertopic($userUid, $courseUid, $priceUid, $duration, $pid){
        $now		= time();
		$enddate	= $duration ? $now + ($duration*24*60*60) : 0;  
        $GLOBALS['TYPO3_DB']->exec_INSERTquery('tx_ltubetopicsystem_usertopic', array('useruid' => $userUid, 'courseuid' => $courseUid, 'priceuid' => $priceUid, 'startdate' => $now, 'enddate' => $enddate, 'pid' => $pid, 'tstamp' => $now, 'crdate' => $now, 'hidden' => 0, 'deleted' => 0));
    }

    /**
     * Update usertopic data
     * 
     * @param integer $userUid
     * @param integer $courseUid
     * @param integer $priceUid
     * @param integer $duration
	 * @param integer $pid
     * @return void
     */
    public function updateUsertopic($userUid, $courseUid, $priceUid, $duration, $pid){
		$now		= time();
		$enddate	= $duration ? $now + ($duration*24*60*60) : 0;       
        $GLOBALS['TYPO3_DB']->exec_UPDATEquery('tx_ltubetopicsystem_usertopic', 'useruid='.intval($userUid).' AND courseuid='.intval($courseUid), array('priceuid' => $priceUid, 'startdate' => $now, 'enddate' => $enddate, 'pid' => $pid, 'tstamp' => $now, 'crdate' => $now, 'hidden' => 0, 'deleted' => 0));
    }

}