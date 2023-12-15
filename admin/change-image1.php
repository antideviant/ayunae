<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {
//For Adding Products
if(isset($_POST['submit']))
{
$currentimage=$_POST['currentimage'];
$imagepath="productimages"."/".$currentimage;
$productimage1=$_FILES["productimage1"]["name"];
$extension1 = substr($productimage1,strlen($productimage1)-4,strlen($productimage1));
//Renaming the  image file
$imgnewfile=md5($productimage1.time()).$extension1;
move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/".$imgnewfile);
$updatedby=$_SESSION['aid'];
$pid=intval($_GET['id']);
$sql=mysqli_query($con,"update products set productImage1='$imgnewfile', lastUpdatedBy='$updatedby' where id='$pid'");
unlink($imagepath);
echo "<script>alert('Product image updated successfully');</script>";
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
        <title>Ayunae | Update Featured Image</title>
        <link rel="icon" type="image/x-icon" href="assets\img\logo-nobg.png" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.5.1.min.js"></script>   

    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><strong>Update Featured Image</strong></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php" style="color: brown;">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update Featured Image</li>
                        </ol>
                       
                        <div class="container custom-container" style="padding: 5%; padding-top: 0; padding-bottom: 0;">
                           <div class="login-box">
                            <!-- /.login-logo -->
                            <div class="card card-outline card-primary" style="height: 600px; margin: 10%; padding: 2%; border: 2px solid #c28163; border-radius: 10px; box-shadow: 0px 0px 5px #c28163;">
                            <div class="card-body">


<?php 
$pid=intval($_GET['id']);
$query=mysqli_query($con,"select products.productImage1,products.productName from products  where  products.id='$pid' ");
while($row=mysqli_fetch_array($query))
{
?>                                 
        <form  method="post" enctype="multipart/form-data">                                

        <input type="hidden" name="currentimage" value="<?php echo htmlentities($row['productImage1']);?>">
        <div class="row" style="margin-top:1%;">
        <div class="col-3">Product Name</div>
        <div class="col-6"><input type="text"    name="productName"  value="<?php echo htmlentities($row['productName']);?>" class="form-control" required>
        </select>
        </div>
        </div>



        <div class="row" style="margin-top:2%;">
        <div class="col-3">Product Featured Image</div>
        <div class="col-6"><img src="productimages/<?php echo htmlentities($row['productImage1']);?>" width="250"><br />
        </div>
        </div>

        <div class="row" style="margin-top:2%;">
        <div class="col-3">Product Featured Image</div>
        <div class="col-6"><input type="file" name="productimage1" id="productimage1"  class="form-control" accept="image/*" title="Accept images only" required>
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
        margin-left: 280px; /* Modify this value to adjust the left margin of the button */
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