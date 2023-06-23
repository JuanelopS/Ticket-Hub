<div class="row">
    <div class="column column-80 column-offset-10">
        <h3>Welcome <b><?= $data['user_data']['name'] ?></b></h3>
        <blockquote>Your tickets</blockquote>
        <table>
            <thead>
                <tr>
                    <th>priority</th>
                    <th>subject</th>
                    <th>creation_date</th>
                    <th>modification_date</th>
                    <th>state</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data['tickets_data'] as $value) {
                    echo "<tr>";
                    echo "<td>" . $value['priority'] . "</td>";
                    echo "<td>" . $value['subject'] . "</td>";
                    echo "<td>" . date_format(date_create($value['creation_date']), 'd/m/Y H:i:s') . "</td>";
                    echo "<td>" . date_format(date_create($value['modification_date']), 'd/m/Y H:i:s') . "</td>";
                    echo "<td>" . $value['state'] . "</td>";
                    echo "</tr>";
                }
                ?>
        </table>
    </div>
</div>
<div class="row">
    <div class="column column-33 column-offset-33">
        <a class='button' href='/ticket/send'>New Ticket</a>
    </div>
</div>