<?php
include_once("data.inc.php");
include_once("function.inc.php");
//Pieslēdzamies MySQL
mysql_connect($host, $user, $pass);
mysql_select_db($dbName);
mysql_set_charset('utf8');
//Pieslēdzamies MySQL BEIGAS


$data['numurs'] = $_POST['numurs'];
$data['laiks']  = $_POST['laiks'];
$data['velo']   = $_POST['velo'];

if (isset($_POST['komentars']))
	$data['komentars'] = $_POST['komentars'];
else
	$data['komentars'] = '';

//$dataOk = dataCheck($data);
//if (isset($dataOk)) {
registretStartu($data);
//}

function registretStartu($dataReg) {
// FUNKCIJA DATU PIEVIENOŠANAI MYSQL UN MS ACCESS

	global $hour;
	global $day;
	global $month;
	global $year;


	//APRĒĶINA LAIKU PRIEKŠ ODBC
	// $laiksOdbc = strTime($dataReg['laiks'] - mktime($hour, 0, 0, $month, $day, $year));

	//APRĒĶINA LAIKU MySQL
	$laiks = $dataReg['laiks'] - mktime($hour, 0, 0, $month, $day, $year);

	//if (!$dataReg[komentars]) { $komentars = " "; }

	$result = mysql_query("SELECT Komentars, Gads, Dzimums FROM registracija WHERE Numurs = '".$dataReg['numurs']."'");
	$row = mysql_fetch_row($result);

	if (!$dataReg['komentars']) {
		$dataReg['komentars'] = $row[0];
	}


	//IEVIETO DATUS MYSQL
	$query = "UPDATE `registracija` SET Starts='{$laiks}', Komentars= '{$dataReg['komentars']}', ipStarts='{$_SERVER['REMOTE_ADDR']}' WHERE Numurs='{$dataReg['numurs']}';";
	mysql_query($query);

	if (!empty($dataReg['velo'])) {
		$grupa = findGrupa($row[1], $row[2], $dataReg['velo']);
		$query = "UPDATE `registracija` SET Velo='{$dataReg['velo']}', Grupa='{$grupa}' WHERE Numurs='{$dataReg['numurs']}';";
		mysql_query($query);
	}

	// $resultStarts = mysql_query("SELECT Finiss FROM registracija WHERE Numurs = '".$dataReg['numurs']."'");
	// $rowStarts = mysql_fetch_row($resultStarts);

	// if ($rowStarts[0] != 0) {
	// 	$rezultats = $rowStarts[0] - $laiks;
	// 	$query = "UPDATE `registracija` SET Rezultats = '$rezultats', ipStarts = '".$_SERVER['REMOTE_ADDR']."' WHERE Numurs = '".$dataReg['numurs']."'";
	// 	mysql_query($query);
	// }


	mysql_close();

	header('Location: startsForm.php');
}
