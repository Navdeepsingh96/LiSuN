<?php
//if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form

session_start();
$host="localhost";
$user="root";
$password="root";
$db="LiSuN";

$con =mysqli_connect($host,$user,$password, $db);
	 

	
$uname=$_POST['loginid'];
$upassword=$_POST['password'];


$result=mysqli_query($con,"SELECT * FROM adminlogin WHERE LoginID='$uname' && Password='$upassword'");

if(mysqli_num_rows($result)==1)
{
	$_SESSION['userSession'] = $uname;
	header("Location: adminhome.php");
}
else{
	header("Location: readminlogin.php");
	$msg = "<div class='alert alert-danger'>
          <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
        </div>";
}


?>