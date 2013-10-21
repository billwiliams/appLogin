<?php
session_start();
require_once('src/twitter/twitteroauth.php');
require_once('src/twitter/config.php');

$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION["tw_temp_token"], $_SESSION["tw_temp_token_secret"]);

$twitter_token = $twitter->getAccessToken($_REQUEST["oauth_verifier"]);

if($twitter->http_code == 200){
	$_SESSION["twitter_token"] = $twitter_token["oauth_token"];
	$_SESSION["twitter_token_secret"] = $twitter_token["oauth_token_secret"];
	$_SESSION["tw_status"] = true;
	header("Location:signUp");
}
else {
	echo "Error en inicio de sesión con Tw.";
}
?>