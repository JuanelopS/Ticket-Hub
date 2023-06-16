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

    /**
     * Login function with php password_hash/verify functionality)
     *
     * @param string $pwd_peppered
     * @param string $pwd_hashed
     * @return array ['verify_password => boolean, 'user_data' => array]
     */
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

    /**
     * Get user password for verify_password function
     *
     * @param string $email
     * @return string
     */
    public function get_user_pwd($email)
    {
        parent::$query = "SELECT password FROM users WHERE email = ?";
        $result = parent::get_results_from_query([$email]);
        if($result) {
            return array_merge(...$result);
        }
        
    }

}
