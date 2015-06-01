<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" media="all" href="style/style.css" />
</head>
<body>
<div class="content">
<div class="cont">

<h1>Удалено</h1>
<?php
session_start();
$name_id = session_id();
$a = "receiveData".$name_id.".csv";

if(unlink($a)){
	echo "Файл $a удалён, вы будите перенаправлены на главную страницу <br>";
	echo "Сессия удалена $name_id";
	session_destroy();
	
	header("refresh: 10; index.php");
}else{
	echo "ошибка <br>";
	echo "<a href=$_SERVER[HTTP_REFERER]>Назад</a>";
}

?>
<div>
</div>
</body>
</html>