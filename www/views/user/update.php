    <div class="row">
        <div class="column column-33 column-offset-33">
            <h2>Edit user profile</h2>
            <!-- TODO: set max/min characters in form -->
            <form action="<?= "/user/exec_update/" . $data['id'] ?>" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?= $data['email'] ?>" readonly>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?= $data['name'] ?>" required>
                <label for="surname">Surname</label>
                <input type="text" name="surname" id="surname" value="<?= $data['surname'] ?>" required>
                <div class="update_buttons">
                    <input class="form-button" type="submit" value="Update" name="action_update">
                    <input type="submit" value="Change Password" name="action_change_password" disabled>
                </div>
            </form>
        </div>
    </div>