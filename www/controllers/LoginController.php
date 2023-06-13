<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/LoginModel.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/SessionModel.php";


class LoginController
{

    public function view($message = "")
    {
        $login_message = $message;
        /* TODO: DONT SHOW IF USER IS LOGGED */
        require_once HEADER;
        require_once $_SERVER['DOCUMENT_ROOT'] . "/views/user/login.php";
        require_once FOOTER;
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

                Session::open_session(array_merge(...$result['user_data']));

                /* TODO: IMPLEMENTS SOMETHING LESS BASIC */
                header("Location: /");

                /* Login incorrect */
            } else {
                $message = "Email and/or password incorrect";
                $this->view($message);
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
