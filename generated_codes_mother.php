<?php 
require 'vendor/autoload.php'; 
require 'phpqrcode/qrlib.php'; 
include('db_main.php');

// session_start();  // Ensure session is started for using $_SESSION

if(isset($_GET['id'])) {
    $_SESSION['ids'] = [$_GET['id']];
}

if(!isset($_SESSION['ids'])) {
    echo "<script> alert('Unknown generated Codes'); location.replace('./'); </script>";
    exit;
}

if(!is_dir('qr_temp_mother/')) {
    mkdir('qr_temp_mother/');
}

$tempDir = 'qr_temp_mother/'; 
?><style>
* {
  box-sizing: border-box;
}

.row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 50%;
  padding: 5px;
}



/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 98%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
<style>
.qrcode {
    width: 250px; /* Adjust this value to resize the QR code */
    height: auto;

}
</style>
<style>
@media print {
    @page {
        size: A6 landscape; /* Specify the paper size, e.g., A4 portrait or landscape */
        /* You can also specify other properties like margins */
        margin: 20mm; /* Adjust the margin as needed */
    }
}
</style>
<div class="container-fluid">
    <div class="card shadow rounded">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-10">
                    <h3 class="fw-bold">Generated QRCodes</h3>
                </div>
                <div class="col-2 text-end">
                    <button class="btn btn-success rounded-0" type="button" id="print"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container-fluid" id="outprint">
               
                <?php
                $history = $conn1->query("SELECT * FROM `tbl_palletserial` WHERE id IN (".implode(',', $_SESSION['ids']).") ORDER BY id");
                while($row = $history->fetch_assoc()):
                    for($i = 0; $i < $row['copies']; $i++):
                        if(!is_file($tempDir.$row['id'].'.png'))
                            QRcode::png($row['lotserial'], $tempDir.$row['id'].'.png', QR_ECLEVEL_L, 5);
                ?>
                <div class="card rounded-0 border-dark">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                            
                            <div class="row">
                            <div class="column">
                                <table class='table-responsive'>
                                <tr>
                                <td style="text-align: center"><img src="<?= $tempDir.$row['id'].'.png' ?>" class="img-fluid qrcode" alt="QR Code"></td>
                                </tr>
                                
                                </table><br>
                            </div>
                            <div class="column">
                                <table class='table-responsive'  style="font-size: 10px">
                                
                                <tr><th>Lot Serial</th><td> <?= $row['lotserial'] ?></td></tr>
                                <tr><th>Model</th><td> <?= $row['model'] ?></td></tr>
                                <tr><th>Cavity</th><td> <?= $row['cavity'] ?></td></tr>
                                <tr><th>Quantity</th><td> <?= $row['quantity'] ?></td></tr>
                                </table>
                            </div>
                            </div>
                            </div>
                         
                            
                        </div>
                    </div>
                </div>
                <div class="clear-fix my-1" style="border-top:2px dashed"></div>
                <?php endfor; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<script src="js/generated_codes.js"></script> 