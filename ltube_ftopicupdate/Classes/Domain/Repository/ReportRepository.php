<?php
namespace LTUBE\LtubeFtopicupdate\Domain\Repository;


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
 * The repository for Report
 * 
 * @package TYPO3
 * @subpackage LTUBE
 * @author Nirmalya Mondal <nmondal@learntube.de>
 * @copyright (c) 2015, LEARNTUBE! GmbH
 */
class ReportRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	public function initializeObject() {
    	$querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
    	$querySettings->setRespectStoragePage(FALSE);
    	$this->setDefaultQuerySettings($querySettings);
    }

	public function getFeUserCreditpoint($userUid, $topicUid){
		$where	= 'topic='.$topicUid.' AND feuser='.$userUid.' AND deleted=0 AND hidden=0';
		$res	= $GLOBALS['TYPO3_DB']->exec_SELECTquery('feuser_credit_point', 'tx_ltubetest_domain_model_report', $where, '', '', 999);
		//return 88;
		if (!$res) { // check for sql error
			//echo('<hr>\[File:'.__FILE__.' Func:'.__FUNCTION__.' Line:'.__LINE__.'] SQL Error:'.$GLOBALS['TYPO3_DB']->SELECTquery('feuser_credit_point', 'tx_ltubetest_domain_model_report', $where, $groupBy, $orderBy, 999));
			return FALSE;
		}
		$num_rows	= $GLOBALS['TYPO3_DB']->sql_num_rows($res);
		if($num_rows < 1){	return FALSE;	}
		$feuser_credit_point	= 0;
		while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
			$feuser_credit_point	+= $row['feuser_credit_point'];
		}
	return $feuser_credit_point;
	}


}