<form action="/ticket/exec_send_ticket" method="POST">
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
                <input type="text" id="subject" name="subject" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column column-50 column-offset-33">
            <div class="form-group">
                <label for="ticket_text">Message</label>
                <textarea id="ticket_text" name="ticket_text" rows="8" style="height:auto;" required></textarea>
            </div>
            <div class=" form-group">
                <button type="submit">Submit</button>
                <a class="button" onclick="history.back()">Back</a>
            </div>
        </div>
    </div>
</form>