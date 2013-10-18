<?php

include_once("User.php");
include_once("UserController.php");
    $signUpBy = "";
    if(isset($_REQUEST["by"])){
        $signUpBy = $_REQUEST["by"];
    }
    else{
        header("Location:register");  
    }
    
    if($signUpBy=="facebook"){
        $user=null;
        include_once ("src/facebook/facebook.php");
        $config = array();
        $config['appId'] = '520679394672888';
        $config['secret'] = '14d838db06c52c5ac31f239d707fb08e';
        $config['fileUpload'] = false; // optional
        $facebook = new Facebook($config);
        $paramsLogOut = array( 'next' => 'http://www.ccsinai.com' );
        
        if($facebook->getUser())
        {
            $userData = $facebook->api('/me');
            $user_id = $userData['id'];
            $oUser = new User();
            if($oUser->searchByFacebookId($user_id)){
                echo "Ya estabas registrado! Tus datos serán actualizados automáticamente.";
            }
            else{
                $username = $userData['username'];
                $email = $userData['email'];
                $user_type = "0";
                $user_status = "active";
                
                $oUser = insertUser("facebook", "", $username, "", "", "", $user_id, "", $user_type, $user_status, $email);
                echo "Se ha registrado exitosamente!<br>";               
            }
            /* 
            $userData = $facebook->api('/me');
            $userName = $userData['name'];
            $userId = $userData['id'];
            $userEmail = $userData['email'];
            print_r($userData);
            echo "<br>hi";
            echo "<img src='http://graph.facebook.com/".$userData['username']."/picture?type=square'>";
            */
        }
        else{
            header("Location: ".$facebook->getLoginUrl(array('scope' => 'email,user_birthday,user_photos')));
        }
    }
?>