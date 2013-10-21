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
	
	//Function on focus tooltip´s username field
    jQuery("#textUsername").focus(function(){
        jQuery("#textUsername").css("display", "none");
        jQuery("#username").focus();
    });
    //Function on blur username field.
    jQuery("#username").blur(function(){
        if(jQuery("#username").val()==''){
            jQuery("#textUsername").css("display", "block");
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
	
	//datePicker function
	jQuery("#birthday").datepicker({
            changeMonth: true,
            changeYear: true,
            minDate: new Date(1920, 1 -1, 1),
            maxDate: "-1d",
            yearRange: "1920:2013",
            gotoCurrent: true,
            dateFormat: "yy/mm/dd"
        });
    // Traducción al español
    $(function($){
        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['es']);
    });
        
	//Function on focus tooltip´s birthday field
    jQuery("#textBirthday").focus(function(){
        jQuery("#textBirthday").css("display", "none");
        jQuery("#birthday").focus();
    });
    
    //Function on focus tooltip´s birthday field
    jQuery("#birthday").blur(function(){
        $('#signUp_Form').validate().element(this);
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
	jQuery("#signUp_Form").validate({
        rules :{
            nombre : {
                required : true
            },
            apellidos : {
                required : true
            },
            username : {
                required : true,
                minlength : 6,
                maxlength : 50,
                remote:{
                    url: "checkUser.php",
                    type: "post",
                    data:{
                        usrnm: function(){
                                    return jQuery('#username').val();
                            },
                        search: 'username'
                    }
                }
            },
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
            birthday : {
                required: true,
                date: true
            },
            gender: {
                required: true
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
			username :{
			    remote : "El nombre de usuario ya existe, intenta con otro",
			    required: "El nombre de usuario es requerido",
			    minlength: "El nombre de usuario debe tener entre 6 y 50 caracteres",
                maxlength: "El nombre de usuario debe tener entre 6 y 50 caracteres"
			},
			email: {
			    required : "El email es obligatorio",
			    remote : "El email ya está registrado, intenta con otro",
			    email: "Proporciona una dirección de correo electrónico válida"
			},
			birthday : {
			    required : "La fecha de tu cumpleaños es requerida"
			},
			gender: {
			    required: "Dinos si eres hombre o mujer!"
			},
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
			if (element.attr("name") === "nombre" ) {
				jQuery("#errorNombre").append(error);
			}
			
			if (element.attr("name") === "apellidos" ) {
				jQuery("#errorApellidos").append(error);
			}
			
			if (element.attr("name") === "username" ) {
                jQuery("#errorUsername").append(error);
            }
            
			if (element.attr("name") === "email" ) {
				jQuery("#errorEmail").append(error);
			}
			
			if (element.attr("name") === "birthday" ) {
                jQuery("#errorBirthday").append(error);
            }
            
            if (element.attr("name") === "gender" ) {
                jQuery("#errorGender").append(error);
            }
            
			if (element.attr("name") === "password" ) {
				jQuery("#errorPassword").append(error);
			}
			
			if (element.attr("name") === "passwordC" ) {
				jQuery("#errorPasswordC").append(error);
			}
		}      
    });
});
