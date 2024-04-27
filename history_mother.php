
<?php include('controller/history_mother.php'); ?>

<div class="container-fluid">
    <div class="card shadow rounded-0">
        <div class="card-header">
            <h3 class="fw-bold">Pallet QRCodes History</h3>
        </div>
        <div class="card-body">
            <div class="container-flui">
            <form method='post' action=''>
            
            <input type='date' name='date_add'  style='border-radius:5px;padding: 8px;width:180px' value="<?php echo isset($_POST['date_add']) ? $_POST['date_add'] : ''; ?>" required >&nbsp;&nbsp;
            <button name="search_qr" style='border-radius:5px;padding: 8px;width:50px;background-color: #90D26D'><span class="fa fa-search"></span></button>
            </form>
              
                <table style="margin-top:10px" class="table table-bordered table-striped" id="myTable">
              
                    <thead><br>
                        <tr class="bg-gradient bg-primary text-light">
                            <th>#</th>
                            <th>DateTime</th>
                            <th>QR Code</th>
                            <th>Model</th>
                            <th>Cavity</th>
                            <th>Quantity</th>
                            <th>Copies</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 

                            $i = 1;
                            while($row = $history->fetch_array()):
                       
                       ?>
                        <tr>
                            <td class="px-2 py-1"><?= $i++; ?></td>
                            <td class="px-2 py-1"><?= date("Y-m-d",strtotime($row['date_created'])) ?></td>
                            <td class="px-2 py-1"><?= $row['lotserial'] ?></td>
                            <td class="px-2 py-1"><?= $row['model'] ?></td>
                            <td class="px-2 py-1"><?= $row['cavity'] ?></td>
                            <td class="px-2 py-1"><?= $row['quantity'] ?></td>
                            <td class="px-2 py-1"><?= $row['copies'] ?></td>
                            <td class="px-2 py-1 text-center align-middle">
                                <div class="dropdown">
                                    <button class="btn btn-light border rounded-0 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="./?page=generated_codes&id=<?= $row['id'] ?>">View</a></li>
                                        <!-- <div class="dropdown-divider"></div>  -->
                                        <!-- <li><a class="dropdown-item delete-history" href="javascript:void(0)" data-id="<?= $row['id'] ?>">Delete</a></li> -->
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

      
<script src="js/history.js"></script> 

