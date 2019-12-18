<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form
session_start();
	//mysql credentials
	$mysql_host = "localhost";
	$mysql_username = "root";
	$mysql_password = "root";
	$mysql_database = "LiSuN";
	
	
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$age = $_POST["age"];
	$gender = $_POST["gender"];
	$contact = $_POST["contact"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	

	
	
	if (empty($firstname)){
		die("Please enter firstname");
	}

	if (empty($lastname)){
		die("Please enter lastname");
	}
	if (empty($age)){
		die("Please enter age");
	}
	
	if (empty($gender)){
		die("Please enter gender");
	}

	if (empty($contact)){
		die("Please enter contact");
	}
	if (empty($email)){
		die("Please enter email");
	}
	
	if (empty($password)){
		die("Please enter password");
	}

	
	

	//Open a new connection to the MySQL server
	//see https://www.sanwebe.com/2013/03/basic-php-mysqli-usage for more info
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
	
	//Output any connection error
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}	
	
	$statement = $mysqli->prepare("INSERT INTO issuers (firstname, lastname, age, gender, contact, email, password) VALUES(?,?,?,?,?,?,?)"); //prepare sql insert query
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('sssssss', $firstname, $lastname, $age, $gender, $contact, $email, $password); //bind values and execute insert query
	
	if($statement->execute()){
		header("Location: issuerlogin.php");
	}else{
		print $mysqli->error; //show mysql error if any
	}
}
?>