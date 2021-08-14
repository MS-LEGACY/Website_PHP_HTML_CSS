
<?php

session_start();

if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== true) {

   $_SESSION['msg'] = "You must log in to book rooms";
   echo $_SESSION['msg'];
   header("Location: sign_in.php");
}
?>
<?php


date_default_timezone_set('Asia/Kolkata');
$today = date("Y-m-d");
$db1 = mysqli_connect("localhost","root","",'DBMS_PROJECT',"3307") or die("Could Not Connect to Database");
$qer= "SELECT * FROM customer";
$res=mysqli_query($db1,$qer) or die("could not execute the query");
while ($row=mysqli_fetch_assoc($res)){
  if($row['ExitDate']>$today)
  {
    $ppp=$row['RoomNoFk'];
    $quers="UPDATE rooms SET RoomAvail=true where RoomNo='$ppp'";
    mysqli_query($db1,$quers) or die("Error in Query");
  }

}


$user_check_query0= "SELECT * FROM rooms WHERE BedType = 'DoubleBed' AND RoomAvail= true " ;
$user_check_query1= "SELECT * FROM rooms WHERE BedType = 'DoubleBed1' AND RoomAvail= true " ;
$user_check_query2= "SELECT * FROM rooms WHERE BedType = 'DoubleBed2' AND RoomAvail= true " ;
$user_check_query3= "SELECT * FROM rooms WHERE BedType = 'wedding' AND RoomAvail= true " ;

$results = mysqli_query($db1,$user_check_query0);
$results1 = mysqli_query($db1,$user_check_query1);
$results2 = mysqli_query($db1,$user_check_query2);
$results3 = mysqli_query($db1,$user_check_query3);

$user0 = mysqli_num_rows($results);
$user1 = mysqli_num_rows($results1);
$user2 = mysqli_num_rows($results2);
$user3 = mysqli_num_rows($results3);


