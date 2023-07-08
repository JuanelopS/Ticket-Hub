<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/constants.php';
class PageController {

    public function home(){
        session_start();
        
        if($_SESSION == array()){
            require_once HEADER;
            require_once LOGIN;
            require_once FOOTER; 
        }   else {
            if($_SESSION['role'] == 1)
                header("Location: /admin/dashboard");
            else {
                header("Location: /user/profile/" . $_SESSION['id']);
            }
        }

    }

    public function _404(){
        http_response_code(404);
        require_once HEADER;
        require_once 404;
        require_once FOOTER;
    }

    public function _403(){
        http_response_code(403);
        require_once HEADER;
        require_once 403;
        require_once FOOTER;
    }
}