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
		<script language="JavaScript" type="text/javascript" src="js/script.js"></script>
		<title>CCS - Registrarse</title>
		
	</head>
	
	<body>
		<div class="content">
			<h1>Registrarse:</h1>
			
			<div class="socialLogin">
				<div class="facebook_button">
					<div class="buttonText light"><a href="signUpWithFacebook.php">Reg&iacute;strate con Facebook</a></div>
				</div>
				<div class="twitter_button">
					<div class="buttonText light"><a href="signUpWithTwitter.php">Reg&iacute;strate con Twitter</a></div>
				</div>
				<div class="email_button">
					<div class="buttonText light"><a href="signUpWithEmail.php">Reg&iacute;strate con tu correo</a></div>
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
	</body>	
</html>