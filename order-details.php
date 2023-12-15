<?php session_start();
error_reporting(0);
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
        <title>Ayunae | Order Details</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/logo-nobg.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/jquery.min.js"></script>
        <script language="javascript" type="text/javascript">
            var popUpWin=0;
            function popUpWindow(URLStr, left, top, width, height)
            {
            if(popUpWin)
            {
            if(!popUpWin.closed) popUpWin.close();
            }
            popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
            }
        </script>
    </head>
    <style type="text/css"></style>
    <style>
        header {
            margin-bottom: -100px; /* Adjust the value as needed */
        }

        section {
            margin-top: -100px; /* Adjust the value as needed */
        }

        .btn1 {
            margin-top: 2%;
            margin-left: 30%;
            color: #fff;
            background-color:  #c28163;
            border-color: #c28163;
        }

        .btn1:hover , .btn1:active {
            color: #fff;
            background-color: #654321;
            border-color: #c28163;
        }

        .btn2 {
            margin-left: 40%;
            color: #fff;
            background-color:  #AA4A44; 
            border-color: #AA4A44;
        }

        .btn2:hover , .btn2:active {
            color: #fff;
            background-color: #D2042D; 
            border-color: #AA4A44;
    }
    </style>
    <body>
<?php include_once('includes/header.php');?>    
        <!-- Header-->
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-black">
                    <?php 
                        $uid=$_SESSION['id'];
                        $query=mysqli_query($con,"select * from users where id='$uid'");
                        while($result=mysqli_fetch_array($query)){
                    ?>
                    <h1 class="h2" style="color:#c28163"><i><?php echo htmlentities($result['name']);}?>'s Orders</i></h1>
                    <h1 class="display-6">#<?php echo intval($_GET['onumber']);?> Order Details</h1>
                </div>
            </div>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4  mt-5">
                <h3><strong>Order Details</strong></h3>
                <hr />
                    <?php
                $uid=$_SESSION['id'];
                $orderno=intval($_GET['onumber']);
                $ret=mysqli_query($con,"select *,orders.id as orderid from orders 
                left join addresses on addresses.id=orders.addressId
                    where orders.userId='$uid' and orders.orderNumber='$orderno'");
                while ($row=mysqli_fetch_array($ret)) {?>
                <div class="row">
                <div class="col-6">
                    <table class="table table-bordered" border="1">
                <tr>
                    <th>Order Number</th>
                    <td><?php echo htmlentities($row['orderNumber']);?></td>
                </tr>
                <tr>
                    <th>Order Date</th>
                    <td><?php echo htmlentities($row['orderDate']);?></td>
                </tr>
                <tr>
                    <th>Total Amount</th>
                    <td>RM<?php echo htmlentities($row['totalAmount']);?></td>
                </tr>
                <tr>
                    <th>Transaction Type</th>
                    <td><?php echo htmlentities($row['txnType']);?></td>
                </tr>
                <tr>
                    <th>Transaction Number</th>
                    <td><?php echo htmlentities($row['txnNumber']);?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><?php $ostatus=$row['orderStatus'];
                                    if( $ostatus==''): echo "Not Processed Yet";
                                        else: echo $ostatus; endif;?>
                                            <br />
                                            <button class="btn-upper btn btn1"
                                                    onclick="popUpWindow('track-order.php?oid=<?php echo $row['orderid'];?>');">
                                                Track Order
                                            </button>
                                        </td>
                </tr>
                    </table>
                </div>
                <div class="col-6">
                    <table class="table table-bordered" border="1">
                <tr>
                    <th>Billing Address</th>
                    <td><address><?php echo htmlentities($row['billingAddress']);?><br />
                <?php echo htmlentities($row['biilingCity']);?>, <?php echo htmlentities($row['billingState']);?><br />
                <?php echo htmlentities($row['billingPincode']);?>, <?php echo htmlentities($row['billingCountry']);?> 
                </address>
                    </td>
                </tr>
                <tr>
                    <th>Shipping Address</th>
                    <td><address><?php echo htmlentities($row['shippingAddress']);?><br />
                <?php echo htmlentities($row['shippingCity']);?>, <?php echo htmlentities($row['shippingState']);?><br />
                <?php echo htmlentities($row['shippingPincode']);?>, <?php echo htmlentities($row['shippingCountry']);?>
                </address>
                    </td>
                </tr>
                <tr><td colspan="2"><a href="javascript:void(0);" onClick="popUpWindow('cancelorder.php?oid=<?php echo $row['orderid'];?>');" title="Cancel Order" class="btn-upper btn btn2">Cancel Order
                </a></td></tr>
                    </table>
                </div>

                </div>
                <?php } ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4"><h3><strong>Order Products Details</strong></h3></th>
                                </tr>
                            </thead>
                            <tr>
                                <thead>
                                    <th><h5>Product</h5></th>
                                    <th><h5>Product Name</h5></th>
                                    <th><h5>Product Price</h5></th>
                                    <th><h5>Quantity</h5></th>
                                    <th><h5>Total Amount</h5></th>
                                </thead>
                            </tr>
                            <tbody>
                <?php
                $ret=mysqli_query($con,"select products.productName as pname,products.productName as proid,products.productImage1 as pimage,products.productPrice as pprice,ordersdetails.productId as pid,ordersdetails.id as cartid,products.productPriceBeforeDiscount,ordersdetails.quantity from ordersdetails join products on products.id=ordersdetails.productId where ordersdetails.userId='$uid'  and ordersdetails.orderNumber='$orderno'");
                $num=mysqli_num_rows($ret);
                    if($num>0)
                    {
                while ($row=mysqli_fetch_array($ret)) {

                ?>

                                <tr>
                                    <td class="col-md-2"><img src="admin/productimages/<?php echo htmlentities($row['pimage']);?>" alt="<?php echo htmlentities($row['pname']);?>" width="100" height="170"></td>
                                    <td>
                                    <a href="product-details.php?pid=<?php echo htmlentities($pd=$row['pid']);?>"><?php echo htmlentities($row['pname']);?></a></td>
                <td>
                                        <span class="text-decoration-line-through">RM<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
                                            <span>RM<?php echo htmlentities($row['pprice']);?></span>
                                    </td>
                                    <td><?php echo htmlentities($row['quantity']);?></td>
                                    <td>RM<?php echo htmlentities($totalamount=$row['quantity']*$row['pprice']);?></td>
                        
                                </tr>
                            
                                <?php $grantotal+=$totalamount; } ?>
                <tr>
                    <th colspan="4"><h5><strong>Grand Total</strong></h5></th>
                    <th colspan="2">RM<?php echo $grantotal;?></th>
                </tr>
                                <?php } else{ ?>
                                <tr>
                                    <td style="font-size: 18px; font-weight:bold; color:red;">Invalid Request

                                    </td>

                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                            
                            </div>

                
                </div>
        </section>
        <!-- Track Order Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
        <!-- Footer-->
   <?php include_once('includes/footer.php'); ?>
        <!-- Custom core JS-->
        <script src="js/custom.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>


</html>
<?php } ?>
