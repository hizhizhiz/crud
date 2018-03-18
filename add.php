<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 17.03.2018
 * Time: 17:42
 */
require_once 'config.php';

if (isset($_POST['Submit']))
{
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

        echo "<a class='btn btn-primary btn-sm' href='javascript: history.back()'>Back</a>";
    } else
    {
        try {
            $sql = "INSERT INTO crud.users (name, age, email) VALUES (:name, 
                    :age, :email)";
            $query = $pdo->prepare($sql);
            $query->execute(array(':name' => $name, ':age' => $age, ':email' => $email));

            echo "Data added successfully.<br>";
            echo "<a href='index.php'>Home</a>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}