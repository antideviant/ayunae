<?php session_start();
error_reporting(0);
include_once('includes/config.php');
// Code for User login
if(isset($_POST['submit']))
{
$username=$_POST['emailid'];
$cnumber=$_POST['phoneno'];
$newpassword=md5($_POST['inputPassword']);
$ret=mysqli_query($con,"SELECT id FROM users WHERE email='$username' and contactno='$cnumber'");
$num=mysqli_num_rows($ret);
if($num>0)
{
$query=mysqli_query($con,"update users set password='$newpassword' WHERE email='$username' and contactno='$cnumber'");

echo "<script>alert('Password reset successfully.');</script>";
echo "<script type='text/javascript'> document.location ='login.php'; </script>";
}else{
echo "<script>alert('Invalid Email or Reg Contact Number');</script>";
echo "<script type='text/javascript'> document.location ='password-recovery.php'; </script>";
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
        <title>Ayunae | Password Recovery</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets\logo-nobg.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <script src="js/jquery.min.js"></script>
             <script type="text/javascript">
function valid()
{
 if(document.passwordrecovery.inputPassword.value!= document.passwordrecovery.cinputPassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.passwordrecovery.cinputPassword.focus();
return false;
}
return true;
}
</script>
    </head>
<style type="text/css">
    input { border:solid 1px #000;

    }

</style>
<body>
<?php include_once('includes/header.php');?>
    <div class="container custom-container" style="padding: 10%; padding-top: 0; padding-bottom: 0;">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary" style="margin: 14%; padding: 5%; border: 2px solid #c28163; border-radius: 15px; box-shadow: 0px 0px 5px #c28163;">
            <div class="card-body">
            <br>
            <h3 class="login-box-msg" style="text-align: left;">Rediscover Your Journey<br>
            with Ayunae
            </h3>
            <br>
            <form method="post" name="passwordrecovery" onSubmit="return valid();">
                <div class="input-group mb-3">
                    <label for="email" class="input-group-text" style="width: 150px;">E-Mail</label>
                    <input type="email" class="form-control" name="emailid" id="emailid" placeholder="Please enter your e-mail" required>
                    <span id="user-email-status" style="font-size:12px;"></span>
                </div>
                <div class="input-group mb-3">
                    <label for="phone" class="input-group-text" style="width: 150px;">Phone Number</label>
                    <input type="text" class="form-control" name="phoneno" id="phoneno" placeholder="Please enter your phone number" required>
                </div>
                <div class="input-group mb-3">
                    <label for="password" class="input-group-text" style="width: 150px;">Password</label>
                    <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Please enter your new password" required>
                    <div class="input-group-append">
                        <span class="input-group-text toggle-password" style="cursor: pointer;">
                            <i class="far fa-eye"></i>
                        </span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <label for="password" class="input-group-text" style="width: 150px;">Confirm Password</label>
                    <input type="password" class="form-control" name="cinputPassword" id="cinputPassword" placeholder="Please enter your new password" required>
                    <div class="input-group-append">
                        <span class="input-group-text toggle-password" style="cursor: pointer;">
                            <i class="far fa-eye"></i>
                        </span>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <div class="col-6">
                        <button type="submit" name="submit" id="submit" class="btn btn-info btn-block btn-lg btn1" value="Submit">Submit</button>
                    </div>
                </div>
                <br>
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
        margin-bottom: -80px;
    }

    .btn1 {
        margin-left: 83%;
        margin-top: 20px;
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
