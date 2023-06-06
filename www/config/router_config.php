<?php

    $folderPath = $_SERVER['SCRIPT_NAME'];
    $urlPath = $_SERVER['REQUEST_URI'];

    // if server is inside another folder (cut string url)
    // $url = substr($urlPath,strlen($folderPath));  
    
    $url = $urlPath;

    define('URL', $url);