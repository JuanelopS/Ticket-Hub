        <div class="row">
            <div class="column column-33 column-offset-33">
                <h2>New Ticket</h2>
                <form>
                    <label for="ticket-type">Age Range</label>
                    <select id="ticket-type">
                        <?php foreach($tickets_type as $row => $value): ?>
                            <option value=" . $value['id'] . ">$value['type']</option>
                        <?php endforeach; ?>
                    </select>
                    <div class="form-group">
                        <label for="subject">Asunto:</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Mensaje:</label>
                        <textarea id="message" name="message" rows="8" style="height:auto;" required></textarea>
                    </div>
                    <div class=" form-group">
                        <button type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>