<!-- TODO: set max/min characters in form -->

<div class="row">
    <div class="column column-20 column-offset-40">
        <h2>Login</h2>
        <form action="/login/check" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required autofocus>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</div>
<?php if (isset($login_message))
    echo "<p style='color:red'>$login_message</p>";
?>