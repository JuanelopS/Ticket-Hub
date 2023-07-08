<div class="row">
    <div class="column">
        <?php if ($tickets_data['tickets'] != array()) : ?>
            <div class="ticket-list-header">
                <h3><b>TICKET LIST</b></h3>
                <?php if ($_SESSION['role'] == 1) : ?>
                    <span>
                        <button class="button-large button-clear all-tickets" style="font-size: 2rem;">ALL</button>
                        <button class="button-large button-clear pending-tickets" style="font-size: 2rem;">PENDING: <?= $tickets_data['unfinished_tickets'] ?></button>
                        <button class="button-large button-clear finished-tickets" style="font-size: 2rem;">FINISHED: <?= $tickets_data['finished_tickets'] ?></button>
                    </span>
                <?php endif; ?>
            </div>
            <table>
                <thead>
                    <tr>
                        <th class='clickable-row-id' id='id-column'>id</th>
                        <th id='priority-column'>Priority</th>
                        <th id='type-column'>Type</th>
                        <th id='user-column'>User</th>
                        <th id='subject-column'>Subject</th>
                        <th id='creation-column'>Creation date</th>
                        <th id='modification-column'>Last Modification</th>
                        <th id='state-column'>State</th>
                    </tr>
                </thead>
                <tbody class="ticket-list" data-id="<?= $_SESSION['role'] ?>" user-id="<?= $_SESSION['id'] ?>"></tbody>
            </table>
        <?php endif; ?>
        <?php if ($tickets_data['tickets'] == array()) : ?>
            <h3><b>NO TICKETS</b></h3>
        <?php endif; ?>
    </div>
</div>
<div class="row buttons-ticket-list">
    
</div>