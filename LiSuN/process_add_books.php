<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form

	//mysql credentials
	$mysql_host = "localhost";
	$mysql_username = "root";
	$mysql_password = "root";
	$mysql_database = "LiSuN";
	
	$con =mysqli_connect($mysql_host,$mysql_username,$mysql_password, $mysql_database);
	$book_name = filter_var($_POST["book_name"], FILTER_SANITIZE_STRING);
	$book_author = filter_var($_POST["book_author"], FILTER_SANITIZE_STRING);
	$book_publication = filter_var($_POST["book_publication"], FILTER_SANITIZE_STRING);

	if (empty($book_name)){
		die("Please enter book name");
	}
	
	if (empty($book_author)){
		die("Please enter book author");
	}

	if (empty($book_publication)){
		die("Please enter book publication");
	}
	
	

	//Open a new connection to the MySQL server
	//see https://www.sanwebe.com/2013/03/basic-php-mysqli-usage for more info
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
	
	//Output any connection error
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}	
	$firstname = $_SESSION['librarianSession'];
	$librariandb=mysqli_query($con,"SELECT libname FROM librarians WHERE firstname='$firstname'");
	$librow=$librariandb->fetch_array();
	$libname=$librow['libname'];
	$statement = $mysqli->prepare("INSERT INTO $libname (book_name, book_author, book_publication) VALUES(?,?,?)"); //prepare sql insert query
	//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
	$statement->bind_param('sss',$book_name, $book_author,$book_publication); //bind values and execute insert query
	
	if($statement->execute()){
		 header("location: librarianhome.php");
            exit();
	}else{
		print $mysqli->error; //show mysql error if any
	}
}
?>

  