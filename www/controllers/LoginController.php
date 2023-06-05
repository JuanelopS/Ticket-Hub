<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/LoginModel.php";

if(($_POST) != null){

    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $login = new Login($email_login, $password_login);

    $result = $login->login();
    
    /* if query returns 0 (no rows) -> login incorrect */
    if(count($result)){
        $login->setMessage("Login successfully");

        /* FIXME: FIX WHY RETURN MULTIDIMENSIONAL ARRAY... */
        $result = $result[0];

        echo "Welcome " . $result['name'];

    } else {
        $login->setMessage("Login incorrect");
    }

    $msg = $login->getMessage();

    require_once $_SERVER['DOCUMENT_ROOT'] . "/views/user/login.php";

    
} else{
    require_once $_SERVER['DOCUMENT_ROOT'] . "/views/user/login.php";

}


