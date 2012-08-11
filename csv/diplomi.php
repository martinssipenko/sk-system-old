<?php
    include '../data.inc.php';
	mysql_connect($host, $user, $pass);
	mysql_select_db($dbName);
	mysql_set_charset('utf8');
	$resultDistinct = mysql_query("SELECT DISTINCT Grupa FROM registracija");
	while($rowDistinct = mysql_fetch_array($resultDistinct)){
        $sql = "SELECT Numurs, Vards FROM registracija WHERE Finiss IS NOT NULL AND Starts IS NOT NULL AND Grupa = '" . $rowDistinct['Grupa'] . "' ORDER BY Finiss-Starts ASC LIMIT 0,3";
		$result = mysql_query($sql);
        $vieta = 1;
		while($row = mysql_fetch_array($result)) {
			echo '"' . $row['Numurs'] . '";"' . $row['Vards'] . '";"' . $vieta . '";""' . "\n";
            $vieta++;
		}
	}
	mysql_close();
    
    header("Content-type: application/csv");
    header("Content-Disposition: attachment; filename=diplomi.csv");
    header("Pragma: no-cache");
    header("Expires: 0");
