<?php

session_start();

if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== true) {

   $_SESSION['msg'] = "You must log in to book rooms";
   echo $_SESSION['msg'];
   header("Location: sign_in.php");
}
if(!isset($_SESSION['BookedRoom']) && $_SESSION['BookedRoom'] !==true){
    $_SESSION['msg1'] = "You must book room to order items";
    echo $_SESSION['msg1'];
    header("Location: book.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta class="form-control input_user" name="viewport" content="width=device-width, initial-scale=1">
	<title>MS Hotel Book Rooms</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="order_items.css" rel="stylesheet">
  <script>
  $( function() {
    $( "EntryDate" ).datepicker();
  } );
  </script>
    <script>
  $( function() {
    $( "#ExitDate" ).datepicker();
  } );
  </script>
    <script>
  $( function() {
    $( "CustDob" ).datepicker();
  } );
  </script>
</head>
<body onload="myfunction()" id="body_1">
		<div class="preload" id="preload">
			<div class="preload_logo" >
				MS HOTEL
			</div>
			<div class="loader-frame">
			<div class = "loader1" id = "loader1"></div>
			<div class = "loader2" id = "loader2"></div>
		   </div>
         </div>


<!-- Navigation Bar -->

<nav class="navbar navbar-expand-sm bg-transparent navbar-light sticky-none" >
    <div class="container-fluid">
    <a class="navbar-brand py-0" href="#"><img class="img-fluid" src="ms_hotel_logo.svg" height="25px"></a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sign_in.php">SIGN IN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="book.php">BOOK</a>
            </li>
    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MORE</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="sign_up.php">SIGN UP</a>
                <a class="dropdown-item" href="#">ORDER ITEMS</a>
				<a class="dropdown-item" href="logout.php">LOG OUT</a>
				<a class="dropdown-item" href="admin_page.php">ADMIN PAGE</a>
              </div>
            </li>
          </ul>
    </div>
    </nav>
<?php 
if(isset($_SESSION['success'])): ?>
<div>
    <h5>
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
    </h5>
</div>
<?php endif ?>
<?php if(isset($_SESSION['username'])): ?>

<h6 align="center" style="color: green;">Welcome <?php echo $_SESSION['username']; ?></h6><br><br>

<?php endif ?>
<marquee width="100%" behavior="scroll" direction="right" scrollamount="12" scrolldelay="0"><h3 align="center"> Order Items From the Table </h3></marquee>

<?php include('order_confirm.php') ?>
<?php if(isset($_SESSION['Order'])): ?>
<h2><?php echo $_SESSION['Order']; ?></h2>
<?php endif ?>

<form action="order_items.php" method="POST" class="center">
<table border="2" class="center" cellpadding="10" cellspacing="5"  >
<tr>
    <td colspan="20">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp; <img src="tag_food_image_1.jpg" height="100px" width="100px" align="center">
     &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp; Salmon Suishi With Soy Sauce   </td>
    <td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; Price: Rs 500  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</td>
    <td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<input type="number" max="5" min="0" value="0" class="form-control input_user" name="601" >&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
    &nbsp;</td>
</tr>
<tr>
    <td colspan="20">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp; <img src="paperdosa.jpg" height="100px" width="100px" align="center">
     &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp; Paper Dosa   </td>
    <td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; Price: Rs 150  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</td>
    <td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<input type="number" max="5" min="0" value="0" class="form-control input_user" name="602">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
    &nbsp;</td>
</tr>
<tr>
    <td colspan="20">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp; <img src="shrimpcalamari.jpg" height="100px" width="100px" align="center">
     &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp; Shrimp Calamari   </td>
    <td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; Price: Rs 350  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</td>
    <td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<input type="number" max="5" min="0" value="0" class="form-control input_user" name="603">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
    &nbsp;</td>
</tr>
<tr>
    <td colspan="20">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp; <img src="CholeBhatura.jpg" height="100px" width="100px" align="center">
     &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp; Chhola Bhatura  </td>
    <td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; Price: Rs 250  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</td>
    <td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<input type="number" max="5" min="0" value="0" class="form-control input_user" name="604">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
    &nbsp;</td>
</tr>
<tr>
    <td colspan="20">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp; <img src="tropical_drink.jpg" height="100px" width="100px" align="center">
     &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;Tropical Fruit Drink</td>
    <td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; Price: Rs 120 &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</td>
    <td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<input type="number" max="5" min="0" value="0" class="form-control input_user" name="605">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
    &nbsp;</td>
</tr>
<tr>
    <td colspan="20">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp; <img src="tropical_drink_alcholic.jpg" height="100px" width="100px" align="center">
     &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp;Tropical Alcholic Drink  </td>
    <td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; Price: Rs 450 &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</td>
    <td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<input type="number" max="5" min="0" value="0" class="form-control input_user" name="606">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
    &nbsp;</td>
</tr>
<tr>
    <td colspan="20">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp; <img src="luxurytowel.jpeg" height="100px" width="100px" align="center">
     &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp; Extra Towels  </td>
    <td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; Price: Rs 20  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</td>
    <td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<input type="number" max="5" min="0" value="0" class="form-control input_user" name="801">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
    &nbsp;</td>
</tr>
<tr>
    <td colspan="20">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp; <img src="bedsheets.jpeg" height="100px" width="100px" align="center">
     &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<br>&nbsp;&nbsp; Extra Sheets </td>
    <td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; Price: Rs 20 &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</td>
    <td>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;<input type="number" max="5" min="0" value="0" class="form-control input_user" name="802">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
    &nbsp;</td>
</tr>

</table>

<div class="d-flex justify-content-center mt-3 login_container">
     <button type="submit"  name="order_now" class="login_btn">Order Now</button>
</div>
</form>
















<!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4">

	<!-- Footer Links -->
	<div class="container-footer text-center text-md-left">
  
	  <!-- Footer links -->
	  <div class="row text-center text-md-left mt-3 pb-3">
  
		<!-- Grid column -->
		<div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
		  <h6 class="text-uppercase mb-4 font-weight-bold">MS HOTEL</h6>
		  <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
			consectetur
			adipisicing elit.</p>
		</div>
		<!-- Grid column -->
  
		<hr class="w-100 clearfix d-md-none">
  
		<!-- Grid column -->
		<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
		  <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
		  <p>
			<a href="#!">MS Hotel</a>
		  </p>
		  <p>
			<a href="#!">Get To Know Us</a>
		  </p>
		  <p>
			<a href="#!">Testimonials</a>
		  </p>
		  
		</div>
		<!-- Grid column -->
  
		<hr class="w-100 clearfix d-md-none">
  
		<!-- Grid column -->
		<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
		  <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
		  <p>
			<a href="#!">Your Account</a>
		  </p>
		  <p>
			<a href="#!">Become an Affiliate</a>
		  </p>
		  <p>
			<a href="#!">Shipping Rates</a>
		  </p>
		 
		</div>
  
		<!-- Grid column -->
		<hr class="w-100 clearfix d-md-none">
  
		<!-- Grid column -->
		<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
		  <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
		  <p>
			<i class="fas fa-home mr-3"></i> VIT-Chennai, Vandalur-Kelambakkam Road, Chennai</p>
		  <p>
			<i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
		  <p>
			<i class="fas fa-phone mr-3"></i> + 91 234 567 88</p>
		  
		</div>
		<!-- Grid column -->
  
	  </div>
	  <!-- Footer links -->
  
	  <hr>
  
	  <!-- Grid row -->
	  <div class="row-footer d-flex align-items-center">
  
		<!-- Grid column -->
		<div class="col-md-7 col-lg-8">
  
		  <!--Copyright-->
		  <p class="text-center text-md-left">© 2020 Copyright:
			<a href="https://mdbootstrap.com/">
			  <strong> MSHotel.com</strong>
			</a>
		  </p>
  
		</div>
		<!-- Grid column -->
  
		<!-- Grid column -->
		<div class="col-md-5 col-lg-4 ml-lg-0">
  
		  <!-- Social buttons -->
		  <div class="text-center text-md-right">
			<ul class="list-unstyled list-inline">
			  <li class="list-inline-item">
				<a class="btn-floating btn-lg rgba-white-slight mx-1">
				  <i class="fab fa-facebook-f"></i>
				</a>
			  </li>
			  <li class="list-inline-item">
				<a class="btn-floating btn-lg rgba-white-slight mx-1">
				  <i class="fab fa-twitter"></i>
				</a>
			  </li>
			  <li class="list-inline-item">
				<a class="btn-floating btn-lg rgba-white-slight mx-1">
				  <i class="fab fa-google-plus-g"></i>
				</a>
			  </li>
			  <li class="list-inline-item">
				<a class="btn-floating btn-lg rgba-white-slight mx-1">
				  <i class="fab fa-linkedin-in"></i>
				</a>
			  </li>
			</ul>
		  </div>
  
		</div>
		<!-- Grid column -->
  
	  </div>
	  <!-- Grid row -->
  
	</div>
	<!-- Footer Links -->
  
  </footer>
  <!-- Footer -->

















 

    <script>
var preloader =document.getElementById("preload");
function myfunction()
{
preloader.style.display="none";
}
 </script>
 <!--background image ends-->

</div>
</body>
</html>