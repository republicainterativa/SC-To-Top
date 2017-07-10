jQuery(document).ready(function(){

    jQuery('.sc-to-top-page .select-icon').click(function() {
        jQuery('.sc-to-top-page .select-icon').removeClass('selected-icon');
        var htmlclass = jQuery(this).find('i').attr('class');
        console.log(htmlclass);
        jQuery('input#selected-icon').val(htmlclass);
        jQuery(this).addClass('selected-icon');
    });

});
