<?php
include_once("data.inc.php");
include_once("function.inc.php");
//Pieslēdzamies MySQL
mysql_connect($host, $user, $pass);
mysql_select_db($dbName);
mysql_set_charset('utf8');
//Pieslēdzamies MySQL BEIGAS


$data['numurs'] = $_POST['numurs'];
$data['laiks'] = $_POST['laiks'];

if (isset($_POST['komentars']))
	$data['komentars'] = $_POST['komentars'];
else
	$data['komentars'] = "";



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
	$laiksOdbc = strTime($dataReg['laiks'] - mktime($hour, 0, 0, $month, $day, $year));
	
	//APRĒĶINA LAIKU MySQL
	$laiks = $dataReg['laiks'] - mktime($hour, 0, 0, $month, $day, $year);
	
	//if (!$dataReg[komentars]) { $komentars = " "; }
	
	if (!$dataReg['komentars']) {
	$resultKomentars = mysql_query("SELECT Komentars FROM registracija WHERE Numurs = '".$dataReg['numurs']."'");
	$rowKomentars = mysql_fetch_row($resultKomentars);
	$dataReg['komentars'] = $rowKomentars[0];
	}
	 
	
	//IEVIETO DATUS MYSQL
	$query = "UPDATE `sistema`.`registracija` SET Starts = '$laiks', Komentars = '".$dataReg['komentars']."', ipStarts = '".$_SERVER['REMOTE_ADDR']."' WHERE Numurs = '".$dataReg['numurs']."'";
	mysql_query($query);
	
			$resultStarts = mysql_query("SELECT Finiss FROM registracija WHERE Numurs = '".$dataReg['numurs']."'");
			$rowStarts = mysql_fetch_row($resultStarts);
			
			if ($rowStarts[0] != 0) {
			$rezultats = $rowStarts[0] - $laiks;
			$query = "UPDATE `sistema`.`registracija` SET Rezultats = '$rezultats', ipStarts = '".$_SERVER['REMOTE_ADDR']."' WHERE Numurs = '".$dataReg['numurs']."'";
			mysql_query($query);
			}
		

	mysql_close();
	//IEVEITO DATUS MYSQL BEIGAS

	/*
	//PIEVIENO DATUS MS ACCESS
	$con = odbc_connect('sistema','', '');


	$query = "SELECT Num FROM Start WHERE Num = " . $dataReg['numurs'];


	function better_odbc_num_rows($con,$sql){
		$result = odbc_exec($con,$sql);
		$count=0;
		while($temp = odbc_fetch_into($result, &$counter)){
			$count++;
		}
		return $count;
	}

	if(better_odbc_num_rows($con, $query) >= 1)
		$sql = "UPDATE Start SET Starts = '$laiksOdbc' WHERE Num = " . $dataReg['numurs'];
	
	if(better_odbc_num_rows($con, $query) <= 0)
		$sql = "INSERT INTO Start (Num, Starts) VALUES ('".$dataReg['numurs']."', '$laiksOdbc')";

	$res = odbc_exec($con, $sql);

	odbc_close($con);
	//PIEVIENO DATUS MS ACCESS BEIGAS
*/

	header('Location: startsForm.php');
}
?>    
    





