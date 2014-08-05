<?php
	include_once("data.inc.php");
	include_once("function.inc.php");
	//Pieslēdzamies MySQL
	mysql_connect($host, $user, $pass);
	mysql_select_db($dbName);
	mysql_set_charset('utf8');

	$result = mysql_query("SELECT Vards, Gads, Dzimums FROM registracija WHERE Numurs = '$_POST[numurs]'");
	$getInfo = mysql_fetch_row($result);
	$gads[0] = $getInfo[1] - 2;
	$gads[1] = $getInfo[1] + 2;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="lv" lang="lv">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/frame_style.css" />
<link rel="stylesheet" type="text/css" href="styles/tabula.css" />
<script type="text/javascript" src="javascript/tabula.js"></script>
<title>Informācija par dalībnieku</title>
</head>

<body onblur="self.close()">
<h1 style="padding-top:5px; padding-left:5px;">
<?php echo $_POST['numurs'] . " " . $getInfo[0]; ?>
</h1>
<center>
<div class="widget_tableDiv">
<table id="myTable" width="696">
	<thead>
		<tr>
			<td width="50">Gads</td>
            <td width="200">Vārds</td>
            <td width="50">Grupa</td>
            <td width="50">VG</td>
            <td width="50">VK</td>
            <td width="70">Rezultāts</td>
            <td>Komentārs</td>
		</tr>
	</thead>
	<tbody class="scrollingContent">
<?php
    $sql = "SELECT Vards, Finiss-Starts AS Rezultats, Grupa, Komentars, Dzimums, SK FROM registracija WHERE gads BETWEEN '$gads[0]' AND '$gads[1]' UNION
            SELECT Vards, Finiss-Starts AS Rezultats, Grupa, Komentars, Dzimums, SK FROM arhivs WHERE Dzimums = '$getInfo[2]' AND gads BETWEEN '$gads[0]' AND '$gads[1]' ORDER BY sk DESC";

	$result = mysql_query($sql);

	while($row = mysql_fetch_array($result)){
  	  if ($row['Rezultats'] != 0) { $rezultats = strTime($row['Rezultats']); }
	  if ($row['Rezultats'] == 0) { $rezultats = ""; }
	  $match = similar_text($getInfo[0], $row['Vards'], $p);
	  if ($p >= 85 || ($getInfo[0] == 'Evija Kurzemniece' && $row['Vards'] == 'Evija Koljučenko')) {
		echo "<tr>";
		echo "<td>".$row['SK']."</td>";
		echo "<td>".$row['Vards']."</td>";
		echo "<td>".$row['Grupa']."</td>";
		echo "<td>" . vieta($row['Rezultats'], $row['Grupa'], $row['Dzimums'], $row['SK'], 'VG') . "</td>";
		echo "<td>" . vieta($row['Rezultats'], $row['Grupa'], $row['Dzimums'], $row['SK'], 'VK') . "</td>";
		if (isset($rezultats))echo "<td>".$rezultats."</td>";
		if (isset($row['komentars'])) echo "<td>".$row['komentars']."</td>";
		echo "</tr>";
	  }
	}
	mysql_close();

	function vieta($laiks, $grupa, $dzimums, $skGads, $kur) {
	  if ($laiks) {
			if ($kur == "VG") {
			$result_d = mysql_query("SELECT Finiss-Starts AS Rezultats FROM registracija WHERE SK = '$skGads' AND Grupa = '$grupa' UNION
								     SELECT Finiss-Starts AS Rezultats FROM arhivs WHERE SK = '$skGads' AND Grupa = '$grupa' ORDER BY Rezultats ASC");
			}

			if ($kur == "VK") {
			$result_d = mysql_query("SELECT Finiss-Starts AS Rezultats FROM registracija WHERE SK = '$skGads' AND Dzimums = '$dzimums' UNION
								     SELECT Finiss-Starts AS Rezultats FROM arhivs WHERE SK = '$skGads' AND Dzimums = '$dzimums' ORDER BY Rezultats ASC");
			}
			$x = 1;
			while ($row_d = mysql_fetch_array($result_d)) {
			  $vietaGr[$x] = $row_d['Rezultats'];
			  $x++;
			}
			$key = array_search($laiks, $vietaGr);
	  }
	  if (!$laiks) { $key = " "; }
		return $key;
	}

?>
	</tbody>
</table>
</div>
<script type="text/javascript">
initTableWidget('myTable',796,400,Array('N',false,'N','N','N', 'N', false));
</script>
</center>
<p>
VG - Vieta grupā<br/>
VK - Vieta kopvērtējumā
</p>
</body>
</html>
