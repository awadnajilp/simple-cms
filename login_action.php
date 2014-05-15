<?php if (!isset($_SESSION)) {
	session_start();
}  require_once('../Connections/db_connect.php'); 
if (isset($_POST['submit_form'])) {
	$query = mysql_query("select * from user where username='".$_POST['username']."' and password='".$_POST['password']."'");
	$count = mysql_num_rows($query);
	if ($count > 0) {
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['login'] = true;
		header("location: index.php");
	}else{
		header("location: login.php?error=1");
	}
}?>