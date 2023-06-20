        <div class="row">
            <div class="column column-33 column-offset-33">
                <h3>New Ticket</h3>
                <form>
                    <label for="ticket-type">Type</label>
                    <select id="ticket-type">
                        <option></option>
                        <?php foreach ($ticket_types as $row => $value) : ?>

                            <?= "<option value=" . $value['id'] . ">" . $value['id'] . " - " . $value['type'] . "</option>" ?>
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
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="8" style="height:auto;" required></textarea>
                </div>
                <div class=" form-group">
                    <button type="submit">Submit</button>
                </div>
                </form>
            </div>
        </div>