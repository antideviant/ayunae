<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else { 
//Dashboard COunt
$ret=mysqli_query($con,"select count(id) as totalorders,
count(if((orderStatus='' || orderStatus is null),0,null)) as neworders,
count(if(orderStatus='Packed', 0,null)) as packedorders,
count(if(orderStatus='Dispatched',  0,null)) as dispatchedorders,
count(if(orderStatus='In Transit',  0,null)) as intransitorders,
count(if(orderStatus='Out For Delivery', 0,null)) as outfdorders,
count(if(orderStatus='Delivered', 0,null)) as deliveredorders,
count(if(orderStatus='Cancelled', 0,null)) as cancelledorders
from orders;");
$results=mysqli_fetch_array($ret);
$torders=$results['totalorders'];
$norders=$results['neworders'];
$porders=$results['packedorders'];
$dtorders=$results['dispatchedorders'];
$intorders=$results['intransitorders'];
$otforders=$results['outfdorders'];
$deliveredorders=$results['deliveredorders'];
$cancelledorders=$results['cancelledorders'];
//COde for Registered users
$ret1=mysqli_query($con,"select count(id) as totalusers from users;");
$results1=mysqli_fetch_array($ret1);
$tregusers=$results1['totalusers'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ayunae | Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets\img\logo-nobg.png" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><strong>Dashboard</strong></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active" style="color: brown;">Dashboard</li>
                        </ol>
           <div class="row">
                            <div class="col-lg-6 col-xl-3 mb-4">
                                <div class="card bg-primary text-white h-100 c1">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="me-3">
                                                <div class="text-white-75 small">Total Orders</div>
                                                <div class="text-lg fw-bold"><?php echo $torders; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                        <a class="text-black stretched-link" href="all-orders.php">View Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3 mb-4">
                                <div class="card bg-danger text-white h-100 c2">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="me-3">
                                                <div class="text-white-75 small">New Orders</div>
                                                <div class="text-lg fw-bold"><?php echo $norders; ?></div>
                                            </div>
                                 
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                        <a class="text-black stretched-link" href="new-order.php">View Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3 mb-4">
                                <div class="card bg-warning text-white h-100 c3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="me-3">
                                                <div class="text-white-75 small">Packed Orders</div>
                                                <div class="text-lg fw-bold"><?php echo $porders; ?></div>
                                            </div>
                                   
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                        <a class="text-black stretched-link" href="packed-orders.php">View Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3 mb-4">
                                <div class="card bg-secondary text-white h-100 c4">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="me-3">
                                                <div class="text-white-75 small">Dispatched Orders</div>
                                                <div class="text-lg fw-bold"><?php echo $dtorders; ?></div>
                                            </div>
    
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                        <a class="text-black stretched-link" href="dispatched-orders.php">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
<!-------------------------------------->
     <div class="row">
                            <div class="col-lg-6 col-xl-3 mb-4">
                                <div class="card bg-warning text-white h-100 c5">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="me-3">
                                                <div class="text-white-75 small">In Transit Orders</div>
                                                <div class="text-lg fw-bold"><?php echo $intorders; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                        <a class="text-black stretched-link" href="intransit-orders.php">View Details</a>
                              
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3 mb-4">
                                <div class="card bg-primary text-white h-100 c6">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="me-3">
                                                <div class="text-white-75 small">Out for Delivery Orders</div>
                                                <div class="text-lg fw-bold"><?php echo $otforders; ?></div>
                                            </div>
                                 
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                        <a class="text-black stretched-link" href="outfordelivery-orders.php">View Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3 mb-4">
                                <div class="card bg-success text-white h-100 c7">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="me-3">
                                                <div class="text-white-75 small">Delivered Orders</div>
                                                <div class="text-lg fw-bold"><?php echo $deliveredorders; ?></div>
                                            </div>
                                   
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                        <a class="text-black stretched-link" href="delivered-orders.php">View Details</a>
                                    </div>
                                </div>
                            </div>
                               <div class="col-lg-6 col-xl-3 mb-4">
                                <div class="card bg-danger text-white h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="me-3">
                                                <div class="text-white-75 small">Cancelled Orders</div>
                                                <div class="text-lg fw-bold"><?php echo $cancelledorders; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                        <a class="text-black stretched-link" href="cancelled-orders.php">View Details</a>
                                    </div>
                                </div>
                                </div>
                            
                        </div>
                        <!-------------->
                        <div class="row">
                            <div class="col-lg-6 col-xl-3 mb-4">
                                <div class="card bg-black text-white h-100 c9">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="me-3">
                                                <div class="text-white-75 small">Registered Users</div>
                                                <div class="text-lg fw-bold"><?php echo $tregusers; ?></div>
                                            </div>
    
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                        <a class="text-black stretched-link" href="registered-users.php">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!------------------>
                    </div>
                </main>
   <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="js/custom.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
    <style>
    .c1 {
        background-color: #654321 !important;
    }

    .c2 {
        background-color: #F4BD49 !important;
    }

    .c3 {
        background-color: #F3B22A !important;
    }

    .c4 {
        background-color: #F1A913 !important;
    }

    .c5 {
        background-color: #E7A10C !important;
    }

    .c6 {
        background-color: #D8960C !important;
    }

    .c7 {
        background-color: #C88B0B !important;
    }

    .c8 {
        background-color: #654321 !important;
    }

    .c9 {
        background-color: #CF8D88 !important;
    }

    .text-black {
        color: black;
        text-decoration: none;
    }

    .text-black:hover {
        color: black;
        text-decoration: none;
    }

    .text-black:focus {
        color: black;
        text-decoration: none;
    }

    .text-black:active {
        color: black;
        text-decoration: none;
    }

    .text-black:visited {
        color: grey;
        text-decoration: none;
    }

    .text-black:link {
        color: grey;
        text-decoration: none;
    }

    .text-black .stretched-link:hover {
        color: black;
        text-decoration: none;
    }

    .text-black .stretched-link:focus {
        color: black;
        text-decoration: none;
    }

    .text-black .stretched-link:active {
        color: black;
        text-decoration: none;
    }

    .text-black .stretched-link:visited {
        color: grey;
        text-decoration: none;
    }

    .text-black .stretched-link:link {
        color: grey;
        text-decoration: none;
    }

    .text-black-50 {
        color: rgba(0, 0, 0, 0.5);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0,0,0,.125);
        border-radius: .25rem;
    }

    .card > hr {
        margin-right: 0;
        margin-left: 0;
    }

    .card > .list-group:first-child .list-group-item:first-child {
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
    }

    .card > .list-group:last-child .list-group-item:last-child {
        border-bottom-right-radius: .25rem;
        border-bottom-left-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        padding: 1.25rem;
    }

    .card-title {
        margin-bottom: .75rem;
    }

    .card-subtitle {
        margin-top: -.375rem;
        margin-bottom: 0;
    }

    .card-text:last-child {
        margin-bottom: 0;
    }

    .card-link:hover {
        text-decoration: none;
    }

    .card-link+.card-link {
        margin-left: 1.25rem;
    }

    .card-header {
        padding: .75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0,0,0,.03);
        border-bottom: 1px solid rgba(0,0,0,.125);
    }

    .card-header:first-child {
        border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
    }

    .card-header+.list-group .list-group-item:first-child {
        border-top: 0;
    }

    .card-footer {
        padding: .75rem 1.25rem;
        background-color: rgba(0,0,0,.03);
        border-top: 1px solid rgba(0,0,0,.125);
    }

    .card-footer:last-child {
        border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);
    }

    .card-header-tabs {
        margin-right: -.625rem;
        margin-bottom: -.75rem;
        margin-left: -.625rem;
        border-bottom: 0;
    }

    .card-header-pills {
        margin-right: -.625rem;
        margin-left: -.625rem;
    }

    .card-img-overlay {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        padding: 1.25rem;
        border-radius: calc(.25rem - 1px);
    }

    .card-img,
    .card-img-top,
    .card-img-bottom {
        flex-shrink: 0;
        width: 100%;
    }

    .card-img,
    .card-img-top {
        border-top-left-radius: calc(.25rem - 1px);
        border-top-right-radius: calc(.25rem - 1px);
    }
    
    .card-img,
    .card-img-bottom {
        border-bottom-right-radius: calc(.25rem - 1px);
        border-bottom-left-radius: calc(.25rem - 1px);
    }

    .card-deck .card {
        margin-bottom: 1.25rem;
    }

    @media (min-width: 576px) {
        .card-deck {
            display: flex;
            flex-flow: row wrap;
            margin-right: -1.25rem;
            margin-left: -1.25rem;
        }
        .card-deck .card {
            flex: 1 0 0%;
            margin-right: 1.25rem;
            margin-bottom: 0;
            margin-left: 1.25rem;
        }
    }
    
    .card-group>.card {
        margin-bottom: 1.25rem;
    }

    .card-footer {
        padding: .75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-top: 1px solid rgba(0,0,0,.125);
    }

    .card-footer:last-child {
        border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);
    }

    .card-footer:first-child {
        border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
    }

    .card-footer .small:last-child {
        margin-bottom: 0;
    }

    .card-footer .btn {
        font-size: .875rem;
        padding: .375rem .75rem;
    }

    .card-footer .btn-group-lg>.btn,
    .card-footer .btn-lg {
        padding: .5rem 1rem;
    }

    .card-footer .btn-block {
        display: block;
    }

    .card-footer .btn-block+.btn-block {
        margin-top: .5rem;
    }

    .card-header-tabs {
        margin-bottom: -.75rem;
        border-bottom: 0;
    }

    .card-header-pills {
        margin-bottom: -.75rem;
    }

    .card-header-pills .nav-link {
        border-radius: .25rem;
    }

    .card-header-pills .nav-link.active,

    .card-header-pills .show>.nav-link {
        color: #fff;
        background-color: #343a40;
    }

    .card-header-pills .nav-link.active:focus,
    .card-header-pills .nav-link.active:hover,
    .card-header-pills .show>.nav-link:focus,
    .card-header-pills .show>.nav-link:hover {
        color: #fff;
        background-color: #23272b;
    }

    .card-img-overlay {
        padding: 0;
    }

    .card-img,
    .card-img-top,
    .card-img-bottom {
        width: 100%;
    }

    .card-img,
    .card-img-top {
        border-top-left-radius: calc(.25rem - 1px);
        border-top-right-radius: calc(.25rem - 1px);
    }

    .card-img,
    .card-img-bottom {
        border-bottom-right-radius: calc(.25rem - 1px);
        border-bottom-left-radius: calc(.25rem - 1px);
    }
    </style>
</html>
<?php } ?>
