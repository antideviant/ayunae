<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {

//For Adding categories
if(isset($_POST['submit']))
{
    $category=$_POST['category'];
    $description=$_POST['description'];
    $id=intval($_GET['id']);
    $sql=mysqli_query($con,"update category set categoryName='$category',categoryDescription='$description' where id='$id'");
    echo "<script>alert('Category Details updated');</script>";
    echo "<script>window.location.href='manage-categories.php'</script>";
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
        <title>Ayunae | Edit Category</title>
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
                        <h1 class="mt-4"><strong>Edit Category</strong></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php" style="color: brown;">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Category</li>
                        </ol>
                        <div class="container custom-container" style="padding: 5%; padding-top: 0; padding-bottom: 0;">
                            <?php
                            $id=intval($_GET['id']);
                            $query=mysqli_query($con,"select * from category where id='$id'");
                            while($row=mysqli_fetch_array($query))
                            {
                            ?>	
                        <div class="login-box">
                            <!-- /.login-logo -->                            	
                        <div class="card card-outline card-primary" style="height: 330px; margin: 14%; padding: 5%; border: 2px solid #c28163; border-radius: 15px; box-shadow: 0px 0px 5px #c28163;">
                                <div class="card-body">
                                    <form method="post">                              
                                    <div class="input-group mb-3">
                                        <div class="input-group-text" style="width: 160px;">Category Name</div>
                                        <div class="col-4"><input type="text" value="<?php echo  htmlentities($row['categoryName']);?>"  name="category" style="width: 480px;" class="form-control" required></div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-text" style="width: 160px; text-align: justify;">Category <br/>Description</div>
                                        <div class="col-4"><textarea placeholder="Enter category Name" style="width: 480px;" name="description" class="form-control" required><?php echo  htmlentities($row['categoryDescription']);?></textarea></div>
                                    </div>

                                    <div class="row mt-3">
                                            <div class="col-6">
                                                <button type="submit" name="submit" class="btn btn-info btn-block btn-lg btn1">Update</button>
                                            </div>
                                    </div>
                                    <br>
                                    </form>
                                <?php } ?>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.login-box -->
                    </div>
                    </div>
                    
                </main>
          <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="js/custom.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
    <style>
    .custom-container {
        margin-top: -130px; /* Adjust the value as needed */
        margin-bottom: -100px;
        margin-left: -220px; /* Add this line to move the container to the left */
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
</html>
<?php } ?>

