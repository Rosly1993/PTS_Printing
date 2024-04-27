<?php 
require_once('db-connect.php');
include('db_main.php');
 ?>
<?php 
$page = isset($_GET['page']) ? $_GET['page'] : 'form';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parts Traceability System Printing</title>
    <link rel="icon" href="img/favicon.png" type="image/png' ">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/custom.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
         
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.5/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.css" rel="stylesheet">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.5/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/datatables.min.js"></script>

</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient" id="topNavBar">
        <div class="container">
            <!-- <a class="navbar-brand" href="#">
            Parts Traceability System Printing
            </a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= $page =='form' ? 'active' : '' ?>" aria-current="page" href="./">Sublot QRCode</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page =='history' ? 'active' : '' ?>" aria-current="page" href="./?page=history">Sublot QRCode History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page =='form_mother' ? 'active' : '' ?>" aria-current="page" href="./?page=form_mother">Pallet QRCode</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page =='history_mother' ? 'active' : '' ?>" aria-current="page" href="./?page=history_mother">Pallet QRCode History</a>
                    </li>
                </ul>
            <div>
                <b class="text-light">Parts Traceability System Printing &nbsp; <img src="img/PTS_LOGO.png" height="70px" width="55px"></b>
            </div>
        </div>
    </nav>
    <div class="container py-5" id="page-container">
        <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?= $_SESSION['message']['status'] ?>">
            <div class="row align-items-center">
                <div class="col-11">
                    <p class="m-0">
                        <?php if($_SESSION['message']['status'] == 'success'): ?>
                            <i class="fa fa-check"></i>
                        <?php else: ?>
                            <i class="fa fa-exclamation-triangle"></i>
                        <?php endif; ?>
                        <?= $_SESSION['message']['text'] ?>
                    </p>
                </div>
                <div class="col-1 text-end">
                    <button class="btn-close" type="button" onclick="$(this).closest('.alert').hide('slideUp')"></button>
                </div>
            </div>
        </div>
        <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <?php include($page.'.php') ?>
    </div>

<?php 
if(isset($conn)) $conn->close();
?>
</body>

</html>