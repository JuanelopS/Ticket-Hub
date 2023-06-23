<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/constants.php';
class PageController {

    public function home(){
        session_start();
        require_once HEADER;
        if($_SESSION == array()){
            require_once LOGIN;
        }   else {
            var_dump($_SESSION);
        }
        require_once FOOTER; 
    }

    public function _404(){
        echo "404 - Page not found";
    }
}