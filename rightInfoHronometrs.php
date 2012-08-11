<?php
include_once 'data.inc.php';
$hron = -(mktime($hour, 0, 0, $month, $day, $year) - time());

echo strTime($hron);
//echo mktime($hour, 0, 0, $month, $day, $year) . '000';

function strTime($s) {
  $d = intval($s/86400);
  $s -= $d*86400;

  $h = intval($s/3600);
  $s -= $h*3600;

  $m = intval($s/60);
  $s -= $m*60;
  
  if (strlen($m) <= 1) { $m = "0" . $m; }
  if (strlen($s) <= 1) { $s = "0" . $s; }
  
  $str = $h . ':' . $m . ':' . $s;
  if ($d) $str = $d . ':' . $h . ':' . $m . ':' . $s;

  return $str;
}
