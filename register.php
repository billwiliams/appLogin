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
					<div class="buttonText light"><a href="signUpWithEmail">Reg&iacute;strate con tu correo</a></div>
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