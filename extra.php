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
        <script language="JavaScript" type="text/javascript" src="js/jquery.validate.js"></script>
        <script language="JavaScript" type="text/javascript" src="js/script.js"></script>
        <title>CCS</title>
        
    </head>
    
    <body>
        <div class="content">
            <form id="extra_Form" name="extra_Form" action="signUp" method="post">
                
            <h1>Necesitamos tu e-mail!</h1>
            <p>Para terminar tu registro, necesitamos que nos proporciones tu e-mail. </p>
            <div class="loginForm">
                <div class="placeholder">
                    <input type="text" id="textEmail" value="Correo electrónico" class="textInputLarge">
                    <input type="text" id="email" name="email" class="inputLarge" maxlength="50" title="Correo electrónico"/>
                    <input type="hidden" id="by" name="by" value="<?php echo $_REQUEST['by']; ?>"/>
                </div>
                <div class="clear"></div>  
                    <div id="errorEmail" class="errorLarge"></div>
                <div class="clear"></div>
            </div>
            
            <div class="loginOptions">
                <input type="submit" value="Enviar" class="sumbitLogin"/>
            </div>          
            </form>
        </div>
    </body> 
</html>