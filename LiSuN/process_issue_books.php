<?php
session_start();
	$mysqli = new mysqli("localhost", "root", "root", "LiSuN"); 
	
	if($mysqli === false)
	{ 
    die("ERROR: Could not connect. " 
            . $mysqli->connect_error); 
	}
	$mysql_host = "localhost";
	$mysql_username = "root";
	$mysql_password = "root";
	$mysql_database = "liSuN";
	$link = mysqli_connect("localhost", "root", "root", "LiSuN"); 
	
	$firstname = $_SESSION['librarianSession'];
	
	
	$librariandb=mysqli_query($link,"SELECT libname FROM librarians WHERE firstname='$firstname'");
	$librow=$librariandb->fetch_array();
	$libname=$librow['libname'];
	
	$book_id = $_POST["book_id"];
	$issuer_name = $_POST["issuer_name"];
	$issuer_email = $_POST["issuer_email"];
	
	$param_issued= "yes";
    $param_issuer_name =$issuer_name ;
    $param_issuer_email = $issuer_email;
  	$param_issue_date = date("y-m-d");
    $param_id = $book_id;
  
$sql = "UPDATE $libname SET  issued='$param_issued', issuer_name='$param_issuer_name', issuer_email='$param_issuer_email', issuer_date='$param_issue_date' WHERE id='$param_id'"; 
if($mysqli->query($sql) == true){ 
    header("location: get_issued_books.php");
} else{ 
    echo "ERROR: Could not able to execute $sql. "  
                                        . $mysqli->error; 
} 
$mysqli->close(); 
?> 