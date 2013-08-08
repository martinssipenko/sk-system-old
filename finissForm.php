<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="lv" lang="lv">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/frame_style.css" />
<link rel="stylesheet" type="text/css" href="styles/tabula.css" />
<script type="text/javascript" src="javascript/tabula.js"></script>
<title></title>
</head>
<? include("data.inc.php"); ?>
<? include_once("function.inc.php"); ?>

<body onload="document.getElementById('numInput').focus()">
<form action="finissInsertData.php" method="post" enctype="application/x-www-form-urlencoded" name="registracija" target="mainFrame">
<table width="695" border="0">
 <tr>
  <td width="80" height="35">Numurs:</td>
  <td width="600">
   <input name="numurs" type="text" class="input" size="4" maxlength="4" tabindex="1" id="numInput" style="<?php echo isset($error['numurs']) ? $error['numurs'] : ''; ?>" value="<?php if(isset($_POST['numurs'])) echo $_POST['numurs']; ?>" />
   <?php if(isset($errorMsg['numurs'])) echo $errorMsg['numurs']; ?>
   </td>
 </tr>
 <tr>
  <td height="35">Laiks:</td>
  <td>
   <input name="laiksH" type="text" size="3" maxlength="2" class="input" tabindex="2" style="<?php echo isset($error['laiksH']) ? $error['laiksH'] : ''; ?>" value="<?php if(isset($_POST['laiksH'])) echo $_POST['laiksH']; ?>" /> :
   <input name="laiksM" type="text" size="3" maxlength="2" class="input" tabindex="3" style="<?php echo isset($error['laiksM']) ? $error['laiksM'] : ''; ?>" value="<?php if(isset($_POST['laiksM'])) echo $_POST['laiksM']; ?>" /> :
   <input name="laiksS" type="text" size="3" maxlength="2" class="input" tabindex="4" style="<?php echo isset($error['laiksS']) ? $error['laiksS'] : ''; ?>" value="<?php if(isset($_POST['laiksS'])) echo $_POST['laiksS']; ?>" />
   <?php if(isset($errorMsg['laiks'])) echo $errorMsg['laiks']; ?>
  </td>
 </tr>
 <tr>
  <td height="35"></td>
  <td>
   <input name="registret" type="submit" class="input" tabindex="5" value="Saglabāt" />
   <input name="" type="reset" value="Atcelt" class="input" tabindex="6" />
  </td>
 </tr>
 <tr>
  <td height="29" colspan="2" valign="bottom">Finiša laiki:</td>
 </tr>
</table>
</form>
<div class="widget_tableDiv">
<table id="myTable" width="696">
	<thead>
		<tr>
			<td width="30">Nr.</td>
            <td width="50">Grupa</td>
			<td>Dalībnieks</td>
		  	<td width="65">Starts</td>
            <td width="65">Finišs</td>
            <td width="70">Rezultāts</td>
            <td width="50">Dzēst</td>
		</tr>
	</thead>
	<tbody class="scrollingContent">
<?php
	//Pieslēdzamies MySQL
	mysql_connect($host, $user, $pass);
	mysql_select_db($dbName);
	mysql_set_charset('utf8');
	// ipFiniss = '".$_SERVER['REMOTE_ADDR']."' AND
	$result = mysql_query("SELECT Numurs, Vards, Starts, Finiss, Grupa FROM registracija WHERE finiss != '' ORDER BY ID DESC");

	while($row = mysql_fetch_array($result)){
	  if ($row['Starts'] != 0) { $starts = strTime($row['Starts']); }
	  if ($row['Starts'] == 0) { $starts = ""; }
  	  if ($row['Finiss'] != 0) { $finiss = strTime($row['Finiss']); }
	  if ($row['Finiss'] == 0) { $finiss = ""; }
  	  $rezultats = strTime($row['Finiss']-$row['Starts']);
		echo "
		  <tr>
			<td>".$row['Numurs']."</td>
			<td>".$row['Grupa']."</td>
			<td>".$row['Vards']."</td>
			<td>".$starts."</td>
			<td>".$finiss."</td>
			<td>".$rezultats."</td>
			<td><a href=\"deleteFiniss.php?numurs=".$row['Numurs']."\" onclick=\"javascript: if(!confirm ('Vai tiešām dzēst šī dalībnieka finiša laiku?')) return false;\">Dzēst</a></td>
		  </tr>
		";
	}
	mysql_close();
?>
	</tbody>
</table>
</div>
<script type="text/javascript">
initTableWidget('myTable',696,350,Array('N','S','S','S','S', 'S', false));
</script>
</body>
</html>