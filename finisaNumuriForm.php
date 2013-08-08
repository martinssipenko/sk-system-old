<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="styles/frame_style.css">
		<link rel="stylesheet" type="text/css" href="styles/tabula.css">
		<title></title>
	</head>
	<body>
		<div class="widget_tableDiv">
			<table id="myTable" width="696">
				<thead>
					<tr>
						<td width="50">
							Laiks
						</td>
						<td width="30">
							Nr.
						</td>
						<td>
							Dalībnieks
						</td>
						<td width="50">
							Rezultāts
						</td>
					</tr>
				</thead>
				<tbody class="scrollingContent">
					<?php
						require_once 'data.inc.php';
						require_once 'function.inc.php';

						mysql_connect($host, $user, $pass);
						mysql_select_db($dbName);
						mysql_set_charset('utf8');

						$result = mysql_query("
							(SELECT * FROM finiss WHERE trash=0 AND numurs IS NOT NULL ORDER BY laiks DESC LIMIT 5)
							UNION
							(SELECT * FROM finiss WHERE trash=0 AND numurs IS NULL ORDER BY laiks ASC LIMIT 14)
							ORDER BY laiks ASC;
						");

						while ($row = mysql_fetch_array($result)) {
							$rezultats= '';
							$dalibnieks= '';
							if ( !empty($row['numurs']) ) {
								$res = mysql_query("SELECT Vards, Starts, Finiss From registracija WHERE Numurs='{$row['numurs']}'");
								$item = mysql_fetch_row($res);

								$dalibnieks = $item[0];
								$rezultats = strTime($row['laiks']-$item[1]);
							}

							?>
								<form action="finisaNumuriInsertData.php" method="post" enctype="application/x-www-form-urlencoded" target="mainFrame">
									<input type="hidden" name="laiks_id" value="<?php echo $row['id']; ?>">
									<input type="hidden" name="laiks" value="<?php echo $row['laiks']; ?>">
									<tr>
										<td width="50">
											<?php echo strTime($row['laiks']); ?>
										</td>
										<td width="30">
											<input name="numurs" type="text" class="input" size="4" maxlength="4" value="<?php echo $row['numurs']; ?>" style="height: 20px;" />
										</td>
										<td width="450">
											<?php echo $dalibnieks; ?>
										</td>
										<td width="100">
											<?php echo $rezultats; ?>
										</td>
									</tr>
								</form>
							<?php
						}
					?>
				</tbody>
			</table>
		</div>
		<script type="text/javascript" src="javascript/tabula.js"></script>
		<script type="text/javascript">
			initTableWidget('myTable',696,495,Array(false, 'N', 'S', 'N', 'S', false));
		</script>
	</body>
</html>