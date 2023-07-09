<?php

/* Database */

define("DB_DSN", "");
define("DB_USER", "");
define("DB_PASSWORD", "");

/* Router */

define('URL', $_SERVER['REQUEST_URI']);


/* Hash */

define("PEPPER", "");


/* Layout */

define("HEADER", $_SERVER['DOCUMENT_ROOT'] . "/views/layout/header.php");
define("FOOTER", $_SERVER['DOCUMENT_ROOT'] . "/views/layout/footer.php");
define("HOME", $_SERVER['DOCUMENT_ROOT'] . "/views/pages/home.php");
define("LOGIN", $_SERVER['DOCUMENT_ROOT'] . "/views/user/login.php");
define("404", $_SERVER['DOCUMENT_ROOT'] . "/views/pages/404.php");
define("403", $_SERVER['DOCUMENT_ROOT'] . "/views/pages/403.php");




