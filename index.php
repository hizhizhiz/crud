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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Home Page</title>
</head>
<body>
<div class="container">
    <br>
    <a class="btn btn-outline-primary btn-lg" href="add.html">Add New Data</a>

    <table class="table">
        <thead>
            <tr class="bg-primary" style="color: white;">
                <th scope="col"><p class="h3">Name</p></th>
                <th scope="col"><p class="h3">Age</p></th>
                <th scope="col"><p class="h3">Email</p></th>
                <th scope="col"><p class="h3">Update</p></th>
            </tr>
        </thead>
        <?php
            require_once 'config.php';

            $sql = "SELECT * FROM crud.users ";
            foreach ($pdo->query($sql) as $row)
            {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><a class='btn btn-warning btn-sm' href=\"edit.php?id=$row[id]\">Edit</a> 
                        | <a class='btn btn-danger btn-sm' href=\"delete.php?id=$row[id]\" onclick=\"return confirm('Are you sure want to delete?')\">Delete</a></td>";
            }

        ?>
    </table>
</div>
</body>
</html>

