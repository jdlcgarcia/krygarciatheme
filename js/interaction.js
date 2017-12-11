jQuery(document).ready(function() {
	jQuery('#burger').on('click',function(){
		if (jQuery('.menu').css("display") == "flex") {
			jQuery('.menu').css("display","none");
		} else {
			jQuery('.menu').css("display","flex");
		}
	});
});