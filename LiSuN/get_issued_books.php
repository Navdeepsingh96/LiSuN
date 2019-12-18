<?php
session_start();
//include_once 'connect.php';

//echo $_SESSION['librarianSession'];

if (!isset($_SESSION['librarianSession'])) 
{
	header("Location: librarianlogin.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Return Books</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
	
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
	<link rel="stylesheet" a href="assets\css\adminloginmain.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" a href="assets\css\font-awesome.min.css">		
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/demo.css">-->
		<link rel="stylesheet" href="assets/css/footer-distributed-with-address-and-phones.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
		<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
	<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
body {
  font-family: Arial;
  margin: 0;
}

.header {
  padding: 30px;
  text-align: center;
  background: #1abc9c;
  color: white;
  font-size: 30px;
}

.button {
  background-color: #1ABC9C; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<div class="header">
  <h1>Return Books</h1>
</div>
		<!-- Header -->
			<header id="header">
				<div class="topnav">
					<a href="index.html" class="logo">LiSuN</a>
					<nav id="nav">
						<a href="librarianhome.php">Librarian Home</a>
						<a href="add_books.php">Add Books</a>
						<a href="get_books.php">Update Books</a>
						<a href="issue_books.php">Issue Books</a>
						<a href="get_issued_books.php">Return Books</a>
						<a href="librarianrequest.php">Request Admin</a>
						<a href="librarianviewissuerrequests.php">View Issuer queries</a>
						<a href="librarianlogout.php?logout">Logout</a>
						
					</nav>
				</div>
			</header>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Books Details</h2>
                        <a href="add_books.php" class="btn btn-success pull-right">Add New Books</a>
                    </div>
                    <?php
                    // Include config file
                //    require_once "config.php";
					$link =mysqli_connect("localhost","root","root", "LiSuN");
					$firstname = $_SESSION['librarianSession'];
					$librariandb=mysqli_query($link,"SELECT libname FROM librarians WHERE firstname='$firstname'");
					$librow=$librariandb->fetch_array();
					$libname=$librow['libname'];
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM $libname WHERE issued='yes'";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Book Name</th>";
                                        echo "<th> Issuer Name </th>";
                                        echo "<th>Issuer email</th>";
                                        echo "<th>Issue date</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>".$row['id']. "</td>";
										echo "<td>".$row['book_name']."</td>"; 
										echo "<td>".$row['issuer_name']."</td>"; 
										echo "<td>".$row['issuer_email']."</td>"; 
                                        echo "<td>".$row['issuer_date']."</td>"; 
                                        echo "<td>";
                                          //  echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='return.php?id=". $row['id'] ."' title='Return book' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            //echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
	<!-- Footer -->
			<footer class="footer-distributed">

			<div class="footer-left">

				<h3>LiSuN</h3>

				

				<p class="footer-company-name">LiSuN &copy; 2019</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>955 Oliver Rd</span>Thunder Bay, ON P7B 5E1</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+1 (807) 343-8110</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">cloudcomputinglu@gmail.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>About the company</span>
					LiSuN is Library Supervising Network which is a server-less, AWS cloud-based Library Supervising Network where user can easily
find the intended book across all the libraries in the city.
				</p>

				

			</div>

		</footer>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</body>
</html>