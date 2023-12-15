<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$contactno=$_POST['contactnumber'];
$password=md5($_POST['inputuserpwd']);
$sql=mysqli_query($con,"select id from users where email='$email'");
$count=mysqli_num_rows($sql);
if($count==0){
$query=mysqli_query($con,"insert into users(name,email,contactno,password) values('$name','$email','$contactno','$password')");
if($query)
{
    echo "<script>alert('You are successfully register');</script>";
    echo "<script type='text/javascript'> document.location ='login.php'; </script>";
}
else{
echo "<script>alert('Not register something went worng');</script>";
    echo "<script type='text/javascript'> document.location ='signup.php'; </script>";
} } else{
 echo "<script>alert('Email id already registered with another accout. Please try  with another email id.');</script>";
    echo "<script type='text/javascript'> document.location ='signup.php'; </script>";   
}}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ayunae | Sign up</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets\logo-nobg.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
        <script src="js/jquery.min.js"></script>
    </head>
            <script>
function emailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-email-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<style type="text/css"></style>
    <body>
<?php include_once('includes/header.php');?>
    <div class="container custom-container" style="padding: 10%; padding-top: 0; padding-bottom: 0;">
        <div class="login-box" style="margin: 4%">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary" style="margin: 14%; padding: 5%; border: 2px solid #b76e79; border-radius: 15px; box-shadow: 0px 0px 5px #b76e79;">
                <div class="card-body" style=" height: 450px;">
                <br>
                <h3 class="login-box-msg" style="text-align: left;">Discover the Essence <br>
                    of Elegance with Ayunae, <br>
                    Embrace Your Style.
                </h3>
                <br>
                <form method="post" name="signup">
                    <div class="input-group mb-3">
                        <label for="fullname" class="input-group-text" style="width: 130px;">Full Name</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Please enter your full name" required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="contactnumber" class="input-group-text" style="width: 130px;">Phone Number</label>
                        <input type="text" class="form-control" name="contactnumber" maxlength="11" placeholder="Please enter your phone number" required>
                    </div>
                    <div class="input-group mb-3">
                        <label for="email" class="input-group-text" style="width: 130px;">E-Mail</label>
                        <input type="email" class="form-control" name="emailid" placeholder="Please enter your e-mail" required>
                        <span id="user-email-status" style="font-size:12px;"></span>
                    </div>
                    <div class="input-group mb-3">
                        <label for="password" class="input-group-text" style="width: 130px;">Password</label>
                        <input type="password" class="form-control" name="inputuserpwd" placeholder="Please enter your password" required>
                        <div class="input-group-append">
                            <span class="input-group-text toggle-password" style="cursor: pointer;">
                                <i class="far fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <div style="margin-top: 1rem;">
                                <button type="submit" name="submit" id="submit" class="btn btn-info btn-block btn-lg btn1" value="Login">Sign Up</button>
                            </div>
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
        margin-bottom: -60px;
    }

    .btn1 {
        margin-left: 0px;
        color: #fff;    
        background-color:  #b76e79;
        border-color: #b76e79;
    }

    .btn1:hover , .btn1:active {
        color: #b76e79;
        background-color: #fff;
        border-color: #b76e79;
    }
    </style>
</html>
