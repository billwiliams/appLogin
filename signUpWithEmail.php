<?php
	session_start();
    if(!empty($_SESSION["user_status"])){
    	if($_SESSION["user_status"]==true){
    		header("Location:home.php");
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
		<link rel="stylesheet" href="css/estilo.css">
		<script language="JavaScript" type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<script language="JavaScript" type="text/javascript" src="js/registerForm.js"></script>
		<script language="JavaScript" type="text/javascript" src="js/jquery.validate.js"></script>
		<title>Formulario de Registro</title>
		
	</head>
	
	<body>
		<div class="content-form">	
			<h1>Formulario de registro:</h1>
			<div class="hint">Todos los campos son obligatorios</div>
			
			<form id="signUp_Form" action="signUp.php" >	
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
					
					<div class="clear"></div>
					<div class="placeholder">
						<input type="text" id="textEmail" class="textInputLarge" value="Direcci&oacute;n de correo electr&oacute;nico" title="Direcci&oacute;n de correo electr&oacute;nico">
						<input type="text" id="email" name="email" class="inputLarge required" maxlength="50" title="Direcci&oacute;n de correo electr&oacute;nico"/>
					</div>
					
					<div class="clear"></div>
					
					<div id="errorEmail" class="errorLarge"></div>
					
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
							Al crear una cuenta, acepto los <a href="terms.html">T&eacute;rminos y Condiciones</a> y las <a href="privacy.html">Pol&iacute;ticas de Privacidad</a> de la empresa.<br />
						</p>
					</div>
					<input type="submit" value="Registrarme" class="sumbitLogin"/>
	
				</div>			
			</form>
		</div>
	</body>	
</html>