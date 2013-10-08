<?php
session_start();
include_once ("User.php");
include_once ("Util.php");
$oUser = new User();
$oUtil = new Util();
$error = "";

if (isset($_SESSION["user_id"])) {
	$oUser -> setId($_REQUEST["user_id"]);
	$oUser -> searchById();
} else {
	$error = "Error 401: No autorizado";
	header("Location: error.php?e=" . $error . "code=401");
}

$ope = 0;

if (isset($_REQUEST["ope"]) && !empty($_REQUEST["ope"]))
	$sOpe = $_REQUEST["ope"];
else {
	$error = "Error 404: No no encontrado <br> No se especificó la operación.";
	header("Location: error.php?e=" . $error);
}

switch ($ope) {
	case "insert" :
		insertUser();
		break;
	case "delete" :
		deleteUser();
	case "update" :
		updatetUser();
		break;
	default :
		header("Location: /user");
		break;
}

function insertUser() {
	$result = false;
	$oUs = new User();

	if ($_POST['requestFrom'] == "website") {
		$oUs -> setId($oUtil -> generateId());
		$oUs -> setUsername($_POST['username']);
		$oUs -> setSalt($oUtil -> generateSalt());
		$oUs -> setPassword($oUtil -> generateHashPassword($oUs -> getSalt(), $_POST["password"]));
		$oUs -> setType("1");
		$oUs -> setStatus("en espera");

		$r = $oUs -> insertFromWebsite();
		if ($r == 1) {
			header("Location:user/confirm");
		} else {
			$error = "Error! No se insertó el usuario.";
			header("Location: error.php?e=" . $error);
		}
	}

	if ($_POST['requestFrom'] == "facebook") {
		$oUs -> setId($oUtil -> generateId());
		$oUs -> setUsername($_POST['username']);
		$oUs -> setFacebookId($_POST["fb_id"]);
		$oUs -> setSalt($oUtil -> generateSalt());
		$oUs -> setType("1");
		$oUs -> setStatus("activo");

		$r = $oUs -> insertFromFacebook();
		if ($r == 1) {
			header("Location:user/confirm");
		} else {
			$error = "Error! No se insertó el usuario.";
			header("Location: error.php?e=" . $error);
		}
	}

	if ($_POST['requestFrom'] == "twitter") {
		$oUs -> setId($oUtil -> generateId());
		$oUs -> setUsername($_POST['username']);
		$oUs -> setFacebookId($_POST["tw_id"]);
		$oUs -> setSalt($oUtil -> generateSalt());
		$oUs -> setType("1");
		$oUs -> setStatus("activo");

		$r = $oUs -> insertFromFacebook();
		if ($r == 1) {
			header("Location:user/confirm");
		} else {
			$error = "Error! No se insertó el usuario.";
			header("Location: error.php?e=" . $error);
		}
	}
}

function deleteUser(){
    if(isset($_POST["user_id"])){
        $oUs = new User();
        $oUs->setId($_POST["user_id"]);
        if($oUs->searchById()){
            $r=$oUs->delete();
            if ($r == 1) {
                header("Location:/user");
            } 
            else {
                $error = "Error! No se pudo ejecutar la operación.";
                header("Location: error.php?e=" . $error);
            }
        }
        else{
            $error = "Error! No existe el usuario.";
            header("Location: error.php?e=" . $error);
        } 
    }
}

function updateUser(){
    if(isset($_POST["user_id"])){
        $oUs = new User();
        $oUs->setId($_POST["user_id"]);
        if($oUs->searchById()){
            
            $oUs->setUsername($_POST["username"]);
            $ous->setPassword($_POST["password"]);
            $oUs->setFacebookId($_POST["fb_id"]);
            $oUs->setTwitterId($_POST["tw_id"]);
            $oUs->setType($_POST["type"]);
            $oUs->setStatus($_POST["status"]);
                
            $r=$oUs->update();
            
            if ($r == 1) {
            header("Location:user/perfil");
            } 
            else {
                $error = "Error! No se pudo ejecutar la operación.";
                header("Location: error.php?e=" . $error);
            }
        }
    }
}
?>
