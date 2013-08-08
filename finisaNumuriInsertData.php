<?php

require_once 'data.inc.php';

mysql_connect($host, $user, $pass);
mysql_select_db($dbName);

$laiks = intval($_POST['laiks']);

if ('' !== $_POST['numurs']) {
	$result = mysql_query("SELECT ID FROM `registracija` WHERE `Numurs` = '{$_POST['numurs']}' AND Starts IS NOT NULL;");
	if (mysql_num_rows($result) >= 1) {
		mysql_query("UPDATE `finiss` SET numurs=NULL WHERE numurs='{$_POST['numurs']}';");
		mysql_query("UPDATE `registracija` SET Finiss=NULL WHERE numurs='{$_POST['numurs']}';");

		mysql_query("UPDATE `registracija` SET Finiss='{$laiks}' WHERE numurs='{$_POST['numurs']}';");
		mysql_query("UPDATE `finiss` SET numurs='{$_POST['numurs']}' WHERE id='{$_POST['laiks_id']}';");
	}
} else {
	mysql_query("UPDATE `finiss` SET numurs=NULL WHERE id='{$_POST['laiks_id']}';");
}

mysql_close();

header('Location: finisaNumuriForm.php');