<?php

include_once 'data.inc.php';

mysql_connect($host, $user, $pass);
mysql_select_db($dbName);
mysql_set_charset('utf8');

$id = intval($_GET['id']);
$query = "UPDATE `finiss` SET trash=1 WHERE id='{$id}';";

mysql_query($query);
mysql_close();

header('Location: hronometrsForm.php');