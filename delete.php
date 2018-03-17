<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 17.03.2018
 * Time: 17:43
 */
require_once 'config.php';

if (isset($_GET['id']))
{
    $id = $_GET['id'];
    try
    {
        $sql = "DELETE FROM crud.users WHERE id=:id";
        $query = $pdo->prepare($sql);
        $query->execute(array(':id' => $id));
    } catch (PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    echo "Data has been successfully deleted.";
    echo "<a href='index.php'><br>Home</a>";
}