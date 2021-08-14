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
<nav class="navbar navbar-expand-sm bg-transparent navbar-light sticky-none" >
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
<?php include('bill_process.php') ?>
<?php
$db = mysqli_connect("localhost","root","",'DBMS_PROJECT',"3307") or die("Could Not Connect to Database");
$qer= "SELECT * FROM bill";
$res=mysqli_query($db,$qer) or die("could not execute the query");
?>
<div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th> Bill ID </th>
                <th>Bill Amount</th>
                <th>Bill Status</th>
                <th> Payment Method </th>
                <th> Billing Department </th>
                <th> Booking Id </th>
                <th colspan="1">Action</th>
            </tr>
        </thead>
        <?php
        while ($row=mysqli_fetch_assoc($res)): ?>
        <tr>
            <td><?php echo  $row['BillId']; ?> </td>
            <td><?php echo  $row['BillAmt']; ?> </td>
            <td><?php echo  $row['BillStatus']; ?> </td>
            <td><?php echo  $row['PaymentMethod']; ?>   </td>
            <td><?php echo  $row['BillDeptId']; ?>  </td>
            <td><?php echo  $row['BillBookingId']; ?>  </td>
            <td> 
                <a href="bill_payment.php?edit=<?php echo $row['BillId']; ?>"
                class="btn btn-info">Edit</a>
            </td>
        </tr>
        <?php endwhile; ?>

     </table>
</div>

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
                <form action="bill_payment.php" method="post">
                <input type="hidden" name="BillId" value="<?php echo  $BillId; ?>">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <label for="BillId"> Bill Id</label>
                        </div>
                        <input type="text" name="BillId" class="form-control input_user" value="<?php echo  $BillId; ?>" placeholder="Bill Id" readonly>
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <label for="BillAmt"> Bill Amount </label>
                        </div>
                        <input type="number" name="BillAmt" class="form-control input_pass" value="<?php echo  $BillAmt; ?>" placeholder="Bill Amount" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <label for="BillDeptId">Department ID</label>
                        </div>
                        <input type="text" name="BillDeptId" class="form-control input_user" value="<?php echo  $BillDeptId; ?> " placeholder="Billing Department" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <label for="BillBookingId">Booking ID</label>
                        </div>
                        <input type="text" name="BillBookingId" class="form-control input_user" value="<?php echo  $BillBookingId; ?>" placeholder="Booking Id" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <label for="BillStatus">Bill Status</label>
                        </div>
                        <input type="text" name="BillStatus" class="form-control input_user" value="<?php echo  $BillStatus; ?>" placeholder="Billing Stauts" >
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <label for="PaymentMethod">Payment Method</label>
                        </div>
                        <input type="text" name="PaymentMethod" class="form-control input_user" value="<?php echo  $PaymentMethod; ?>" placeholder="Billing Stauts" >
                    </div>


                    
                        <div class="d-flex justify-content-center mt-3 login_container">
                 <button type="submit" name="update" class="btn login_btn">PAY</button>
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