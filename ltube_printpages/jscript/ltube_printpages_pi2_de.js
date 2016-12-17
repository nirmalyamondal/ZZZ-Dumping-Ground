jQuery(document).ready(function(){
    jQuery('.tx_ltubeprintpages_pi2_check:button').toggle(function(){
        jQuery('input:checkbox').attr('checked','checked');
        jQuery(this).val('Uncheck All');
    },function(){
        jQuery('input:checkbox').removeAttr('checked');
        jQuery(this).val('Check All');        
    })
})