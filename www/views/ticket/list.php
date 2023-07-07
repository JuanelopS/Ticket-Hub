<div class="row">
    <div class="column">
        <?php if ($tickets_data['tickets'] != array()) : ?>
            <div class="ticket-list-header">
                <h3><b>TICKET LIST</b></h3>
                <?php if ($_SESSION['role'] == 1) : ?>
                    <span>
                        <button class="button-large button-clear" style="font-size: 2rem;">PENDING: <?= $tickets_data['unfinished_tickets'] ?></button>
                        <button class="button-large button-clear" style="font-size: 2rem;">FINISHED: <?= $tickets_data['finished_tickets'] ?></button>
                    </span>
                <?php endif; ?>
            </div>
            <table>
                <thead>
                    <tr>
                        <th class='clickable-row-id'>id</th>
                        <th>Priority</th>
                        <th>Type</th>
                        <th>User</th>
                        <th>Subject</th>
                        <th>Creation date</th>
                        <th>Last Modification</th>
                        <th>State</th>
                    </tr>
                </thead>
                <tbody class="ticket-list"></tbody>
            </table>
        <?php endif; ?>
        <?php if ($tickets_data['tickets'] == array()) : ?>
            <h3><b>NO TICKETS</b></h3>
        <?php endif; ?>
    </div>
</div>