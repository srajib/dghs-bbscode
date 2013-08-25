 <?php 
//error_reporting(E_ALL);
//ini_set('display_errors','On');
$server = '103.247.238.164'; // MYSQL database host address 
$db = 'bbs_code'; // MYSQL database name 
$login = 'root'; // Mysql Datbase user 
$password = 'M1$DB@2012'; // Mysql Datbase password 
 
mysql_connect($server, $login, $password); 
mysql_select_db($db); 

session_start();
$_SESSION['file'] = time();
$filename = $_SESSION['file']."disReport.csv";

$dis= $_GET['dis'];

$fp = fopen($filename, "w"); 

if($dis){
$res = mysql_query("SELECT * FROM bbscode where district='$dis'"); 
}else
{
$res = mysql_query("SELECT * FROM bbscode");
}

// fetch a row and write the column names out to the file 
$row = mysql_fetch_assoc($res); 
$line = ""; 
$comma = ""; 
foreach($row as $name => $value) { 
   $line .= $comma . '"' . str_replace('"', '""', $name) . '"'; 
   $comma = ","; 
} 
$line .= "\n"; 
fputs($fp, $line); 

// remove the result pointer back to the start 
mysql_data_seek($res, 0); 

// and loop through the actual data 
while($row = mysql_fetch_assoc($res)) { 
   
   $line = ""; 
   $comma = ""; 
   foreach($row as $value) { 
       $line .= $comma . '"' . str_replace('"', '""', $value) . '"'; 
       $comma = ","; 
   } 
   $line .= "\n"; 
   fputs($fp, $line); 
} 
fclose($fp); 
header("Content-type: text/csv"); 
header("Content-description: File Transfer"); 
header('Content-Disposition: attachment; filename='.$filename);
header("Pragma: public"); 
header("Cache-control: max-age=0"); 
header("Expires: 0");
echo file_get_contents($filename);
session_destroy();
?>