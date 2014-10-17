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

$result = mysql_query("SELECT ID FROM `registracija`", $link);
$registrejusies = mysql_num_rows($result);

$result = mysql_query("SELECT ID FROM `registracija` WHERE Starts != '0'", $link);
$startejusi = mysql_num_rows($result);

$result = mysql_query("SELECT ID FROM `registracija` WHERE Finiss IS NOT NULL", $link);
$finisejusi = mysql_num_rows($result);

$reggrp= array();
$result = mysql_query("SELECT grupa, count(grupa) AS count FROM `registracija` GROUP BY Grupa", $link);
while ($row = mysql_fetch_array($result)) {
	$reggrp[$row['grupa']] = $row['count'];
}

mysql_close($link);


$hron = -(mktime($hour, 0, 0, $month, $day, $year) - time());

echo json_encode(
	array(
		'watch'  => $hron,
		'reg'    => $registrejusies,
		'sta'    => $startejusi,
		'fin'    => $finisejusi,
		'reggrp' => $reggrp,
	)
);

die;
