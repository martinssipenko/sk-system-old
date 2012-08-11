<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="refresh" content="15;URL=kopvLabakie.php" />
</head>

<body>
<?php
	include_once("../data.inc.php");
	include_once("../function.inc.php");
?>
<center>
<h1 style="padding-bottom:0px;">Nesen apgriezās*</h1>
<table width="98%" border="1" class="infocentrs">
	<thead>
		<tr>
			<th>Nr.</th>
            <th>Dalībnieks</th>
            <th>Gads</th>
            <th>Grupa</th>
		  	<th>Starts</th>
            <th>Apgrieziens*</th>
            <th>Rezultāts*</th>
			<th>Komentārs</th>
		</tr>
	</thead>
	<tbody class="scrollingContent">
<?php
	//Pieslēdzamies MySQL
	mysql_connect($host, $user, $pass);
	mysql_select_db($dbName);
	mysql_set_charset('utf8');
	
	$query = "SELECT Numurs, Vards, Starts, Apgrieziens, Grupa, Gads, Komentars FROM registracija WHERE Apgrieziens != '' AND Starts != '' ORDER BY Apgrieziens DESC LIMIT 0,30";
		
	$result = mysql_query($query);
	
	while($row = mysql_fetch_array($result)){
	  $starts = strTime($row['Starts']);
  	  $apgrieziens = strTime($row['Apgrieziens']);
	  $rezultats = strTime($row['Apgrieziens'] - $row['Starts']);
		echo "
		  <tr>
			<td>".$row['Numurs']."</td>
			<td>".$row['Vards']."</td>
			<td>".$row['Gads']."</td>
			<td>".$row['Grupa']."</td>
			<td>".$starts."</td>
			<td>".$apgrieziens."</td>
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
<br />
*Apgrieziena laiki ir aptuveni un var būt kļūdaini par pāris sekundēm.
</body>
</html>
