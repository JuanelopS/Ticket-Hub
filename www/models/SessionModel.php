<?php

class Session {

    protected $session_status = false;

    public static function open_session(array $data){
        session_start();
        // self::$session_status = true;
        foreach($data as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }

    public static function close_session(){
        session_destroy();
        // self::$session_status = false;
    }
}