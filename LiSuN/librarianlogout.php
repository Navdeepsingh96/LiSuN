<?php
session_start();

if (!isset($_SESSION['librarianSession'])) {
	header("Location: librarianlogin.php");
} else if (isset($_SESSION['librarianSession'])!="") {
	header("Location: librarianhome.php");
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['librarianSession']);
	header("Location: index.html");
}
?>