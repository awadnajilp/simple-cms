<?php require_once('../Connections/db_connect.php'); 

function execute_scalar($sql,$def="") {
    $rs = mysql_query($sql) or die("bad query");
    if (mysql_num_rows($rs)) {
        $r = mysql_fetch_row($rs);
        mysql_free_result($rs);
        return $r[0];
        mysql_free_result($rs);
    }
    return $def;
}
 
$id = $_POST['id'];
$name = execute_scalar("select file from uploads where id='$id'");
$q = mysql_query("delete from uploads where id='$id'");
if ($q) {
	unlink("uploads/$name");
	echo true;
}else{
	echo false;
}
?>