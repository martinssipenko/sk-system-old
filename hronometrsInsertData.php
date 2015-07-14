<?php

include_once 'data.inc.php';


$hron = -(mktime($hour, 0, 0, $month, $day, $year) - time());


mysql_connect($host, $user, $pass);
mysql_select_db($dbName);


$query = "INSERT INTO `finiss` (`numurs`, `laiks`) VALUES (NULL, '{$hron}');";
mysql_query($query);

mysql_close();

header('Location: hronometrsForm.php');
