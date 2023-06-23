<?php

class Session {

    protected static $id_user;
    protected static $email;

    /* TODO: COOKIES FUNCTIONALITY */

    public static function open_session(array $data){
        session_start();
        foreach($data as $key => $value) {
            $_SESSION[$key] = $value;
        }
        settype($_SESSION['role'],'int');
    }

    public static function close_session(){
        session_start();
        $_SESSION = array();
        session_destroy();
    }

}