<?php session_start();
include_once('includes/config.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<style>
    
.text{

    font-family: serif;

}  
.social-icons {
    list-style: none;
    text-align: center;
    margin: 25px 0px;
}
.social-icons li {
    display: inline-block;
}
.social-icons li i {
    background: #F44770;
    color: #fff;
    padding: 35px;
    font-size: 40px;
    border-radius: 55%;
    margin: 0px 5px;
    cursor: pointer;
    transition: all .5s;
}
.social-icons li i:hover {
    background: #fff;
    color: #000000;
}

</style>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ayunae | Contact us</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets\logo-nobg.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    </head>
    <body>
<?php include_once('includes/header.php');?>
        <!-- Header-->
        <header class="py-1" style="background: #cf8d88;">
            <div class="container px-4 px-lg-5 my-5">

                <div class="text-center text-white">
                    <br><br><h1 class="display-4 fw-bolder">Contact Us</h1>
                    <h5 class="display-10">A mother-daughter duo brand | Comfort & Versatility</h5>

        
                </div>
            </div>
        </header>
 
        <style>
    .social-icons li {
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        margin-right: 20px; /* Adjust the spacing between icons as desired */
    }

    .social-icons li a {
        text-decoration: none;
    }

    .social-icons li p a {
        color: hotpink; /* Set the label hyperlink color to pink */
    }

    .social-icons li p {
        margin-top: 1em; /* Adjust the spacing between icon and label as desired */
        font-size: 20px; /* Adjust the font size of the label as desired */
        font-weight: bold; /* Make the label bold */
        color: #ff69b4; /* Set the label color to pink */
    }

    .social-icons li span {
        font-size: 14px; /* Adjust the font size of the description as desired */
        color: #888; /* Set the description color */
        margin-top: 1em; /* Adjust the spacing between icon and label as desired */
    }
</style>

            
<div class="text">
    <ul class="social-icons">
        <li>
            <a href="https://wa.me/0162166057?text=id%20like%20to%20%20make%20a%20purchase">
                <i class="fab fa-whatsapp"></i>
            </a>
            <p><a href="https://wa.me/0162166057?text=id%20like%20to%20%20make%20a%20purchase">WhatsApp</a></p>
        </li>
        <li>
            <a href="https://www.facebook.com/ayunae.co">
                <i class="fab fa-facebook"></i>
            </a>
            <p><a href="https://www.facebook.com/ayunae.co">Facebook</a></p>
        </li>
        <li>
            <a href="https://www.instagram.com/ayunae.co/">
                <i class="fab fa-instagram"></i>
            </a>
            <p><a href="https://www.instagram.com/ayunae.co/">Instagram</a></p>
        </li>
        <li>
            <a href="mailto:ayunae@gmail.com">
                <i class="far fa-envelope email"></i>
            </a>
            <p><a href="mailto:ayunae@gmail.com">Email</a></p>
        </li>
    </ul>
</div>



 
<!--</div>--> 
        </section>
        <!-- Footer-->
   <?php include_once('includes/footer.php'); ?>
        <!-- Custom core JS-->
        <script src="js/custom.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
