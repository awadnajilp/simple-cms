<?php if (!isset($_SESSION)) {
	session_start();
} 
require_once('../Connections/db_connect.php'); 
if (isset($_SESSION['username'])) {
	unset($_SESSION['username']);
	unset($_SESSION['login']);
	session_unset();
	header("location: login.php?doLogout");
}

?>