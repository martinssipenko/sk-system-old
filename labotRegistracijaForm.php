<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="lv" lang="lv">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/frame_style.css" />
<link rel="stylesheet" type="text/css" href="styles/tabula.css" />
<script type="text/javascript" src="javascript/tabula.js"></script>

<!-- 08.08.2011 Added for autocomplete -->
<script type="text/javascript" src="lib/jquery.js"></script>
<script type='text/javascript' src='lib/jquery.bgiframe.min.js'></script>
<script type='text/javascript' src='lib/jquery.ajaxQueue.js'></script>
<script type='text/javascript' src='lib/thickbox-compressed.js'></script>
<script type='text/javascript' src='jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="lib/thickbox.css" />
<!-- 08.08.2011 Added for autocomplete END -->

<title></title>
<script type="text/javascript">
$().ready(function() {
	function formatItem(row) {
		return row[0] + " (<strong>id: " + row[1] + "</strong>)";
	}

	function formatResult(row) {
		return row[0].replace(/(<.+?>)/gi, '');
	}

	$("#vards").autocomplete("search.php", {
		width: 300,
		selectFirst: false
	});

	$("#vards").result(function(event, data, formatted) {
		if (data) {
			$("#vards").val(data[1]);
			$("#gads").val(data[2]);
			if(data[3] == "V")
				$("#DzV").attr("checked", "checked");
			if(data[3] == "S")
				$("#DzS").attr("checked", "checked");
		}
	});
});
</script>
</head>
<? include("data.inc.php"); ?>
<? include_once("function.inc.php"); ?>
<body>  
<form action="registracijaInsertData.php" method="post" enctype="application/x-www-form-urlencoded" name="registracija" target="mainFrame" autocomplete="off">
<table width="695" border="0">
 <tr>
  <td width="80" height="35">Numurs:</td>
  <td width="605">
   <input name="numurs" type="text" class="input" size="4" maxlength="4" tabindex="1" id="numInput" value="<?=$row['Numurs']?>" disabled="disabled" /> 
   </td>
 </tr>
 <tr>
  <td height="35">Dalībnieks:</td>
  <td>
   <input name="vards" id="vards" type="text" class="input" tabindex="2" style="width:300px; <? errorMsg($error['vards']); ?>" value="<? if(isset($_POST['vards'])) errorMsg($_POST['vards']); ?>" /> 
   <? if(isset($errorMsg['vards'])) errorMsg($errorMsg['vards']); ?>
  </td>
 </tr>
 <tr>
  <td height="35">Dz. gads:</td>
  <td>
   <input name="gads" id="gads" type="text" class="input" size="4" maxlength="4" tabindex="3" style="<? echo errorMsg($error['gads']); ?>" value="<? if(isset($_POST['gads'])) errorMsg($_POST['gads']); ?>" /> 
   <? if(isset($errorMsg['gads'])) errorMsg($errorMsg['gads']); ?>
  </td>
 </tr>
 <tr>
  <td height="35">Dzimums:</td>
  <td>
  <?php
  $vCh = "checked=\"checked\"";
  if(isset($_POST['dzimums'])) {
	  if ($_POST['dzimums'] == "V") { $vCh = "checked=\"checked\""; }
	  if ($_POST['dzimums'] == "S") { $sCh = "checked=\"checked\""; }
  }
  ?>
   <fieldset style="border: 0px; height: 15px; width:150px; <? if(isset($errorMsg['dzimums'])) errorMsg($error['dzimums']); ?>">
	<input name="dzimums" id="DzV" type="radio" value="V" tabindex="4" <?=$vCh?> /> Vīrietis
    <input name="dzimums" id="DzS" type="radio" value="S" tabindex="5" <?=$sCh?> /> Sieviete 
   </fieldset>
    <? if(isset($errorMsg['dzimums'])) errorMsg($errorMsg['dzimums']); ?>
  </td>
 </tr> 
 <tr>
  <td height="35">Velosipēds:</td>
  <td>
  <?php
  if(isset($_POST['velo'])) {
	  if ($_POST['velo'] == "T") { $vT = "selected=\"selected\""; }
	  if ($_POST['velo'] == "S") { $vS = "selected=\"selected\""; }
	  if ($_POST['velo'] == "C") { $vC = "selected=\"selected\""; }
	  if ($_POST['velo'] == "AK") { $vAK = "selected=\"selected\""; }
  }
  ?>
   <select name="velo" class="input" tabindex="6">
     <option value="T" <?=$vT?>>Tūristu</option>
     <option value="S" <?=$vS?>>Sporta</option>
     <option value="C" <?=$vC?>>Ceļu</option>
     <option value="AK" <?=$vAK?>>Ārpus konkurences</option>
   </select>
  </td>
 </tr>
 <tr>
  <td height="35">Komanda:</td>
  <td>
   <input name="komanda" id="komanda" type="text" class="input" tabindex="7" style="width:150px;" value="<? if(isset($_POST['komanda'])) errorMsg($_POST['komanda']); ?>" /> 
  </td>
 </tr>
 <tr>
  <td height="35">Komentārs:</td>
  <td>
   <input name="komentars" type="text" class="input" style="width:300px;" tabindex="8" value="<? if(isset($_POST['komentars'])) errorMsg($_POST['komentars']); ?>" />
  </td>
 </tr>
 <tr>
  <td height="35"></td>
  <td>
   <input name="registret" type="submit" class="input" tabindex="7" value="Reģistrēt" /> 
   <input name="" type="reset" value="Atcelt" class="input" tabindex="9" />

  </td>
</table>
   </form>
</body>
</html>