

<?php
include('db_main.php');

 if (isset($_POST['search_qr'])) {

    $date_search = $_POST['date_add'];


    $history = $conn1->query("SELECT * FROM `tbl_sublotserial` where date_created = '$date_search' order by unix_timestamp(date_created) desc"); 
                        

}else{

    $datenow = date('Y-m-d');
    $history = $conn1->query("SELECT * FROM `tbl_sublotserial` where date_created = '$datenow' order by unix_timestamp(date_created) desc"); 
}
?>