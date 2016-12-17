$(document).ready(function(){
    $('#slider ul').after('<div class="slide-nav">').cycle({ 
       	fx:     'scrollHorz', 
				//fx:     'scrollUp',
				//fx:     'scrollDown',
				//fx:     'slideY',
				//fx:     'fade',
				//fx:     'turnDown',
				//fx:     'turnUp',
				//fx:     'zoom',
				//fx:     'curtainX',
				//fx:     'scrollRight',
				//fx:     'shuffle',
        cleartypeNoBg: true,
        timeout: 20000,  // autoscroll - on      
        // timeout: 0,  // autoscroll - off
        delay:  -2000,
		slideResize: 0,
        next:   '#slide-btn-right', 
        prev:   '#slide-btn-left',
		pager:  '.slide-nav' 
    });
});