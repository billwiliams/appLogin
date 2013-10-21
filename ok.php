<a href="logout">Cerrar sesión</a><br />

<?php
include_once "User.php";
include_once "UserProfile.php";
$oUser = new User();

$arrUsers = $oUser->searchAll();
echo "Si estás aquí, es porque algo salió bien ;)<hr/>";
foreach ($arrUsers as $user) {
    echo "Id:           ".$user->getId()."<br/>".
          "Username:    ".$user->getUsername()."<br/>".
          "Password:    ".$user->getPassword()."<br/>".
          "Last access: ".$user->getLastAccess()."<br/>".
          "Salt:        ".$user->getSalt()."<br/>".
          "fb_id:       ".$user->getFacebookId()."<br/>".
          "tw_id:       ".$user->getTwitterId()."<br/>".
          "Type:        ".$user->getType()."<br/>".
          "Status:      ".$user->getStatus()."<br/>".
	      "Email:       ".$user->getEmail()."<br/>";
          
          $oUserP = new UserProfile();
          $oUserP->setId($user->getId());
          $oUserP->searchById();          
          print_r($oUserP);
	      echo "<hr/>";
}

?>