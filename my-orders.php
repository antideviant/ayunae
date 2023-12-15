<?php session_start();
include_once('includes/config.php');
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ayunae | My Orders </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/logo-nobg.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/jquery.min.js"></script>
    </head>
<style type="text/css"></style>
    <body>
<?php include_once('includes/header.php');?>
<div class="container custom-container" style="padding: 3%; padding-top: 0; padding-bottom: 0;">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary" style="margin: 14%; padding: 5%; border: 2px solid #c28163; border-radius: 15px; box-shadow: 0px 0px 5px #654321;">
                <div class="card-body">
                <?php 
                    $uid=$_SESSION['id'];
                    $query=mysqli_query($con,"select * from users where id='$uid'");
                    while($result=mysqli_fetch_array($query)){
                ?>
                <h1><?php echo htmlentities($result['name']);?>'s Orders</h1>
                <br>
                <?php } ?>
     
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="4"><h4>My Orders</h4></th>
                    </tr>
                </thead>
                <tr>
                    <thead>
                        <th>#</th>
                        <th>Order Number </th>
                        <th>Order Date</th>
                        <th>Transaction Type</th>
                        <th>Total Amount</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </thead>
                </tr>
                <tbody>
            <?php
            $uid=$_SESSION['id'];
            $ret=mysqli_query($con,"select * from orders where userId='$uid'");
            $num=mysqli_num_rows($ret);
            $cnt=1;
                if($num>0)
                {
            while ($row=mysqli_fetch_array($ret)) {

            ?>

                <tr>
                    <td><?php echo htmlentities($cnt);?></td>
                    <td><?php echo htmlentities($row['orderNumber']);?></td>
                    <td><?php echo htmlentities($row['orderDate']);?></td>
                    <td><?php echo htmlentities($row['txnType']);?></td>
                    <td>RM<?php echo htmlentities($row['totalAmount']);?></td>
                    <td><?php $ostatus=$row['orderStatus'];
                        if( $ostatus==''): echo "Not Processed Yet";
                            else: echo $ostatus; endif;?><br />
                        </td>
                        <td><a href="order-details.php?onumber=<?php echo htmlentities($row['orderNumber']);?>" class="btn btn-info btn-block btn-lg btn1">Details</a></td>
                </tr>
                
                <?php $cnt++;}  } else{ ?>
                <tr>
                    <td style="font-size: 18px; font-weight:bold ">Not Order Yet.&nbsp;
                    <a href="shop-categories.php" class="btn-upper btn btn-warning">Continue Shopping</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
                </div>          
    </div>
                </div>
 
</div>
        </section>
   

        
        <!-- Footer-->
        <?php include_once('includes/footer.php'); ?>
        <!-- Custom core JS-->
        <script src="js/custom.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
    <style>
    .custom-container {
        margin-top: -90px; /* Adjust the value as needed */
        margin-bottom: -60px;
    }

    .btn1 {
        color: #fff;
        background-color:  #c28163; 
        border-color: #c28163;
    }

    .btn1:hover , .btn1:active {
        color: #fff;
        background-color: #654321; 
        border-color: #c28163;
    }
    </style>
</html>
<?php } ?>
