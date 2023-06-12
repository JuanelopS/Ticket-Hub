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
        if (isset($_POST['email'], $_POST['password'])) {

            $email_login = $_POST['email'];
            $password_login = $_POST['password'];

            $password_peppered = hash_hmac("sha256", $password_login, PEPPER);
            $password_hashed = password_hash($password_peppered, PASSWORD_DEFAULT);

            $password_login = $password_hashed;

            $_POST = array();
            $login = new Login($email_login, $password_login);
            $result = $login->login();

            echo $password_login;
            /* Login correct */
            if (count($result)) {
                
                /* FIXME: FIX WHY RETURN MULTIDIMENSIONAL ARRAY... */
                $result = $result[0];
                Session::open_session($result);

                /* TODO: IMPLEMENTS SOMETHING LESS BASIC */
                header("Location: /");
                
                /* Login incorrect */
            } else {
                $login_incorrect_message = "Email and/or password incorrect";
                require_once $_SERVER['DOCUMENT_ROOT'] . '/views/user/login.php';
            }
        } else {
            exit('Please fill both the email and password fields!');
        }
    }
    public function logout()
    {
        Session::close_session();
        /* FIXME: IMPLEMENTS LESS BASIC REDIRECTION (spinner and js timeout ¿?) */
        header("Location: /");
    }
}

