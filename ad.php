<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" media="all" href="style/style.css" />
</head>
<body>
<div class="content">
<div class="cont">

<h1>Ошибка</h1>
<?php

//тут сессия продалжаеться 
session_start();

//функция перехвата ошибки и отправки 
function user_error_form($user_error, $time = 10, $put = 'index.php'){
		echo $user_error;
		return header("refresh: $time; $put");
}
//перехватываем id сессии
$name_id = session_id();

//данные с формы, удалем возможные теги


$fld_INN = strip_tags($_POST['fld_INN']);
$fld_ADRESS = strip_tags($_POST['fld_ADRESS']);
$fld_AREA = strip_tags(abs($_POST['fld_AREA'])); //только положительное число
$fld_PERIOD = $_POST['fld_PERIOD12'];
$fld_SUM = strip_tags($_POST['fld_SUM']); //только положительное число нужно использоватьфункции abs
$fld_DATE = date("m.d.y"); 
$fid_d= $_POST['fld_data'];
$fid_c = $_POST['fld_city'];
//echo $fid_c[0];
//проверка
if(is_numeric($fld_INN)){
	 if(is_numeric($fld_SUM)){
		if(is_numeric($fld_AREA) != 0){
		
		}else{
			user_error_form("Ошибка: похоже вы ввели текст что-то в поле площадь, вы будите перенаправлены для повторного заполнения формы");	
		return header("refresh: 10; index.php");
		}
	 }else{
		user_error_form("Ошибка: похоже вы ввели текст что-то в поле суммы, вы будите перенаправлены для повторного заполнения формы");	
		return header("refresh: 10; index.php");
	 }
}else{
	user_error_form("Ошибка: ИНН состоит из числел а не текста, вы будите перенаправлены для повторного заполнения формы");
	return header("refresh: 10; index.php");
}
//echo $fld_SUM;

$aa = (string)$fld_INN;

$strLength = iconv_strlen($aa);

//var_dump($_POST);
//echo $per;
$f_area = number_format($fld_AREA, 2, ',', ' '); //форматирования числа с разделением групп
$f_sum = number_format($fld_SUM, 2, ',', ' '); //форматирования числа с разделением групп

if ($strLength == 12){
	
}
else{	
		user_error_form("Ошибка, вы ввели символов: $strLength, а нужно 12 символов в ИНН, вы будите перенаправлены на страницу для повторного заполнения",10);
			return header("refresh: 10; index.php");
}

//даём имя файлу
$a = "receiveData".$name_id.".csv";

//массив с данными из формы
$list = array(
	array('ИНН индивидуального предпринимателя', $fld_INN),
	array('Адрес торгового объекта', $fid_c[0].", ".$fld_ADRESS),
	array('Площадь торгового объекта', $f_area." кв.м"),
	array('Сумма уплаченного сбора', $f_sum." руб"),
	array('Период (квартал), за который произведена оплата', $fld_PERIOD[0]),
	array('Дата осуществления платежа', $fid_d[0]),
);

//запись в файл

$fp = fopen($a,'a+');
foreach($list as $fi){
	fputcsv($fp, $fi);
}

//закрываем соединение
fclose($fp);

header("refresh: 0; user.php?".session_name().'='.session_id());
?>
<div>
</div>
</body>
</html>