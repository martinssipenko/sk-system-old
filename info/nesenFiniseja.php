<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="refresh" content="5" />
</head>

<body>
<?php
	include_once("../data.inc.php");
	include_once("../function.inc.php");
?>
<center>
<h1>Nesen finišēja</h1>
<table width="98%" border="1" class="infocentrs">
	<thead>
		<tr>
			<th>Nr.</th>
            <th>Dalībnieks</th>
            <th>Gads</th>
            <th>Grupa</th>
		  	<th>Starts</th>
            <th>Finišs</th>
            <th>Vid. ātrums</th>
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

	$query = "SELECT Numurs, Vards, Starts, Finiss, Dzimums, Velo, Gads, Komentars FROM registracija WHERE Finiss != '' ORDER BY Finiss DESC LIMIT 0,30";

	$result = mysql_query($query);

	while($row = mysql_fetch_array($result)){
	  if ($row['Starts'] != 0) { $starts = strTime($row['Starts']); }
	  if ($row['Starts'] == 0) { $starts = ""; }
  	  if ($row['Finiss'] != 0) { $finiss = strTime($row['Finiss']); }
	  if ($row['Finiss'] == 0) { $finiss = ""; }
      $rezultats = strTime($row['Finiss']-$row['Starts']);
		echo "
		  <tr>
			<td>".$row['Numurs']."</td>
			<td>".$row['Vards']."</td>
			<td>".$row['Gads']."</td>
			<td>".findGrupa($row['Gads'], $row['Dzimums'], $row['Velo'])."</td>
			<td>".$starts."</td>
			<td>".$finiss."</td>
            <td>" . round(10/(($row['Finiss']-$row['Starts'])/3600), 2) . " km/h</td>
			<td><b>".$rezultats."</b></td>
			<td>".$row['Komentars']."</td>
		  </tr>
		";
	}
	mysql_close();
?>
	</tbody>
</table>
</center>
</body>
</html>
