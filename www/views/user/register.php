    <div class="row">
        <div class="column column-20 column-offset-40">
            <h2>Register</h2>
            <!-- TODO: set max/min characters in form -->
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
        </div>
    </div>