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
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <!-- Feather icons -->
    <script src="../../assets/js/feather.min.js"></script>
    <title>
        <?= isset($title) ? $title : "TICKET HUB" ?>
    </title>
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="row header-content">
                <div class="column">
                    <div class="logo">
                        <a href='/'><img class="logo_img" src="../../assets/images/logo.png" alt="ticket_hub_logo"></a>
                    </div>
                </div>
                <div class="column">
                    <div class="header-login-btn">
                        <?php
                        if (isset($_SESSION) && array_key_exists('name', $_SESSION)) {

                            echo "
                                        <a class='button button-outline' href='/login/logout'>Logout</a>
                                     ";
                        } else {
                            echo
                            "
                                    <a class='button button-outline' href='/login/view'>Login</a>
                                    <a class='button' href='/user/register'>Register</a>
                                    ";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </header>
        <main>