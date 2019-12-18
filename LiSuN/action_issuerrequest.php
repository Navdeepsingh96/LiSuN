<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form
session_start();
	//mysql credentials
	$mysql_host = "localhost";
	$mysql_username = "root";
	$mysql_password = "root";
	$mysql_database = "LiSuN";
	
	$name = filter_var($_POST["name"], FILTER_SANITIZE_STRING); //set PHP variables like this so we can use them anywhere in code below
	$email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
	$request = filter_var($_POST["request"], FILTER_SANITIZE_STRING);
	

	if (empty($name)){
		$_SESSION['errMsg']="Please enter name";
		
	}
	
	if (empty($email)){
		$_SESSION['errMsg']="Please enter email address";
	}

	if (empty($request)){
		$_SESSION['errMsg']="Please enter your request";
	}
	
	

	//Open a new connection to the MySQL server
	//see https://www.sanwebe.com/2013/03/basic-php-mysqli-usage for more info
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
	
	//Output any connection error
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}	
	
	$statement = $mysqli->prepare("INSERT INTO issuerrequests (name, email, request) VALUES(?,?,?)"); //prepare sql insert query
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('sss', $name, $email, $request); //bind values and execute insert query
	
	if($statement->execute()){
		header("Location: contactus.php");
	}else{
		print $mysqli->error; //show mysql error if any
	}
}
?>