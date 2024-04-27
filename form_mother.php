
<?php
include('db_main.php');
$query_serial = $conn1->query("SELECT id,model,cavity,mother_serial, sum(quantity) as quantity  FROM `tbl_serial_printing` where  mother_serial is not null and mother_lot_serial_generated is null group by mother_serial ");
?>
 

<div class="card rounded-0 shadow">
    <div class="card-header">
        <h3><b>Generate Printable Pallet QRCodes</b></h3>
    </div>
    <div class="card-body">
        <div class="container">
        <form id="code-form" method="POST">
    <table style="margin-top: 10px" class="table" id="myTable">
        <thead>
            <tr class="bg-gradient bg-primary text-light">
                <th>Model</th>
                <th>Cavity</th>
                <th>QR Code</th>
                <th>Quantity</th>
              
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($query_serial)) { ?>  
                <tr>
                    <td><input type="text" class="form-control form-control-sm w-100" name="barcode" value='<?php echo $row['model']; ?>' required readonly></td>
                    <td><input type="cavity" class="form-control form-control-sm w-100" name="code_type"  value='<?php echo $row['cavity']; ?>' required readonly></td>
                    <td><input type="text" class="form-control form-control-sm w-100" name="qrcode" value="<?php echo $row['mother_serial']; ?>" required readonly></td>
                    <td><input type="text" max-length="50" class="form-control form-control-sm w-100" name="text" value="<?php echo $row['quantity']; ?>" required readonly></td>

                    <!-- Add the class and data-id attribute to the button -->
                    <td class="px-1 py-1 text-center"><button style="border-radius: 5px; background-color:#007F73"><a href="save_code_mother.php?id=<?php echo $row["id"]; ?>&&model=<?php echo $row["model"]; ?>&&cavity=<?php echo $row["cavity"]; ?>&&quantity=<?php echo $row["quantity"]; ?>&&sublot_serial=<?php echo $row["mother_serial"]; ?>" style="text-decoration: none;color: white">Generate QR</a></button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</form>

     </div>
    </div>
   
    <script src="js/form.js"></script> 