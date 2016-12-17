jQuery(function() {
	_einordnung_drag_n_drop_elements();
	_zuordnung_drag_n_drop_elements();
	

	var zuordnungWidth	= jQuery('ul#tx_zuordnung_left').width();
	var zuordnungheight = jQuery('ul#tx_zuordnung_left').height();

	var zuordnungTop	= zuordnungheight/2+60;
	var zuordnungleft	= zuordnungWidth/2;

	jQuery('#zuordnungFeedback').css({top: -zuordnungTop+'px', left: zuordnungleft+'px'});


	var einordnungWidth	= jQuery('ul#dropboxLeft').width();
	var einordnungheight = jQuery('ul#dropboxLeft').height();

	var einordnungTop	= einordnungheight/2+90;
	var einordnungleft	= einordnungWidth+30;

	jQuery('#einordnungFeedback').css({top: -einordnungTop+'px', left: einordnungleft+'px'});

});
function _einordnung_drag_n_drop_elements(){
	if(jQuery("#tx_toolbox_drag_n_drop div.item_common").length < 2){ return false;	}
	jQuery("#tx_toolbox_drag_n_drop div.item_common").draggable({
		cursor: 'move',
		revert: true
	});
	jQuery("div.trash_common").droppable({
		tolerance: 'touch',
		accept: ".item_common",
		hoverClass: 'hovered',
		drop: einordnungCardDrop				
	});
}//_tx_drag_n_drop_elements

var  einordnungCorrectCards = 0;
function einordnungCardDrop(event, ui){
	var slotCol		= jQuery(this).attr('col');
	var cardCol		= ui.draggable.attr('col');
	var cardUid		= ui.draggable.attr('uid');

	var einordnungLen = jQuery("ul#tx_toolbox_drag_n_drop li").length;
	einordnungLen--;
	// If the card was dropped to the correct slot,
	// change the card colour, position it directly
	// on top of the slot, and prevent it being dragged
	// again

	if ( slotCol == cardCol ) {
		ui.draggable.addClass( 'correct'+cardUid );
		ui.draggable.draggable( 'disable' );
		jQuery(this).droppable( 'disable' );
		ui.draggable.position( { of: jQuery(this), my: 'left top', at: 'left top' } );
		ui.draggable.draggable( 'option', 'revert', false );
		einordnungCorrectCards++;
	} 

	if ( einordnungCorrectCards == einordnungLen ) {
		jQuery('#einordnungFeedback').show();
		jQuery('#einordnungFeedback').animate({
		  opacity: 1
		});
	}
}//einordnungCardDrop



function _zuordnung_drag_n_drop_elements(){
	if(jQuery("#tx_zuordnung_left div.zuordnung_item_common").length < 2){ return false;	}

	jQuery("#tx_zuordnung_left div.zuordnung_item_common").draggable({
		cursor: 'move',
		revert: true
	});
	jQuery("#tx_zuordnung_right div.zuordnung_trash_common").droppable({
		tolerance: 'touch',
		accept: ".zuordnung_item_common",
		hoverClass: 'hovered',
		drop: zuordnungCardDrop				
	});
}

var zuordnungCorrectCards = 0;

function zuordnungCardDrop(event, ui){

	var slotNo		= jQuery(this).attr('uid');
	var cardNo		= ui.draggable.attr('uid');

	var zuordnungLen = jQuery("ul#tx_zuordnung_left li").length;

	// If the card was dropped to the correct slot,
	// change the card colour, position it directly
	// on top of the slot, and prevent it being dragged
	// again

	if ( slotNo == cardNo ) {
		ui.draggable.addClass( 'correct'+cardNo );
		ui.draggable.draggable( 'disable' );
		jQuery(this).droppable( 'disable' );
		ui.draggable.position( { of: jQuery(this), my: 'left top', at: 'left top' } );
		ui.draggable.draggable( 'option', 'revert', false );
		zuordnungCorrectCards +=1;
	} 

	if ( zuordnungCorrectCards == zuordnungLen ) {
		jQuery('#zuordnungFeedback').show();
		jQuery('#zuordnungFeedback').animate({
		  opacity: 1
		});
	}
}