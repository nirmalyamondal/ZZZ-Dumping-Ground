var tx_toolbox_pi1_aJaXuRl = location.href;



function _set_quiz_width(div_content_id){
	toolbox_width	= jQuery('#'+div_content_id+' div.tx-ltube-toolbox').width();
	quiz_width		= toolbox_width - 34;
	jQuery('#'+div_content_id+' #quiz_start').width(quiz_width);
	jQuery('#'+div_content_id+' #tx_toolbox_quiz').width(quiz_width);
	jQuery('#'+div_content_id+' #quiz_result').width(quiz_width);
	message_max_width	= quiz_width - 98;
	jQuery('#'+div_content_id+' #tx_toolbox_quiz .message').css({'max-width' : message_max_width+'px'});

	question_width	= quiz_width - 24;
	jQuery('#'+div_content_id+' #tx_toolbox_quiz .question').width(question_width);
	
	cardWidth	= jQuery('#'+div_content_id+' ul#tx_toolbox_quiz').attr("qcw");
	totalQuizAnsWidth		= cardWidth * 2 + 8 + 20 + 34;
	
	if(toolbox_width < totalQuizAnsWidth){
		totalQuizCardWidth	= quiz_width - 28 -80;
		quizCardWidth		= totalQuizCardWidth / 2;
		jQuery('#'+div_content_id+' #tx_toolbox_quiz .answer').css({'width':quizCardWidth});

		quizPagerWidth		= quizCardWidth * 2 + 28 + 80;
		quizPagerLiWidth	= quizPagerWidth / 3;
		jQuery('#'+div_content_id+' ul.pager').width(quizPagerWidth);
		jQuery('#'+div_content_id+' ul.pager li').width(quizPagerLiWidth);
	}

	if(toolbox_width > totalQuizAnsWidth){
		quizCardWidth		= cardWidth - 40;
		jQuery('#'+div_content_id+' #tx_toolbox_quiz .answer').css({'width':quizCardWidth});

		quizPagerWidth		= quizCardWidth * 2 + 28 + 80;
		quizPagerLiWidth	= quizPagerWidth / 3;
		jQuery('#'+div_content_id+' ul.pager').width(quizPagerWidth);
		jQuery('#'+div_content_id+' ul.pager li').width(quizPagerLiWidth);
	}
	
}


function _set_pager_width(div_content_id){
	toolbox_width	= jQuery('#'+div_content_id+' div.tx-ltube-toolbox').width();
	quiz_width		= toolbox_width - 34;
	
	cardWidth	= jQuery('#'+div_content_id+' ul#tx_toolbox_quiz').attr("qcw");
	totalQuizAnsWidth		= cardWidth * 2 + 8 + 20 + 34;
	
	if(toolbox_width < totalQuizAnsWidth){
		totalQuizCardWidth	= quiz_width - 28 -80;
		quizCardWidth		= totalQuizCardWidth / 2;

		quizPagerWidth		= quizCardWidth * 2 + 28 + 80;
		quizPagerLiWidth	= quizPagerWidth / 3;
		jQuery('#'+div_content_id+' ul.pager').width(quizPagerWidth);
		jQuery('#'+div_content_id+' ul.pager li').width(quizPagerLiWidth);
	}

	if(toolbox_width > totalQuizAnsWidth){
		quizCardWidth		= cardWidth - 40;
		quizPagerWidth		= quizCardWidth * 2 + 28 + 80;
		quizPagerLiWidth	= quizPagerWidth / 3;
		jQuery('#'+div_content_id+' ul.pager').width(quizPagerWidth);
		jQuery('#'+div_content_id+' ul.pager li').width(quizPagerLiWidth);
	}
}




function tx_toolbox_pi1_display_quiz(div_content_id){
	jQuery('#'+div_content_id+' #quiz_start').animate({
			opacity: 0.25,
		}, 1200, function() {
			jQuery('#'+div_content_id+' #quiz_start').css({'display': 'none'});
			jQuery('#'+div_content_id+' ul#tx_toolbox_quiz').css({'display':'block', 'float':'left'});

			_toolbox_pagination(div_content_id);
			_toolbox_display_hint(div_content_id);
			_toolbox_check_answer(div_content_id);
			_set_pager_width(div_content_id)
	});
}//tx_toolbox_pi1_display_quiz()






