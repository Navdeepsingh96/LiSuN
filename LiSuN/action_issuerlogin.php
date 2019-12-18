
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


$result=mysqli_query($con,"SELECT firstname,email,password FROM issuers WHERE email='$uname' && password='$upassword'");
$userRow=$result->fetch_array();
//$name=mysqli_query($con,"SELECT firstname FROM issuers WHERE email='$uname'");
if(mysqli_num_rows($result)==1)
{
	$_SESSION['issuerSession'] = $userRow['firstname'];
	header("Location: issuerhome.php");
}
else{
	header("Location: reissuerlogin.php");
	$msg = "<div class='alert alert-danger'>
          <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
        </div>";
}


?>