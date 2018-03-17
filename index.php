<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 17.03.2018
 * Time: 17:39
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
</head>
<body>
<div style="width: 60%; margin: 0 auto;">
    <a href="add.html">Add New Data</a>

    <table width="80%" border="0">
        <tr bgcolor="#ccc">
            <td>Name</td>
            <td>Age</td>
            <td>Email</td>
            <td>Update</td>
        </tr>
        <?php
            require_once 'config.php';

            $sql = "SELECT * FROM crud.users ";
            foreach ($pdo->query($sql) as $row)
            {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> 
                        | <a href=\"delete.php?id=$row[id]\" onclick=\"return confirm('Are you sure want to delete?')\">Delete</a></td>";
            }

        ?>
    </table>
</div>
</body>
</html>

