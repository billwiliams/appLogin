<?php
session_start();
include("src/twitteroauth.php");
include("config.php");

if(empty($_SESSION["twitter_status"])){
	
	$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$twitter_temp = $twitter->getRequestToken(OAUTH_CALLBACK);
	
	//Guardamos en sesión el token y el token secreto
	$_SESSION["temp_token"] = $twitter_temp["oauth_token"];
	$_SESSION["temp_token_secret"] = $twitter_temp["oauth_token_secret"];
	
	$twitter_url = $twitter->getAuthorizeURL($twitter_temp["oauth_token"]);
}
else {
	$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION["twitter_token"], $_SESSION["twitter_token_secret"]);
	$credenciales = $twitter->get('account/verify_credentials');
	var_dump($credenciales);
}

?>
<a href="<?php echo $twitter_url; ?>">Iniciar sesión con twitter</a>