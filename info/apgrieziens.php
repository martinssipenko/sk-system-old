<?php
include_once '../data.inc.php';
$timeout = (isset($_GET['timeout'])) ? $_GET['timeout'] : 5;

set_time_limit(120);
if (!$sock = @fsockopen($hostSrv, 80, $num, $error, $timeout)) {
    $timeout = $timeout*2;
    header('Location: apgrieziens.php?timeout=' . $timeout);
    die;
}

$local = new Mysqli($host, $user, $pass, $dbName);
$remote = new Mysqli($hostSrv, $userSrv, $passSrv, $dbNameSrv);

$result = $local->query("SELECT Numurs, Starts FROM `registracija` WHERE Starts !=0 AND Finiss IS NULL");
while($row = $result->fetch_assoc()) {
    $remote->query("INSERT INTO `apgrieziens` (`num`, `sta`, `apg`) VALUES ('".$row['Numurs']."', '".$row['Starts']."', NULL);");
}

$result = $remote->query("SELECT num, apg FROM `apgrieziens` WHERE apg IS NOT NULL");
while ($row = $result->fetch_assoc()) {
    $local->query("UPDATE `registracija` SET `Apgrieziens` = '".$row['apg']."' WHERE `Numurs` = '".$row['num']."' LIMIT 1 ;");
}
