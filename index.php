<?php
	session_start();
    if(!empty($_SESSION["user_status"])){
    	if($_SESSION["user_status"]=="active"){
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
		<link rel="stylesheet" href="css/estilo.css">
		<script language="JavaScript" type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<script language="JavaScript" type="text/javascript" src="js/script.js"></script>
		<title>CCS</title>
		
	</head>
	
	<body>
		<div class="content">
			<form action="signIn">
				
			<h1>Iniciar sesi&oacute;n:</h1>
			
			<div class="socialLogin">
					<div class="facebook_button">
						<div class="buttonText light"><a href="signInWithFacebook.php">Entrar con Facebook</a></div>
					</div>
					<div class="twitter_button">
						<div class="buttonText light"><a href="signInWithTwitter.php">Entrar con Twitter</a></div>
			</div>
			<hr />
			<div class="loginForm">
				<div class="placeholder">
					<input type="text" id="textEmail" value="Correo electrónico" class="textInputLarge">
					<input type="text" id="email" name="email" class="inputLarge" maxlength="50" title="Correo electrónico"/>
					
				</div>
				<div class="placeholder">
					<input type="text" id="textPassword" value="Contraseña" class="textPasswordLarge">
					<input type="password" id="password" name="password" class="input-passwordLarge" maxlength="50" title="Contraseña"/>
				</div>
			</div>
			
			<div class="loginOptions">
					<input type="submit" value="Entrar" class="sumbitLogin"/>
				<div class="links dark">
					<p>
						<a href="register">¡Regístrate ahora!</a><br />
						<a href="register">Olvidé la contraseña</a>
					</p>
				</div>
				
			</div>			
			</form>
		</div>
	</body>	
</html>