<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="lv" lang="lv">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/frame_style.css" />
<script type="text/javascript" src="javascript/popup.js"></script>

<link rel="stylesheet" type="text/css" href="styles/ajaxpagination.css" />
<script src="javascript/ajaxpagination.js" type="text/javascript"></script>

<title></title>
<script language="JavaScript" type="text/javascript">
<!--
function info ( numurs )
{
  document.komentetajs.numurs.value = numurs ;
  window.open("komentetajsSeeInfo.php", "popupWin", "height = 500 ,width = 900, location = 0, status = 0, resizable = 0, scrollbars=0, toolbar = 0");
  document.komentetajs.submit() ;
}

function clearForm() {
	document.komentetajs.numurs.value = "";
}

-->
</script>
</head>

<?phpinclude_once("data.inc.php"); ?>
<?phpinclude_once("function.inc.php"); ?>
<body>
<p>
<form action="komentetajsSeeInfo.php" method="post" enctype="application/x-www-form-urlencoded" name="komentetajs" target="popupWin" onsubmit="return openWindow();">
<table width="695" border="0">
 <tr>
  <td width="80" height="35">Numurs:</td>
  <td width="600">
   <input name="numurs" type="text" class="input" size="4" maxlength="4" tabindex="1" id="numInput" onFocus="clearForm()" />
   <input style="margin:0px" type="image" align="middle" src="images/submit_invisible.gif" />
   </td>
 </tr>
</table>
</form>
<table width="695" border="0">
  <tr>
    <td>
      <a href="javascript:mybookinstance.refresh(kopvUnGrupuLabakie)">Kopvērtējuma un grupu labākie</a>
    </td>
 </tr>
 <tr>
   <td>
     <a href="javascript:mybookinstance.refresh(nesenFiniseja)">Nesen finišēja</a>
   </td>
 </tr>
 <tr>
   <td>
     <a href="javascript:mybookinstance.refresh(nesenStarteja)">Nesen startēja</a>
   </td>
 </tr>
 <tr>
   <td>
     <a href="javascript:mybookinstance.refresh(nesenApgriezas)">Nesen apgriezās</a>
   </td>
 </tr>
</table>
</p>
<p>
<div id="saturs"> </div>
<div id="lapas" style="color:#FFFFFF"> </div>
<script language="JavaScript" type="text/javascript">
<!--

var kopvUnGrupuLabakie={
pages: ["kopvUnGrupuLabakie.php"],
selectedpage: 0 //set page shown by default (0=1st page)
}

var nesenFiniseja={
pages: ["nesen.php?act=fin"],
selectedpage: 0 //set page shown by default (0=1st page)
}

var nesenStarteja={
pages: ["nesen.php?act=sta"],
selectedpage: 0 //set page shown by default (0=1st page)
}

var nesenApgriezas={
pages: ["nesen.php?act=apg"],
selectedpage: 0 //set page shown by default (0=1st page)
}

var mybookinstance=new ajaxpageclass.createBook(kopvUnGrupuLabakie, "saturs", ["lapas",])
-->
</script>
</p>

</body>
</html>
