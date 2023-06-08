<?php

class PageController {

    public function home(){
        session_start();
        if(array_key_exists('name', $_SESSION)){
            
            echo "Welcome " . ucfirst($_SESSION['name']) . "<br>"; 
            echo "<a href='/login/logout'>Logout</a>";

        } else {
            echo "Welcome guest <br>";
            echo "<a href='/login/view'>Login</a>";
        }
    }

    public function _404(){
        echo "404 - Page not found";
    }
}