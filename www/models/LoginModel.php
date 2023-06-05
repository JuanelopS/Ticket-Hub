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

    public function login()
    {
        parent::$query = "SELECT * FROM users WHERE email = ? AND password = ?";
        $data = [$this->email_login, $this->password_login];
        return parent::get_results_from_query($data);
    }
}
