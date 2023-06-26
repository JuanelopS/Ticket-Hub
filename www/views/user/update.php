    <div class="row">
        <div class="column column-33 column-offset-33">
            <h2>Edit user profile</h2>
            <!-- TODO: set max/min characters in form -->
            <form action="<?= "/user/exec_update/" . $data['id'] ?>" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?= $data['email'] ?>" maxlength="30" autofocus readonly>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?= $data['name'] ?>" maxlength="30" required>
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname" value="<?= $data['surname'] ?>" maxlength="30" required>
                <div class="update_buttons">
                    <input class="form-button" type="submit" value="Update" name="action_update">
                    <a id="change-password-button" class="button" href="/user/change_password">Change password</a>
                </div>
            </form>
        </div>
    </div>