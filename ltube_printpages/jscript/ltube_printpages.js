	var tx_ltubeprintpages_pi2_aJaXuRl = location.href;

	function _ltube_printpages_pi1_show_tree(){
		jQuery.ajax({
			type: "POST",
			url: tx_ltubeprintpages_pi2_aJaXuRl,
			data: {
				"tx_ltubeprintpages_pi2[submit]":'show_tree'
				},
			async: false,
			dataType: "html",
			success: function(data){
				//alert('data='+data);
				jQuery.colorbox({html:data,width:"500px",height:"auto"});
				_do_expand_collapse_ltb_print();
				//jQuery("div#colorbox").colorbox({height:"300px"});        
				jQuery('.printpages_left_side').colorbox.resize();                     
			}	
		});			
	}

	function _do_expand_collapse_ltb_print() {
		jQuery("#expand_collapse_ltb_tree ul").hide();

		jQuery("#expand_collapse_ltb_tree li").each(function() {
			var handleSpan = jQuery("<span></span>");
			handleSpan.addClass("handle");
			handleSpan.prependTo(this);
			if(jQuery(this).has("ul").size() > 0) {
				handleSpan.addClass("collapsed");
				handleSpan.click(function() {
					var clicked = jQuery(this);
					clicked.toggleClass("collapsed expanded");
					clicked.siblings("ul").toggle();
				});
			}
		});
	}