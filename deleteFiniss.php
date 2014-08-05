<?php
include_once 'data.inc.php';

mysql_connect($host, $user, $pass);
mysql_select_db($dbName);
mysql_set_charset('utf8');

$numurs = $_GET['numurs'];

mysql_query("UPDATE `registracija` SET Finiss = NULL WHERE Numurs = '{$numurs}';");
mysql_query("UPDATE `finiss` SET laiks=NULL WHERE numurs='{$numurs}';");

mysql_close();

header('Location: finissForm.php');
