<?php 


session_start();
$errors23=array();
$db = mysqli_connect("localhost","root","",'DBMS_PROJECT',"3307") or die("Could Not Connect to Database");



$BillId=0;
$BillAmt=0;
$BillStatus="";
$PaymentMethod="";
$BillDeptId=0;
$BillBookingId=0;
if(isset($_GET['edit']))
{
    $BillId = $_GET['edit'] ;
    $query="SELECT * FROM bill where BillId='$BillId'";
    $result=mysqli_query($db,$query);
    if(mysqli_num_rows($result)==1)
    {
        $row=mysqli_fetch_assoc($result);
        $BillId=$row['BillId']; 
        $BillAmt=$row['BillAmt']; 
        $BillStatus=$row['BillStatus']; 
        $PaymentMethod=$row['PaymentMethod'];
        $BillDeptId=$row['BillDeptId']; 
        $BillBookingId=$row['BillBookingId'];
    }
}

if(isset($_POST['update'])){

    $BillId=mysqli_real_escape_string($db,$_POST['BillId']);
    $BillId=mysqli_real_escape_string($db,$_POST['BillId']); 
    $BillAmt=mysqli_real_escape_string($db,$_POST['BillAmt']); 
    $BillStatus=mysqli_real_escape_string($db,$_POST['BillStatus']); 
    $PaymentMethod=mysqli_real_escape_string($db,$_POST['PaymentMethod']);
    $BillDeptId=mysqli_real_escape_string($db,$_POST['BillDeptId']); 
    $BillBookingId=mysqli_real_escape_string($db,$_POST['BillBookingId']);
    $query=" UPDATE BILL set BillStatus='$BillStatus',PaymentMethod='$PaymentMethod' where BillId='$BillId'";
    mysqli_query($db,$query);
}
?>