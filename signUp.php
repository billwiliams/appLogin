<?php
include_once ("User.php");
include_once ("UserController.php");
$signUpBy = "";
if (isset($_REQUEST["by"])) {
    $signUpBy = $_REQUEST["by"];
} else {
    header("Location:register");
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
        $required = array();
        $userData = $facebook -> api('/me');

        $id = $userData['id'];
        $username = $userData['username'];
        $type = "0";
        $status = "active";
        
        if (isset($userData['email'])){
            $email = $userData['email'];
        }
        else {
            if(isset($_POST['email'])){
                $email = $_POST['email'];
            }
            else{
                header("Location:extra?by=facebook&required=email");
            }
        }
        
        if (isset($userData['bio'])){
            $about_me = $userData['bio'];
        }
        else {
            $about_me = "No bio available!";
        }
        
        $first_name = $userData['first_name'];
        $last_name = $userData['last_name'];
        $url_img = "http://graph.facebook.com/" . $userData['username'] . "/picture";
        $birth = $userData['birthday'];
        $gender = $userData['gender'];

        $birthday = $birth[6] . $birth[7] . $birth[8] . $birth[9] . "/" . $birth[0] . $birth[1] . "/" . $birth[3] . $birth[4];
       
        insertUserFromFacebook($id, $username, $type, $status, $email, $first_name, $last_name, $about_me, $url_img, $birthday, $gender);
    } else {
        header("Location: " . $facebook -> getLoginUrl(array('scope' => 'email,user_birthday,user_photos')));
    }
}

if ($signUpBy == "website") {
    $oUser = new User();

    $first_name = $_POST['nombre'];
    $last_name = $_POST['apellidos'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $type = "0";
    $status = "to_confirm";

    insertUserFromWebsite($username, $password, $type, $status, $email, $first_name, $last_name, $birthday, $gender);

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
        $twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION["twitter_token"], $_SESSION["twitter_token_secret"]);
        $credenciales = $twitter -> get('account/verify_credentials');
        $id = $credenciales -> id;
        $username = $credenciales -> screen_name;
        $type = "0";
        $status = "active";

        $first_name = $credenciales -> name;
        $last_name = $credenciales -> name;
        $about_me = $credenciales -> description;
        $url_img = $credenciales -> profile_image_url;
        
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }
        else{
            header("Location:extra?by=twitter&required=email");
        }

        insertUserFromTwitter($id, $username, $type, $status, $first_name, $last_name, $about_me, $url_img, $email);
    }
}
?>