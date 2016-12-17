jQuery(function(jQuery){

	jQuery('ul#tx_toolbox_qha li div.hint').click(function(){
		var hint		= jQuery(this).attr("hint");
		var question_id	= jQuery(this).parent().parent().parent().attr("id");
		var prev_hint	= jQuery('ul#tx_toolbox_qha li#'+question_id+' div.hint_ans span').html();
		var hintLabel	= jQuery(this).attr("hl");

		if(hint == prev_hint){
			jQuery('ul#tx_toolbox_qha li#'+question_id+' div.hide_answer_hint_div').css({'display': 'none'});
			jQuery('ul#tx_toolbox_qha li#'+question_id+' div.hint_ans span').html('');
		}else{
			jQuery('ul#tx_toolbox_qha li#'+question_id+' div.hide_answer_hint_div').css({'display': 'block'});
			jQuery('ul#tx_toolbox_qha li#'+question_id+' div.hint_ans_txt p').html(hintLabel);
			jQuery('ul#tx_toolbox_qha li#'+question_id+' div.hint_ans span').html(hint);
		}
	});

	jQuery('ul#tx_toolbox_qha li div.answer').click(function(){
		var question_id	= jQuery(this).parent().parent().attr("id");
		var prev_ans	= jQuery('ul#tx_toolbox_qha li#'+question_id+' div.hint_ans span').html();
		var answer		= jQuery('ul#tx_toolbox_qha li#'+question_id+' div.hide_answer').html();
		var answerLabel	= jQuery(this).attr("al");

		if(answer == prev_ans){
			jQuery('ul#tx_toolbox_qha li#'+question_id+' div.hide_answer_hint_div').css({'display': 'none'});
			jQuery('ul#tx_toolbox_qha li#'+question_id+' div.hint_ans span').html('');
		}else{
			jQuery('ul#tx_toolbox_qha li#'+question_id+' div.hide_answer_hint_div').css({'display': 'block'});
			jQuery('ul#tx_toolbox_qha li#'+question_id+' div.hint_ans_txt p').html(answerLabel);
			jQuery('ul#tx_toolbox_qha li#'+question_id+' div.hint_ans span').html(answer);
		}
	});


});    

