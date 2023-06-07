<?php

class Router{
    private $controller;
    private $method;

    public function __construct() {
        $this->matchRoute();
    }

    /**
     * Extracts the desired driver and method from the url
     *
     * @return void
     */
    public function matchRoute() {
        
        $url = explode('/', URL);
        
        /* FIXME: IT DOESNT WORK */

        $this->controller = !empty($url[1]) ? ucfirst($url[1]) : "Page";
        $this->method = !empty($url[2]) ? $url[2] : "_404";

        /* ---------------------- */

        $this->controller = $this->controller . "Controller";

        if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/controllers/' . $this->controller . '.php')){
            
        } else {
            echo "no existe";
        }


        require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/'. $this->controller . '.php';
    }

    /**
     * Collects the controller and method variables stored by MatchRoute() 
     * and executes them as controller->method;
     *
     * @return void
     */
    public function run() {
        $controller = new $this->controller();
        $method = $this->method;
        $controller->$method();
    }
}