<div class="row">
    <div class="column">
        <div class="ticket-details-title">
        <b>Ticket details: <?= $data['subject'] . "</b> <span class='priority-column badge-small'>" . $data['priority'] ?></span>
        </div>
            <div class="ticket">
                <label>User: <span class="ticket-details-span"><?= $data['user']?></span></label>
                <label>Type: <span class="ticket-details-span"><?= $data['type']?></span></label>
                <label>Date: <span class="ticket-details-span"><?= $data['creation_date']?></span></label>
                <label>Ticket message:</label>
                <span class="ticket-details-span"><?= $data['ticket_text']?></span>
            </div>
    </div>
</div>
<div class="row">
    <div class="column">
        <a class='button' onclick="history.back()">Back</a>
        <a class='button button-outline'>To reply</a>
    </div>
</div>