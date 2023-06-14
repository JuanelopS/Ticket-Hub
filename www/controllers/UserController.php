<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/UserModel.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/SessionModel.php";

class UserController
{

    function list()
    {
        require_once HEADER;
        /* TODO: implements global function for permissions */
        /* FIXME: no string comparation for permissions */
        if($_SESSION['id_rol'] === 1){
            $data = User::get_all();
            require_once HEADER;
            require_once $_SERVER['DOCUMENT_ROOT'] . "/views/user/user.php";
            require_once FOOTER;
        } else {
            echo "Action not allowed";
        }
        require_once FOOTER;
    }

    function profile() {
        /* TODO: ADD PARAMS TO ROUTE FUNCTION */
        require_once HEADER;
        echo "profile page<br>";
        var_dump($_SESSION);
        require_once FOOTER;
    }

    function register(){
        require_once HEADER;
        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/user/register.php';
        require_once FOOTER;
    }

    function exec_register(){
        if($_POST != null){

            $email = $_POST['email'];
            $password = $_POST['password'];
            $name= $_POST['name'];
            $surname = $_POST['surname'];

            $password_peppered = hash_hmac("sha256", $password, PEPPER);
            $password_hashed = password_hash($password_peppered, PASSWORD_DEFAULT);
            $password = $password_hashed;

            $user = new User($email, $password, $name, $surname);
            $user->insert();

            /* TODO: REDIRECT AFTER REGISTER USER LESS BASIC... */
            header("Location: /");
            
        }
    }
}
