<div class="row">
    <div class="column">
        <div class="ticket-list-header">
            <h3><b>TICKET LIST</b></h3>
            <span>
                <button class="button-large button-clear">PENDING: <?= $tickets_data['unfinished_tickets'] ?></button>
                <button class="button-large button-clear">FINISHED: <?= $tickets_data['finished_tickets'] ?></button>
            </span>
        </div>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>priority</th>
                    <th>type</th>
                    <th>user</th>
                    <th>subject</th>
                    <th>creation_date</th>
                    <th>modification_date</th>
                    <th>state</th>
                </tr>
            </thead>
            <?php
            foreach ($tickets_data['tickets'] as $value) {
                /* TODO: MAKE DAYS SUBSTRACT FOR BETTER SHOW IN VIEW */
                $creation_date = date_format(date_create($value['creation_date']), 'd/m/Y H:i:s');
                $modification_date = date_format(date_create($value['modification_date']), 'd/m/Y H:i:s');
                echo "<tr class='clickable-row' data-href='/ticket/details/" . $value['id']  . "'>";
                echo "<td class='clickable-row-id'>" . $value['id'] . "</td>";
                echo "<td><span class='priority-column'>" . $value['priority'] . "</span></td>";
                echo "<td>" . $value['type'] . "</td>";
                echo "<td>" . $value['user'] . "</td>";
                echo "<td>" . $value['subject'] . "</td>";
                echo "<td>" . $creation_date . "</td>";
                echo "<td>" . $modification_date . "</td>";
                echo "<td>" . $value['state'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>