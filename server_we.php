<?php 

session_start();

//intializing variables

$username ="";
$email = "";
$errors =array();
//connect to db

$db = mysqli_connect("localhost","root","",'DBMS_PROJECT',"3307") or die("Could Not Connect to Database");

//register Users
if(isset($_POST['username']) && $_SERVER["REQUEST_METHOD"] == "POST"){
  
$username = mysqli_real_escape_string($db,$_POST['username']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
$password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

if(empty($username)) {array_push($errors,"Username Is Required");}
if(empty($email)) {array_push($errors,"Emial Is Required");}
if(empty($password_1)) {array_push($errors,"Password Is Required");}
if($password_1 != ($password_2)) {array_push($errors,"Passwords Do Not Match");}
}

// Check Db for existing User 

$user_check_query= "SELECT * FROM user_reg WHERE username = '$username' or email = '$email' LIMIT 1" ;

$results = mysqli_query($db,$user_check_query);

$user = mysqli_fetch_assoc($results);

if($user)  {

    if($user['username'] === $username) array_push($errors,"Username already exists");
    if($user['email'] === $username) array_push($errors,"This is email-id already has a registerd username");
}


//Register the user if no error

if(count($errors)== 0) {

    $password = $password_1;// this encrypts password
    $query = "INSERT INTO user_reg (username, email , password1 )  VALUES ('$username','$email','$password')";

    mysqli_query($db,$query);
    $_SESSION['username'] = $username;
    
    $_SESSION['success']= "You Are Now Logged In";
    $errors=array();
    header("Location: book.php"); 

}
?>