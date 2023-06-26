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
                    <th>email</th>
                    <th>name</th>
                    <th>surname</th>
                    <th>register_date</th>
                </tr>
            </thead>
            <?php
            foreach ($users as $value) {
                $date = date_format(date_create($value['register_date']), 'd/m/Y H:i:s');
                echo "<tr>";
                echo "<td><i del='" . $value['id'] .  "' class='btn_delete feather-16' data-feather='x-octagon'></i>
                      <a href='/user/update/" . $value['id'] . "'><i upd='" . $value['id'] .  "' class='btn_update feather-16' data-feather='edit'></i></a></td>
                ";
                echo "<td>" . $value['id'] . "</td>";
                echo "<td>" . $value['email'] . "</td>";
                echo "<td>" . $value['name'] . "</td>";
                echo "<td>" . $value['surname'] . "</td>";
                echo "<td>" . $date . "</td>";
                echo "</tr>";
            }

            ?>
        </table>
    </div>
</div>