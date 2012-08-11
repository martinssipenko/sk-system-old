<?php
    include '../data.inc.php';
	mysql_connect($host, $user, $pass);
	mysql_select_db($dbName);
	mysql_query('SET NAMES utf8');
	$result = mysql_query("SELECT `Numurs` AS `Numurs`, `Vards` AS `Vards`, `Gads` AS `Gads`, `Dzimums` AS `Dzimums`, `Velo` AS `Velo`, `Sods` AS `Sods`, `Kolektivs` AS `Kolektivs`, `Komentars` AS `Komentars`, `SK` AS `SK` FROM `registracija`;");
	while($row = mysql_fetch_array($result)){
        echo '"' . $row['Numurs'] . '";"' .
             $row['Vards'] . '";"' .
             $row['Gads'] . '";"' .
             $row['Dzimums'] . '";"' .
             $row['Velo'] . '";"' .
             $row['Sods'] . '";"' .
             $row['Kolektivs'] . '";"' .
             $row['Komentars'] . '";"' .
             $row['SK'] . '"' .
             "\n";
	}
	mysql_close();
    
    header("Content-type: application/csv");
    header("Content-Disposition: attachment; filename=registracija.csv");
    header("Pragma: no-cache");
    header("Expires: 0");
