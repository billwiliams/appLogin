/**
 * @author JManuMurillo
 */
jQuery(document).ready(function(){

	//Function on focus tooltip´s name field
	jQuery("#textNombre").focus(function(){
		jQuery("#textNombre").css("display", "none");
		jQuery("#nombre").focus();
	});
	//Function on blur name field.
	jQuery("#nombre").blur(function(){
		if(jQuery("#nombre").val()==''){
			jQuery("#textNombre").css("display", "block");
		}
	});
	
	//Function on focus tooltip´s last name field
	jQuery("#textApellidos").focus(function(){
		jQuery("#textApellidos").css("display", "none");
		jQuery("#apellidos").focus();
	});
	//Function on blur last name field.
	jQuery("#apellidos").blur(function(){
		if(jQuery("#apellidos").val()==''){
			jQuery("#textApellidos").css("display", "block");
		}
	});
	
	//Function on focus tooltip´s email field
	jQuery("#textEmail").focus(function(){
		jQuery("#textEmail").css("display", "none");
		jQuery("#email").focus();
	});
	//Function on blur email field.
	jQuery("#email").blur(function(){
		if(jQuery("#email").val()==''){
			jQuery("#textEmail").css("display", "block");
		}
	});
	
	//Function on focus tooltip´s password field
	jQuery("#textPassword").focus(function(){
		jQuery("#textPassword").css("display", "none");
		jQuery("#password").focus();
	});
	//Function on blur password field.
	jQuery("#password").blur(function(){
		if(jQuery("#password").val()==''){
			jQuery("#textPassword").css("display", "block");
		}
	});
	
	//Function on focus tooltip´s passwordC field
	jQuery("#textPasswordC").focus(function(){
		jQuery("#textPasswordC").css("display", "none");
		jQuery("#passwordC").focus();
	});
	//Function on blur passwordC field.
	jQuery("#passwordC").blur(function(){
		if(jQuery("#passwordC").val()==''){
			jQuery("#textPasswordC").css("display", "block");
		}
	});
	
	//Focus on first field
	//jQuery("#textNombre").focus();
	
	//Validate form
	$('#signUp_Form').validate({
        rules :{
            nombre : {
                required : true
            },
            apellidos : {
                required : true
            },
            email : {
            	required : true,
            	email    : true
            },
            password : {
                required : true,
                minlength : 6,
                maxlength : 10
            },
            passwordC : {
                required :true,
                equalTo : "#password"
            }
        },
        onfocusout: function (element) {
        	jQuery(element).valid();
        },
		messages : {
			nombre: "Proporciona un nombre válido",
			apellidos: "Escribe tus apellidos",
			email: "Proporciona una dirección de correo electrónico válida",
			password : {
				required: "Escribe una contraseña",
				minlength: "La contraseña debe tener entre 6 y 10 caracteres",
				maxlength: "La contraseña debe tener entre 6 y 10 caracteres"
			},
			passwordC : {
				required: "Confirma tu contraseña",
				equalTo: "Las contraseñas no coinciden"
			}
		},
		errorPlacement: function (error, element) {
			if (element.attr("name") == "nombre" ) {
				jQuery("#errorNombre").append(error);
			}
			
			if (element.attr("name") == "apellidos" ) {
				jQuery("#errorApellidos").append(error);
			}
			
			if (element.attr("name") == "email" ) {
				jQuery("#errorEmail").append(error);
			}
			
			if (element.attr("name") == "password" ) {
				jQuery("#errorPassword").append(error);
			}
			
			if (element.attr("name") == "passwordC" ) {
				jQuery("#errorPasswordC").append(error);
			}
		}      
    });
});
