<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <!-- CSS Reset -->
    <link rel="stylesheet" href="../../node_modules/normalize.css/normalize.css">
    <!-- Milligram CSS -->
    <link rel="stylesheet" href="../../node_modules/milligram/dist/milligram.css">
    <!-- CSS  -->
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <?php if (isset($tables)) : ?>
        <link rel="stylesheet" href="../../assets/css/tables.css">
    <?php endif; ?>
    <!-- Feather icons -->
    <script src="../../assets/js/feather.min.js"></script>
    <title>
        <?= isset($title) ? $title : "TICKET HUB" ?>
    </title>
</head>

<body class="magicpattern">
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
                                        <i class='btn_delete feather-32' data-feather='log-out'>
                                            <a href='/login/logout'>Logout</a>
                                        </i>
                                     ";
                        } else {
                            echo
                            "
                                    <a class='button' href='/login/view'>Login</a>
                                    <a class='button button-outline' href='/user/register'>Register</a>
                                    ";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </header>
        <main>