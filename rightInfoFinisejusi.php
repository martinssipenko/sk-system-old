<?php
include_once 'data.inc.php';

$link = mysql_connect($host, $user, $pass);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db($dbName, $link);
if (!$db_selected) {
    die ('Can\'t use SISTEMA : ' . mysql_error());
}

mysql_set_charset('utf8', $link);

	$result = mysql_query("SELECT ID FROM `registracija` WHERE Finiss != '0'", $link);
	$num_rows = mysql_num_rows($result);
	echo "Finišējuši: " . $num_rows . "<br /><br />";

	$result = mysql_query("SELECT grupa, count(grupa) AS count FROM `registracija` GROUP BY Grupa", $link);
	while ($row = mysql_fetch_array($result)) {
		echo $row['grupa'].": ".$row['count']."<br/>";
	}

mysql_close($link);
