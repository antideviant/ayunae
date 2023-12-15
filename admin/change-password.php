<?php session_start();
include_once('includes/config.php');
if(strlen($_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {

if(isset($_POST['update']))
{
$adminid=$_SESSION["aid"];
$currentpassword=md5($_POST['cpass']);
$newpassword=md5($_POST['newpass']);
$ret=mysqli_query($con,"SELECT id FROM tbladmin WHERE id='$adminid' and password='$currentpassword'");
$num=mysqli_num_rows($ret);
if($num>0)
{
$query=mysqli_query($con,"update tbladmin set password='$newpassword' WHERE id='$adminid'");

echo "<script>alert('Password changed successfully.');</script>";
echo "<script type='text/javascript'> document.location ='change-password.php'; </script>";
}else{
echo "<script>alert('Current Password is wrong.');</script>";
echo "<script type='text/javascript'> document.location ='change-password.php'; </script>";
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
        <title>Ayunae | Change Password</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="assets\img\logo-nobg.png" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
            function valid()
            {
            if(document.chngpwd.newpass.value!= document.chngpwd.cnfpass.value)
            {
            alert("Password and Confirm Password Field do not match  !!");
            document.chngpwd.cnfpass.focus();
            return false;
            }
            return true;
            }
        </script>
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
    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><strong>Change Password</strong></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php" style="color: brown;">Dashboard</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
                        <div class="container custom-container" style="padding: 5%; padding-top: 0; padding-bottom: 0;">
                        <div class="login-box">
                            <!-- /.login-logo -->
                            <div class="card card-outline card-primary" style="height: 350px; margin: 14%; padding: 5%; border: 2px solid #c28163; border-radius: 15px; box-shadow: 0px 0px 5px #c28163;">
                                <div class="card-body">
                                <form method="post" name="chngpwd" onSubmit="return valid();">
                                    <div class="input-group mb-3">
                                        <label for="cpassword" class="input-group-text" style="width: 200px;">Current Password</label>
                                        <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Please enter current password" required="required">
                                        <div class="input-group-append">
                                            <span class="input-group-text toggle-password" style="cursor: pointer;">
                                                <i class="far fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="npassword" class="input-group-text" style="width: 200px;">New Password</label>
                                        <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Please enter new password" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text toggle-password" style="cursor: pointer;">
                                                <i class="far fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="cnpassword" class="input-group-text" style="width: 200px;">Confirm New Password</label>
                                        <input type="password" class="form-control" id="cnfpass" name="cnfpass" placeholder="Please enter confirm new password" required="required">
                                        <div class="input-group-append">
                                            <span class="input-group-text toggle-password" style="cursor: pointer;">
                                                <i class="far fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-6">
                                            <button type="submit" name="update" id="update" class="btn btn-info btn-block btn-lg btn1" value="Change" required>Update</button>
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
