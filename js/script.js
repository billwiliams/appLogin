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
	
	
	//Validate signIn_Form
    jQuery("#signIn_Form").validate({
        rules :{
            email : {
                required : true,
                email    : true
            },
            password : {
                required : true
            }
        },
        onfocusout: function (element) {
            jQuery(element).valid();
        },
        messages : {
            email: {
                required : "La dirección de correo es obligatoria",
                email: "Proporciona una dirección de correo electrónico válida"
            },
            password : {
                required: "Escribe tu contraseña"
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "email" ) {
                jQuery("#errorEmail").append(error);
            }
            if (element.attr("name") === "password" ) {
                jQuery("#errorPassword").append(error);
            }
        }      
    });
    
    //Validate extra_Form
    jQuery("#extra_Form").validate({
        rules :{
            email : {
                required : true,
                email    : true,
                remote:{
                    url: "checkUser.php",
                    type: "post",
                    data:{
                        usrnm: function(){
                                    return jQuery('#email').val();
                            },
                        search: 'e-mail'
                    }
                }
            },
            password : {
                required : true
            }
        },
        onfocusout: function (element) {
            jQuery(element).valid();
        },
        messages : {
            email: {
                required : "La dirección de correo es obligatoria",
                email: "Proporciona una dirección de correo electrónico válida",
                remote: "Este email ya está registrado, intenta con otro"
            },
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "email" ) {
                jQuery("#errorEmail").append(error);
            }
            if (element.attr("name") === "password" ) {
                jQuery("#errorPassword").append(error);
            }
        }      
    });
});