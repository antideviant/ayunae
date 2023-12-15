<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {

//For Adding Products
if(isset($_POST['submit']))
{
    $category=$_POST['category'];
    $subcat=$_POST['subcategory'];
    $productname=$_POST['productName'];
    $productsize=$_POST['productSize'];
    $productprice=$_POST['productprice'];
    $productpricebd=$_POST['productpricebd'];
    $productdescription=$_POST['productDescription'];
    $productscharge=$_POST['productShippingcharge'];
    $productavailability=$_POST['productAvailability'];
    $productimage1=$_FILES["productimage1"]["name"];
    $productimage2=$_FILES["productimage2"]["name"];
    $productimage3=$_FILES["productimage3"]["name"];
$extension1 = substr($productimage1,strlen($productimage1)-4,strlen($productimage1));
$extension2 = substr($productimage2,strlen($productimage2)-4,strlen($productimage2));
$extension3 = substr($productimage3,strlen($productimage3)-4,strlen($productimage3));
//Renaming the  image file
$imgnewfile1=md5($productimage1.time()).$extension1;
$imgnewfile2=md5($productimage2.time()).$extension2;
$imgnewfile3=md5($productimage3.time()).$extension3;
$addedby=$_SESSION['aid'];


    move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/".$imgnewfile1);
    move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/".$imgnewfile2);
    move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/".$imgnewfile3);
$sql=mysqli_query($con,"insert into products(category,subCategory,productName,productSize,productPrice,productDescription,shippingCharge,productAvailability,productImage1,productImage2,productImage3,productPriceBeforeDiscount,addedBy) values('$category','$subcat','$productname','$productsize','$productprice','$productdescription','$productscharge','$productavailability','$imgnewfile1','$imgnewfile2','$imgnewfile3','$productpricebd','$addedby')");
echo "<script>alert('Product Added added successfully');</script>";
echo "<script>window.location.href='manage-subcategories.php'</script>";
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
        <title>Ayunae | Add Product</title>
        <link rel="icon" type="image/x-icon" href="assets\img\logo-nobg.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
         <script src="js/jquery.min.js"></script>
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
                        <h1 class="mt-4"><strong>Add Product</strong></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php"  style="color: brown;">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                       
                         <div class="container custom-container" style="padding: 5%; padding-top: 0; padding-bottom: 0;">
                           <div class="login-box">
                            <!-- /.login-logo -->
                            <div class="card card-outline card-primary" style="height: 850px; margin: 10%; padding: 2%; border: 2px solid #c28163; border-radius: 10px; box-shadow: 0px 0px 5px #c28163;">
                            <div class="card-body">

            <form  method="post" enctype="multipart/form-data">                                
                    <div class="row">
                    <div class="col-4">Category Name</div>
                    <div class="col-6">
                    <select name="category" id="category" class="form-control" onChange="getSubcat(this.value);" required>
                    <option value="">Select Category</option> 
                    <?php $query=mysqli_query($con,"select * from category");
                    while($row=mysqli_fetch_array($query))
                    {?>

                    <option value="<?php echo $row['id'];?>"><?php echo $row['categoryName'];?></option>
                    <?php } ?>
                    </select>    
                    </div>
                    </div>

                    <div class="row" style="margin-top:1%;">
                    <div class="col-4">Sub-Category name</div>
                    <div class="col-6"><select   name="subcategory"  id="subcategory" class="form-control" required>
                    </select>
                    </div>
                    </div>

                    <div class="row" style="margin-top:1%;">
                    <div class="col-4">Product Name</div>
                    <div class="col-6"><input type="text"    name="productName"  placeholder="Enter Product Name" class="form-control" required>
                    </select>
                    </div>
                    </div>

                    <div class="row" style="margin-top:1%;">
                    <div class="col-4">Product Size</div>
                    <div class="col-6"><input type="text"    name="productSize"  placeholder="Enter Product Size" class="form-control" required>
                    </select>
                    </div>
                    </div>


                    <div class="row" style="margin-top:1%;">
                    <div class="col-4">Product Price Before Discount (RM)</div>
                    <div class="col-6"><input type="text"    name="productpricebd"  placeholder="Enter Product Price" class="form-control" required>
                    </select>
                    </div>
                    </div>

                    <div class="row" style="margin-top:1%;">
                    <div class="col-4">Product Price After Discount (RM)</div>
                    <div class="col-6"><input type="text"    name="productprice"  placeholder="Enter Product Price" class="form-control" required>
                    </select>
                    </div>
                    </div>

                    <div class="row" style="margin-top:1%;">
                    <div class="col-4">Product Description</div>
                    <div class="col-6"><textarea  name="productDescription"  placeholder="Enter Product Description" rows="6" class="form-control"></textarea>
                    </div>
                    </div>

                    <div class="row" style="margin-top:1%;">
                    <div class="col-4">Product Shipping Charge (RM)</div>
                    <div class="col-6"><input type="text"    name="productShippingcharge"  placeholder="Enter Product Shipping Charge" class="form-control" required>
                    </select>
                    </div>
                    </div>

                    <div class="row" style="margin-top:1%;">
                    <div class="col-4">Product Availability</div>
                    <div class="col-6"><select   name="productAvailability"  id="productAvailability" class="form-control" required>
                    <option value="">Select</option>
                    <option value="In Stock">In Stock</option>
                    <option value="Out of Stock">Out of Stock</option>
                    </select>
                    </select>
                    </div>
                    </div>

                    <div class="row" style="margin-top:1%;">
                      <div class="col-4">Product Featured Image</div>
                    <div class="col-6"><input type="file" name="productimage1" id="productimage1"  class="form-control" accept="image/*" title="Accept images only" required>
                    </div>
                    </div>

                    <div class="row" style="margin-top:1%;">
                       <div class="col-4">Product Image 2</div>
                    <div class="col-6"><input type="file" name="productimage2"  class="form-control" accept="image/*" title="Accept images only" required>
                    </div>
                    </div>


                    <div class="row" style="margin-top:1%;">
                      <div class="col-4">Product Image 3</div>
                    <div class="col-6"><input type="file" name="productimage3"  class="form-control" accept="image/*" title="Accept images only" required>
                    </div>
                    </div>

                     <div class="row mt-3">
                            <div class="col-6">
                                 <button type="submit" name="submit" class="btn btn-info btn-block btn-lg btn1">Add</button>
                           </div>
                   </div>

            </form>
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