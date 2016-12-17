<?php


	function _get_flexform_selected_field_toolbox($ltb_content_id){		
		if(!$ltb_content_id){	return 'Flashcard->list';	}
		$res_link	= $GLOBALS['TYPO3_DB']->exec_SELECTquery('pi_flexform', 'tt_content', 'uid='.$ltb_content_id, $groupBy, $orderBy, $limit);
		$res_row	= $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res_link);
		$flexform	= $res_row['pi_flexform']; 
		if($flexform != ''){
			$flexform_array	= t3lib_div::xml2array($flexform);
			if(is_array($flexform_array)){ 
				return $flexform_array['data']['sDEF']['lDEF']['switchableControllerActions']['vDEF'];
			}			
		}
	return 'Flashcard->list';
	}

	function _get_flexform_selected_field_toolbox_old_ver($ltb_content_id){
		
		if(!$ltb_content_id){	return 'Flashcard->list';	}
		$sel_query	= 'SELECT pi_flexform FROM tt_content WHERE uid='.$ltb_content_id;
		$res_link	= @mysql_query($sel_query);
		$res_row	= @mysql_fetch_assoc($res_link); //print_r($res_row); echo 'i m calledxx' die();
		$flexform	= $res_row['pi_flexform']; 
		if($flexform != ''){
			$flexform_array	= t3lib_div::xml2array($flexform);
			if(is_array($flexform_array)){ 
				return $flexform_array['data']['sDEF']['lDEF']['switchableControllerActions']['vDEF'];
			}			
		}
	return 'Flashcard->list';
	}


?>