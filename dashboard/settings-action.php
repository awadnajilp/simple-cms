<?php  require_once('../Connections/db_connect.php'); 
if (isset($_POST['submit_form'])) {
	mysql_query("update site_meta set value='".$_POST['site_title']."' where name='site_title'");
	mysql_query("update site_meta set value='".$_POST['email']."' where name='primary_email'");
	mysql_query("update site_meta set value='".$_POST['sec_email']."' where name='sec_email'");
	mysql_query("update site_meta set value='".$_POST['fb']."' where name='facebook'");
	mysql_query("update site_meta set value='".$_POST['twitter']."' where name='twitter'");
	mysql_query("update site_meta set value='".$_POST['linkedin']."' where name='linkedin'");
	header("location:settings.php?done");
	}?>