<?php
session_start();

if (!isset($_SESSION['issuerSession'])) {
	header("Location: issuerlogin.php");
} else if (isset($_SESSION['issuerSession'])!="") {
	header("Location: issuerhome.php");
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['issuerSession']);
	header("Location: index.html");
}
?>