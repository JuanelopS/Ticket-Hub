<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
</head>

<body>
    <?php

    $user = "guest";

    if (isset($_SESSION)) {
    
    $user = $_SESSION['name'];
    echo "Welcome $user";

    echo "<br><br>";
    echo "<a href='./controllers/LoginController.php'>Logout</a>";
    } else {
        echo "Welcome $user";
    }


    ?>
</body>

</html>