<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <h2>Register</h2>
    <form action="/user/exec_register" method="POST">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
        <label for="surname">Surname</label>
        <input type="text" name="surname" id="surname" required>
        <input type="submit" value="Register">
    </form>
</body>

</html>