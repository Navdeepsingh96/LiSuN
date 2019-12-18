<?php
session_start();
//include_once 'connect.php';

//echo $_SESSION['issuerSession'];

if (!isset($_SESSION['issuerSession'])) 
{
	header("Location: issuerlogin.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8" />
		<link rel="stylesheet" a href="assets\css\adminloginmain.css">
		<link rel="stylesheet" a href="assets\css\font-awesome.min.css">		
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/demo.css">-->
		<link rel="stylesheet" href="assets/css/footer-distributed-with-address-and-phones.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
		<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	</head>
	<body>
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
  <h1>Issuer Request</h1>
</div>

		<!-- Header -->
			<header id="header">
				<div class="topnav">
					<a href="index.html" class="logo">LiSuN</a>
					<nav id="nav">
						<a href="issuerhome.php">Issuer Home</a>
						<a href="issuerrequest.php">Send Your query to librarian</a>
						
					</nav>
				</div>
			</header>
    
    <title>View books</title>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">View Books from all the libraries</h2>
                        <a href="issuerhome.php" class="btn btn-success pull-right">Issuer Home</a>
                    </div>
			<form method="POST" action='issuerviewbooks.php'>
				<div >
				<select name="libname" value='<?php echo $lname; ?>'>
					<option>Select library</option>
					<option value="waverley_resource_library">Waverley Resource Library</option>
					<option value="brodie_resource_library">Brodie Resource Library</option>
					<option value="mary_jl_black_branch">Mary J.L. Black Branch</option>
					<option value="chancellor_paterson_library">Chancellor Paterson Library</option>
				</select>	
				
				</div>
				<div>
				<input type="submit" name="submit" value="Show books" />
				</div>
			</form>
                    <?php
                    // Include config file
                //    require_once "config.php";
                    $link = mysqli_connect("localhost", "root", "root", "LiSuN"); 
					$submit = $_POST;

					$lname= STRIP_TAGS($_POST['libname']);
					if ($submit)
					{
                    // Attempt select query execution
                    $sql = "SELECT * FROM $lname";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Book Name</th>";
                                        echo "<th>Book Author</th>";
                                        echo "<th>Book Publication</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>".$row['id']."</td>";
										echo "<td>".$row['book_name']."</td>"; 
										echo "<td>".$row['book_author']."</td>"; 
										echo "<td>".$row['book_publication']."</td>"; 
                                        
                                           
        
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
                        echo "<p class='lead'><em>No records were found.</em></p>";
                    }
 
                    // Close connection
                    mysqli_close($link);
					}
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
</body>
</html>