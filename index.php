<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php date_default_timezone_set('Europe/Riga'); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="lv" lang="lv">
<head>
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<title>Šķūnenieku Kauss - Rezultātu sistēma</title>
<script language="JavaScript" type="text/javascript">
<!--
function clearForm() {
	document.search.searchform.value = "";
}
-->
</script>

</head>

<body>
<center>
<table class="container" style="width:904px" border="0" cellpadding="0" cellspacing="0">
<tr>
<td align="center">

    <table width="890" border="0" cellpadding="0" cellspacing="0" style="margin-top:4px;background-color:#606060;border-bottom:1px solid black">
      <tr>
    	<td width="15" height="50">&nbsp;</td>
	    <td width="500" valign="top" style="height:50px;text-align:left">
    	  <a href="?action="><img style="margin-top:6px" border="0" src="images/h_logo.jpg" width="200" height="40" alt="ŠK" title="Šķūnenieku Kauss" /></a></td>
	    <td align="right" valign="bottom" style="color:white;font-size:10px;font-weight:bold">
    		<form style="margin:0px;padding:0px;" method="post" name="search" action="searchResults.php" target="mainFrame">
            <table cellpadding="0" cellspacing="0" border="0" style="padding-bottom:10px">
              <tr>
    	        <td>Meklēt : &nbsp;</td>
        	    <td><input style="margin:0px;height:12px;width:128px;" alt="search" type="text" name="searchform" size="20" value="" onFocus="clearForm()" /></td>
            	<td><input style="margin:0px" type="image" align="middle" src="images/search.gif" /></td>
              </tr>
            </table>
            </form>
	    </td>
    	<td>&nbsp;</td>
      </tr>
    </table>
    
    
    <table width="890px" border="0" cellpadding="0" cellspacing="0" style="background-color:#606060">
    <tr>
    <td width="80px" height="23" class="blacknav" style="border-left:none"><a class="m_item" href="registracijaForm.php" target="mainFrame">Reģistrācija</a></td>
    <td class="blacknav" width="45px"><a class="m_item" href="startsForm.php" target="mainFrame">Starts</a></td>
    <td class="blacknav" width="45px"><a class="m_item" href="finissForm.php" target="mainFrame">Finišs</a></td>
    <td class="blacknav" width="80px"><a class="m_item" href="komentetajsForm.php" target="mainFrame">Komentētājs</a></td>
        <!-- Nevajadzīgās pogas
        <td class="blacknav" width="40px">&nbsp;</td>
        <td class="blacknav" width="90px">&nbsp;</td>
        <td class="blacknav" width="40px">&nbsp;</td>
        <td class="blacknav" width="40px">&nbsp;</td>
        <td class="blacknav" width="40px">&nbsp;</td>
        <td class="blacknav" width="60px">&nbsp;</td>
        <td class="blacknav" width="80px">&nbsp;</td>
        <td class="blacknav" width="70px">&nbsp;</td>
        -->
    <td class="blacknav">&nbsp;</td>
    		
            <td class="blacknav" width="185">
            <script type="text/javascript">
				var currenttime = '<?php echo date("F d, Y H:i:s", time()); ?>' //PHP method of getting server date
				var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
				var serverdate=new Date(currenttime)
				function padlength(what){
				var output=(what.toString().length==1)? "0"+what : what
				return output
				}
				function displaytime(){
				serverdate.setSeconds(serverdate.getSeconds()+1)
				var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
				var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
				document.getElementById("servertime").innerHTML=datestring+" "+timestring
				}
				window.onload=function(){
				setInterval("displaytime()", 1000)
				}
			  </script>
				<span id="servertime"></span>
    		</td>
    </tr>
    </table>
    
    
    <table style="margin-top:2px" width="890px" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td width="700" valign="top">
    
    <iframe name="mainFrame" width="700" height="500" frameborder="0" src="" scrolling="auto" style="padding-top:5px;"></iframe>
    
    </td>
    
    <td width="10">&nbsp;</td>
    <td width="181" align="center" valign="top">
    
    <iframe name="infoFrame" width="181" height="500" frameborder="0" src="rightInfo.php" scrolling="no" style="padding-top:5px;"></iframe>

    </td>

</tr></table>

<table width="890px" style="margin-bottom:5px;margin-top:1px;background-color:#f1f1f1;border:1px solid #c3c3c3" border="0" cellpadding="10" cellspacing="0">
<tr>

<td valign="top" align="left" width="300">
<div style="font-size:9px;">
  <p>
</p>

</div>
</td>
<td valign="top" align="left">
<div style="font-size:9px;">
<big><b></b></big></div>
</td>
</tr>
</table>
    
</td>
</tr>
</table>
</center>
</body>
</html>