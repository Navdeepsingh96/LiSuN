<?php
session_start();
//include_once 'connect.php';

//echo $_SESSION['userSession'];

if (!isset($_SESSION['userSession'])) 
{
	header("Location: adminlogin.php");
}

?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Admin Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/demo.css">
		<link rel="stylesheet" href="assets/css/footer-distributed-with-address-and-phones.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
		<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo">LiSuN</a>
					<nav id="nav">
						<a href="index.html">LiSuN Home</a>
						<a href="addlibrary.php">Add Library</a>
						<a href="addlibrarian.php">Add Librarian</a>
						<a href="adminviewrequests.php">View Requests</a>
						<a href="adminlogout.php?logout">Logout</a>
						
						
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
				<h1>Welcome Admin</h1>
				
			</section>

		<!-- One -->
			<section id="one" class="wrapper">
				<div class="inner">
					
						<article>
							<header>
								<h2><strong>Your Resposibilities</h2>
							</header>
							<p><ul><li>Add new Libraries in town.</li>
							<li>Create accounts of Librarians.</li>
							<li>View requests.</li></ul></p></strong>
							
							
						</article>
					
				</div>
			</section>

		

		
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