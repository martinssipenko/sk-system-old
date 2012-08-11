<?php
	include_once("data.inc.php");
	include_once("function.inc.php");
?>

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
	
	$act = $_GET['act'];
	
	if(isset($act))	{
		if ($act == "fin")
			$query = "SELECT Numurs, Vards, Starts, Finiss, Grupa, Gads, Komentars FROM registracija WHERE Finiss != '' ORDER BY Finiss DESC LIMIT 0,10";
		if ($act == "sta")
			$query = "SELECT Numurs, Vards, Starts, Finiss, Grupa, Gads, Komentars FROM registracija WHERE Starts != '' ORDER BY Starts DESC LIMIT 0,10";
		if ($act == "apg")
			$query = "SELECT Numurs, Vards, Starts, Apgrieziens, Grupa, Gads, Komentars FROM registracija WHERE Apgrieziens != '' ORDER BY Apgrieziens DESC LIMIT 0,10";
	}
		
	$result = mysql_query($query);
	
	while($row = mysql_fetch_array($result)){
	  if ($row['Starts'] != 0) { $starts = strTime($row['Starts']); }
	  if ($row['Starts'] == 0) { $starts = ""; }
  	  if ($row['Finiss'] != 0) { $finiss = strTime($row['Finiss']); }
	  if ($row['Finiss'] == 0) { $finiss = ""; }
  	  if (isset($act)) {
        if ($act == 'apg') {
            $rezultats = strTime($row['Apgrieziens']-$row['Starts']);
        } else {
            $rezultats = strTime($row['Finiss']-$row['Starts']);
        }
      }
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
