<?php
    session_start();
    if(!empty($_SESSION["user_status"])){
    	if($_SESSION["user_status"]==true){
    		header("Location:home");
    	}
	}
?>
<!DOCTYPE html>
<!--[if IE 7 ]><html lang="es" class="ie7 ielt9 ielt10 es"><![endif]-->
<!--[if IE 8 ]><html lang="es" class="ie8 ielt9 ielt10 es"><![endif]-->
<!--[if IE 9 ]><html lang="es" class="ie9 ielt10 es"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="es"><!--<![endif]-->
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="css/jquery-ui.css">
		<link rel="stylesheet" href="css/jquery.modal.css">
		<script language="JavaScript" type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<script language="JavaScript" type="text/javascript" src="js/script.js"></script>
		<script language="JavaScript" type="text/javascript" src="js/jquery-ui.js"></script>
		<script type='text/javascript' src='js/jquery.modal.min.js'></script>
        <script language="JavaScript" type="text/javascript" src="js/registerForm.js"></script>
        <script language="JavaScript" type="text/javascript" src="js/jquery.validate.js"></script>
		<title>CCS - Registrarse</title>
		
	</head>
	
	<body>
	    
	    <div class="overlay"></div>
	    
		<div class="content">
			<h1>Registrarse:</h1>
			
			<div class="socialLogin">
				<div class="facebook_button">
					<div class="buttonText light"><a href="signUp?by=facebook">Reg&iacute;strate con Facebook</a></div>
				</div>
				<div class="twitter_button">
					<div class="buttonText light"><a href="signUp?by=twitter">Reg&iacute;strate con Twitter</a></div>
				</div>
				<div class="email_button">
					<div class="buttonText light"><a class="modalLink" href="#modal1" rel="modal:open">Reg&iacute;strate con tu correo</a></div>
				</div>
			</div>
			<hr />
			<div class="loginOptions">
				<div class="links dark">
					<p>
						¿Ya tienes cuenta? <a href="../login">Entra aquí</a>.<br />
					</p>
				</div>
			</div>	
		</div>
		
		<div id="modal1"  class="content-form modal">
            <h1>Formulario de registro:</h1>
            <div class="hint">Todos los campos son obligatorios</div>
            
            <form id="signUp_Form" name="signUp_Form" action="signUp" method="post">
                <input type="hidden" id="by" name="by" value="email"/>    
                <div class="signUpForm">
                    
                    <div class="placeholder">
                        <input type="text" id="textNombre" class="textInputSmall" value="Nombre" title="Nombre">
                        <input type="text" id="nombre" name="nombre" class="inputSmall required" maxlength="50" title="Nombre"/>
                    </div>
                    
                    <div class="placeholder">
                        <input type="text" id="textApellidos" class="textInputSmall" value="Apellidos" title="Apellidos">
                        <input type="text" id="apellidos" name="apellidos" class="inputSmall required" maxlength="50" title="Apellidos"/>
                    </div>
            
                    <div class="clear"></div>
                    
                    <div id="errorNombre" class="errorLeft"></div>
                    <div id="errorApellidos" class="errorRight"></div>
                    
                    <div class="clear"></div>

                    <div class="placeholder">
                        <input type="text" id="textUsername" class="textInputLarge" value="Nombre de usuario" title="Nombre de usuario">
                        <input type="text" id="username" name="username" class="inputLarge required" maxlength="50" title="Nombre de usuario"/>
                    </div>
                    
                    <div class="clear"></div>
                    
                    <div id="errorUsername" class="errorLarge"></div>
                    
                    <div class="clear"></div>
                    
                    <div class="placeholder">
                        <input type="text" id="textEmail" class="textInputLarge" value="Direcci&oacute;n de correo electr&oacute;nico" title="Direcci&oacute;n de correo electr&oacute;nico">
                        <input type="text" id="email" name="email" class="inputLarge required" maxlength="50" title="Direcci&oacute;n de correo electr&oacute;nico"/>
                    </div>
                    
                    <div class="clear"></div>
                    
                    <div id="errorEmail" class="errorLarge"></div>
                    
                    <div class="clear"></div>
                    
                    <div class="placeholder">
                        <input type="text" id="textBirthday" class="textInputSmall" value="Cumpleaños" title="Cumpleaños">
                        <input type="text" id="birthday" name="birthday" class="inputSmall required" maxlength="50" title="Cumpleaños"/>
                    </div>
                    
                    <div class="placeholder">
                        <div class="radio">
                            <span class="legend">Soy:</span><br />
                            <input type="radio" name="gender" id="gender"  value="Male">Hombre</input>
                            <input type="radio" name="gender" id="gender" value="Female">Mujer</input>
                        </div>
                        
                    </div>
                    
                    <div class="clear"></div>
                    
                    <div id="errorBirthday" class="errorLeft"></div>
                    <div id="errorGender" class="errorRight"></div>
                    
                    <div class="clear"></div>
                    
                    <div class="placeholder">
                        <input type="text" id="textPassword" class="textPasswordSmall" value="Contraseña" title="Contraseña">
                        <input type="password" id="password" name="password" class="input-passwordSmall required" maxlength="50" title="Contraseña"/>
                    </div>
                    
                    <div class="placeholder">
                        <input type="text" id="textPasswordC" class="textPasswordSmall" value="Otra vez" title="Confirma tu contraseña">
                        <input type="password" id="passwordC" name="passwordC" class="input-passwordSmall required" maxlength="50" title="Confirma tu contraseña"/>
                    </div>
                    
                    <div class="clear"></div>
                    
                    <div id="errorPassword" class="errorLeft"></div>
                    <div id="errorPasswordC" class="errorRight"></div>
                    
                    <div class="clear"></div>
                    
                </div>
                <div class="clear"></div>
                <div class="loginOptions">
                    <div class="links visible">
                        <p>
                            Al crear una cuenta, acepto los <a href="terms" target="_blank">T&eacute;rminos y Condiciones</a> y las <a href="privacy" target="_blank">Pol&iacute;ticas de Privacidad</a> de la empresa.<br />
                        </p>
                    </div>
                    <input type="submit" value="Registrarme" class="sumbitLogin"/>
    
                </div>          
            </form>
        </div>
	</body>	
</html>