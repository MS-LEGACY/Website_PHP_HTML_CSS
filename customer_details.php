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
	<link href="customer_details.css" rel="stylesheet">
	
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
			<a class="nav-link" href="employee_details.php">EMPLOYEE DETAILS</a>
        </li>
        <li class="nav-item">
			<a class="nav-link" href="bill_payment.php">CUSTOMER BILLS</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="logout1.php">LOGOUT</a>
		</li>

		
	  </ul>
</div>
</nav>
<?php include('customer_delete.php')  ?>

<?php 
if(isset($_SESSION['message'])): ?>

<div class="alert alert=<?=$_SESSION['msg_type']?>">

<?php 
echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</div>
<?php endif ?>


<?php
$db = mysqli_connect("localhost","root","",'DBMS_PROJECT',"3307") or die("Could Not Connect to Database");
$qer= "SELECT * FROM customer";
$res=mysqli_query($db,$qer) or die("could not execute the query");
?>
<div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th> Booking ID </th>
                <th>First Name</th>
                <th>Last Name</th>
                <th> DOB </th>
                <th> Home </th>
                <th> Street </th>
                <th> City </th>
                <th> Email </th>
                <th> Number of Guest </th>
                <th> Entry Date </th>
                <th> Exit Date </th>
                <th> Room Number </th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <?php
        while ($row=mysqli_fetch_assoc($res)): ?>
        <tr>
            <td><?php echo  $row['BookingId']; ?> </td>
            <td><?php echo  $row['CustFname']; ?> </td>
            <td><?php echo  $row['CustLname']; ?> </td>
            <td><?php echo  $row['CustDob']; ?>   </td>
            <td><?php echo  $row['CustHome']; ?>  </td>
            <td><?php echo  $row['CustStreet']; ?> </td>
            <td><?php echo  $row['CustCity']; ?>    </td>
            <td><?php echo  $row['CustEmail']; ?>    </td>
            <td><?php echo  $row['CustNoGuest']; ?>  </td>
            <td><?php echo  $row['EntryDate']; ?>   </td>
            <td><?php echo  $row['ExitDate']; ?>    </td>
            <td><?php echo  $row['RoomNoFk']; ?>    </td>
            <td> 
                <a href="customer_details.php?edit=<?php echo $row['BookingId']; ?>"
                class="btn btn-info">Edit</a>
                <a href="customer_delete.php?delete=<?php echo $row['BookingId']; ?>"
                class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>

     </table>
</div>
<?php include('errorsbooking.php') ?>
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
                <form action="customer_details.php" method="POST">
                    <input type="hidden" name="BookingId" value="<?php echo $BookingId; ?>">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <label for="CustFname"> First Name :</label>
                        </div>
                        <input type="text" name="CustFname" id="CustFname" class="form-control input_user" value="<?php echo  $CustFname; ?>" placeholder="First Name" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="CustLname"> Last Name :</label>
                        </div>
                        <input type="text" name="CustLname" id="CustLname"  class="form-control input_user" value="<?php echo  $CustLname; ?>" placeholder="Last Name" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="CustHome"> Address Line 1 :</label>
                        </div>
                        <input type="text" name="CustHome"  id="CustHome" class="form-control input_user" value="<?php echo  $CustHome; ?>" placeholder="Home/Flat Number, Society Name" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="CustStreet"> Address Line 2 :</label>
                        </div>
                        <input type="text" name="CustStreet" id="CustStreet"  class="form-control input_user" value="<?php echo  $CustStreet; ?>" placeholder="Street Name,City" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="CustCity"> Pin Code :</label>
                        </div>
                        <input type="text" pattern="^[1-9][0-9]{5}$" name="CustCity" id="CustCity" class="form-control input_user" value="<?php echo  $CustCity; ?>" placeholder="City Pin Code" required>
                    </div>
                   <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="CustDob">Date of Birth :</label>
                        </div>
                        <input type="date" name="CustDob" id="CustDob" class="form-control input_user" value="<?php echo  $CustDob; ?>" placeholder="Date of Birth" required>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                        <label for="CustEmail"> E-Mail :</label>
                        </div>
                        <input type="email" name="CustEmail" id="CustEmail" class="form-control input_pass" value="<?php echo  $CustEmail; ?>" placeholder="email same as login" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="CustNoGuest"> Number Of Guests :</label>
                        </div>
                        <input type="number" name="CustNoGuest" id="CustNoguest" min=1 max=4 class="form-control input_user" value="<?php echo  $CustNoGuest; ?>" placeholder="Number of guests" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="EntryDate"> Entry Date :</label>
                        </div>
                        <input type="date" name="EntryDate" id="EntryDate"  class="form-control input_user" value="<?php echo  $EntryDate; ?>" placeholder="Entry Date" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="ExitDate"> Exit Date :</label>
                        </div>
                        <input type="date" name="ExitDate" id="ExitDate"  class="form-control input_user" value="<?php echo  $ExitDate; ?>" placeholder="Exit date" required>

                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="BedType"> Room Type :</label>
                        </div>
                         <select name="BedType" id="BedType" class="form-control input_user" id="cars" value="<?php echo  $BedType; ?>" size =1 required>
                             <option value="Wedding">Wedding Suit</option>
                             <option value="DoubleBed1">Room A/C</option>
                             <option value="DoubleBed">Two Single Beds</option>
                             <option value="DoubleBed2">Room Non A/C</option>
                          </select>
                        
                    </div>
                    
                   
                        <div class="d-flex justify-content-center mt-3 login_container">
                 <button type="submit" name="update" class="btn login_btn">UPDATE</button>
               </div>
                </form>
            </div>
  
               
            </div>
        </div>
    </div>
</div>

<script>
	var preloader =document.getElementById("preload");
	function myfunction(){
		preloader.style.display="none";
	}
</script>

</body>
</html>