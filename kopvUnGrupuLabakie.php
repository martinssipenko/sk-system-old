<?php
	include_once("data.inc.php");
	include_once("function.inc.php");
?>

<b>Kopvērtējuma labākie:</b>
<table width="680" border="1" class="reference" align="center">
	<thead>
		<tr>
			<th width="30">Nr.</th>
            <th width="150">Dalībnieks</th>
            <th width="70">Dz. gads</th>
            <th width="50">Grupa</th>
		  	<th width="65">Starts</th>
            <th width="65">Finišs</th>
            <th width="70">Rezultāts</th>
			<th>Komentārs</th>
		</tr>
	</thead>
	<tbody class="scrollingContent">
<?php
	//Pieslēdzamies MySQL
	mysql_connect($host, $user, $pass);
	mysql_select_db($dbName);
	mysql_set_charset('utf8');
	$result = mysql_query("SELECT Numurs, Vards, Starts, Finiss, Grupa, Gads, Komentars FROM registracija WHERE Starts != '' AND Finiss != '' AND Dzimums = 'V' ORDER BY Finiss-Starts ASC LIMIT 0,3");

	while($row = mysql_fetch_array($result)){
	  if ($row['Starts'] != 0) { $starts = strTime($row['Starts']); }
	  if ($row['Starts'] == 0) { $starts = ""; }
  	  if ($row['Finiss'] != 0) { $finiss = strTime($row['Finiss']); }
	  if ($row['Finiss'] == 0) { $finiss = ""; }
  	  $rezultats = strTime($row['Finiss']-$row['Starts']);
		echo "
		  <tr>
			<td>".$row['Numurs']."</td>
			<td><a href=\"javascript:info('".$row['Numurs']."')\">".$row['Vards']."</a></td>
			<td>".$row['Gads']."</td>
			<td>".$row['Grupa']."</td>
			<td>".$starts."</td>
			<td>".$finiss."</td>
			<td>".$rezultats."</td>
			<td>".$row['Komentars']."</td>
		  </tr>
		";
	}
	mysql_close();
?>
	</tbody>
</table>
<br />

<b>Kopvērtējuma labākās:</b>
<table width="680" border="1" class="reference" align="center">
	<thead>
		<tr>
            <th width="30">Nr.</th>
            <th width="150">Dalībnieks</th>
            <th width="70">Dz. gads</th>
            <th width="50">Grupa</th>
		  	<th width="65">Starts</th>
            <th width="65">Finišs</th>
            <th width="70">Rezultāts</th>
			<th>Komentārs</th>
		</tr>
	</thead>
	<tbody class="scrollingContent">
<?php
	//Pieslēdzamies MySQL
	mysql_connect($host, $user, $pass);
	mysql_select_db($dbName);
	mysql_set_charset('utf8');
	$result = mysql_query("SELECT Numurs, Vards, Starts, Finiss, Grupa, Gads, Komentars FROM registracija WHERE Starts != '' AND Finiss != '' AND Dzimums = 'S' ORDER BY Finiss-Starts ASC LIMIT 0,3");

	while($row = mysql_fetch_array($result)){
	  if ($row['Starts'] != 0) { $starts = strTime($row['Starts']); }
	  if ($row['Starts'] == 0) { $starts = ""; }
  	  if ($row['Finiss'] != 0) { $finiss = strTime($row['Finiss']); }
	  if ($row['Finiss'] == 0) { $finiss = ""; }
  	  $rezultats = strTime($row['Finiss']-$row['Starts']);
		echo "
		  <tr>
			<td>".$row['Numurs']."</td>
			<td><a href=\"javascript:info('".$row['Numurs']."')\">".$row['Vards']."</a></td>
			<td>".$row['Gads']."</td>
			<td>".$row['Grupa']."</td>
			<td>".$starts."</td>
			<td>".$finiss."</td>
			<td>".$rezultats."</td>
			<td>".$row['Komentars']."</td>
		  </tr>
		";
	}
	mysql_close();
?>
	</tbody>
</table>
<br />

<b>Labākie pa grupām:</b>
<table width="680" border="1" class="reference" align="center">
	<thead>
		<tr>
			<th width="50">Grupa</th>
            <th width="30">Nr.</th>
            <th width="150">Dalībnieks</th>
            <th width="70">Dz. gads</th>
            <th width="65">Starts</th>
            <th width="65">Finišs</th>
            <th width="70">Rezultāts</th>
			<th>Komentārs</th>
		</tr>
	</thead>
	<tbody class="scrollingContent">
<?php
	//Pieslēdzamies MySQL
	mysql_connect($host, $user, $pass);
	mysql_select_db($dbName);
	mysql_set_charset('utf8');
	$resultDistinct = mysql_query("SELECT DISTINCT Grupa FROM registracija");
	while($rowDistinct = mysql_fetch_array($resultDistinct)){
        $sql = "SELECT Numurs, Vards, Starts, Finiss, Grupa, Gads, Komentars FROM registracija WHERE Finiss IS NOT NULL AND Starts IS NOT NULL AND Grupa = '" . $rowDistinct['Grupa'] . "' ORDER BY Finiss-Starts ASC LIMIT 0,1";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)) {
		  if ($row['Starts'] != 0) { $starts = strTime($row['Starts']); }
		  if ($row['Starts'] == 0) { $starts = ""; }
		  if ($row['Finiss'] != 0) { $finiss = strTime($row['Finiss']); }
		  if ($row['Finiss'] == 0) { $finiss = ""; }
		  $rezultats = strTime($row['Finiss']-$row['Starts']);
			echo '
			  <tr>' .
				'<td>' . $row['Grupa'] . '</td>' .
				'<td>' . $row['Numurs'] . '</td>' .
				'<td><a href="javascript:info(\'' . $row['Numurs'] . '\')">' . $row['Vards'] . '</a></td>' .
				'<td>' . $row['Gads'] . '</td>' .
				'<td>' . $starts . '</td>' .
				'<td>' . $finiss . '</td>' .
				'<td>' . $rezultats . '</td>' .
				'<td>' . $row['Komentars'] . '</td>' .
			  '</tr>
			';
		}
	}
	mysql_close();
?>
	</tbody>
</table>
