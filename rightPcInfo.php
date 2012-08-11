<?php
include_once("data.inc.php");

$link = mysql_connect($host, $user, $pass);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db($dbName, $link);
if (!$db_selected) {
    die ('Can\'t use SISTEMA : ' . mysql_error());
}

mysql_set_charset('utf8', $link);

$result = mysql_query("SELECT * FROM `datori` WHERE ip = '".$_SERVER['REMOTE_ADDR']."'", $link);
while($row = mysql_fetch_array($result)){


echo $row['dators'] . "<br />" . $row['ip'];

}
mysql_close($link);
?>