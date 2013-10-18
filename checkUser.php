<?php 
include_once 'User.php';
$oUser = new User();
if (isset($_REQUEST['search'])){
    if($_REQUEST['search'] == 'username'){
        $username = strtolower($_REQUEST['usrnm']);
        $check = $oUser -> checkUsername($username);
        if ($check) {
            echo 'false';
        }
        else{
            echo json_encode('true');
        }
        
    }
    if($_REQUEST['search'] == 'e-mail'){
        $email = strtolower($_REQUEST['email']);
        $check = $oUser -> checkEmail($email);
        if ($check) {
            echo 'false';
        }
        else{
            echo json_encode('true');
        }
        
    }
}
    

?>