<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/UserModel.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/SessionModel.php";

class UserController
{

    public function list()
    {
        require_once HEADER;
        /* TODO: implements global function for permissions */
        /* FIXME: no string comparation for permissions */
        if(isset($_SESSION['id_rol']) && $_SESSION['id_rol'] === 1){
            $data = User::get();
            $tables = true;
            require_once $_SERVER['DOCUMENT_ROOT'] . "/views/user/list.php";

        } else {
            echo "Action not allowed";
        }
        require_once FOOTER;
    }

    public function profile($id) {
        /* TODO: THIS */
        require_once HEADER;
        $data = new User();
        $data = $data->get_tickets_from_user($id);
        var_dump($data);
        require_once FOOTER;
    }

    public function register(){
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

    public function delete(){
        if($_SESSION['id_rol'] === 1){
  
            /* we collect the data sent from js, pass to integer and call the static function of the model for deletion */
            $_post = json_decode(file_get_contents('php://input'), true);
            $item = $_post['item'];
            settype($item, 'int');
            
            $user = new User();
            $user->delete($item);

        } else {
            echo "Not allowed";
        }
    }

    public function update($id){
        if ($_SESSION['id'] === $id || $_SESSION['id_rol'] === 1) {

            $user = new User();
            $data = $user->get($id);
            $data = array_merge(...$data);
            
            require_once HEADER;
            require_once $_SERVER['DOCUMENT_ROOT'] . "/views/user/update.php";
            require_once FOOTER;

        } else {
            echo "Not allowed";
        }
    }

    public function exec_update($id){

        $user = new User();
        $query = "UPDATE users SET email = ?, name = ?, surname = ? WHERE id = ?";

        $data = [
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'id' =>  $id
        ];

        $user->update($data,$query);

        if($_SESSION['id_rol'] !== 1){
            header("Location: /user/profile/" . $data['id']);
        } else {
            header("Location: /user/list");
        }
    }
}
