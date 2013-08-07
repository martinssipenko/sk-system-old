<?php
include_once("data.inc.php");
include_once("function.inc.php");
//Pieslēdzamies MySQL
mysql_connect($host, $user, $pass);
mysql_select_db($dbName);
//Pieslēdzamies MySQL BEIGAS


$data['numurs'] = $_POST['numurs'];
$data['laiksH'] = $_POST['laiksH'];
$data['laiksM'] = $_POST['laiksM'];
$data['laiksS'] = $_POST['laiksS'];

$dataOk = dataCheckFiniss($data);

if (isset($dataOk)) {
registretFinisu($data);
}


function registretFinisu($dataReg) {
// FUNKCIJA DATU PIEVIENOŠANAI MYSQL UN MS ACCESS

	global $hour;
	global $day;
	global $month;
	global $year;

	//APRĒĶINA LAIKU PRIEKŠ MYSQL UN ODBC
	$laiks = mktime($dataReg['laiksH'] + $hour, $dataReg['laiksM'], $dataReg['laiksS'], $month, $day, $year);
	$laiksSec = $laiks - mktime($hour, 0, 0, $month, $day, $year);
	$laiksOdbc = $dataReg['laiksH'] . ":" . $dataReg['laiksM'] . ":" . $dataReg['laiksS'];

	//IEVIETO DATUS MYSQL
	$query = "UPDATE `sistema`.`registracija` SET Finiss = '$laiksSec', ipFiniss = '".$_SERVER['REMOTE_ADDR']."' WHERE Numurs = '".$dataReg['numurs']."'";
	mysql_query($query);

			$resultStarts = mysql_query("SELECT Starts FROM registracija WHERE Numurs = '".$dataReg['numurs']."'");
			$rowStarts = mysql_fetch_row($resultStarts);

			//if ($rowStarts[0] != 0) {
            //    $rezultats = $laiksSec - $rowStarts[0];
            //    $query = "UPDATE `sistema`.`registracija` SET Rezultats = '$rezultats', ipFiniss = '".$_SERVER['REMOTE_ADDR']."' WHERE Numurs = '".$dataReg['numurs']."'";
            //    //mysql_query($query);
			//}


	mysql_close();

	header('Location: finissForm.php');
}