function _toolbox_pagination(div_content_id){
	cur_lang	= jQuery('#'+div_content_id+' ul#tx_toolbox_quiz').attr("cur_lang");
	
	if(cur_lang == 'de'){
		next_label	= "Weiter";
		prev_label	= "Zurück";
	}else{
		next_label	= "Next";
		prev_label	= "Prev";
	}

	jQuery('#'+div_content_id+' ul#tx_toolbox_quiz').flexipage({
		perpage:1,
		next_txt : next_label,
		prev_txt : prev_label,
		showcounter : true,
	});

}//_toolbox_pagination()



function _toolbox_display_hint(div_content_id){
	
	jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li div.hint').click(function(){
		var parentID		= jQuery(this).parent().attr("id");
		var hint			= jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div.hint').attr("hc");
		var msgHtml			= jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div.message').html();
		if(!msgHtml && hint){
			jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div.message').css({'visibility': 'visible'});
			jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div.message').html(hint);
		}
	});
}//_toolbox_display_hint





function _toolbox_check_answer(div_content_id){
	jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li div.answer').click(function(){
		var parentID		= jQuery(this).parent().attr("id");
		var currentID		= jQuery(this).attr("id");

		var ans				= jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div.question').attr("ans");
		
		clickNum = jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div.answer').data('clickNum');
		if (!clickNum) clickNum = 1;

		if(clickNum == 1) {
			var correctAnsID		= 'answer'+ans;
			var total_question		= jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div.question').attr("count");
			var last_question_id	= 'quiz'+total_question;
			
			correctAns = jQuery('#'+div_content_id+' ul#tx_toolbox_quiz').data('correctAns');
			if (!correctAns) correctAns = 0;

			if(currentID === correctAnsID){
				jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div#'+currentID).css({'border': '3px solid #00B050', 'padding': 
				'19px'});
				
				var message	= jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div.message').attr("msg");
				jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div.message').css({'visibility': 'visible'});
				jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div.message').html(message);

				jQuery('#'+div_content_id+' ul#tx_toolbox_quiz').data('correctAns', ++correctAns);
			}else{
				jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div#'+currentID).css({'border': '3px solid red', 'padding': 
				'19px'});
				jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div#answer'+ans).css({'border': '3px solid #00B050', 'padding': 
				'19px'});

				jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div.message').css({'visibility': 'visible'});
				jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div.message').html("This answer is wrong");
			}
			jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div.answer').css({'cursor': 'default'});

			if(parentID == last_question_id){
				jQuery('#'+div_content_id+' ul#tx_toolbox_quiz').animate({
						opacity: 0.25,
						}, 1200, function() {
						jQuery('#'+div_content_id+' ul#tx_toolbox_quiz').css({'display': 'none'});
						jQuery('#'+div_content_id+' ul.pager').css({'display': 'none'});
						jQuery('#'+div_content_id+' #quiz_result').css({'display': 'block'});
				});
				
				var resultMsg	= correctAns+' of '+total_question+' Questions are answered right';
				jQuery('#'+div_content_id+' #quiz_result div#quiz_result_div').html(resultMsg);
			}
		}

		jQuery('#'+div_content_id+' ul#tx_toolbox_quiz li#'+parentID+' div.answer').data('clickNum', ++clickNum);
	});

}//_toolbox_check_answer









function tx_toolbox_pi1_display_quiz_again(div_content_id){
	
	jQuery.ajax({
			type: "POST",
			crossDomain : true,
			url: tx_toolbox_pi1_aJaXuRl,
			data: {
				type : 9163,
				ltube_ajax: 'quiz',
				},
			async: false,
			dataType: "html",
			success: function(data){
				jQuery('#'+div_content_id+' #quiz_result').animate({
						opacity: 0.25,
					}, 1200, function() {
						jQuery('#'+div_content_id+' div.tx-ltube-toolbox').html(data);
						quiz_html	= jQuery('#'+div_content_id+' #'+div_content_id).html();
						jQuery('#'+div_content_id).html(quiz_html);
						jQuery('#'+div_content_id+' #quiz_result').css({'display': 'none'});
						jQuery('#'+div_content_id+' #quiz_start').css({'display': 'none'});
						jQuery('#'+div_content_id+' #tx_toolbox_quiz').css({'display': 'block'});

						_toolbox_display_hint(div_content_id);
						_toolbox_check_answer(div_content_id);
						_toolbox_pagination(div_content_id);
						_set_quiz_width(div_content_id);
				});
			}	
	});
}



























