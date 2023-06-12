<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/UserModel.php";

class Login extends User
{

    protected string $email_login;
    private string $password_login;
    protected string $msg = "";

    function __construct($email, $password) {
        $this->email_login = $email;
        $this->password_login = $password;
    }

    public function setMessage($msg) {
        $this->msg = $msg;
    }

    public function getMessage() {
        return $this->msg;
    }

    public function login($pwd_peppered, $pwd_hashed)
    {
        parent::$query = "SELECT * FROM users WHERE email = ?";
        $data = [$this->email_login];
        $user_data = parent::get_results_from_query($data);

        if($user_data !== array()){

            $result = [
                'verify_password' => password_verify($pwd_peppered, $pwd_hashed),
                'user_data' => $user_data
            ];

            return $result;
        } 
    }

    public function get_user_pwd($email)
    {
        parent::$query = "SELECT password FROM users WHERE email = ?";
        $result = parent::get_results_from_query([$email]);
        if($result) {
            return $result[0];
        }
        
    }

}
