<?php
header("Content-type: application/rtf");
header("Content-disposition: attachment; filename=\"mydoc.rtf\"");

session_start();

$name_id = session_id();
$a = "receiveData".$name_id.".csv";
$csv = array_map('str_getcsv', file($a));


$row = 1;
if (($handle = fopen($a, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
	?>	
		<?php echo $data[0]." - " ?><?php echo $data[1]; ?>		
		
<?php
    }

    fclose($handle);
}
?>
