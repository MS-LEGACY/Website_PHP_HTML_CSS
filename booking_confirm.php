<?php 


$_SESSION['BookedRoom']=false;

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

$db23 = mysqli_connect("localhost","root","",'DBMS_PROJECT',"3307") or die("Could Not Connect to Database");	 	
date_default_timezone_set('Asia/Kolkata');
$today = date("Y-m-d");

if( $_SERVER["REQUEST_METHOD"] == "POST") {


$CustFname = mysqli_real_escape_string($db23,$_POST['CustFname']);
$CustLname = mysqli_real_escape_string($db23,$_POST['CustLname']);
$BedType = mysqli_real_escape_string($db23,$_POST['BedType']);
$CustDob = date('Y-m-d', strtotime($_POST['CustDob']));
$CustHome = mysqli_real_escape_string($db23,$_POST['CustHome']);
$CustStreet = mysqli_real_escape_string($db23,$_POST['CustStreet']);
$CustCity =  mysqli_real_escape_string($db23,$_POST['CustCity']);
$CustEmail = mysqli_real_escape_string($db23,$_POST['CustEmail']);
$CustNoGuest = mysqli_real_escape_string($db23,$_POST['CustNoGuest']);
$EntryDate = ($_POST['EntryDate']);
$ExitDate = ($_POST['ExitDate']);
}


$errors23 =array();
if($EntryDate > $ExitDate) {array_push($errors23,"Entry date before exit date");}
if($today > $EntryDate) {array_push($errors23,"Enter entry date after today");}
if($today <  $CustDob) {array_push($errors23,"Invalid Birthdate");}

$user_check_query1= "SELECT RoomNo FROM rooms WHERE BedType = '$BedType' AND RoomAvail = true LIMIT 1" ;

$results23 = mysqli_query($db23,$user_check_query1);

 

if(mysqli_num_rows($results23) > 0) {

    $room = mysqli_fetch_assoc($results23);
    $room1 = $room['RoomNo'];

}
else {

    array_push($errors23,"Selected Room Not Available");
}
if(count($errors23) == 0 && mysqli_num_rows($results23) > 0) {  

    $query23 = "INSERT INTO customer (CustFname, CustLname, CustDob, CustHome, CustStreet, CustCity, CustEmail, CustNoGuest, EntryDate, ExitDate, RoomNoFk) VALUES ('$CustFname', '$CustLname', '$CustDob', '$CustHome', '$CustStreet', '$CustCity', '$CustEmail', '$CustNoGuest', '$EntryDate', '$ExitDate', '$room1')";
    mysqli_query($db23,$query23) or die ( mysql_error() );
    $query24= "UPDATE rooms SET RoomAvail=false WHERE RoomNo='$room1'";
    mysqli_query($db23,$query24) or die ( mysql_error() );
    $_SESSION['bcc']="Booking Successful";
    $_SESSION['BookedRoom']=true;
    $query24="SELECT BookingId FROM customer WHERE CustEmail='$CustEmail' AND CustDob='$CustDob' limit 1";
    $results24 = mysqli_query($db23,$query24);
    if(mysqli_num_rows($results24) > 0) {

        $Bookingid = mysqli_fetch_assoc($results24);
        $kk= $Bookingid['BookingId'];
        $_SESSION['BookingID'] = $kk;
    
    }
    $errors23=array();
} 
else
{

    $_SESSION['bcc']="Booking Unsuccessful !!! Try Again";
}



?>
    
    
