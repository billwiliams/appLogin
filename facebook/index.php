<?php
	require_once("src/facebook.php");

	$config = array();
	$config['appId'] = '520679394672888';
	$config['secret'] = '14d838db06c52c5ac31f239d707fb08e';
	$config['fileUpload'] = false; // optional

	$facebook = new Facebook($config);
	$paramsLogOut = array( 'next' => 'http://www.ccsinai.com' );
	
	
	$user = $facebook->getUser();
	
	if ($user){
		$userData = $facebook->api('/me');
		$userName = $userData['name'];
		$userId = $userData['id'];
		$userEmail = $userData['email'];
	}
?>

<html>
<head>
	<meta charset="utf-8" />
	<title>Facebook Login - CCS</title>
	
</head>
<body>

<?php 
if ($user){
?>
Bienvenid@ <?php echo $userName; ?>! [<?php echo $userId; ?>] [<?php echo $userEmail; ?>]<br>
<a href="<?php echo $facebook->getLogoutUrl($paramsLogOut); ?>">Cerrar sesi&oacute;n </a>

<?php 
print_r($userData);
}
?>

<?php 
if (empty($userEmail)){
?>
<a href="<?php echo $facebook->getLoginUrl(array('scope' => 'email')); ?>">Iniciar sesi&oacute;n con facebook</a><br>
<?php 
}
?>

</body>
</html>