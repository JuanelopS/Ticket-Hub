<?php

class Session {

    protected static $session_status = false;
    protected static $id_user;
    protected static $email;

    public static function open_session(array $data){
        session_start();
        self::$session_status = true;
        foreach($data as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }

    public static function close_session(){
        session_start();
        $_SESSION = array();
        session_destroy();
        self::$session_status = false;
    }
}