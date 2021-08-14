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
	<link href="employee_details.css" rel="stylesheet">
	
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
		<li class="nav-item ">
		  <a class="nav-link" href="customer_details.php">CUSTOMER DETAILS</a>
		</li>
		<li class="nav-item active">
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
<?php require_once 'employee_process.php'; ?>
<?php 
    
    $db4 = mysqli_connect("localhost","root","",'DBMS_PROJECT',"3307") or die("Could Not Connect to Database");
    $qt="SELECT * FROM employee";
    $res=mysqli_query($db4,$qt);
    $qt2="SELECT DeptName FROM department where DeptId=";
?>
<div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th> Employee Id </th>
                <th>First Name</th>
                <th>Last Name</th>
                <th> DOB </th>
                <th> Employee Position </th>
                <th> Employee Salary </th>
                <th> Employee Department </th>
                <th> Phone Number 1  </th>
                <th> Phone Number 2 </th>
                <th colspan="2">Action</th>
            </tr>
        </thead> 
        <?php
        while ($row=mysqli_fetch_assoc($res)): ?>
                <?php  
                $ss=$row['DeptIdFk'];
                $qt2="SELECT DeptName FROM department where DeptId='$ss'";
                $kk=mysqli_query($db4,$qt2);
                $pp=mysqli_fetch_assoc($kk);
                $row['EmpDept']=$pp['DeptName'];
                $jj=$row['EmpId'];
                $qt3="SELECT EmpPhone FROM empphonerel where EmpIdFk='$jj'" or die('ghh');
                $res2=mysqli_query($db4,$qt3) or die('kk');
                $roww=mysqli_fetch_array($res2);
                $row['EmpPhone1']=$roww['EmpPhone'];
                $roww=mysqli_fetch_array($res2);
                $row['EmpPhone2']=$roww['EmpPhone'];
                
                
                ?>
                <tr>
                <td><?php echo  $row['EmpId']; ?>      </td>
                <td><?php echo  $row['EmpFname']; ?>   </td>
                <td><?php echo  $row['EmpLname']; ?>   </td>
                <td><?php echo  $row['EmpDob']; ?>     </td>
                <td><?php echo  $row['EmpPos']; ?>     </td>
                <td><?php echo  $row['EmpSal']; ?>     </td>
                <td><?php echo  $row['EmpDept']; ?>    </td>
                <td><?php echo  $row['EmpPhone1']; ?>   </td>
                <td><?php echo  $row['EmpPhone2']; ?> </td>
                <td>
                    <a href="employee_details.php?edit=<?php echo $row['EmpId']; ?>" class="btn btn-info"> Edit </a>
                    <a href="employee_process.php?delete=<?php echo $row['EmpId']; ?>" class="btn btn-danger"> Delete </a>
                </td> 
        </tr>
        <?php endwhile; ?>
        </table>
        </div>

<!--form for input employee -->

<?php 
if(isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type'] ?>" >
<?php 
echo $_SESSION['message'];
unset($_SESSION['message']);
?>
<?php endif ?>
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
                <form action="employee_process.php" method="POST">
                    <input type="hidden" name="EmpId" value="<?php echo $EmpId; ?>">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <label for="EmpFname"> First Name :</label>
                        </div>
                        <input type="text" name="EmpFname" id="EmpFname" class="form-control input_user" value="<?php echo  $EmpFname; ?>" placeholder="First Name" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="EmpLname"> Last Name :</label>
                        </div>
                        <input type="text" name="EmpLname" id="EmpLname"  class="form-control input_user" value="<?php echo  $EmpLname; ?>" placeholder="Last Name" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="EmpPhone1"> Phone Number 1 :</label>
                        </div>
                        <input type="text" pattern="^[1-9][0-9]{9}$" name="EmpPhone1" id="EmpPhone1" class="form-control input_user" value="<?php echo  $EmpPhone1; ?>" placeholder="Phone Number" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="EmpPhone2"> Phone Number 2 :</label>
                        </div>
                        <input type="text" pattern="^[1-9][0-9]{9}$" name="EmpPhone2" id="EmpPhone2" class="form-control input_user" value="<?php echo  $EmpPhone2; ?>" placeholder="Phone Number" required>
                    </div>
                   <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="EmpDob">Date of Birth :</label>
                        </div>
                        <input type="date" name="EmpDob" id="EmpDob" class="form-control input_user" value="<?php echo  $EmpDob; ?>" placeholder="Date of Birth" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="EmpSal"> Employee Salary :</label>
                        </div>
                        <input type="text" name="EmpSal" id="EmpSal"  class="form-control input_user" value="<?php echo  $EmpSal; ?>" placeholder="Employee Salary" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="EmpPos"> Employee Position :</label>
                        </div>
                        <input type="text" name="EmpPos" id="EmpPos"  class="form-control input_user" value="<?php echo  $EmpPos; ?>" placeholder="Employee Position" required>
                    </div>
                    
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <label for="DeptName"> Department Name :</label>
                        </div>
                         <select name="DeptName" id="DeptName" class="form-control input_user"  value="<?php echo  $DeptName; ?>" size =1 required>
                             <option value="1001">House Keeping</option>
                             <option value="2002">Food And Beverage</option>
                             <option value="3003">Cleaning</option>
                             <option value="4004">Management</option>
                          </select>
                        
                    </div>
                 
                <div class="d-flex justify-content-center mt-3 login_container">
                <?php 
                if($update == true): ?>     
                 <button type="submit" name="update" class="btn login_btn">UPDATE</button>
                <?php else:  ?>
                 <button type="submit" name="save" class="btn login_btn">SAVE</button>
                <?php endif; ?>
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