<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="lv" lang="lv">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/frame_style.css" />
<link rel="stylesheet" type="text/css" href="styles/tabula.css" />
<script type="text/javascript" src="javascript/tabula.js"></script>
<title></title>
</head>

<body> 
<div class="widget_tableDiv">
<table id="myTable" width="696">
	<thead>
		<tr>
        	<td width="50">Laiks</td>
			<td width="30">Nr.</td>
            <td>Dalībnieks</td>
            <td width="70">Dz. Gads</td>
            <td width="50">Grupa</td>
			<td width="150">Komentārs</td>
		</tr>
	</thead>
	<tbody class="scrollingContent">
<?php
	include("data.inc.php");
	include_once("function.inc.php");
	//Pieslēdzamies MySQL
	mysql_connect($host, $user, $pass);
	mysql_select_db($dbName);
	mysql_set_charset('utf8');
	
	$minusSec = date("s");
	if(date("s") >= 30) { $minusSec = date("s") - 30;}
	$startTime = time() - mktime($hour, 0, 0, $month, $day, $year) - $minusSec - 120;
	for ($i = 1; $i <= 30; $i++) {
	
	$komentarsTrue = FALSE;
	$startTime = $startTime + $startIntervals;
	$selectStartTime = mktime($hour, 0, 0, $month, $day, $year) + $startTime;
	$selectStartTimeSec = $selectStartTime - mktime($hour, 0, 0, $month, $day, $year);
	
	$result = mysql_query("SELECT Numurs, Vards, Gads, Grupa, Komentars FROM registracija WHERE Starts = '$selectStartTimeSec'");
	$startejusi = mysql_fetch_row($result);
	
	if ($startejusi[0]) {
	$komentarsTrue = "<input name=\"komentars\" type=\"text\" class=\"input\" id=\"numInput\" value=\"" .$startejusi[4] . "\" style=\"height: 14px;\" />";
	}
	
	echo "
	<form action=\"startsInsertData.php\" method=\"post\" enctype=\"application/x-www-form-urlencoded\" name=\"starts$startTime\" id=\"starts$startTime\" target=\"mainFrame\">
	<tr>
		
	  <td>
	  ".strTime($startTime)."<input name=\"laiks\" type=\"hidden\" value=\"$selectStartTime\" /></td>
	  <td><input name=\"numurs\" type=\"text\" class=\"input\" size=\"4\" maxlength=\"4\" value=\"$startejusi[0]\" style=\"height: 14px;\" /></td>
	  <td>$startejusi[1]</td>
	  <td>$startejusi[2]</td>
	  <td>$startejusi[3]</td>
	  <td>$komentarsTrue <input style=\"border:0px\" type=\"image\" align=\"middle\" src=\"images/submit_invisible.gif\" /></td>
	</tr>
	</form>
	";
	}	
?>           
	</tbody>
</table>
</div>
<script type="text/javascript">
  initTableWidget('myTable',696,495,Array(false, 'N', 'S', 'N', 'S', false));
</script>
</body>
</html>