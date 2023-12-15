<?php session_start();
error_reporting(0);
include_once('includes/config.php');
// Code for User login
if(isset($_POST['login']))
{
   $email=$_POST['emailid'];
   $password=md5($_POST['inputuserpwd']);
$query=mysqli_query($con,"SELECT id,name FROM users WHERE email='$email' and password='$password'");
$num=mysqli_fetch_array($query);
//If Login Suceesfull
if($num>0)
{
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];
echo "<script type='text/javascript'> document.location ='index.php'; </script>";
}
//If Login Failed
else{
    echo "<script>alert('Invalid login details');</script>";
    echo "<script type='text/javascript'> document.location ='login.php'; </script>";
exit();
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
    <title>Ayunae | Log In</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets\logo-nobg.png" />
    <!-- Custom icons-->
    <link href="css/custom-icons.css" rel="stylesheet" />
    <!-- Core theme CSS -->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="js/jquery.min.js"></script>
</head>
<style type="text/css">
    input {
        border: solid 1px #000;
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
                <h3 class="login-box-msg" style="text-align: left;">Step into Elegance<br>
                    with <a href="admin/index.php" style="text-decoration:none; color:#000">Ayunae,</a><br>
                    Where Style Meets Comfort.
                </h3>
                <br>
                <form method="post" name="login">
                    <div class="input-group mb-3">
                        <label for="email" class="input-group-text" style="width: 95px;">E-Mail</label>
                        <input type="email" class="form-control" name="emailid" placeholder="Please enter your e-mail" required>
                        <span id="user-email-status" style="font-size:12px;"></span>
                    </div>
                    <div class="input-group mb-3">
                        <label for="password" class="input-group-text" style="width: 95px;">Password</label>
                        <input type="password" class="form-control" name="inputuserpwd" placeholder="Please enter your password" required>
                        <div class="input-group-append">
                            <span class="input-group-text toggle-password" style="cursor: pointer;">
                                <i class="far fa-eye"></i>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                    </div>

                    <small><a href="password-recovery.php" style="color:#c28163">Forgot Password?</a></small>

                    <div class="row mt-3">
                        <div class="col-6">
                            <button type="submit" name="login" id="login" class="btn btn-info btn-block btn-lg btn1" value="Login">Log In</button>
                        </div>
                        <div class="col-6">
                            <a href="signup.php" class="text-center btn btn-info btn-block btn-lg btn2">Sign Up</a>
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
        margin-left: 60%;
        color: #fff;
        background-color:  #c28163;
        border-color: #c28163;
    }

    .btn1:hover , .btn1:active {
        color: #c28163;
        background-color: #fff;
        border-color: #c28163;
    }

    .btn2 {
        color: #fff;
        background-color:  #cf8d88; 
        border-color: #cf8d88;
    }

    .btn2:hover , .btn2:active {
        color: #cf8d88;
        background-color: #fff; 
        border-color: #cf8d88;
    }
</style>
</html>