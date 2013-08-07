<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="styles/frame_style.css" />
<link rel="stylesheet" type="text/css" href="styles/tabula.css" />
<script type="text/javascript" src="javascript/tabula.js"></script>
<script language="JavaScript" type="text/javascript">
<!--
function getsupport ( numurs )
{
  document.komentetajs.numurs.value = numurs ;
  window.open("komentetajsSeeInfo.php", "popupWin", "height = 450 ,width = 800, location = 0, status = 0, resizable = 0, scrollbars=0, toolbar = 0");
  document.komentetajs.submit() ;
}

-->
</script>
</head>

<body>
<form action="komentetajsSeeInfo.php" method="post" name="komentetajs" target="popupWin">
  <input name="numurs" type="hidden" />
</form>
<div class="widget_tableDiv">
<table id="myTable" width="690">
	<thead>
		<tr>
			<td width="30">Nr.</td>
            <td>Dalībnieks</td>
            <td width="70">Dz. gads</td>
            <td width="50">Grupa</td>
		  	<td width="65">Starts</td>
            <td width="65">Finišs</td>
            <td width="70">Rezultāts</td>
			<td width="150">Komentārs</td>
		</tr>
	</thead>
	<tbody class="scrollingContent">
<?php
	include_once("data.inc.php");
	include_once("function.inc.php");
	//Pieslēdzamies MySQL
	mysql_connect($host, $user, $pass);
	mysql_select_db($dbName);
	mysql_set_charset('utf8');

	$term = $_POST['searchform'];
	$result = mysql_query("SELECT * FROM registracija WHERE Numurs LIKE '%" . $term . "%' OR Vards LIKE '%" . $term . "%' OR Grupa LIKE '%" . $term . "%' ORDER BY Finiss-Starts ASC");

	while($row = mysql_fetch_array($result)){
	  if ($row['Starts'] != 0) { $starts = strTime($row['Starts']); }
	  if ($row['Starts'] == 0) { $starts = ""; }
  	  if ($row['Finiss'] != 0) { $finiss = strTime($row['Finiss']); }
	  if ($row['Finiss'] == 0) { $finiss = ""; }
  	  $rezultats = strTime($row['Finiss']-$row['Starts']);
		echo "
		  <tr>
			<td>".$row['Numurs']."</td>
			<td><a href=\"javascript:getsupport('".$row['Numurs']."')\">".$row['Vards']."</a></td>
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
/*
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
  	  return $str;
	}
*/
?>
	</tbody>
</table>
</div>
<script type="text/javascript">
initTableWidget('myTable',690,498,Array('N','S','S','S','S', 'S', false));
</script>
</form>
</body>
</html>