<?php

    require_once __DIR__ . "/config/router.php"; 
    require_once __DIR__ . "/config/constants.php";

    $router = new Router();
    $router->run();

