<?php
$pdo=new PDO('mysql:host=localhost;port=3306;
dbname=bookstore','root', '');

$databaseHost = 'localhost';
$databaseName = 'bookstore';
$databaseUsername = 'root';
$databasePassword = '';

//Create connection
$mysqli = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);
                                    

//create connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);

}
?>