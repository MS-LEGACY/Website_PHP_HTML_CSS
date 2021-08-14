<?php 


session_start();
$errors23=array();
$db = mysqli_connect("localhost","root","",'DBMS_PROJECT',"3307") or die("Could Not Connect to Database");
$update=false;
$CustFname="";
$CustLname="";
$CustDob="";
$CustHome ="";
$CustStreet="";
$CustCity ="";
$CustEmail="";
$CustNoGuest="";
$EntryDate="";
$ExitDate="";
$BedType="";
$BookingId=0;
date_default_timezone_set('Asia/Kolkata');
$today = date("Y-m-d");

if (isset($_GET['delete'])){
    $BookingId= $_GET['delete'];
    $qu="DELETE FROM customer where BookingId='$BookingId'" or die("Could not perform the query");
    mysqli_query($db,$qu);

    $_SESSION['message']="Record Has Been Deleted";
    $_SESSION['msg_type']="Success";
    header("Location: customer_details.php");

}

if(isset($_GET['edit'])){
    $BookingId=$_GET['edit'];
    $update=true;
    $quet="SELECT * FROM customer where BookingId='$BookingId'" or die("could not perform query");
    $res=mysqli_query($db,$quet);
    if(mysqli_num_rows($res)==1)
    {
       
        $row = mysqli_fetch_array($res);
        $quet1="SELECT BedType FROM rooms where RoomNo='$row[RoomNoFk]'";
        $res1=mysqli_query($db,$quet1);
        $pp=mysqli_fetch_assoc($res1);
        $BookingId=$row['BookingId'];
        $CustFname=$row['CustFname'];                  
        $CustLname=$row['CustLname']; 
        $CustDob=$row['CustDob'];
        $CustHome =$row['CustHome'];
        $CustStreet=$row['CustStreet'];
        $CustCity =$row['CustCity']; 
        $CustEmail=$row['CustEmail'];
        $CustNoGuest=$row['CustNoGuest'];
        $EntryDate=$row['EntryDate']; 
        $ExitDate=$row['ExitDate'];
        $BedType=$pp['BedType'];
    }
}

if(isset($_POST['update'])){
    $BookingId1 = mysqli_real_escape_string($db,$_POST['BookingId']);
$CustFname1 = mysqli_real_escape_string($db,$_POST['CustFname']);
$CustLname1 = mysqli_real_escape_string($db,$_POST['CustLname']);
$BedType1 = mysqli_real_escape_string($db,$_POST['BedType']);
$CustDob1 = date('Y-m-d', strtotime($_POST['CustDob']));
$CustHome1 = mysqli_real_escape_string($db,$_POST['CustHome']);
$CustStreet1 = mysqli_real_escape_string($db,$_POST['CustStreet']);
$CustCity1 =  mysqli_real_escape_string($db,$_POST['CustCity']);
$CustEmail1 = mysqli_real_escape_string($db,$_POST['CustEmail']);
$CustNoGuest1 = mysqli_real_escape_string($db,$_POST['CustNoGuest']);
$EntryDate1 = ($_POST['EntryDate']);
$ExitDate1 = ($_POST['ExitDate']);
$errors23 =array();
if($EntryDate1 > $ExitDate1) {array_push($errors23,"Entry date before exit date");}
if($today > $EntryDate1) {array_push($errors23,"Enter entry date after today");}
if($today <  $CustDob) {array_push($errors23,"Invalid Birthdate");}

$user_check_query1= "SELECT RoomNo FROM rooms WHERE BedType = '$BedType1' AND RoomAvail = true LIMIT 1" ;

$results23 = mysqli_query($db,$user_check_query1);

 

if(mysqli_num_rows($results23) > 0) {

    $room = mysqli_fetch_assoc($results23);
    $room1 = $room['RoomNo'];

}
else {

    array_push($errors23,"Selected Room Not Available");
}
if(count($errors23) == 0 && mysqli_num_rows($results23) > 0) {
    
    $query23 = "UPDATE customer SET CustFname='$CustFname1', CustLname='$CustLname1', CustDob='$CustDob1', CustHome='$CustHome1', CustStreet='$CustStreet1', CustCity='$CustCity1', CustEmail='$CustEmail1', CustNoGuest='$CustNoGuest1', EntryDate='$EntryDate1', ExitDate='$ExitDate1', RoomNoFk='$room1'  WHERE BookingId='$BookingId1'" or die("abba");
    mysqli_query($db,$query23) or die ( mysql_error() );
    $query24= "UPDATE rooms SET RoomAvail=false WHERE RoomNo='$room1'";
    mysqli_query($db,$query24) or die ( mysql_error() );

    $_SESSION['message']="Record has been updated!";
    $_SESSION['msg_type']="Confirm!!";

    header("Location: customer_details.php");

}
}