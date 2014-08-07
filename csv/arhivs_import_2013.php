<?php

require 'vendor/autoload.php';

$csvFile = new Keboola\Csv\CsvFile(__DIR__ . '/arhivs_2013.csv', ';');
$i = 0;

echo "INSERT INTO `arhivs` (`id`, `numurs`, `vards`, `gads`, `dzimums`, `velo`, `grupa`, `starts`, `finiss`, `sods`, `rezultats`, `apgrieziens`, `sk`, `komentars`, `blacklist`, `blacklist_reason`) VALUES";
echo '<br/>';

// foreach ($csvFile as $row) {
// 	$row[14] = ($row[14] == 0) ? 'NULL' : "'$row[14]'";
// 	$row[15] = ($row[15] == '') ? 'NULL' : "'$row[15]'";

// 	echo "(NULL, $row[0], '$row[1]', $row[2], '$row[3]', '$row[4]', '$row[5]', '$row[6]', '$row[7]', '$row[8]', '$row[9]', '$row[10]', '$row[11]', '$row[12]', $row[13], $row[14], $row[15]),";
// 	echo '<br/>';
// }


foreach ($csvFile as $row) {
	$i++;
	if ($i == 1) {
		continue;
	}

    // 6, 7, 8, 9
    $row[14] = ($row[14] == 0) ? 'NULL' : "'$row[14]'";
    $row[15] = ($row[15] == '') ? 'NULL' : "'$row[15]'";
    echo "(NULL, $row[0], '$row[1]', $row[2], '$row[3]', '$row[4]', '$row[5]', '".timeToSec($row[6])."', '".timeToSec($row[7])."', '".timeToSec($row[8])."', '".timeToSec($row[9])."', $row[11], '$row[10]', '$row[12]', $row[14], $row[15]),";
    echo '<br/>';
}

function timeToSec($in) {
	$expl = explode(':', $in);
	$sec = ($expl[0] * 60 * 60) + ($expl[1] * 60) + $expl[2];
    return $sec;
}
