<?php
session_start();
$name_id = session_id();
$a = "receiveData".$name_id.".csv";
$csv = array_map('str_getcsv', file($a));
?>
<html>
<head>
<title>Инофмарцация о платеже</title>
<link rel="stylesheet" type="text/css" media="all" href="style/style.css" />
</head>
<body>
	<div class="content">
		<div class="heder">
			<ul class="sqq">
				<li><a href=<?php echo $a ?> class="xzz">Скачать файл</a></li>
				<li><a href="index.php" class="xzz">Провести оплату повторно</a></li>
				<li><a href="delete.php" class="xzz">Выйти</a></li>
				<li><a href="rtf.php" class="xzz">Скачать отчёт</a></li>
			</ul>
		</div>
	<br>
	<div class="cont">
		<h1>Информация о платеже</h1>
	<table border=1 class="tab">
	<?php

	$row = 1;
	if (($handle = fopen($a, "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
		//echo $row++;
			?>
		<tr>
			<td class="cc2"><?php echo $data[0]; ?></td>
			<td class="cc2"><?php echo $data[1]; ?></td>		
		</tr>
		<?php
		//echo $row++;
		}

		fclose($handle);
	}

	?>
	</table>
	</div>
	<br>
	</div>
	</div>
</body>
</html>