<?php
// Include config file
//require_once "config.php";
 session_start();
 $link = mysqli_connect("localhost", "root", "root", "LiSuN"); 
 $firstname = $_SESSION['librarianSession'];
	$librariandb=mysqli_query($link,"SELECT libname FROM librarians WHERE firstname='$firstname'");
	$librow=$librariandb->fetch_array();
	$libname=$librow['libname'];
 
// Define variables and initialize with empty values
$name = $address = $salary = $book_name= $book_author = $book_publication = "";
$name_err = $address_err = $salary_err = $book_author_err = $publication_err = $book_name_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate  book name
    $input_name = trim($_POST["book_name"]);
	
    if(empty($input_name)){
        $book_name_err = "Please enter a  book name.";
    } else{
        $book_name = $input_name;
    }
    
    // Validate author 
    $input_author = trim($_POST["book_author"]);
    if(empty($input_author)){
        $book_author_err = "Please enter the book author.";     
    } else{
        $book_author = $input_author;
    }
    
    // Validate publication
    $input_publication = trim($_POST["book_publication"]);
    if(empty($input_publication)){
        $publication_err = "Please enter the book publication.";     
    }  else{
        $book_publication = $input_publication;
    }
    
    // Check input errors before inserting in database
    if(empty($book_author_err) && empty($book_author_err) && empty($publication_err)){
        // Prepare an update statement
        $sql = "UPDATE $libname SET book_name=?, book_author=?, book_publication=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_book_name, $param_book_author, $param_book_publication, $param_id);
            
            // Set parameters
            $param_book_name = $book_name;
            $param_book_author = $book_author;
            $param_book_publication = $book_publication;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: get_books.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    else{
		echo $book_name_err;
		echo $book_author_err;
		echo $publication_err;
	}
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
		
        // Prepare a select statement
        $sql = "SELECT * FROM $libname WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $book_name = $row["book_name"];
                    $book_author = $row["book_author"];
                    $book_publication = $row["book_publication"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
       mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 <?php

//include_once 'connect.php';

//echo $_SESSION['librarianSession'];

if (!isset($_SESSION['librarianSession'])) 
{
	header("Location: librarianlogin.php");
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Update Books</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
		<!--<link rel="stylesheet" type="text/css" href="style.css">-->
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
  <h1>Update Books</h1>
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
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($book_name_err)) ? 'has-error' : ''; ?>">
                            <label> Book Name</label>
                            <input type="text" name="book_name" class="form-control" value="<?php echo $book_name; ?>">
                            <span class="help-block"><?php echo $book_name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($book_author_err)) ? 'has-error' : ''; ?>">
                            <label>Book Author</label>
                            <textarea name="book_author" class="form-control"><?php echo $book_author; ?></textarea>
                            <span class="help-block"><?php echo $book_author_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($publication_err)) ? 'has-error' : ''; ?>">
                            <label>Book Publication</label>
                            <input type="text" name="book_publication" class="form-control" value="<?php echo $book_publication; ?>">
                            <span class="help-block"><?php echo $publication_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="get_books.php" class="btn btn-default">Cancel</a>
                    </form>
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