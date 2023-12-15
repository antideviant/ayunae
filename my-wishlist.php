<?php session_start();
error_reporting(0);
include_once('includes/config.php');
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{
// Code forProduct deletion from  wishlist  
if(isset($_GET['del']))
{
$wid=intval($_GET['del']);
$query=mysqli_query($con,"delete from wishlist where id='$wid'");
 echo "<script>alert('Product deleted from wishlist.');</script>";
echo "<script type='text/javascript'> document.location ='my-wishlist.php'; </script>";

}

//Move the product from wishlist to car
if($_GET['id']){
 $wid=$_GET['id'] ;
$sql="insert into cart(userID,productId,productQty) select userId,productId,'1' from wishlist where id='$wid';";
$sql.="delete from  wishlist where id='$wid'";
$result = mysqli_multi_query($con, $sql);
if ($result) {
     echo "<script>alert('Product moved into the cart');</script>";
     echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
 }}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ayunae | My Wishlist</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets\logo-nobg.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/jquery.min.js"></script>
    </head>
            <script>
function emailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-email-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<style type="text/css"></style>
    <body>
<?php include_once('includes/header.php');?>
        <!-- Header-->
       <!--  <header class="py-1">
            <div class="container px-2 px-lg-1 my-4">

                <div class="text-center ">
                    <h1 class="display-4 fw-bolder">Wishlist</h1>
                       <h5 class="display-10 fw-bolder">ayunae.co</h5>
        
                </div>
            </div>
        </header>
     Section
        <section class="py-5">
            <div class="container px-4  mt-5"> -->
     

<div class="container custom-container" style="padding: 5%; padding-top: 0; padding-bottom: 0;">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary" style="margin: 10%; padding: 5%; border: 2px solid #c28163; border-radius: 15px; box-shadow: 0px 0px 5px #654321;">
                <div class="card-body">

    <div class="table-responsive" style="margin-top: 0;">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="4"><h4><?php 
                    $uid=$_SESSION['id'];
                    $query=mysqli_query($con,"select * from users where id='$uid'");
                    while($result=mysqli_fetch_array($query)){
                ?>
                <h1><?php echo htmlentities($result['name']);?>'s Wishlist</h1>
                <br>
                <?php } ?></h4></th>
                </tr>
            </thead>

             
            <tbody>



<?php
$uid=$_SESSION['id'];
$ret=mysqli_query($con,"select products.productName as pname,products.productName as proid,products.productImage1 as pimage,products.productPrice as pprice,wishlist.productId as pid,wishlist.id as wid,products.productPriceBeforeDiscount from wishlist join products on products.id=wishlist.productId where wishlist.userId='$uid'");
$num=mysqli_num_rows($ret);
    if($num>0)
    {
while ($row=mysqli_fetch_array($ret)) {

?>

                <tr>
                    <td class="col-md-2"><img src="admin/productimages/<?php echo htmlentities($row['pimage']);?>" alt="<?php echo htmlentities($row['pname']);?>" width="100" height="130"></td>
                    <td class="col-md-6">
                        <div class="product-name"><a href="product-details.php?pid=<?php echo htmlentities($pd=$row['pid']);?>"><?php echo htmlentities($row['pname']);?></a></div>
                           <span class="text-decoration-line-through">RM<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
                            <span>RM<?php echo htmlentities($row['pprice']);?></span>
                    </td>
                    <td>
                        <a href="my-wishlist.php?action=movetocart&id=<?php echo $row['wid']; ?>" class="btn-upper btn btn-primary btn1">Add to Cart</a>
                    </td>
                    <td>
                        <a href="my-wishlist.php?del=<?php echo htmlentities($row['wid']);?>" onClick="return confirm('Are you sure you want to delete?')" class="btn-upper btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } } else{ ?>
                <tr>
                    <td style="font-size: 18px; font-weight:bold ">Your Wishlist is Empty</td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
              
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
        margin-bottom: -80px;
    }

    .btn1 {
        color: #fff;
        background-color:  #c28163;
        border-color: #c28163;
    }

    .btn1:hover , .btn1:active {
        color: #c28163;
        background-color: #fff;
        border-color: #c28163;
    }
    </style>
</html>
<?php } ?>
