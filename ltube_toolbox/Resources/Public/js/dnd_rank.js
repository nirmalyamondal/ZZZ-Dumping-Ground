var tx_toolbox_pi1_aJaXuRl = location.href;

jQuery(function() {
	jQuery( ".dnd_rank_sortable" ).sortable();
	jQuery( ".dnd_rank_sortable" ).disableSelection();
});







function dnd_check_rank(dnd_rank_id){
	var	question_uid	= jQuery('ul#tx_toolbox_dnd_rank li#'+dnd_rank_id+' .dnd_rank_question').attr('question_uid');
	var	right_ans_str	= jQuery('ul#tx_toolbox_dnd_rank li#'+dnd_rank_id).attr('ans');
	var right_ans_arr	= right_ans_str.split(",");

	var ans_uid = [];
			
	jQuery('ul#tx_toolbox_dnd_rank li#'+dnd_rank_id+' .dnd_rank_sortable li').each(function(i){
		ans_uid[i] = jQuery(this).attr('uid');
	});
	
	for (var i=0; i < ans_uid.length; i++) {
		var ans_id		= ans_uid[i];
		var right_ans	= right_ans_arr[i];
		
		if(ans_id == right_ans){
			jQuery("ul#tx_toolbox_dnd_rank li#"+dnd_rank_id+" .dnd_rank_sortable li[uid="+ans_id+"]").css({ 'border':'2px solid #0EA830',  
			'width':'248px', 'height':'18px'});
		}else{
			jQuery("ul#tx_toolbox_dnd_rank li#"+dnd_rank_id+" .dnd_rank_sortable li[uid="+ans_id+"]").css({ 'border':'2px solid red',  
			'width':'248px', 'height':'18px'});
		}
		
	}

}//dnd_check_rank()