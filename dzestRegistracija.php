<?php
include_once 'data.inc.php';

mysql_connect($host, $user, $pass);
mysql_select_db($dbName);
mysql_set_charset('utf8');

$numurs = $_GET['numurs'];
$query = "DELETE FROM `registracija` WHERE Numurs = '$numurs';";
	
mysql_query($query);
mysql_close();

header('Location: registracijaForm.php');
