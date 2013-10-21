<?php
include_once ("User.php");
include_once ("UserController.php");
$signUpBy = "";
if (isset($_REQUEST["by"])) {
    $signUpBy = $_REQUEST["by"];
} else {
    header("Location:index");
}

if ($signUpBy == "facebook") {
    $user = null;
    include_once ("src/facebook/facebook.php");
    $config = array();
    $config['appId'] = '520679394672888';
    $config['secret'] = '14d838db06c52c5ac31f239d707fb08e';
    $config['fileUpload'] = false;
    // optional
    $facebook = new Facebook($config);
    $paramsLogOut = array('next' => 'http://www.ccsinai.com');

    if ($facebook -> getUser()) {
        $oUser = new User();
        
        $userData = $facebook -> api('/me');
        $fb_id = $userData['id'];
        
        if($oUser->searchByFacebookId($fb_id)){
            $_SESSION["user_id"]=$oUser->getId();
            $_SESSION["user_status"]="active";
            header("Location:ok");
        }
        else{
            header("Location:signUp?by=facebook");
        }
       
    } else {
        header("Location: " . $facebook -> getLoginUrl(array('scope' => 'email,user_birthday,user_photos')));
    }
}

if ($signUpBy == "website") {
    $oUser = new User();

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $oUser -> setEmail($email);
    $oUser -> setPassword($password);
    
    if($oUser->signIn()){
        header("Location:ok");
    }
    else {
        $error = "Inicio de sesión no válido. <br/>Usuario o Contraseña incorrectos";
        header("Location:index?error=".$error);
    }

}

if ($signUpBy == "twitter") {
    include ("src/twitter/twitteroauth.php");
    include ("src/twitter/config.php");

    if (empty($_SESSION["tw_status"])) {

        $twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
        $twitter_temp = $twitter -> getRequestToken(OAUTH_CALLBACK);

        //Guardamos en sesión el token y el token secreto
        $_SESSION["tw_temp_token"] = $twitter_temp["oauth_token"];
        $_SESSION["tw_temp_token_secret"] = $twitter_temp["oauth_token_secret"];

        $twitter_url = $twitter -> getAuthorizeURL($twitter_temp["oauth_token"]);
        header("Location:" . $twitter_url);
    } else {
        $oUser = new User();
         
        $twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION["twitter_token"], $_SESSION["twitter_token_secret"]);
        $credenciales = $twitter -> get('account/verify_credentials');
        $id = $credenciales -> id;
        
        if($oUser->searchByTwitterId($id)){
            $_SESSION["user_id"]=$oUser->getId();
            $_SESSION["user_status"]="active";
            header("Location:ok");
        }
        else{
            header("Location:signUp?by=twitter");
        }
    }
}
?>