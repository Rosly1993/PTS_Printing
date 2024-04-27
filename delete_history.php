<?php
error_reporting(0);
require_once("db-connect.php");
if(!isset($_GET['id'])){
    echo "<script> alert('Undefined History ID');location.replace('./?page=history') </script>";
    $conn->close();
    exit;
}

$id = $_GET['id'];
$delete = $conn->query("DELETE FROM `history` where id = '{$id}'");
if($delete){
    $_SESSION['message']['status'] = 'success';
    $_SESSION['message']['text'] = " History Data has been deleted successfully.";
    echo "<script> location.replace('./?page=history'); </script>";

}else{
    echo "<pre>";
    echo ' An error occured. Error: '.$conn->error.'<br>';
    echo "</pre>";
}
