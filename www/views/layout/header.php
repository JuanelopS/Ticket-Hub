<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <!-- CSS Reset -->
    <link rel="stylesheet" href="../../node_modules/milligram/normalize.css/normalize.css">
    <!-- Milligram CSS -->
    <link rel="stylesheet" href="../../node_modules/milligram/dist/milligram.css">
    <!-- CSS  -->
    <link rel="stylesheet" href="../../assets/css/main.css">
    <title>
        <?= isset($title) ? $title : "NO TITLE" ?>
    </title>
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="row">
                <div class="column column-offset-10">
                    <div class="row">
                        <div class="column column-50">
                            <div class="logo">
                                <h2>HEADER</h2>
                            </div>
                            
                        </div>
                        <div class="column">
                            <div class="header-login-btn justify-content">
                                <?php

                                if (isset($_SESSION) && array_key_exists('name', $_SESSION)) {

                                    echo "
                                        <p>Welcome " . ucfirst($_SESSION['name']) . "</p>
                                        <a class='button button-outline button-small' href='/login/logout'>Logout</a>
                                     ";
                                } else {
                                    echo
                                    "
                                    <p>Welcome guest</p>
                                    <a class='button button-outline button-small' href='/login/view'>Login</a>
                                    <a class='button button-small' href='/user/register'>Register</a>
                                    ";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>