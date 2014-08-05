<?php
include_once 'data.inc.php';
include_once 'function.inc.php';

mysql_connect($host, $user, $pass);
mysql_select_db($dbName);
mysql_set_charset('utf8');

$data['numurs'] = $_POST['numurs'];
$data['vards'] = $_POST['vards'];
$data['gads'] = $_POST['gads'];
$data['dzimums'] = $_POST['dzimums'];
$velo = $_POST['velo'];
$komentars = $_POST['komentars'];
$komanda = $_POST['komanda'];

$blacklist_pielaut = 0;
if (isset($_POST['blacklist_pielaut']))
	$blacklist_pielaut = $_POST['blacklist_pielaut'];

$result = mysql_query("SELECT sk, blacklist_reason FROM `arhivs` WHERE vards LIKE '%" . $data['vards'] . "%' AND gads = '".$data['gads']."' AND blacklist='1';");

if ( $blacklist_pielaut != 1) {
	if(mysql_num_rows($result) > 0) {
		while ($row = mysql_fetch_array($result)) {
			$data['blacklist'] = $row['blacklist_reason'];
		}
	}
}

$dataOk = dataCheck($data, $velo, $komentars, $komanda);

if (isset($dataOk)) {
	$grupa = findGrupa($data['gads'], $data['dzimums'], $velo);
	registretDalibnieku($data['numurs'], $data['vards'], $data['gads'], $grupa, $data['dzimums'], $velo, $komentars, $komanda);
}

function registretDalibnieku($numurs, $vards, $gads, $grupa, $dzimums, $velo, $komentars, $komanda) {
	$query = "INSERT INTO `sistema`.`registracija` (`ID`, `Numurs`, `Vards`, `Grupa`, `Gads`, `Dzimums`, `Velo`, `Kolektivs`, `Sods`, `Komentars`, `ipReg`, `SK`)
			  VALUES (NULL, '$numurs', '$vards', '$grupa', '$gads', '$dzimums', '$velo', '$komanda', '0', '$komentars', '$_SERVER[REMOTE_ADDR]', '".date("Y")."')";

	mysql_query($query);
	mysql_close();

	header('Location: registracijaForm.php');
}
