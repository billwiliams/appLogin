/**
 * @author JManuMurillo
 */
jQuery(document).ready(function(){

	jQuery("#textEmail").focus(function(){
		jQuery("#textEmail").css("display", "none");
		jQuery("#email").focus();
	});
	
	jQuery("#email").blur(function(){
		if(jQuery("#email").val()==''){
			jQuery("#textEmail").css("display", "block");
		}
	});
	
	jQuery("#textPassword").focus(function(){
		jQuery("#textPassword").css("display", "none");
		jQuery("#password").focus();
	});
	
	jQuery("#password").blur(function(){
		if(jQuery("#password").val()==''){
			jQuery("#textPassword").css("display", "block");
		}
	});
	
	jQuery("#textEmail").focus();
});