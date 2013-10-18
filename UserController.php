<?php
session_start();
include_once ("User.php");
include_once ("Util.php");
$oUser = new User();
$error = "";

/*
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
 */
function insertUser($requestFrom, $id, $username, $password, $last_access, $salt, $fb_id, $tw_id, $type, $status, $email) {
    $result = false;
    $oUs = new User();

    if ($requestFrom == "website") {
        $oUs -> setId(generateId());
        $oUs -> setUsername($_POST['username']);
        $oUs -> setSalt(generateSalt());
        $oUs -> setPassword(generateHashPassword($oUs -> getSalt(), $password));
        $oUs -> setType("1");
        $oUs -> setStatus("en espera");
        $oUs -> setEmail($email);

        $r = $oUs -> insertFromWebsite();
        if ($r == 1) {
            header("Location:user/home");
        } else {
            $error = "Error! No se insertó el usuario.";
            header("Location: error.php?e=" . $error);
        }
    }

    if (strcmp($requestFrom, "facebook") == 0) {

        if ($oUs -> searchByFacebookId($fb_id)) {
            return $oUs;
        } else {
            $oUs -> setId(generateId());
            $oUs -> setUsername($username);
            $oUs -> setSalt(generateSalt());
            $oUs -> setFacebookId($fb_id);
            $oUs -> setType($type);
            $oUs -> setStatus($status);
            $oUs -> setEmail($email);

            $r = $oUs -> insertFromFacebook();
            if ($r == 1) {
                //header("Location:user/profile");
                return $oUs;
            } else {
                $error = "Error! No se insertó el usuario.";
                header("Location: error?e=" . $error);
            }
        }
    }

    if ($_POST['requestFrom'] == "twitter") {
        $oUs -> setId(generateId());
        $oUs -> setUsername($_POST['username']);
        $oUs -> setFacebookId($_POST["tw_id"]);
        $oUs -> setSalt(generateSalt());
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

function deleteUser() {
    if (isset($_POST["user_id"])) {
        $oUs = new User();
        $oUs -> setId($_POST["user_id"]);
        if ($oUs -> searchById()) {
            $r = $oUs -> delete();
            if ($r == 1) {
                header("Location:/user");
            } else {
                $error = "Error! No se pudo ejecutar la operación.";
                header("Location: error.php?e=" . $error);
            }
        } else {
            $error = "Error! No existe el usuario.";
            header("Location: error.php?e=" . $error);
        }
    }
}

function updateUser() {
    if (isset($_POST["user_id"])) {
        $oUs = new User();
        $oUs -> setId($_POST["user_id"]);
        if ($oUs -> searchById()) {

            $oUs -> setUsername($_POST["username"]);
            $ous -> setPassword($_POST["password"]);
            $oUs -> setFacebookId($_POST["fb_id"]);
            $oUs -> setTwitterId($_POST["tw_id"]);
            $oUs -> setType($_POST["type"]);
            $oUs -> setStatus($_POST["status"]);
            $oUs -> setEmail($_POST["email"]);

            $r = $oUs -> update();

            if ($r == 1) {
                header("Location:user/perfil");
            } else {
                $error = "Error! No se pudo ejecutar la operación.";
                header("Location: error.php?e=" . $error);
            }
        }
    }
}
?>
