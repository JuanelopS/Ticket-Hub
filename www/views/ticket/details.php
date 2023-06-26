<div id="ticket-details">
    <div class="row">
        <div class="column column-60 ticket-details-title">
            <b>Ticket details: <?= $data['subject'] . "</b> <span class='priority-column badge-small'>" . $data['priority'] ?></span>
        </div>
        <?php
        if ($_SESSION['role'] == 1) {
            echo "<div class='column'>";
            echo "<select id='select-state'>";
            $current_state = $data['state'];
            foreach ($states as $key => $value) {
                if ($value['state'] == $current_state) {
                    echo "<option value='" . $value['id'] . "' selected>" . $value['label'] . "</option>";
                } else {
                    echo "<option value='" . $value['id'] . "'>" . $value['label'] . "</option>";
                }
            }
            echo "</select>";
            echo "</div>";
            echo "<div class='column'>";
            echo "<button class='button button-outline' id='update-state-button'>Update</button>";
            echo "</div>";
        } else {
            echo "<button class='button button-outline' id='update-state-button' style='display:none'>Update</button>";
        }
        ?>
    </div>

    <div class="row">
        <div class="column">
            <div id="ticket" ticket-id="<?= $data['id'] ?>">
                <label><span class="ticket-details-span"><b><?php echo $data['user'] . "</b> at <i>" . date_format(date_create($data['creation_date']), 'd/m/Y H:i:s') . "</i>" ?></span></label>
                <label>Type: <span class="ticket-details-span"><?= $data['type'] ?></span></label>
                <label>Ticket message:</label>
                <span class="ticket-details-span"><?= $data['ticket_text'] ?></span>
            </div>
        </div>
    </div>

    <div id="ticket-responses">
        <?php
        if (isset($responses) && !empty($responses)) {
            foreach ($responses as $row => $value) {
                $message_date = date_format(date_create($value['message_date']), 'd/m/Y H:i:s');
                echo "<div class='row'>";
                echo "<div class='column'>";
                if ($row % 2 != 0) {
                    echo "<div class='ticket-response' style='border:1px solid #9b4dca; border-radius: 5px; padding: 20px; margin-bottom: 25px;'>";
                } else {
                    echo "<div class='ticket-response' style='background-color: #9b4dca20 ; border:1px solid #9b4dca; border-radius: 5px; padding: 20px; margin-bottom: 25px;'>";
                }
                echo "<span class='ticket-details-span'><b>" . $value['user'] . "</b> at <i>" . $message_date . "</i></span>";
                echo "<label>Response message:</label>";
                echo "<span class='ticket-details-span'>" . $value['message'] . "</span>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        }
        ?>
    </div>
    <div class="row">
        <div class="column" id="ticket-details-buttons">
            <a class="button" onclick="history.back()">Back</a>
            <a class="button button-outline" id="button-reply-ticket">To reply</a>
        </div>
    </div>