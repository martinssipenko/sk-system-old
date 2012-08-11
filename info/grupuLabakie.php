<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="refresh" content="20;URL=nesenApgriezas.php" />
</head>

<body>
<?php
	include_once("../data.inc.php");
	include_once("../function.inc.php");
?>
<center>
<h1>Grupu labākie</h1>
<table width="98%" border="1" class="infocentrs">
	<thead>
		<tr>
			<th>Grupa</th>
            <th>Nr.</th>
            <th>Dalībnieks</th>
            <th>Dz. gads</th>
            <th>Starts</th>
            <th>Finišs</th>
            <th>Rezultāts</th>
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
		$result = mysql_query("SELECT Numurs, Vards, Starts, Finiss, Grupa, Gads, Komentars FROM registracija WHERE Starts != '' AND Finiss != '' AND Grupa = '".$rowDistinct['Grupa']."' ORDER BY Finiss-Starts ASC LIMIT 0,1");
		while($row = mysql_fetch_array($result)){
		  if ($row['Starts'] != 0) { $starts = strTime($row['Starts']); }
		  if ($row['Starts'] == 0) { $starts = ""; }
		  if ($row['Finiss'] != 0) { $finiss = strTime($row['Finiss']); }
		  if ($row['Finiss'] == 0) { $finiss = ""; }
		  $rezultats = strTime($row['Finiss']-$row['Starts']);
			echo "
			  <tr>
				<td>".$row['Grupa']."</td>
				<td>".$row['Numurs']."</td>
				<td>".$row['Vards']."</td>
				<td>".$row['Gads']."</td>
				<td>".$starts."</td>
				<td>".$finiss."</td>
				<td>".$rezultats."</td>
				<td>".$row['Komentars']."</td>
			  </tr>
			";
		}
	}
	mysql_close();
?>           
	</tbody>
</table>
</center>
</body>
</html>
