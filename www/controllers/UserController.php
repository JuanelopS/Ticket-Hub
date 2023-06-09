<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/UserModel.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/SessionModel.php";

// $user = new User('test6@est.com', '111111111114r8h', 'testname6', 'testsurname6');

/* echo "<pre>";
print_r($user->get_all());
echo "</pre>";
 */

/* $user->insert(); */

/* User::delete(2); */

// print_r(User::get_by_id(1)); ºº

class UserController
{

    function list()
    {
        /* TODO: implements global function for permissions */
        if(isset($_SESSION['id_rol']) == 1){
            $data = User::get_all();
            require_once $_SERVER['DOCUMENT_ROOT'] . "/views/user/user.php";
        } else {
            echo "Action not allowed";
        }
    }

    function profile() {
        /* TODO: ADD PARAMS TO ROUTE FUNCTION */
        echo "profile page";
    }

    function register(){
        require_once $_SERVER['DOCUMENT_ROOT'] . '/views/user/register.php';
    }

    function exec_register(){
        if($_POST != null){
            // var_dump($_POST);
            $email = $_POST['email'];
            $password = $_POST['password'];
            $name= $_POST['name'];
            $surname = $_POST['surname'];

            $user = new User($email, $password, $name, $surname);
            $user->insert();
            
        }
    }
}
