<?php

$q = strtolower($_GET['q']);
if (!$q) return;

require_once 'data.inc.php';

mysql_connect($host, $user, $pass);
mysql_select_db($dbName);
mysql_set_charset('utf8');

$result = mysql_query("SELECT DISTINCT vards, gads, dzimums FROM `arhivs` WHERE vards LIKE '%" . $q . "%';");

$items = array();
while ($row = mysql_fetch_array($result)) {
	$arname = $row['vards'] . " (" . $row['gads'] .")";
	$items[$arname] = array($row['vards'], $row['gads'], $row['dzimums']);
}

foreach ($items as $key=>$value) {
	if (strpos(strtolower($key), $q) !== false) {
		echo "$key|$value[0]|$value[1]|$value[2]\n";
	}
}