?>
<?php include('booking_confirm.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<link href="book.css" rel="stylesheet">
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

<nav class="navbar navbar-expand-sm bg-transparent navbar-light sticky-top" >
    <div class="container-fluid">
    <a class="navbar-brand py-0" href="#"><img class="img-fluid" src="ms_hotel_logo.svg" height="25px"></a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="index.html">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sign_in.php">SIGN IN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="book.php">BOOK</a>
            </li>
    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MORE</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="sign_up.php">SIGN UP</a>
                <a class="dropdown-item" href="order_items.php">ORDER ITEMS</a>
                
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
<h1 align="center"> Choose From These Beautiful Rooms </h1>

<?php endif ?> 

<?php if(isset($_SESSION['BookedRoom']) && $_SESSION['BookedRoom'] ==true): ?>

<h6 align="center" style="color: green;">Booking Successful. Your BookingID :<?php echo $_SESSION['BookingID']; ?></h6><br><br>


<?php endif ?>



<?php include('booking_confirm.php') ?>




<!-- Cards for room selection -->

<div class="row row-cols-1 row-cols-md-2">
  <div class="col md-6">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top" src="room_image_2_bed_non_A_C.jpeg"
          alt="Card image cap">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!--Card content-->
      <div class="card-body">

        <!--Title-->
        <h4 class="card-title">ROOM NON A/C</h4>
        <!--Text-->
        <p class="card-text">Select this room to experience comfort with beauty of nature furnished with beautiful king size bed.</p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
        <button type="button" class="btn btn-light-blue btn-md"><?php echo $user2 ;?> Rooms Available Now</button>

      </div>

    </div>
    <!-- Card -->
  </div>
  <div class="col md-6">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top" src="room_image_2_bed_A_C.jpeg"
          alt="Card image cap" >
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!--Card content-->
      <div class="card-body">

        <!--Title-->
        <h4 class="card-title">ROOM A/C</h4>
        <!--Text-->
        <p class="card-text">Experience comfort like never before with Knig size bed with air conditioning.</p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
        <button type="button" class="btn btn-light-blue btn-md"><?php echo $user1 ;?> Rooms Available Now</button>

      </div>
     </div>
    </div>
  </div>

  <div class="row row-cols-1 row-cols-md-2">
    <!-- Card -->
  
  <div class="col md-6">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top" src="room_image_2_bed_separated_N_A_C.jpeg"
          alt="Card image cap">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!--Card content-->
      <div class="card-body">

        <!--Title-->
        <h4 class="card-title">TWO SINGLE BEDS</h4>
        <!--Text-->
        <p class="card-text">Ideal for children as the room is furnished with two single beds</p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
        <button type="button" class="btn btn-light-blue btn-md"><?php echo $user0 ;?> Rooms Available Now</button>

      </div>

    </div>
    <!-- Card -->
  </div>
  <div class="col md-6">
    <!-- Card -->
    <div class="card">

      <!--Card image-->
      <div class="view overlay">
        <img class="card-img-top" src="room_image_2_bed_wedding_suit.jpeg"
          alt="Card image cap">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

      <!--Card content-->
      <div class="card-body">

        <!--Title-->
        <h4 class="card-title">WEDDING SUIT</h4>
        <!--Text-->
        <p class="card-text">Perfect for newly married couples.</p>
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
        <button type="button" class="btn btn-light-blue btn-md"><?php echo $user3 ;?> Rooms Available Now</button>

      </div>

    </div>
    <!-- Card -->
  </div>

</div>
<!-- Cards for room selection Ends Here-->
<?php if(!isset($_SESSION['BookedRoom']) && $_SESSION['BookedRoom'] !==true): ?>

<h6 align="center" style="color: red;"><?php echo $_SESSION['bcc']; ?></h6>

<?php endif ?>
<?php include('errorsbooking.php') ?>
<!-- form for room selection begins here -->

<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="ms_hotel_logo.svg" class="brand_logo" alt="Logo">
                </div>
                <br>
               
            </div>
            <div class="d-flex justify-content-center form_container">
                <form action="book.php" method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <label for="CustFname"> First Name :</label>
                        </div>
                        <input type="text" name="CustFname" id="CustFname" class="form-control input_user" value="" placeholder="First Name" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="CustLname"> Last Name :</label>
                        </div>
                        <input type="text" name="CustLname" id="CustLname"  class="form-control input_user" value="" placeholder="Last Name" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="CustHome"> Address Line 1 :</label>
                        </div>
                        <input type="text" name="CustHome"  id="CustHome" class="form-control input_user" value="" placeholder="Home/Flat Number, Society Name" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="CustStreet"> Address Line 2 :</label>
                        </div>
                        <input type="text" name="CustStreet" id="CustStreet"  class="form-control input_user" value="" placeholder="Street Name,City" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="CustCity"> Pin Code :</label>
                        </div>
                        <input type="text" pattern="^[1-9][0-9]{5}$" name="CustCity" id="CustCity" class="form-control input_user" value="" placeholder="City Pin Code" required>
                    </div>
                   <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="CustDob">Date of Birth :</label>
                        </div>
                        <input type="date" name="CustDob" id="CustDob" class="form-control input_user" value="" placeholder="Date of Birth" required>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                        <label for="CustEmail"> E-Mail :</label>
                        </div>
                        <input type="email" name="CustEmail" id="CustEmail" class="form-control input_pass" value="<?php echo $_SESSION['EMAIL']; ?> " placeholder="email same as login" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="CustNoGuest"> Number Of Guests :</label>
                        </div>
                        <input type="number" name="CustNoGuest" id="CustNoguest" min=1 max=4 class="form-control input_user" value="" placeholder="Number of guests" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="EntryDate"> Entry Date :</label>
                        </div>
                        <input type="date" name="EntryDate" id="EntryDate"  class="form-control input_user" value="" placeholder="Entry Date" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="ExitDate"> Exit Date :</label>
                        </div>
                        <input type="date" name="ExitDate" id="ExitDate"  class="form-control input_user" value="" placeholder="Exit date" required>

                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="BedType"> Room Type :</label>
                        </div>
                         <select name="BedType" id="BedType" class="form-control input_user" id="cars"  size =1 required>
                             <option value="Wedding">Wedding Suit</option>
                             <option value="DoubleBed1">Room A/C</option>
                             <option value="DoubleBed">Two Single Beds</option>
                             <option value="DoubleBed2">Room Non A/C</option>
                          </select>
                        
                    </div>
                    
                   
                        <div class="d-flex justify-content-center mt-3 login_container">
                 <button type="submit" name="book_now" class="btn login_btn">Book Now</button>
               </div>
                </form>
            </div>
  
               
            </div>
        </div>
    </div>
</div>


<!-- form for room selection ends here -->
















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