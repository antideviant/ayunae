<?php session_start();
include_once('includes/config.php');
error_reporting(0);

//Code for Wish List
$pid=intval($_GET['pid']);
if(isset($_POST['wishlist'])){
if(strlen($_SESSION['id'])==0)
{   
echo "<script>alert('Login is required to wishlist a product');</script>";
} else{
$userid=$_SESSION['id'];    
$query=mysqli_query($con,"select id from wishlist where userId='$userid' and productId='$pid'");
$count=mysqli_num_rows($query);
if($count==0){
mysqli_query($con,"insert into wishlist(userId,productId) values('$userid','$pid')");
echo "<script>alert('Product aaded in wishlist');</script>";
  echo "<script type='text/javascript'> document.location ='my-wishlist.php'; </script>";
} else { 
echo "<script>alert('This product is already added in your wishlist.');</script>";
}
}}

if(isset($_POST['addtocart'])){
    if(strlen($_SESSION['id'])==0) {   
        echo "<script>alert('Login is required to add a product to the cart');</script>";
    } else {
        $userid = $_SESSION['id']; 
        $pqty = $_POST['inputQuantity'];
        $productsize = $_POST['inputProductSize'];  // Assuming you have an input field named 'inputProductSize'
        
        $query = mysqli_query($con, "SELECT id, productQty FROM cart WHERE userId='$userid' AND productId='$pid'");
        $count = mysqli_num_rows($query);
        
        if($count == 0) {
            mysqli_query($con, "INSERT INTO cart(userId, productId, productQty, productSize) VALUES ('$userid', '$pid', '$pqty', '$productsize')");
            echo "<script>alert('Product added to cart');</script>";
            echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
        } else {
            $row = mysqli_fetch_array($query);
            $currentpqty = $row['productQty'];
            $productqty = $pqty + $currentpqty;
            mysqli_query($con, "UPDATE cart SET productQty='$productqty', productSize='$productsize' WHERE userId='$userid' AND productId='$pid'");
            echo "<script>alert('Product added to cart');</script>";
            echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
        }
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
        <title>Ayunae | Product Details</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets\logo-nobg.png" />
        <!-- Custom icons-->
        <link href="css/custom-icons.css" rel="stylesheet" />
        <!-- Core theme CSS -->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
<?php include_once('includes/header.php');?>
        <!-- Product section-->

<?php 
$pid=intval($_GET['pid']);
$query=mysqli_query($con,"select products.id as pid,products.productImage1,products.productImage2,products.productImage3,products.productName,category.categoryName,subcategory.subcategoryName as subcatname,products.postingDate,products.updationDate,subcategory.id as subid,tbladmin.username,category.id as catid,products.productSize,products.productPrice,products.productPriceBeforeDiscount,products.productAvailability,products.productDescription,products.shippingCharge from products join subcategory on products.subCategory=subCategory.id join category on products.category=category.id join tbladmin on tbladmin.id=products.addedBy where  products.id='$pid'");
while($row=mysqli_fetch_array($query))
{
$catid=$row['catid'];
?>
<form name="productdetails" method="post">
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="admin/productimages/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>" width="250" height="850"  style="border:solid 1px #000;"/>
<img src="admin/productimages/<?php echo htmlentities($row['productImage2']);?>" width="291" style="border:solid 1px #000;">
<img src="admin/productimages/<?php echo htmlentities($row['productImage3']);?>" width="292" style="border:solid 1px #000;">

                    </div>
                    <div class="col-md-6">

                        <div class="small mb-1"><strong>Category:</strong> <?php echo htmlentities($row['categoryName']);?></div>
                        <div class="small mb-1"><strong>Sub-Category:</strong> <?php echo htmlentities($row['subcatname']);?></div>
                       
                        <h1 class="display-5 fw-bolder"><?php echo htmlentities($row['productName']);?></h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through">RM<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
                            <span>RM<?php echo htmlentities($row['productPrice']);?></span>
                            <div class="small mb-1"><strong>Delivery Charges: </strong> RM<?php echo htmlentities($row['shippingCharge']);?></div>
                        </div>

                        <p class="lead"><?php echo $row['productDescription'];?></p>
<?php if($row['productAvailability']=='In Stock'):?>

    <div class="d-flex">
    <div class="container42" >
    <label for="inputQuantity">Quantity </label>
    <select name="inputQuantity" id="inputQuantity">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
</div>
<br></br>
<br>

</div>
    
    <div class="d-flex">
    <div class="container42">
    <label for="inputProductSize"style="padding-right:-10px;">Size</label>
    <select name="inputProductSize" style="margin-left:35px;"id="inputProductSize">
      <option value="XS">XS</option>
      <option value="S">S</option>
      <option value="M">M</option>
      <option value="L">L</option>
      <option value="XL">XL</option>
    </select>
  </div>
</div>

                            

        
                        

                        
                        <div class="button">
    <button class="btn btn-outline-dark flex-shrink-0" type="submit" name="wishlist"><strong>Wishlist</strong></button>
    <button class="btn btn-outline-dark flex-shrink-0" type="submit" name="addtocart"><strong>Add to Cart</strong></button>
  </div>


<?php else: ?>
    <h5 style="color:red;" >Out of Stock</h5>
      <button class="btn btn-outline-dark flex-shrink-0" type="submit" name="wishlist2"><strong>Wishlist</strong></button>
<?php endif;?>    

                    </div>
                </div>
            </div>
        </section>
        </form>
<?php } ?>

        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
   <?php 
    $query=mysqli_query($con,"select products.id as pid,products.productImage1,products.productName,products.productPriceBeforeDiscount,products.productPrice from products where category='$catid' order by pid desc limit 8 ");
$cnt=1;
while($row=mysqli_fetch_array($query))
{ ?>

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="admin/productimages/<?php echo htmlentities($row['productImage1']);?>" alt="<?php echo htmlentities($row['productName']);?>" width="350" height="350"/>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo htmlentities($row['productName']);?></h5>
                                    <!-- Product price-->
                                    <span class="text-decoration-line-through">RM<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
                            <span>RM<?php echo htmlentities($row['productPrice']);?></span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="product-details.php?pid=<?php echo htmlentities($row['pid']);?>">Quick View</a></div>
                            </div>
                        </div>
                    </div>
<?php } ?>

                </div>
            </div>
        </section>
        <!-- Footer-->
        <?php include_once('includes/footer.php'); ?>
        <!-- Custom core JS-->
        <script src="js/custom.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
<style>
.w3-button{
  /* Default styles */
  background-color: #000000;
  padding: large;
  font-size: large;
  opacity: 0.5;
}

.button:hover {
  /* Hover styles */
  opacity: 1;
  /* Add more styles as needed */
}
/* Styling for the labels */
label {
  font-weight: bold;
}

select {
  padding: 8px;
  border-radius: 4px;
  border: 1px solid #ccc;
  font-size: 14px;
  appearance: none; /* Remove default dropdown arrow */
  background-color: #f2f2f2; /* Background color */
  background-image: linear-gradient(to bottom, #f2f2f2, #e6e6e6); /* Gradient background */
  width: 100px; /* Adjust the width as needed */
}

/* Styling for the option elements */
option {
  padding: 8px;
}

/* Hover effect on options */
option:hover {
  background-color: #d9d9d9;
}

/* Styling for the container */
.container42 {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-left:10px;
}

/* Styling for the container on smaller screens */
@media (max-width: 480px) {
  .container {
    flex-direction: column;
  }
}
/* Styling for the button container */
.button {
  display: flex;
  gap: 10px;
  justify-content: center;
  margin-top: 20px;
  margin-left:-320px;
}

/* Styling for the buttons */
.button button {
  padding: 10px 20px;
  border-radius: 4px;
  border: none;
  font-size: 14px;
  cursor: pointer;
  width: 120px; /* Adjust the width as needed */
}

/* Styling for the "Wishlist" button */
.button button[name="wishlist"] {
  background-color: #f2f2f2;
  color: #333;
}

/* Styling for the "Add to Cart" button */
.button button[name="addtocart"] {
  background-color: #f2f2f2;
  color: #333;
}

/* Styling for the "Add to Cart" button */
.button button[name="wishlist2"] {
  background-color: #f2f2f2;
  color: #333;
}

/* Hover effect for buttons */
.button button:hover {
  background-color: #d9d9d9;
}

</style>