<form action="" method="POST" id="form-send-ticket">
    <div class="row">
        <div class="column column-33 column-offset-33">
            <h3>New Ticket</h3>
            <label for="type">Type</label>
            <select id="type" name="type">
                <option></option>
                <?php foreach ($ticket_types as $row => $value) : ?>
                    <?= "<option value=" . $value['id'] . ">" . $value['id'] . " - " . $value['type'] . "</option>" ?>
                <?php endforeach; ?>
            </select>
            <label for="priority">Priority</label>
            <select id="priority" name="priority">
                <option></option>
                <?php foreach ($ticket_priorities as $row => $value) : ?>
                    <?= "<option value=" . $value['id'] . ">" . $value['priority_name'] . "</option>" ?>
                <?php endforeach; ?>
            </select>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" maxlength="50" required>
            </div>
            <input type="hidden" id="user" name="user" value="<?= $_SESSION['id'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="column column-50 column-offset-33">
            <div class="form-group">
                <label for="ticket_text">Message</label>
                <textarea id="ticket_text" name="ticket_text" rows="8" style="height:auto;" maxlength="568" required></textarea>
            </div>
            <div class=" form-group">
                <button class="button" type="submit" id="button-send-ticket">
                    <span class="button-text" style="vertical-align:middle;">Submit</span>
                    <i class="feather-16 icon-button" data-feather="send"></i>
                </button>
                <a class="button" onclick="history.back()">
                    <span class="button-text" style="vertical-align: middle;">Back</span>
                    <i class="feather-16 icon-button" data-feather="skip-back"></i>
                </a>
            </div>
        </div>
    </div>
</form>