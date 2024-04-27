<?php
session_start();
$host     = 'localhost';
$username = 'root';
$password = '';
$dbname   ='db_parts';

$conn = new mysqli($host, $username, $password, $dbname);
if(!$conn){
    die("Cannot connect to the database.". $conn->error);
}