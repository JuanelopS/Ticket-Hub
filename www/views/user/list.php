<div class="row">
    <div class="column">
        <div class="user-list-header">
            <h3><b>USER LIST</b></h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>id</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Register Date</th>
                    <th class="td-user-tickets">Tickets</th>
                </tr>
            </thead>
            <?php
            foreach ($users as $value) {
                $date = date_format(date_create($value['register_date']), 'd/m/Y H:i:s');
                echo "<tr>";
                echo "<td class='user-list-options'><i del='" . $value['id'] .  "' class='btn_delete feather-16' data-feather='x-octagon'></i>
                      <a href='/user/update/" . $value['id'] . "'><i upd='" . $value['id'] .  "' class='btn_update feather-16' data-feather='edit'></i></a></td>
                ";
                echo "<td>" . $value['id'] . "</td>";
                echo "<td>" . $value['email'] . "</td>";
                echo "<td>" . $value['name'] . "</td>";
                echo "<td>" . $value['surname'] . "</td>";
                echo "<td>" . $date . "</td>";
                echo "<td class='td-user-tickets-number'>" . count(self::get_tickets_by_user($value['id'])) . "</td>"; /* TODO: THIS IS VERY VERY UGLY... */
                echo "</tr>";
            }

            ?>
        </table>
    </div>
</div>