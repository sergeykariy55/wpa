<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" media="all" href="style/style.css" />
</head>
<body>
<div class="content">
<div class="cont">

<h1>������</h1>
<?php

//��� ������ ������������� 
session_start();

//������� ��������� ������ � �������� 
function user_error_form($user_error, $time = 10, $put = 'index.php'){
		echo $user_error;
		return header("refresh: $time; $put");
}
//������������� id ������
$name_id = session_id();

//������ � �����, ������ ��������� ����


$fld_INN = strip_tags($_POST['fld_INN']);
$fld_ADRESS = strip_tags($_POST['fld_ADRESS']);
$fld_AREA = strip_tags(abs($_POST['fld_AREA'])); //������ ������������� �����
$fld_PERIOD = $_POST['fld_PERIOD12'];
$fld_SUM = strip_tags($_POST['fld_SUM']); //������ ������������� ����� ����� ������������������� abs
$fld_DATE = date("m.d.y"); 
$fid_d= $_POST['fld_data'];
$fid_c = $_POST['fld_city'];
//echo $fid_c[0];
//��������
if(is_numeric($fld_INN)){
	 if(is_numeric($fld_SUM)){
		if(is_numeric($fld_AREA) != 0){
		
		}else{
			user_error_form("������: ������ �� ����� ����� ���-�� � ���� �������, �� ������ �������������� ��� ���������� ���������� �����");	
		return header("refresh: 10; index.php");
		}
	 }else{
		user_error_form("������: ������ �� ����� ����� ���-�� � ���� �����, �� ������ �������������� ��� ���������� ���������� �����");	
		return header("refresh: 10; index.php");
	 }
}else{
	user_error_form("������: ��� ������� �� ������ � �� ������, �� ������ �������������� ��� ���������� ���������� �����");
	return header("refresh: 10; index.php");
}
//echo $fld_SUM;

$aa = (string)$fld_INN;

$strLength = iconv_strlen($aa);

//var_dump($_POST);
//echo $per;
$f_area = number_format($fld_AREA, 2, ',', ' '); //�������������� ����� � ����������� �����
$f_sum = number_format($fld_SUM, 2, ',', ' '); //�������������� ����� � ����������� �����

if ($strLength == 12){
	
}
else{	
		user_error_form("������, �� ����� ��������: $strLength, � ����� 12 �������� � ���, �� ������ �������������� �� �������� ��� ���������� ����������",10);
			return header("refresh: 10; index.php");
}

//��� ��� �����
$a = "receiveData".$name_id.".csv";

//������ � ������� �� �����
$list = array(
	array('��� ��������������� ���������������', $fld_INN),
	array('����� ��������� �������', $fid_c[0].", ".$fld_ADRESS),
	array('������� ��������� �������', $f_area." ��.�"),
	array('����� ����������� �����', $f_sum." ���"),
	array('������ (�������), �� ������� ����������� ������', $fld_PERIOD[0]),
	array('���� ������������� �������', $fid_d[0]),
);

//������ � ����

$fp = fopen($a,'a+');
foreach($list as $fi){
	fputcsv($fp, $fi);
}

//��������� ����������
fclose($fp);

header("refresh: 0; user.php?".session_name().'='.session_id());
?>
<div>
</div>
</body>
</html>