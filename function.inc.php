<?

function errorMsg($message) {
  if (!isset($message)) {
    $message = "";
  }
  echo $message;
}

function dataCheck ($dataCheck) {
// FUNNKCIJA PĀRBAUDA DATUS NO IEVADES LAUKIEM
	foreach ($dataCheck as $key => $value) {
		if ($value == NULL) {
			$error[$key] = "border: 3px solid; border-color:#FF0000;";
			$errorMsg[$key] = "<span style=\"color:#FF0000;\"><b>Lauks obligāti jāaizpilda!</b></span>";
			$errorIs = "";
		}
	}

	if(isset($dataCheck['blacklist'])) {
		$error['blacklist'] = "border: 3px solid; border-color:#FF0000;";
		$errorMsg['blacklist'] = $dataCheck['blacklist'];
		$errorIs = "";
	}

	if (strlen($dataCheck['gads']) < 4) {
		$error['gads'] = "border: 3px solid; border-color:#FF0000;";
		$errorMsg['gads'] = "<span style=\"color:#FF0000;\"><b>Nepareizi aizpildīts lauks!</b></span>";
		$errorIs = "";
	}

	if (!ctype_digit($dataCheck['gads'])) {
		$error['gads'] = "border: 3px solid; border-color:#FF0000;";
		$errorMsg['gads'] = "<span style=\"color:#FF0000;\"><b>Nepareizi aizpildīts lauks!</b></span>";
		$errorIs = "";
	}

	if (!ctype_digit($dataCheck['numurs'])) {
		$error['numurs'] = "border: 3px solid; border-color:#FF0000;";
		$errorMsg['numurs'] = "<span style=\"color:#FF0000;\"><b>Nepareizi aizpildīts lauks!</b></span>";
		$errorIs = "";
	}

	$result = mysql_query("SELECT ID FROM `sistema`.`registracija` WHERE `Numurs` = '".$dataCheck['numurs']."'");
	if (mysql_num_rows($result) >= 1) {
			$error['numurs'] = "border: 3px solid; border-color:#FF0000;";
			$errorMsg['numurs'] = "<span style=\"color:#FF0000;\"><b>Šāds numurs jau ir reģistrēts!</b></span>";
			$errorIs = "";
	}

	if (isset($errorIs)) {
		include_once("registracijaForm.php");
	}

	if (!isset($errorIs)) {
		$ok = "OK";
	}

	if (isset($ok))
		return $ok;
}

function strTime($s) {
      if($s <= 0) {
        $s=0;
      }
	  $d = intval($s/86400);
	  $s -= $d*86400;

	  $h = intval($s/3600);
	  $s -= $h*3600;
	  $m = intval($s/60);
	  $s -= $m*60;
	  if (strlen($m) <= 1) { $m = "0" . $m; }
	  if (strlen($s) <= 1) { $s = "0" . $s; }
	  $str = $h . ':' . $m . ':' . $s;
  	  return $str;
}

function dataCheckFiniss ($dataCheck) {
// FUNNKCIJA PĀRBAUDA DATUS NO IEVADES LAUKIEM
	foreach ($dataCheck as $key => $value) {
		if ($value == NULL) {
			$error[$key] = "border: 3px solid; border-color:#FF0000;";
			$errorMsg[$key] = "<span style=\"color:#FF0000;\"><b>Lauks obligāti jāaizpilda!</b></span>";
			$errorMsg['laiks'] = "<span style=\"color:#FF0000;\"><b>Lauks obligāti jāaizpilda!</b></span>";
			$errorIs = "";
		}

		if (!ctype_digit($value)) {
			$error[$key] = "border: 3px solid; border-color:#FF0000;";
			$errorMsg[$key] = "<span style=\"color:#FF0000;\"><b>Nepareizi aizpildīts lauks!</b></span>";
			$errorMsg['laiks'] = "<span style=\"color:#FF0000;\"><b>Nepareizi aizpildīts lauks!</b></span>";
			$errorIs = "";
		}
	}

		$result = mysql_query("SELECT ID FROM `sistema`.`registracija` WHERE `Numurs` = '$dataCheck[numurs]'");
		if (mysql_num_rows($result) < 1) {
			$error['numurs'] = "border: 3px solid; border-color:#FF0000;";
			$errorMsg['numurs'] = "<span style=\"color:#FF0000;\"><b>Šāds numurs nav reģistrēts!</b></span>";
			$errorIs = "";
		}

		$result = mysql_query("SELECT ID FROM `sistema`.`registracija` WHERE `Numurs` = '$dataCheck[numurs]' AND finiss != ''");
		if (mysql_num_rows($result) >= 1) {
			$error['numurs'] = "border: 3px solid; border-color:#FF0000;";
			$errorMsg['numurs'] = "<span style=\"color:#FF0000;\"><b>Šim numuram finiša laiks jau ir reģistrēts!</b></span>";
			$errorIs = "";
		}

	if (isset($errorIs)) {
		include_once("finissForm.php");
	}

	if (!isset($errorIs)) {
		$ok = "OK";
	}

	return $ok;
}