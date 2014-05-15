<?php  require_once('../Connections/db_connect.php'); 

if (isset($_GET['id']) && isset($_GET['post_type'])) {
	$post_type= $_GET['post_type'];
	$id = $_GET['id'];
	if ( ($post_type != 'page') && ($post_type != 'banner')) {	
		mysql_query("delete from posts where id='$id'");
		mysql_query("delete from uploads where `belongs_to`='$id'");
		header("location: posts.php?post_type=$post_type&deleted");

	}elseif($post_type == 'page'){
		mysql_query("delete from pages where id='$id'");
		mysql_query("delete from uploads where `belongs_to`='$id'");
		header("location: pages.php?deleted");
	}elseif ($post_type == 'banner') {
		mysql_query("delete from posts where id='$id'");
		mysql_query("delete from uploads where `belongs_to`='$id'");
		header("location: home-banners.php?deleted");
	}
	
}
if (isset($_GET['id']) &&  isset($_GET['category'])) {
		$id = $_GET['id'];
		$return = $_GET['return'];
		mysql_query("delete from category where cat_id='$id'");
		mysql_query("delete from category where `parent`='$id'");
		header("location: category-new.php?post_type=$return&deleted");
	}
?>