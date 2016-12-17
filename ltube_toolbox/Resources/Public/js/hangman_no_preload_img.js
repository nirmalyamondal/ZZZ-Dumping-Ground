var score		= 0;
var word		= '';
var ans_word	= '';
var howdead		= 0;
var is_finished	= '';


function toolbox_hangman_play_again(hangman_id){
	jQuery('ul#tx_toolbox_hangman li#'+hangman_id+' #hangman_dash').attr( 'class', 'hangman_dash_visible' );
	jQuery('ul#tx_toolbox_hangman li#'+hangman_id+' .hangman_ans_alphabet td').text('');
	
	jQuery('ul#tx_toolbox_hangman li#'+hangman_id).data("stored_word", '');
	jQuery('ul#tx_toolbox_hangman li#'+hangman_id).data("hangman_score", 0);
	jQuery('ul#tx_toolbox_hangman li#'+hangman_id).data("finished", '');
	jQuery('ul#tx_toolbox_hangman li#'+hangman_id).data('hangman_howdead', 0);

	jQuery('ul#tx_toolbox_hangman li#'+hangman_id+' div.hangman_images').html('');
}//function _hangman_play_again




function toolbox_hangman_guess(question_id,hman_list_id,letter){
	if(jQuery('ul#tx_toolbox_hangman li#'+hman_list_id+' #hangman_dash').hasClass('hangman_dash_hidden')){return false;}

	is_finished	= jQuery('ul#tx_toolbox_hangman li#'+hman_list_id).data('finished');
	word		= jQuery('ul#tx_toolbox_hangman li#'+hman_list_id).data('hangman_word');
	ans_word	= jQuery('ul#tx_toolbox_hangman li#'+hman_list_id).data('stored_word');
	hangman_try	= jQuery('ul#tx_toolbox_hangman li#'+hman_list_id+' .toolbox_hangman_table').attr('try');

	if(is_finished == 'y') { return false;}

	if(!ans_word){ ans_word	= "";}
	
	if (!word){
		word	= jQuery('ul#tx_toolbox_hangman li#'+hman_list_id+' .hangman_qustion').attr("ans");
		jQuery('ul#tx_toolbox_hangman li#'+hman_list_id).data("hangman_word", word);
	}
	
	if(word.length == 0){
		return false;
	}
	

	if(ans_word.indexOf(letter) == -1){
		ans_word	+= letter;
		jQuery('ul#tx_toolbox_hangman li#'+hman_list_id).data("stored_word", ans_word);

		if(word.indexOf(letter) == "-1"){
			howdead		= jQuery('ul#tx_toolbox_hangman li#'+hman_list_id).data('hangman_howdead');
			if(!howdead){howdead = 0;}

			toolbox_generate_hangman_image(hman_list_id,howdead,hangman_try)

			howdead++;
			jQuery('ul#tx_toolbox_hangman li#'+hman_list_id).data('hangman_howdead', howdead);

			if(howdead == hangman_try){
				wrong_msg	= jQuery('div.wrong_msg').html();
				alert(wrong_msg);
				jQuery('ul#tx_toolbox_hangman li#'+hman_list_id).data("finished", 'y');
			}
		}else{
			score		= jQuery('ul#tx_toolbox_hangman li#'+hman_list_id).data('hangman_score');

			for(i=0; i<word.length; i++){
				if(word.charAt(i)==letter){
					jQuery('ul#tx_toolbox_hangman li#'+hman_list_id+' td.alphabet'+i).text(letter.toUpperCase());
					
					score++;
					jQuery('ul#tx_toolbox_hangman li#'+hman_list_id).data("hangman_score", score);
				}
			}
			
			if(score == word.length){
				right_msg	= jQuery('div.right_msg').html();
				alert(right_msg);
				jQuery('ul#tx_toolbox_hangman li#'+hman_list_id).data("finished", 'y');
			}
		}
	}else{
		guess_msg	= jQuery('div.guess_msg').html();
		alert(guess_msg);
	}

}//function guess()


function toolbox_generate_hangman_image(hman_list_id,howdead,hangman_try){
	if(hangman_try == 5){
		img_arr	= [0, 2, 5, 8, 10];
	}
	
	if(hangman_try == 6){
		img_arr	 = [0, 2, 4, 6, 8, 10];
	}

	if(hangman_try == 7){
		img_arr	= [0, 2, 4, 6, 7, 8, 10];
	}

	if(hangman_try == 8){
		img_arr	 = [0, 1, 2, 4, 6, 7, 8, 10];
	}

	if(hangman_try == 9){
		img_arr	 = [0, 1, 2, 4, 5, 6, 7, 8, 10];
	}

	if(hangman_try == 10){
		img_arr	 = [0, 1, 2, 4, 5, 6, 7, 8, 9, 10];
	}
	
	if(hangman_try == 11){
		img_arr	 = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
	}
	
	img_src			= 'typo3conf/ext/ltube_toolbox/Resources/Public/images/hang'+img_arr[howdead]+'.gif';
	hangman_image	= '<img width="100" hspace="0" height="100" border="0" align="left" alt="" src="'+img_src+'">';
	jQuery('ul#tx_toolbox_hangman li#'+hman_list_id+' div.hangman_images').html(hangman_image);
}//function _generate_hangman_image()











