<?php 
session_start();
$_SESSION['name'] = time();
ini_set('memory_limit', '-1');

$type=2;
@$div = $_GET['div'];
@$dis = $_GET['dis'];
if($type == 2)
{
	header("Content-type: application/octet-stream"); 
	header("Content-Disposition: attachment; filename=".$_SESSION['name'].".xls"); 
	header("Pragma: no-cache"); 
	header("Expires: 0"); 
	//include("file:///D|/xampp/htdocs/xlsexport/dbconnect.inc.php"); 
	mysql_connect('103.247.238.173','root','mistestdb'); 
	@mysql_select_db('registry') or die("Unable to select database"); 
	$select = $select = "SELECT  upa.div_code,divi.name AS div_name,upa.district_code, dis.name AS dis_name,upa.upazilla_code,upa.name AS upa_name, uni.`union_code` ,uni.`union_name` , uni.`total_population` 
FROM `unions` AS uni
JOIN upazillas AS upa ON upa.`upazilla_code` = uni.upazilla_code
AND upa.div_code = uni.division_code
AND uni.district_code = upa.district_code
JOIN districts AS dis ON dis.district_code = upa.district_code
JOIN divisions AS divi ON divi.div_code = upa.div_code
				"; 
	$export = mysql_query($select); 
	/*$count = mysql_num_fields($export); 
	for ($i = 0; $i < $count; $i++) { */
		$header .= "Division Code"."\t";
	$header .= "Division name"."\t";
	$header .= "District Code"."\t";
	$header .= "District Name"."\t";
	$header .= "Upazilla code"."\t";
	$header .= "Upazilla"."\t"; 
	$header .= "Union code"."\t";
	$header .= "Union"."\t"; 	
	$header .= "Population Total"."\t";
	/*}*/ 
	while($row = mysql_fetch_row($export)) { 
	$line = ''; 
	foreach($row as $value) { 
	if ((!isset($value)) OR ($value == "")) { 
	$value = "\t"; 
	} else { 
	$value = str_replace('"', '""', $value); 
	$value = '"' . $value . '"' . "\t"; 
	} 
	$line .= $value; 
	} 
	$data .= trim($line)."\n"; 
	} 
	$data = str_replace("\r", "", $data); 
	if ($data == "") { 
	$data = "\n(0) Records Found!\n"; 
	} 
	print "$header\n$data";
}
else
{
	header("Content-type: application/octet-stream"); 
	header("Content-Disposition: attachment; filename=".$_SESSION['name'].".xls"); 
	header("Pragma: no-cache"); 
	header("Expires: 0"); 
	//include("file:///D|/xampp/htdocs/xlsexport/dbconnect.inc.php"); 
	mysql_connect('103.247.238.173','root','mistestdb'); 
	@mysql_select_db('registry') or die("Unable to select database"); 
	$select = "SELECT divisions.name AS division,upazillas.div_code,upazillas.district_code,upazillas.population_total , districts.`name` AS district, 
                 FROM upazillas
                 JOIN districts ON districts.district_code = upazillas.`district_code` 
                 JOIN divisions ON districts.div_code = divisions.div_code
				"; 
	$export = mysql_query($select); 
	/*$count = mysql_num_fields($export); 
	for ($i = 0; $i < $count; $i++) { */
	$header .= "Division Code"."\t";
	$header .= "Division name"."\t";
	$header .= "District Code"."\t";
	$header .= "District Name"."\t";
	$header .= "Upazilla code"."\t";
	$header .= "Upazilla"."\t"; 
	/*}*/ 
	while($row = mysql_fetch_row($export)) { 
	$line = ''; 
	foreach($row as $value) { 
	if ((!isset($value)) OR ($value == "")) { 
	$value = "\t"; 
	} else { 
	$value = str_replace('"', '""', $value); 
	$value = '"' . $value . '"' . "\t"; 
	} 
	$line .= $value; 
	} 
	$data .= trim($line)."\n"; 
	} 
	$data = str_replace("\r", "", $data); 
	if ($data == "") { 
	$data = "\n(0) Records Found!\n"; 
	} 
	print "$header\n$data";
}
session_destroy(); 
?>