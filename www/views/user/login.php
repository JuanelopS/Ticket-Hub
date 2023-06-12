<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <!-- TODO: set max/min characters in form -->
    <h2>Login</h2>
    <form action="/login/check" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Login">
    </form>
    <?php if(isset($login_incorrect_message))
        echo "<p style='color:red'>$login_incorrect_message</p>";
    ?>
</body>

</html>