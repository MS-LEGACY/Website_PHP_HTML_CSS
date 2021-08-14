
<?php 
  $_SESSION['Order']="Items should Be selected to place order"; 
$OrdersAmiId="";
$OrdersBookingId="";
$OrdersQty="";
$OrdersDate="";
$OrdersTotal=0;
$O601="";
$O602="";
$O603="";
$O604="";
$O605="";
$O606="";
$O801="";
$O802="";
$db23 = mysqli_connect("localhost","root","",'DBMS_PROJECT',"3307") or die("Could Not Connect to Database");
date_default_timezone_set('Asia/Kolkata');
$OrdersDate = date("Y-m-d");
$orderqt=array();
$orderqt1=array();
$errors24=array();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $O601=mysqli_real_escape_string($db23,$_POST['601']);  array_push($orderqt1,601);  array_push($orderqt,$O601); 
    $O602=mysqli_real_escape_string($db23,$_POST['602']);  array_push($orderqt1,602);  array_push($orderqt,$O602); 
    $O603=mysqli_real_escape_string($db23,$_POST['603']);  array_push($orderqt1,603);  array_push($orderqt,$O603);
    $O604=mysqli_real_escape_string($db23,$_POST['604']);  array_push($orderqt1,604);  array_push($orderqt,$O604);
    $O605=mysqli_real_escape_string($db23,$_POST['605']);  array_push($orderqt1,605);  array_push($orderqt,$O605);
    $O606=mysqli_real_escape_string($db23,$_POST['606']);  array_push($orderqt1,606);  array_push($orderqt,$O606);
    $O801=mysqli_real_escape_string($db23,$_POST['801']);  array_push($orderqt1,801);  array_push($orderqt,$O801);
    $O802=mysqli_real_escape_string($db23,$_POST['802']);  array_push($orderqt1,802);  array_push($orderqt,$O802);

$email=$_SESSION['EMAIL'];
$step=0;
$query1="SELECT BookingId from customer where CustEmail='$email'";
$results1=mysqli_query($db23,$query1) or die(mysql_err());
$OrdersBookingId1=mysqli_fetch_assoc($results1);
$OrdersBookingId=$OrdersBookingId1['BookingId'];
if(count($orderqt) > 0) {
foreach($orderqt as $op) {

    if ($op > 0)
    {
        $Ord=$orderqt1[$step];
        $OrdersAmiId=$op;
        $query1="SELECT BookingId from customer where CustEmail='$email'";
        $results1=mysqli_query($db23,$query1) or die(mysql_err());
        $OrdersBookingId1=mysqli_fetch_assoc($results1);
        $OrdersBookingId=$OrdersBookingId1['BookingId'];
        $query2="SELECT AmiCost from aminity where AmiId='$Ord'";
        $results2=mysqli_query($db23,$query2) or die(mysql_err());
        $OrdersTotal1=mysqli_fetch_assoc($results2);
        $OrdersTotal=$OrdersTotal1['AmiCost'] * $op;
        $query3="INSERT INTO orders (OrdersAmiId, OrdersBookingId, OrdersQty, OrdersDate, OrdersTotal) VALUES ('$Ord','$OrdersBookingId','$op','$OrdersDate', '$OrdersTotal')";
        mysqli_query($db23,$query3) or die(mysql_err());
        $query4="SELECT DeptId from aminity where AmiId='$Ord'";
        $results5=mysqli_query($db23,$query4) or die(mysql_err());
        $deptt=mysqli_fetch_assoc($results5);
        $deptt1=$deptt['DeptId'];
        $query5="INSERT INTO bill (BillAmt, BillStatus, BillDeptId, BillBookingId) values ('$OrdersTotal','false','$deptt1','$OrdersBookingId')";
        mysqli_query($db23,$query5) or die(mysql_err());
        $_SESSION['Order']="Order Placed Successfully";
    }
    $step++;
}

}
else{
    $_SESSION['Order']="Items should Be selected to place order"; 
}

}


?>