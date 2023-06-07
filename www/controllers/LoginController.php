<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/LoginModel.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/SessionModel.php";



class LoginController
{
    

    
    public function login()
    {
        $msg = "";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/views/user/login.php";
    }


    public function check_login()
    {

        if ($_POST != null) {

            $email_login = $_POST['email'];
            $password_login = $_POST['password'];
            $_POST = array();
            $login = new Login($email_login, $password_login);
            $result = $login->login();

            /* if query returns 0 (no rows) -> login incorrect */

            if (count($result)) {
                $login->setMessage("Login successfully");
                $msg = $login->getMessage();

                /* FIXME: FIX WHY RETURN MULTIDIMENSIONAL ARRAY... */
                $result = $result[0];

                Session::open_session($result);

                require_once $_SERVER['DOCUMENT_ROOT'] . "/index.php";
            } else {
                $login->setMessage("Login incorrect");
                $msg = $login->getMessage();
                require_once $_SERVER['DOCUMENT_ROOT'] . "/login/login";
            }
        } else {
            $msg = "";
            require_once $_SERVER['DOCUMENT_ROOT'] . "/views/user/login.php";
        }
    }

    public function user_logout()
    {
        Session::close_session();
        header('Location: /page/home');
    }
}
