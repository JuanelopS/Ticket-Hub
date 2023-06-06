<?php

class Router{
    private $controller;
    private $method;

    public function __construct() {
        $this->matchRoute();
    }

    public function matchRoute() {
        $url = explode('/', URL);
        
        $this->controller = $url[1];
        $this->method = $url[2];

        $this->controller = $this->controller . 'Controller';

        require_once __DIR__ . '/controllers/'. $this->controller . '.php';
    }

    public function run() {
        $controller = new $this->controller();
        $method = $this->method;
        $controller->$method();
    }
}