jQuery(document).ready(function() {
	jQuery('#menu-responsive button').on('click',function(){
		var status = jQuery(this).attr("status");
		console.log(status);
		if (status === "on" || status === "") {
			jQuery('#menu-responsive button').attr("status", "off");
			jQuery('#responsive-options').hide();
		} else {
			jQuery('#menu-responsive button').attr("status", "on");
			jQuery('#responsive-options').show();
		}
	});
});