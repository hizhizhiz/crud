<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 17.03.2018
 * Time: 17:40
 */
$server = 'mysql:host = localhost; dbname = crud';
$name = 'hizhizhiz';
$pass = 'admadm';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try
{
    $pdo = new PDO ($server, $name, $pass, $options);

} catch (PDOException $e)
{
    echo "Error: " . $e->getMessage();
}

