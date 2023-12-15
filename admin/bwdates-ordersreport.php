<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ayunae | Between Dates Order Report</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets\img\logo-nobg.png" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <h1 class="mt-4"><strong>Between Dates Order Report</strong></h1>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php"  style="color: brown;">Dashboard</a></li>
                            <li class="breadcrumb-item active">Between Dates Order Report</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Between Dates Sales Report
                            </div>
                        <div class="card mb-4">
                            <div class="card-body">

<form  method="post">                                
<div class="row">
<div class="col-2">From Date</div>
<div class="col-4"><input type="date"  name="fromdate" class="form-control" required></div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">To Date</div>
<div class="col-4"><input type="date"  name="todate" class="form-control" required></div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-6" align="center"><button type="submit" name="submit" class="btn btn-primary" style="background-color: brown; border-color:brown;">Submit</button></div>
</div>
</form>
                            </div>
                        </div>
                    </div>
<?php if (isset($_POST['submit'])) { 
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
?>

<div class="card-body">
<h4 align="center" style="color:brown;"><i>Orders Report From <?php echo $fdate;?> to <?php echo $tdate;?></i></h4>
<hr />
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No.</th>
                                            <th>Order By</th>
                                            <th>Order Amount</th>
                                            <th>Order Date</th>
                                            <th>Order Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Order No.</th>
                                            <th>Order By</th>
                                            <th>Order Amount</th>
                                            <th>Order Date</th>
                                            <th>Order Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php $query=mysqli_query($con,"SELECT orders.id,orderNumber,totalAmount,orderStatus,orderDate,users.name,users.contactno 
    FROM `orders` join users on users.id=orders.userId where orderDate between '$fdate' and '$tdate'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>  

                                <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($row['orderNumber']);?></td>
                                            <td><?php echo htmlentities($row['name']);?></td>
                                            <td> <?php echo htmlentities($row['totalAmount']);?></td>
                                            <td><?php echo htmlentities($row['orderDate']);?></td>
                                            <td><?php echo htmlentities($row['orderStatus']);?></td>
                                            <td>
                                            <a href="order-details.php?orderid=<?php echo $row['id']?>" target="_blank">
                                                <i class="fas fa-file fa-2x" title="View Order Details" style="color:brown;"></i></a></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
<?php } ?>

                </main>
          <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="js/custom.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>

<style type="text/css">
    .btn1 {
        margin-top: -6px;
        margin-left: 1px; /* Modify this value to adjust the left margin of the button */
        color: #fff;
        background-color: #b76e79;
        border-color: #b76e79;
        font-size: 16px; /* Modify this value to adjust the font size of the button */
        padding: 5px 10px; /* Modify this value to adjust the padding of the button */
    }

    .btn1:hover,
    .btn1:active {
        color: #b76e79;
        background-color: #fff;
        border-color: #b76e79;
    }
</style>
