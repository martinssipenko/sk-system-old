<?php

require_once __DIR__ . '/data.inc.php';
require_once 'jsonRPCClient.php';

set_time_limit(120);

$data   = array();
$local  = new Mysqli($host, $user, $pass, $dbName);
$result = $local->query("SELECT Numurs, Starts FROM `registracija` WHERE Starts !=0 AND Finiss IS NULL");

while($row = $result->fetch_assoc()) {
    $data[$row['Numurs']] = $row['Starts'];
}

$data = json_encode($data);

$client = new jsonRPCClient('http://skunenieki.lv/5km/rpc.php');

try {
    $res = $client->apgrieziens($data);
} catch (Exception $e) {
    echo nl2br($e->getMessage()).'<br />'."\n";
}

$res = json_decode($res, true);

foreach ($res as $key => $value) {
	$local->query("UPDATE `registracija` SET `Apgrieziens` = '" . $value . "' WHERE `Numurs` = '" . $key . "' LIMIT 1 ;");
}