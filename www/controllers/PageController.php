<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/constants.php';
class PageController {

    public function home(){
        session_start();
        require_once HEADER;
        require_once HOME;
        require_once FOOTER;
    }

    public function _404(){
        echo "404 - Page not found";
    }
}