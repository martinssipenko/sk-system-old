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


function selected($needle, $haystack, $echo = true)
{
    if ($needle == $haystack) {
        if ($echo) {
            echo 'selected="selected"';
        } else {
            return 'selected="selected"';
        }
    }
}

function findGrupa($getGrupaGads, $getGrupaDzimums, $getGrupaVelo)
{
    $grupas = unserialize('a:101:{i:0;a:8:{s:2:"CV";s:2:"BV";s:2:"TV";s:2:"BV";s:2:"SV";s:2:"BV";s:2:"CS";s:2:"BS";s:2:"TS";s:2:"BS";s:2:"SS";s:2:"BS";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:1;a:8:{s:2:"CV";s:2:"BV";s:2:"TV";s:2:"BV";s:2:"SV";s:2:"BV";s:2:"CS";s:2:"BS";s:2:"TS";s:2:"BS";s:2:"SS";s:2:"BS";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:2;a:8:{s:2:"CV";s:2:"BV";s:2:"TV";s:2:"BV";s:2:"SV";s:2:"BV";s:2:"CS";s:2:"BS";s:2:"TS";s:2:"BS";s:2:"SS";s:2:"BS";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:3;a:8:{s:2:"CV";s:2:"BV";s:2:"TV";s:2:"BV";s:2:"SV";s:2:"BV";s:2:"CS";s:2:"BS";s:2:"TS";s:2:"BS";s:2:"SS";s:2:"BS";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:4;a:8:{s:2:"CV";s:2:"BV";s:2:"TV";s:2:"BV";s:2:"SV";s:2:"BV";s:2:"CS";s:2:"BS";s:2:"TS";s:2:"BS";s:2:"SS";s:2:"BS";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:5;a:8:{s:2:"CV";s:2:"BV";s:2:"TV";s:2:"BV";s:2:"SV";s:2:"BV";s:2:"CS";s:2:"BS";s:2:"TS";s:2:"BS";s:2:"SS";s:2:"BS";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:6;a:8:{s:2:"CV";s:2:"BV";s:2:"TV";s:2:"BV";s:2:"SV";s:2:"BV";s:2:"CS";s:2:"BS";s:2:"TS";s:2:"BS";s:2:"SS";s:2:"BS";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:7;a:8:{s:2:"CV";s:2:"BV";s:2:"TV";s:2:"BV";s:2:"SV";s:2:"BV";s:2:"CS";s:2:"BS";s:2:"TS";s:2:"BS";s:2:"SS";s:2:"BS";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:8;a:8:{s:2:"CV";s:2:"BV";s:2:"TV";s:2:"BV";s:2:"SV";s:2:"BV";s:2:"CS";s:2:"BS";s:2:"TS";s:2:"BS";s:2:"SS";s:2:"BS";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:9;a:8:{s:2:"CV";s:4:"TV 1";s:2:"TV";s:4:"TV 1";s:2:"SV";s:4:"SV 1";s:2:"CS";s:4:"TS 1";s:2:"TS";s:4:"TS 1";s:2:"SS";s:4:"SS 1";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:10;a:8:{s:2:"CV";s:4:"TV 1";s:2:"TV";s:4:"TV 1";s:2:"SV";s:4:"SV 1";s:2:"CS";s:4:"TS 1";s:2:"TS";s:4:"TS 1";s:2:"SS";s:4:"SS 1";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:11;a:8:{s:2:"CV";s:4:"TV 1";s:2:"TV";s:4:"TV 1";s:2:"SV";s:4:"SV 1";s:2:"CS";s:4:"TS 1";s:2:"TS";s:4:"TS 1";s:2:"SS";s:4:"SS 1";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:12;a:8:{s:2:"CV";s:4:"TV 1";s:2:"TV";s:4:"TV 1";s:2:"SV";s:4:"SV 1";s:2:"CS";s:4:"TS 1";s:2:"TS";s:4:"TS 1";s:2:"SS";s:4:"SS 1";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:13;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 2";s:2:"SV";s:4:"SV 2";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 2";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:14;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 2";s:2:"SV";s:4:"SV 2";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 2";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:15;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 2";s:2:"SV";s:4:"SV 2";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 2";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:16;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 2";s:2:"SV";s:4:"SV 2";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 2";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:17;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 3";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 3";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:18;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 3";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 3";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:19;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 3";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 3";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:20;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 3";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 3";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:21;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 3";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 3";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:22;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 3";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 3";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:23;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 3";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 3";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:24;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 4";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 4";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:25;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 4";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 4";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:26;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 4";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 4";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:27;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 4";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 4";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:28;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 4";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 4";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:29;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 4";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 4";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:30;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 4";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 4";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:31;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 4";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 4";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:32;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 4";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 4";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:33;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 4";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 4";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:34;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 4";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 4";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:35;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 4";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 4";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:36;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 4";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 4";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:37;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 4";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 4";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:38;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 4";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 4";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:39;a:8:{s:2:"CV";s:4:"CV 3";s:2:"TV";s:4:"TV 4";s:2:"SV";s:4:"SV 3";s:2:"CS";s:4:"CS 3";s:2:"TS";s:4:"TS 4";s:2:"SS";s:4:"SS 3";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:40;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 5";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 5";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:41;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 5";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 5";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:42;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 5";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 5";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:43;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 5";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 5";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:44;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 5";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 5";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:45;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 5";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 5";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:46;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 5";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 5";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:47;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 5";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 5";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:48;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 5";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 5";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:49;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 5";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 5";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:50;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:51;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:52;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:53;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:54;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:55;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:56;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:57;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:58;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:59;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:60;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:61;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:62;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:63;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:64;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:65;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:66;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:67;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:68;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:69;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:70;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:71;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:72;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:73;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:74;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:75;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:76;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:77;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:78;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:79;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:80;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:81;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:82;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:83;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:84;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:85;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:86;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:87;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:88;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:89;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:90;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:91;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:92;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:93;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:94;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:95;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:96;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:97;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:98;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:99;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}i:100;a:8:{s:2:"CV";s:4:"CV 5";s:2:"TV";s:4:"TV 6";s:2:"SV";s:4:"SV 5";s:2:"CS";s:4:"CS 5";s:2:"TS";s:4:"TS 6";s:2:"SS";s:4:"SS 5";s:3:"AKV";s:2:"AK";s:3:"AKS";s:2:"AK";}}');
    $vecums = date('Y') - $getGrupaGads;
    $kolonna = $getGrupaVelo . $getGrupaDzimums;
    return $grupas[$vecums][$kolonna];
    // $result = mysql_query("SELECT $kolonna FROM grupas WHERE Vecums = '$vecums'");
    // $grupaGet = mysql_fetch_row($result);
    // return $grupaGet[0];
}
