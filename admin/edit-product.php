<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {
//For Adding Products
if(isset($_POST['submit']))
{

    $pid=intval($_GET['id']);
    $category=$_POST['category'];
    $subcat=$_POST['subcategory'];
    $productname=$_POST['productName'];
    $productsize=$_POST['productSize'];
    $productprice=$_POST['productprice'];
    $productpricebd=$_POST['productpricebd'];
    $productdescription=$_POST['productDescription'];
    $productscharge=$_POST['productShippingcharge'];
    $productavailability=$_POST['productAvailability'];
    $updatedby=$_SESSION['aid'];

$sql=mysqli_query($con,"update products set category='$category',subCategory='$subcat',productName='$productname',productSize='$productsize',productSize='$productsize',productPrice='$productprice',productDescription='$productdescription',shippingCharge='$productscharge',productAvailability='$productavailability',productPriceBeforeDiscount='$productpricebd',lastUpdatedBy='$updatedby' where id='$pid'");
echo "<script>alert('Product details updated successfully');</script>";
echo "<script>window.location.href='manage-products.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Ayunae | Edit Product Details</title>
        <link rel="icon" type="image/x-icon" href="assets\img\logo-nobg.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
   <script>
function getSubcat(val) {
    $.ajax({
    type: "POST",
    url: "get_subcat.php",
    data:'cat_id='+val,
    success: function(data){
        $("#subcategory").html(data);
    }
    });
}
</script>   

    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><strong>Edit Product Details</strong></h1>
                        
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php"  style="color: brown;">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Product Details</li>
                        </ol>
                     
                      <div class="container custom-container" style="padding: 5%; padding-top: 0; padding-bottom: 0;">
                           <div class="login-box">
                            <!-- /.login-logo -->
                            <div class="card card-outline card-primary" style="height: 1880px; margin: 10%; padding: 2%; border: 2px solid #c28163; border-radius: 10px; box-shadow: 0px 0px 5px #c28163;">
                            <div class="card-body">


<?php 
$pid=intval($_GET['id']);
$query=mysqli_query($con,"select products.id as pid,products.productImage1,products.productImage2,products.productImage3,products.productName,category.categoryName,subcategory.subcategoryName as subcatname,products.postingDate,products.updationDate,subcategory.id as subid,tbladmin.username,category.id as catid,products.productSize,products.productPrice,products.productPriceBeforeDiscount,products.productAvailability,products.productDescription,products.shippingCharge from products join subcategory on products.subCategory=subCategory.id join category on products.category=category.id join tbladmin on tbladmin.id=products.addedBy where  products.id='$pid' order by pid desc");
while($row=mysqli_fetch_array($query))
{
?>                                 
                <form  method="post" enctype="multipart/form-data">                                
                <div class="row">
                <div class="col-4">Category Name</div>
                <div class="col-6">
                <select name="category" id="category" class="form-control" onChange="getSubcat(this.value);" required>
                <option value="<?php echo htmlentities($row['catid']);?>"><?php echo htmlentities($row['categoryName']);?></option> 
                <?php $ret=mysqli_query($con,"select * from category");
                while($result=mysqli_fetch_array($ret))
                {?>

                <option value="<?php echo $result['id'];?>"><?php echo $result['categoryName'];?></option>
                <?php } ?>
                </select>    
                </div>
                </div>

                <div class="row" style="margin-top:1%;">
                <div class="col-4">Sub-Category name</div>
                <div class="col-6"><select   name="subcategory"  id="subcategory" class="form-control" required>
                    <option value="<?php echo htmlentities($row['subid']);?>"><?php echo htmlentities($row['subcatname']);?>
                </select>
                </div>
                </div>

                <div class="row" style="margin-top:1%;">
                <div class="col-4">Product Name</div>
                <div class="col-6"><input type="text"    name="productName"  value="<?php echo htmlentities($row['productName']);?>" class="form-control" required>
                </select>
                </div>
                </div>

                <div class="row" style="margin-top:1%;">
                <div class="col-4">Product Size</div>
                <div class="col-6"><input type="text"    name="productSize"  value="<?php echo htmlentities($row['productSize']);?>" class="form-control" required>
                </select>
                </div>
                </div>

                <div class="row" style="margin-top:1%;">
                <div class="col-4">Product Price Before Discount (RM)</div>
                <div class="col-6"><input type="text"    name="productpricebd"  value="<?php echo htmlentities($row['productPriceBeforeDiscount']);?>" class="form-control" required>
                </select>
                </div>
                </div>

                <div class="row" style="margin-top:1%;">
                <div class="col-4">Product Price After Discount (RM)</div>
                <div class="col-6"><input type="text"    name="productprice"  value="<?php echo htmlentities($row['productPrice']);?>" class="form-control" required>
                </select>
                </div>
                </div>

                <div class="row" style="margin-top:1%;">
                <div class="col-4">Product Description</div>
                <div class="col-6"><textarea  name="productDescription"  placeholder="Enter Product Description" rows="6" class="form-control"><?php echo $row['productDescription'];?></textarea>
                </div>
                </div>

                <div class="row" style="margin-top:1%;">
                <div class="col-4">Product Shipping Charge (RM)</div>
                <div class="col-6"><input type="text"    name="productShippingcharge"  value="<?php echo htmlentities($row['shippingCharge']);?>" class="form-control" required>
                </select>
                </div>
                </div>

                <div class="row" style="margin-top:1%;">
                <div class="col-4">Product Availability</div>
                <div class="col-6"><select   name="productAvailability"  id="productAvailability" class="form-control" required>
                <?php $pa=$row['productAvailability'];
                if($pa=='In Stock'):
                ?>
                <option value="In Stock">In Stock</option>
                <option value="Out of Stock">Out of Stock</option>
                <?php else: ?>
                <option value="Out of Stock">Out of Stock</option>    
                <option value="In Stock">In Stock</option>
                <?php endif; ?>
                </select>
                </select>
                </div>
                </div>

                <div class="row" style="margin-top:1%;">
                <div class="col-4">Product Featured Image</div>
                <div class="col-6"><img src="productimages/<?php echo htmlentities($row['productImage1']);?>" width="250"><br />
                    <a href="change-image1.php?id=<?php echo $row['pid'];?>" style="color:#c28163;">Change Image</a>
                </div>
                </div>

                <div class="row" style="margin-top:1%;">
                <div class="col-4">Product Image 2</div>
                <div class="col-6"><img src="productimages/<?php echo htmlentities($row['productImage2']);?>" width="250"><br />
                    <a href="change-image2.php?id=<?php echo $row['pid'];?>" style="color:#c28163;">Change Image</a>
                </div>
                </div>


                <div class="row" style="margin-top:1%;">
                <div class="col-4">Product Image 3</div>
                <div class="col-6"><img src="productimages/<?php echo htmlentities($row['productImage3']);?>" width="250"><br />
                    <a href="change-image3.php?id=<?php echo $row['pid'];?>" style="color:#c28163;">Change Image</a>
                </div>
                </div>

                <div class="row mt-3">
                            <div class="col-6">
                                 <button type="submit" name="submit" class="btn btn-info btn-block btn-lg btn1">Update</button>
                           </div>
                   </div>

                </form>
      
      <?php } ?>            
                        </div>
                    </div>
                </div>
                        </div>
                    </div>
                </main>
          <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="js/custom.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php } ?>

<style>

      .custom-container {
        margin-top: -80px; /* Adjust the value as needed */
        margin-bottom: -10px;
        margin-left: -180px; /* Add this line to move the container to the left */
        padding-bottom: 0; /* Add this line to remove the left padding */
        padding-right: 0; /* Add this line to remove the right padding */
    }

    .btn1 {
        margin-top: 20px;
        margin-left: 350px; /* Modify this value to adjust the left margin of the button */
        color: #fff;    
        background-color:  #b76e79;
        border-color: #b76e79;
    }

    .btn1:hover, .btn1:active {
        color: #b76e79;
        background-color: #fff;
        border-color: #b76e79;
    }
    </style>