<script src="../../assets/js/feather.min.js"></script>
<div class="row">
    <div class="column">
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
            foreach ($data as $value) {
                $date = date_format(date_create($value['register_date']), 'd/m/Y H:i:s');
                echo "<tr>";
                echo "<td><i class='btn_delete " . $value['id_user'] . "' data-feather='x-octagon'></i><i class='btn_update " . $value['id_user'] . "' data-feather='edit'></i></td>";
                echo "<td>" . $value['id_user'] . "</td>";
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
<script>
    feather.replace()
</script>