<?php
session_start();

if (!isset($_SESSION['userSession'])) {
	header("Location: adminlogin.php");
} else if (isset($_SESSION['userSession'])!="") {
	header("Location: adminhome.php");
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['userSession']);
	header("Location: index.html");
}
?>