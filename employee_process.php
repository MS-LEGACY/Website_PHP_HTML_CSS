<?php 


session_start();
$errors23=array();
$db = mysqli_connect("localhost","root","",'DBMS_PROJECT',"3307") or die("Could Not Connect to Database");
$EmpFname="";
$EmpLname="";
$EmpDob="";
$DeptName="";
$EmpPhone1="";
$EmpPhone2="";
$EmpSal=0;
$EmpPos="";
$EmpId=0;
$update=false;
$errors23 =array();  
date_default_timezone_set('Asia/Kolkata');
$today = date("Y-m-d");
if(isset($_POST['save'])){


$EmpFname  = mysqli_real_escape_string($db,$_POST['EmpFname']);
$EmpLname  = mysqli_real_escape_string($db,$_POST['EmpLname']);
$EmpDob    = date('Y-m-d', strtotime($_POST['EmpDob']));
$DeptName  = mysqli_real_escape_string($db,$_POST['DeptName']);
$EmpPhone1 =  mysqli_real_escape_string($db,$_POST['EmpPhone1']);
$EmpPhone2 =  mysqli_real_escape_string($db,$_POST['EmpPhone2']);
$EmpSal    = mysqli_real_escape_string($db,$_POST['EmpSal']);
$EmpPos    = mysqli_real_escape_string($db,$_POST['EmpPos']);
if($today <  $EmpDob) {array_push($errors23,"Invalid Birthdate");}
if($EmpPhone1 === $EmpPhone2) {array_push($errors23,"Both Phone Number should be different");}
if(count($errors23)==0)
{

    $query9="INSERT INTO employee (EmpFname, EmpLname, EmpDob, EmpSal, EmpPos, DeptIdFk) VALUES ('$EmpFname', '$EmpLname', '$EmpDob', '$EmpSal', '$EmpPos', '$DeptName')";
    mysqli_query($db,$query9) ;
    $query1="SELECT EmpId FROM employee Where EmpFname='$EmpFname' AND EmpLname='$EmpLname' AND EmpDob='$EmpDob' AND EmpSal='$EmpSal' AND EmpPos='$EmpPos' AND DeptIdFk='$DeptName' ";
    $res1=mysqli_query($db,$query1);
    $res2=mysqli_fetch_assoc($res1);
    $iddd=$res2['EmpId'];
    $query2="INSERT INTO empphonerel (EmpIdFk,CellType, EmpPhone) VALUES ('$iddd','First','$EmpPhone1')";
    $query3="INSERT INTO empphonerel (EmpIdFk,CellType, EmpPhone) VALUES ('$iddd','Second','$EmpPhone2')";
    mysqli_query($db,$query2) or die("Could Not Execute query");
    mysqli_query($db,$query3) or die("Could Not Execute query");
    $_SESSION['message']="Record has been saved";
    $_SESSION['msg_type']="success";


    header("location: employee_details.php");

}

}
if(isset($_GET['delete']))
{
    $EmpId= $_GET['delete'];
    $qwer="DELETE FROM employee WHERE EmpId='$EmpId'";
    $qwer1="DELETE FROM empphonerel WHERE EmpId='$EmpId'";
    mysqli_query($db,$qwer) or die('Query not executed');
    mysqli_query($db,$qwer) or die('Query not executed');
    $_SESSION['message']="Record has been deleted";
    $_SESSION['msg_type']="danger";
    header("location: employee_details.php");
}
if(isset($_GET['edit'])){
    $EmpId=$_GET['edit'];
    $querr="SELECT * FROM employee WHERE EmpId='$EmpId'";
    $ress=mysqli_query($db,$querr);
    if(mysqli_num_rows($ress)){
    $rows=mysqli_fetch_array($ress);
    $jj=$rows['EmpId'];
    $qt3="SELECT EmpPhone FROM empphonerel where EmpIdFk='$jj'" or die('ghh');
    $res2=mysqli_query($db,$qt3) or die('kk');
    $roww=mysqli_fetch_array($res2);
    $rows['EmpPhone1']=$roww['EmpPhone'];
    $roww=mysqli_fetch_array($res2);
    $rows['EmpPhone2']=$roww['EmpPhone'];

    $update=true;

    $EmpFname  =$rows['EmpFname'];
    $EmpLname  =$rows['EmpLname'];
    $EmpDob    =$rows['EmpDob'];
    $DeptName  =$rows['DeptIdFk'];
    $EmpPhone1 =$rows['EmpPhone1'];
    $EmpPhone2 =$rows['EmpPhone2'];
    $EmpSal    =$rows['EmpSal'];
    $EmpPos    =$rows['EmpPos'];

    }
}
if(isset($_POST['update'])){
$EmpId= $_POST['EmpId'];
$EmpFname  = mysqli_real_escape_string($db,$_POST['EmpFname']);
$EmpLname  = mysqli_real_escape_string($db,$_POST['EmpLname']);
$EmpDob    = date('Y-m-d', strtotime($_POST['EmpDob']));
$DeptName  = mysqli_real_escape_string($db,$_POST['DeptName']);
$EmpPhone1 =  mysqli_real_escape_string($db,$_POST['EmpPhone1']);
$EmpPhone2 =  mysqli_real_escape_string($db,$_POST['EmpPhone2']);
$EmpSal    = mysqli_real_escape_string($db,$_POST['EmpSal']);
$EmpPos    = mysqli_real_escape_string($db,$_POST['EmpPos']);
if($today <  $EmpDob) {array_push($errors23,"Invalid Birthdate");}
if($EmpPhone1 === $EmpPhone2) {array_push($errors23,"Both Phone Number should be different");}
if(count($errors23)==0)
{

    $query9="UPDATE employee SET EmpFname='$EmpFname', EmpLname='$EmpLname', EmpDob='$EmpDob', EmpSal='$EmpSal', EmpPos='$EmpPos', DeptIdFk='$DeptName' WHERE EmpId='$EmpId'";
    mysqli_query($db,$query9) ;
    $query1="SELECT EmpId FROM employee Where EmpFname='$EmpFname' AND EmpLname='$EmpLname' AND EmpDob='$EmpDob' AND EmpSal='$EmpSal' AND EmpPos='$EmpPos' AND DeptIdFk='$DeptName' ";
    $res1=mysqli_query($db,$query1);
    $res2=mysqli_fetch_assoc($res1);
    $iddd=$res2['EmpId'];
    $query2="UPDATE empphonerel SET EmpPhone='$EmpPhone1' WHERE EmpIdFk='$iddd' AND CellType='First'";
    mysqli_query($db,$query2) or die("Could Not Execute query 1");
    $query3="UPDATE empphonerel SET EmpPhone='$EmpPhone2' WHERE EmpIdFk='$iddd' AND CellType='Second'";
    mysqli_query($db,$query3) or die("Could Not Execute query");
    $_SESSION['message']="Record has been edited";
    $_SESSION['msg_type']="success";


    header("location: employee_details.php");

}

}


?>