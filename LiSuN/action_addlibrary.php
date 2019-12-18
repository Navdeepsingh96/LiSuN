<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form

	//mysql credentials
	$mysql_host = "localhost";
	$mysql_username = "root";
	$mysql_password = "root";
	$mysql_database = "LiSuN";
	
	$lib_name = filter_var($_POST["libname"], FILTER_SANITIZE_STRING); //set PHP variables like this so we can use them anywhere in code below
	$lib_add = filter_var($_POST["libadd"], FILTER_SANITIZE_STRING);
	$lib_contact = filter_var($_POST["libcontact"], FILTER_SANITIZE_STRING);
	

	if (empty($lib_name)){
		die("Please enter library name");
	}
	
	if (empty($lib_add)){
		die("Please enter library address");
	}

	if (empty($lib_contact)){
		die("Please enter library contact");
	}
	
	

	//Open a new connection to the MySQL server
	//see https://www.sanwebe.com/2013/03/basic-php-mysqli-usage for more info
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
	
	//Output any connection error
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}	
	
	$statement = $mysqli->prepare("INSERT INTO libraries (Name, Address, contact) VALUES(?, ?,?)"); //prepare sql insert query
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('sss', $lib_name,$lib_add, $lib_contact); //bind values and execute insert query
	
	if($statement->execute()){
		header("Location: addlibrary.php");
	}else{
		print $mysqli->error; //show mysql error if any
	}
}
?>