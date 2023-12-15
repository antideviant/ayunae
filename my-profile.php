<?php session_start();
include_once('includes/config.php');
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{

//For updating User  Profile
if(isset($_POST['update']))
{
$name=$_POST['fullname'];
$uid=$_SESSION['id'];
$contactno=$_POST['contactnumber'];
$query=mysqli_query($con,"update users set name='$name',contactno='$contactno' where id='$uid'");
if($query)
{
    echo "<script>alert('Profile Updated successfully');</script>";
    echo "<script type='text/javascript'> document.location ='my-profile.php'; </script>";
}else{
echo "<script>alert('Something went wrong. Please try again.');</script>";
    echo "<script type='text/javascript'> document.location ='my-profile.php'; </script>";
} }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ayunae | My Profile </title>
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
    <div class="container custom-container" style="padding: 10%; padding-top: 0; padding-bottom: 0;">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary" style="margin: 14%; padding: 5%; border: 2px solid #c28163; border-radius: 15px; box-shadow: 0px 0px 5px #654321;">
                <div class="card-body">
                <?php 
                    $uid=$_SESSION['id'];
                    $query=mysqli_query($con,"select * from users where id='$uid'");
                    while($result=mysqli_fetch_array($query)){
                ?>
                <h1><?php echo htmlentities($result['name']);?>'s Profile</h1>
                <br>
                <form method="post" name="signup">
                    <div class="input-group mb-3">
                        <label for="fullname" class="input-group-text" style="width: 130px;">Full Name</label>
                        <input type="text" name="fullname" value="<?php echo htmlentities($result['name']);?>" class="form-control" required >
                    </div>
                    <div class="input-group mb-3">
                        <label for="email" class="input-group-text" style="width: 130px;">E-Mail</label>
                        <input type="email" name="emailid" id="emailid" class="form-control" value="<?php echo htmlentities($result['email']);?>" readonly>
                        <span id="user-email-status" style="font-size:12px;"></span>
                    </div>
                    <div class="input-group mb-3">
                        <label for="contactnumber" class="input-group-text" style="width: 130px;">Phone Number</label>
                        <input type="text" name="contactnumber" value="<?php echo htmlentities($result['contactno']);?>" maxlength="11" class="form-control" required>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <div style="margin-top: 1rem;">
                                <button type="submit" name="update" id="update" class="btn btn-info btn-block btn-lg btn1" value="Update">Update</button>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
    </div>
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