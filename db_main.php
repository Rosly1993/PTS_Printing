<?php

$host     = 'localhost';
$username = 'root';
$password = '';
$dbname   ='db_parts';

$conn1 = new mysqli($host, $username, $password, $dbname);
if(!$conn1){
    die("Cannot connect to the database.". $conn->error);
}
