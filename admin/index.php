<?php
session_start();
//error_reporting(E_ALL);
include("includes/config.php");
if(isset($_POST['submit']))
{
$username=$_POST['username'];
$password=md5($_POST['inputPassword']);
$ret=mysqli_query($con,"SELECT id FROM tbladmin WHERE username='$username' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$_SESSION['alogin']=$_POST['username'];
$_SESSION['aid']=$num['id'];
header("location:dashboard.php");
}else{
echo "<script>alert('Invalid username or password');</script>";
//header("location:index.php");
}
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
        <title>Ayunae | Admin Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets\img\logo-nobg.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication" style="background-color: #c28163;">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container center-container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Welcome Back, Administrator.</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" name="username" type="text" placeholder="Username" required />
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="inputPassword" type="password" placeholder="Password" required />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                <a class="small" href="password-recovery.php" style="color:#cf8d88">Forgot Password?</a>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                <button type="submit" name="submit" class="btn btn-primary btn1">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <a href="../index.php">
                                            <i class="fas fa-home" style="font-size: 24px; color: #c28163;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
        <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="js/custom.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/scripts.js"></script>
        <script>
        jQuery(document).ready(function() {
            jQuery('.toggle-password').click(function() {
                var input = jQuery(this).closest('.form-floating').find('input');
                var type = input.attr('type');
                if (type === 'password') {
                    input.attr('type', 'text');
                    jQuery(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    jQuery(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });
    </script>
    </body>
    <style>
    .center-container {
        margin-top: 60px;
    }

    .btn1 {
        color: #fff;
        background-color:  #c28163;
        border-color: #cf8d88;
    }

    .btn1:hover , .btn1:active {
        color: #fff;
        background-color: #cf8d88;
        border-color:  #c28163;
    }
    </style>
</html>
