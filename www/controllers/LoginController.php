<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/LoginModel.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/SessionModel.php";



class LoginController
{

    public function view()
    {
        $msg = "";
        /* TODO: DONT SHOW IF USER IS LOGGED */
        require_once $_SERVER['DOCUMENT_ROOT'] . "/views/user/login.php";
    }


    public function check()
    {
        if ($_POST != null) {

            $email_login = $_POST['email'];
            $password_login = $_POST['password'];
            $_POST = array();
            $login = new Login($email_login, $password_login);
            $result = $login->login();


            /* Login correct */
            if (count($result)) {
                
                /* FIXME: FIX WHY RETURN MULTIDIMENSIONAL ARRAY... */
                $result = $result[0];
                Session::open_session($result);
                /* FIXME: IMPLEMENTS base_url function here */
                header("Location: ../page/home");
                

                /* Login incorrect */
            } else {
                $msg = "Login incorrect";
                require_once $_SERVER['DOCUMENT_ROOT'] . '/views/user/login.php';
            }
        }
    }
    public function logout()
    {
        Session::close_session();
        /* FIXME: IMPLEMENTS base_url function here */
        header("Location: ../page/home");
    }
}
