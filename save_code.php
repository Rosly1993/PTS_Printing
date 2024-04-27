<?php
error_reporting(0);

require_once('db-connect.php');
require_once('db_main.php');



// Extract POST data
extract($_POST);
$id = $_GET['id'];
$model = $_GET['model'];
$cavity = $_GET['cavity'];
$quantity = $_GET['quantity'];
$sublot_serial = $_GET['sublot_serial'];
$copies =1;
$date=date('Y-m-d');

$sql = "INSERT INTO `tbl_sublotserial` (`model`, `cavity`, `lotserial`, `quantity`, `copies`,`date_created`) VALUES ";
$sql .= "('{$model}', '{$cavity}', '{$sublot_serial}', '{$quantity}', '{$copies}', '{$date}')";

//update main table

$update = $conn1->query("UPDATE `tbl_serial_printing` set `lot_serial_generated` = '1' where sublot_serial = '{$sublot_serial}' ");

// Execute the INSERT query
if($conn1->query($sql)){
    // If successful, set session variables
    $_SESSION['message']['status'] = 'success';
    $_SESSION['message']['text'] = 'Code is successfully generated.';
    $_SESSION['ids'] = [$conn1->insert_id];
    // Uncomment the line below if you want to redirect after successful submission
    echo "<script> location.replace('./?page=generated_codes'); </script>";
} else {
    // If failed, display error message
    echo "<pre>";
    echo 'An error occurred. Error: '.$conn1->error.'<br>';
    echo "</pre>";
}

// Close the database conn1ection
$conn1->close();
?>
