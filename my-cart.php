<?php session_start();
include_once('includes/config.php');
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{

// Code for Product deletion from  cart  
if(isset($_GET['del']))
{
$wid=intval($_GET['del']);
$query=mysqli_query($con,"delete from cart where id='$wid'");
 echo "<script>alert('Product deleted from cart.');</script>";
echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ayunae | My Cart</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets\logo-nobg.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/jquery.min.js"></script>
    </head>
    <style type="text/css"></style>
    <style>
    .btn1 {
        color: #fff;
        background-color:  #c28163;
        border-color: #c28163;
    }

    .btn1:hover , .btn1:active {
        color: #fff;
        background-color: #5C4033;
        border-color: #c28163;
    }

    .btn2 {
        color: #fff;
        background-color:  #FF9899; 
        border-color: #cf8d88;
    }

    .btn2:hover , .btn2:active {
        color: #fff;
        background-color: #cf8d88; 
        border-color: #cf8d88;
    }

    .btn3 {
        color: #fff;
        background-color:  #AA4A44; 
        border-color: #AA4A44;
    }

    .btn3:hover , .btn3:active {
        color: #fff;
        background-color: #D2042D; 
        border-color: #AA4A44;
    }
</style>
    <body>
<?php include_once('includes/header.php');?>    

        <!-- Section-->
        <section class="py-5">
            <div class="container px-4  mt-5">
     

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="4"><h1><strong>My Cart</strong></h1></th>
                </tr>
            </thead>
            <tr>
                <thead>
                    <th>Product</th>
                    <th>Product Name</th>
                    <th>Product Size</th>
                    <th>Product Price</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                    
                </thead>
            </tr>
            <tbody>
<?php
$uid=$_SESSION['id'];
$ret = mysqli_query($con, "SELECT products.productName AS pname, products.productImage1 AS pimage, products.productPrice AS pprice, cart.productId AS pid, cart.id AS cartid,cart.productSize AS proisz,products.productPriceBeforeDiscount, cart.productQty 
                           FROM cart 
                           JOIN products ON products.id = cart.productId 
                           WHERE cart.userId = '$uid'");
$num=mysqli_num_rows($ret);
    if($num>0)
    {
while ($row=mysqli_fetch_array($ret)) {

?>

                <tr>
                    <td class="col-md-2"><img src="admin/productimages/<?php echo htmlentities($row['pimage']);?>" alt="<?php echo htmlentities($row['pname']);?>" width="100" height="100"></td>
                    <td>
                       <a href="product-details.php?pid=<?php echo htmlentities($pd=$row['pid']);?>"><?php echo htmlentities($row['pname']);?></a>
                    </td>
                    <td>
                    <span><?php echo htmlentities($row['proisz']);?></span>
                    <td>
                           <span class="text-decoration-line-through">RM<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
                            <span>RM<?php echo htmlentities($row['pprice']);?></span>
                            
                    </td>
                    <td><?php echo htmlentities($row['productQty']);?></td>
                     <td>RM<?php echo htmlentities($row['productQty']*$row['pprice']);?></td>
                    <td>
                        <a href="my-cart.php?del=<?php echo htmlentities($row['cartid']);?>" onClick="return confirm('Are you sure you want to delete?')" class="btn-upper btn btn3">Delete</a>
                    </td>
                </tr>
            
                <?php } ?>
    <tr>
                    <td colspan="7" style="text-align:right;">
<a href="shop-categories.php" class="btn-upper btn btn1">Continue Shopping</a>
                        <a href="checkout.php" class="btn-upper btn btn2">Procced for Checkout</a></td>
                </tr>
                <?php } else{ ?>
                <tr>
                    <td style="font-size: 18px; font-weight:bold ">Your Cart is Empty.&nbsp;
<a href="shop-categories.php" class="btn-upper btn btn1">Continue Shopping</a>
                    </td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
              
            </div>

 
</div>
        </section>
        <br></br>
        <br></br>
        <br></br>
        <!-- Footer-->
   <?php include_once('includes/footer.php'); ?>
        <!-- Custom core JS-->
        <script src="js/custom.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php } ?>
