<?php
setlocale (LC_TIME, "ru_RU");
session_start(); 
setlocale(LC_ALL, 'ru_RU.CP1251', 'rus_RUS.CP1251', 'Russian_Russia.1251');

?>





<html>
<head>
<title>Форма заполнения новая новая форма</title>
<link rel="stylesheet" type="text/css" media="all" href="style/style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>
<div class="content">
<div class="heder">
<ul>
<li ><a href="http://publication.pravo.gov.ru/Document/View/0001201411300007" class="xzz">Федеральный закон от 29.11.2014 № 382-ФЗ </a></li>
<li></li>
</ul>
</div>
<br>
<form method=POST action="ad.php">
<div class="cont">
<h1>Данные плательщика</h1>
<table>
<tr>
<td class="ffg"><p>ИНН</p></td>
<td><input type="text" name="fld_INN" class="cssq" required>
<span class="cw">Не более 12 символов</span>
</td>
</tr>
</table>
</div>
<br>
<div class="cont">
<h1>Данные объекта</h1>
<table>
<tr>
<td><p>Адрес торгового объекта</p></td>
<td><p>Город <select size="1"  name="fld_city[]" required>
    <option value="Москва">Москва</option>
    <option value="Санкт-Петербург">Санкт-Петербург</option>
    <option value="Севастополь">Севастополь</option>
   </select>Улица<input type="text" name="fld_ADRESS" required></p></td>
</tr>
<tr>
<td><p>Площадь торгового объекта <span>(кв.м)</span></p></td>
<td><input type="text" name="fld_AREA" class="vew" required></td>
</tr>
</table>
</div>
<br>
<div class="cont">
<h1>Данные платежа</h1>
<table>
<tr>
<td><p>Сумма уплаченного сбора</p></td>
<td><input type="text" name="fld_SUM" class="vew" required></td>
</tr>
<tr>
<td><p>Период (квартал), за который произведена оплата</p></td>
<td>
  <p><select size="1"  name="fld_PERIOD12[]">
    <option value="2015 год - 1 квартал">2015 год - 1 квартал</option>
    <option value="2015 год - 2 квартал">2015 год - 2 квартал</option>
    <option value="2016 год - 1 квартал">2016 год - 1 квартал</option>
	<option value="2016 год - 2 квартал">2016 год - 2 квартал</option>
	<option value="2017 год - 1 квартал">2017 год - 1 квартал</option>
	<option value="2017 год - 2 квартал">2017 год - 2 квартал</option>
	<option value="2018 год - 1 квартал">2018 год - 1 квартал</option>
	<option value="2018 год - 2 квартал">2018 год - 2 квартал</option>
	<option value="2019 год - 1 квартал">2019 год - 1 квартал</option>
	<option value="2019 год - 2 квартал">2019 год - 2 квартал</option>
	<option value="2020 год - 1 квартал">2020 год - 1 квартал</option>
	<option value="2020 год - 2 квартал">2020 год - 2 квартал</option>
   </select></p>
</td>
</tr>
</table>
<br>
</div>
<br>
<div class="cont">
<h1>Выбор даты оплаты</h1>
<table>
<tr>
<td></td>
<td>
<?php


$start = new DateTime('01-01-2015');
$interval = new DateInterval('P1D');
@$end = new DateTime($ad);
$period = new DatePeriod($start, $interval, $end,
                         DatePeriod::EXCLUDE_START_DATE);
?>
<select size="1"  name="fld_data[]">
<?php
foreach ($period as $date) {
?>
<option value="<?php echo $date->format('l jS \of F Y'); ?>"><?php echo $date->format('l jS \of F Y'); ?>
</option>
<?php
}
?>
</select>
 </p>
</td>
</tr>
</table>
</div>
<br>
<div class="cont">
<table class="as">
<tr>
<td>
<input type="SUBMIT" class="click" value="Отправить информацию">
</td>
<td>
<input type="SUBMIT" class="click1" value="Очистить">
</td>
</tr>
<table>
</div>
</form>
</div>
</body>
</html>