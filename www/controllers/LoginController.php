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

            $_POST = array();
            $login = new Login($email_login, $password_login);

            $password_peppered = hash_hmac("sha256", $password_login, PEPPER);
            $password_hashed = $login->get_user_pwd($email_login);

            if ($password_hashed) {
                $result = $login->login($password_peppered, $password_hashed['password']);
            } else {
                exit("User not exists");
            }

            /* Login correct */
            if ($result['verify_password']) {

                /* FIXME: FIX WHY RETURN MULTIDIMENSIONAL ARRAY... */
                Session::open_session($result['user_data'][0]);

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
