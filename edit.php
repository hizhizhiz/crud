<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 17.03.2018
 * Time: 17:43
 */
require_once 'config.php';

if (isset($_POST['update']))
{
    $id = $_POST['id'];

    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    if (empty($_POST['name']) || empty($_POST['age']) || empty($_POST['email']))
    {
        if (empty($_POST['name']))
        {
            echo "<div class='container'><span>Name field is empty.</span></div>";
        }
        if (empty($_POST['age']))
        {
            echo "<div class='container'><span>Age field is empty.</span></div>";
        }
        if (empty($_POST['email']))
        {
            echo "<div class='container'><span>Email field is empty.</span></div>";
        }
    } else
    {
        try
        {
            $sql = "UPDATE crud.users SET name=:name, age=:age, email=:email WHERE id = '$id'";
            $query = $pdo->prepare($sql);
            $query->execute(array(':name' => $name, ':age' => $age, ':email' => $email));

            echo "<div class='container'><span>Data has been successfully updated.</span></div>";

        } catch (PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
<?php
if (isset($_GET['id']))
{
    $id = $_GET['id'];

    try
    {
        $sql = "SELECT * FROM crud.users WHERE id = '$id' ";

        foreach ($pdo->query($sql) as $row)
        {
            $name = $row['name'];
            $age = $row['age'];
            $email = $row['email'];
        }
    }catch (PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edit Data</title>
</head>
<body>
<div class="container">
    <br>
    <a class="btn btn-outline-primary btn-lg" href="index.php">Home</a>

    <form action="edit.php" name="form1" method="post">
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age" value="<?php echo $age; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td>
                <td><input class="btn btn-success" type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
