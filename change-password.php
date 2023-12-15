<?php session_start();
include_once('includes/config.php');
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{

//For changing  User  Profile Password
if(isset($_POST['update']))
{
$currentpwd=md5($_POST['cpass']);
$newpwd=md5($_POST['newpass']);
$uid=$_SESSION['id'];
$sql=mysqli_query($con,"SELECT id FROM  users where password='$currentpwd' and id='$uid'");
$num=mysqli_num_rows($sql);
if($num>0)
{
 $con=mysqli_query($con,"update users set password='$newpwd' where id='$uid'");
echo "<script>alert('Password Changed Successfully !!');</script>";
 echo "<script type='text/javascript'> document.location ='change-password.php'; </script>";
}else{
    echo "<script>alert('Current Password not match !!');</script>";
     echo "<script type='text/javascript'> document.location ='change-password.php'; </script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ayunae | Change Password</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/logo-nobg.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <script src="js/jquery.min.js"></script>
       <script type="text/javascript">
            function valid()
            {
            if(document.chngpwd.cpass.value=="")
            {
            alert("Current Password Filed is Empty !!");
            document.chngpwd.cpass.focus();
            return false;
            }
            else if(document.chngpwd.newpass.value=="")
            {
            alert("New Password Filed is Empty !!");
            document.chngpwd.newpass.focus();
            return false;
            }
            else if(document.chngpwd.cnfpass.value=="")
            {
            alert("Confirm Password Filed is Empty !!");
            document.chngpwd.cnfpass.focus();
            return false;
            }
            else if(document.chngpwd.newpass.value!= document.chngpwd.cnfpass.value)
            {
            alert("Password and Confirm Password Field do not match  !!");
            document.chngpwd.cnfpass.focus();
            return false;
            }
            return true;
            }
        </script>
    </head>
<style type="text/css"></style>
    <body>
    <?php include_once('includes/header.php');?>
    <div class="container custom-container" style="padding: 5%; padding-top: 0; padding-bottom: 0;">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary" style="margin: 14%; padding: 5%; border: 2px solid #c28163; border-radius: 15px; box-shadow: 0px 0px 5px #654321;">
                <div class="card-body">
                <?php 
                    $uid=$_SESSION['id'];
                    $query=mysqli_query($con,"select * from users where id='$uid'");
                    while($result=mysqli_fetch_array($query)){
                ?>
                <h1><?php echo htmlentities($result['name']);?>'s Change Password</h1>
                <br>
                <form method="post" name="chngpwd" onSubmit="return valid();">
                    <div class="input-group mb-3">
                        <label for="currentpassword" class="input-group-text" style="width: 150px;">Current Password</label>
                        <input type="password" class="form-control" id="cpass" name="cpass" required="required">
                        <div class="input-group-append">
                            <span class="input-group-text toggle-password" style="cursor: pointer;">
                                <i class="far fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label for="newpassword" class="input-group-text" style="width: 150px;">New Password</label>
                        <input type="password" class="form-control" id="newpass" name="newpass" required="required">
                        <div class="input-group-append">
                            <span class="input-group-text toggle-password" style="cursor: pointer;">
                                <i class="far fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label for="confirmpassword" class="input-group-text" style="width: 150px;">Confirm Password</label>
                        <input type="password" class="form-control" id="cnfpass" name="cnfpass" required="required" >
                        <div class="input-group-append">
                            <span class="input-group-text toggle-password" style="cursor: pointer;">
                                <i class="far fa-eye"></i>
                            </span>
                        </div>
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
        <script>
        $(document).ready(function() {
            $('.toggle-password').click(function() {
                var input = $(this).closest('.input-group').find('input');
                var type = input.attr('type');
                if (type === 'password') {
                    input.attr('type', 'text');
                    $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });
        </script>
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
