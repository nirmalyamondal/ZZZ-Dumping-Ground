jQuery(function($){
	cur_lang	= jQuery('ul#tx_toolbox_pagination').attr("cur_lang");
	
	if(cur_lang == 'de'){
		next_label	= "Weiter";
		prev_label	= "Zurück";
	}else{
		next_label	= "Next";
		prev_label	= "Prev";
	}

	jQuery('ul#tx_toolbox_pagination').flexipage({
		perpage:1,
		next_txt : next_label,
		prev_txt : prev_label,
		showcounter:false,
	});


	jQuery("ul.pager li").click(function(){
		jQuery("ul#tx_toolbox_pagination li").each(function(index,value) {   
			if(jQuery(this).is(":visible")){
				if(jQuery(this).children(".flipPad").children(".tx_toolbox_frontend").is(":visible")){
					jQuery(this).children(".flipPad").children(".tx_toolbox_frontend").click();
				}
			}
		});
	});

});    


function flipcard(i,j){

	switch(j){
		case 1:
				j	= 'tx_toolbox_left';
				jQuery("#flipPad"+i+" button.tx_toolbox_right").css("display","inline");
				jQuery("#flipPad"+i+" button."+j).css("display","none");
				jQuery("#flashcard"+i).attr('onclick', 'flipcard('+i+',2);');
			  break;

		case 2:
				j	= 'tx_toolbox_right';
				jQuery("#flipPad"+i+" button.tx_toolbox_left").css("display","inline");
				jQuery("#flipPad"+i+" button."+j).css("display","none");
				jQuery("#flashcard"+i).attr('onclick', 'flipcard('+i+',1);');
			  break;

		case 3:
				j	= 'tx_toolbox_top';
				jQuery("#flipPad"+i+" button.tx_toolbox_bottom").css("display","inline");
				jQuery("#flipPad"+i+" button."+j).css("display","none");
				jQuery("#flashcard"+i).attr('onclick', 'flipcard('+i+',4);');
			  break;

		case 4:
				j	= 'tx_toolbox_bottom';
				jQuery("#flipPad"+i+" button.tx_toolbox_top").css("display","inline");
				jQuery("#flipPad"+i+" button."+j).css("display","none");
				jQuery("#flashcard"+i).attr('onclick', 'flipcard('+i+',3);');
			  break;
	}

	var dir			= jQuery("#flipPad"+i+" button."+j).attr("rel");
	var bgColor		= jQuery("#flipPad"+i+" button."+j).attr("rev");
	var fontcolor	= jQuery("#flipPad"+i+" button."+j).attr("color");
	var content		= jQuery("#flipPad"+i+" div."+j+"_content").html();

	jQuery("#flashcard"+i).flip({
		direction: dir,
		color: bgColor,
	});
	
	jQuery("#innerFlashcard"+i).html(content);
	jQuery("#flashcard"+i).css("color",fontcolor);
	jQuery("#flashcard"+i+" *").css("color",fontcolor);

	return false;
}



