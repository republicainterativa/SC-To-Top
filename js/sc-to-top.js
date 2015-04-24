jQuery(document).ready(function(){
	jQuery('.sc-to-top').hide();
	// scroll to top	
	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 200) {
			jQuery('.sc-to-top').fadeIn();
		} else {
			jQuery('.sc-to-top').fadeOut();
		}
	});
	jQuery('.sc-to-top').click(function(){
		jQuery('html, body').animate({scrollTop : 0},800);
	});
});