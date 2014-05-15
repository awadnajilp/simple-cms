<?php if (!isset($_SESSION)) {
	session_start();
}  require_once('../Connections/db_connect.php'); 

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

$old_pass =execute_scalar("select password from user where password='".$_POST['old']."'");
if (!empty($old_pass)) {
    mysql_query("upate user set password='".$_POST['new']."' where username='".$_SESSION['username']."'");
    header("location: settings.php?changePass=1");
}else{
	header("location: settings.php?changePass=0");
}
?>