<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>
    <table>
        <thead>
            <tr style='font-weight: bold'>
                <td>id</td>
                <td>email</td>
                <td>password</td>
                <td>name</td>
                <td>surname</td>
                <td>register_date</td>
            </tr>
        </thead>
    <?php
    foreach ($data as $value) {
        $date = date_format(date_create($value['register_date']), 'd/m/Y H:i:s');
        echo "<tr>";
        echo "<td>" . $value['id_user'] . "</td>";
        echo "<td>" . $value['email'] . "</td>";
        echo "<td>" . $value['password'] . "</td>";
        echo "<td>" . $value['name'] . "</td>";
        echo "<td>" . $value['surname'] . "</td>";
        echo "<td>" . $date . "</td>";
        echo "</tr>";
    }

    ?>
    </table>
</body>
</html>