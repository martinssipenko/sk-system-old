<?php
require_once 'data.inc.php';
require_once 'function.inc.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="lv" lang="lv">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="styles/frame_style.css">
		<link rel="stylesheet" type="text/css" href="styles/tabula.css">
		<title></title>
	</head>
	<body onload="document.getElementById('finiss').focus()">
		<form action="hronometrsInsertData.php" method="post" enctype="application/x-www-form-urlencoded" name="registracija" target="mainFrame">
			<table width="695" border="0">
				<tr>
					<td width="80" height="35">
						<input id="finiss" style="width: 100%; height: 100px; font-size: 40px;" type="submit" value="Finišs" />
					</td>
			</table>
		</form>
		<div class="widget_tableDiv">
			<table id="myTable" width="696">
				<thead>
					<tr>
						<td width="280">
							Laiks
						</td>
						<td width="50">
							Dzēst
						</td>
					</tr>
				</thead>
				<tbody class="scrollingContent">
					<?php
						//Pieslēdzamies MySQL
						mysql_connect($host, $user, $pass);
						mysql_select_db($dbName);
						mysql_set_charset('utf8');
						$result = mysql_query("SELECT * FROM finiss WHERE trash=0 ORDER BY ID DESC");

						while($row = mysql_fetch_array($result)){
							if ($row['laiks'] != 0) {
								$laiks = strTime($row['laiks']);
							}

							echo "
							  <tr>
								<td>" . $laiks . "</td>
								<td><a href=\"deleteHronometrs.php?id=".$row['ID']."\" onclick=\"javascript: if(!confirm ('Vai tiešām dzēst šo finiša laiku?')) return false;\">Dzēst</a></td>
							  </tr>
							";
						}
						mysql_close();
					?>
				</tbody>
			</table>
		</div>
        <script src="javascript/vendor/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="javascript/tabula.js"></script>
		<script type="text/javascript">
			initTableWidget('myTable',696,350,Array('S', false));

			$(document).keypress(function(e){
				if (e.which == 13){
					$("#finiss").click();
				}
			});
		</script>
	</body>
</html>
