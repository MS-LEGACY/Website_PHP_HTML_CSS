<?php

session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page

header("Location: admin_page.php");
exit;
}
?>
<?php 
$db = mysqli_connect("localhost","root","",'DBMS_PROJECT',"3307") or die("Could Not Connect to Database");

$errors11=array();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    

    $username= mysqli_real_escape_string($db, $_POST['adminname']);
    $password= mysqli_real_escape_string($db, $_POST['adminpassword']);

    if(empty($username)) {
     
        array_push($errors11, "Username is Required");
    
    }
    if(empty($password)){

        array_push($errors11,"Password Is Required");
    }

    if(count($errors11)==0)
    {
        

        $query1 = "SELECT * FROM admin_reg WHERE adminname='$username' AND adminpassword='$password'";

        $results1 = mysqli_query($db, $query1);

        if(mysqli_num_rows($results1)) {
            
            session_start();

			$results23=mysqli_fetch_assoc($results1);
            // Store data in session variables
            $_SESSION["adminloggedin"] = true;
            

            $_SESSION['ADMINname'] = $username;
            $_SESSION['success'] = "Logged In Successfully";
            $errors11=array();
        
            header("Location: customer_details.php");
        }
        else
        {
			array_push($errors11,"wrong username/password");
			
        }
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MS HOTEL "HAPPINESS ASSURED"</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script  src="function_matrix.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="admin_page.css" rel="stylesheet">
	
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
<!-- Navigation -->
<nav class="navbar navbar-expand-sm bg-transparent navbar-light sticky-top" >
<div class="container-fluid">
<a class="navbar-brand py-0" href="#"><img class="img-fluid" src="ms_hotel_logo.svg" height="25px"></a>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item active">
		  <a class="nav-link" href="customer_details.php">CUSTOMER DETAILS</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="sign_in.php">EMPLOYEE DETAILS</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="bill_payment.php">CUSTOMER BILLS</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="book.php">LOGOUT</a>
		</li>

		
	  </ul>
</div>
</nav>
<h6 style="color:red;"> You have been Logged out as USER. Please continue to Login As ADMIN. </h6>

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
                <form action="admin_page.php" method="post">
                <?php include('errors_admin_page.php') ?>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="adminname" class="form-control input_user" value="" placeholder="adminname">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="adminpassword" class="form-control input_pass" value="" placeholder="adminpassword">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                        </div>
                    </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                 <button type="submit" name="login_user" class="btn login_btn">Login</button>
               </div>
                </form>
            </div>
    
            <div class="mt-3">
                <div class="d-flex justify-content-center links">
                    Trouble Signing In.<br> Contact Mrigank Shukla.
                </div>
                
            </div>
        </div>
    </div>
</div>


<!--Sign In Page Ends-->








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
        // geting canvas by id c
        var c = document.getElementById("c");
        var ctx = c.getContext("2d");

        //making the canvas full screen
        c.height = window.innerHeight;
        c.width = window.innerWidth;

        //chinese characters - taken from the unicode charset
        var matrix = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789@#$%^&*()*&^%DBMS12$@#IS2*&AWESOME";
        //converting the string into an array of single characters
        matrix = matrix.split("");

        var font_size = 10;
        var columns = c.width / font_size; //number of columns for the rain
        //an array of drops - one per column
        var drops = [];
        //x below is the x coordinate
        //1 = y co-ordinate of the drop(same for every drop initially)
        for(var x = 0; x < columns; x++)
            drops[x] = 1; 

        //drawing the characters
        function draw()
        {
            //Black BG for the canvas
            //translucent BG to show trail
            ctx.fillStyle = "rgba(0, 0, 0, 0.04)";
            ctx.fillRect(0, 0, c.width, c.height);

            ctx.fillStyle = "#0F0"; //green text
            ctx.font = font_size + "px arial";
            //looping over drops
            for( var i = 0; i < drops.length; i++ )
            {
                //a random chinese character to print
                var text = matrix[ Math.floor( Math.random() * matrix.length ) ];
                //x = i*font_size, y = value of drops[i]*font_size
                ctx.fillText(text, i * font_size, drops[i] * font_size);

                //sending the drop back to the top randomly after it has crossed the screen
                //adding a randomness to the reset to make the drops scattered on the Y axis
                if( drops[i] * font_size > c.height && Math.random() > 0.975 )
                    drops[i] = 0;

                //incrementing Y coordinate
                drops[i]++;
            }
        }

        setInterval( draw, 35 );

        </script>
<script>
	var preloader =document.getElementById("preload");
	function myfunction(){
		preloader.style.display="none";
	}
</script>

</body>
</html>