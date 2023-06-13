<?php

/* Database */

define("DB_DSN", "mysql:host=db;dbname=dbname");
define("DB_USER", "root");
define("DB_PASSWORD", "test");

/* Router */

define('URL', $_SERVER['REQUEST_URI']);


/* Hash */

define("PEPPER", "KS92L{¡kdsxjal'1sjooewsW");


/* Layout */

define("HEADER", $_SERVER['DOCUMENT_ROOT'] . "/views/layout/header.php");
define("FOOTER", $_SERVER['DOCUMENT_ROOT'] . "/views/layout/footer.php");



