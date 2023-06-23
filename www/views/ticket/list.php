<div class="row">
    <div class="column column-80 column-offset-10">
        <h3>Ticket list</h3>
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
                foreach ($tickets as $value) {
                    /* TODO: MAKE DAYS SUBSTRACT FOR BETTER SHOW IN VIEW */
                    $creation_date = date_format(date_create($value['creation_date']), 'd/m/Y H:i:s');
                    $modification_date = date_format(date_create($value['modification_date']), 'd/m/Y H:i:s');
                    
                    echo "<tr>";
                    echo "<td>" . $value['id'] . "</td>";
                    echo "<td>" . $value['priority'] . "</td>";
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