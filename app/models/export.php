<?php 
//connect to the database
$connect = mysql_connect("localhost","root","");
mysql_select_db("bbs_code",$connect); //select the table
//
set_time_limit(4000);
$filename = 'allbbscode.csv';
//include 'connection.php';
$date = date("m/d/Y");
header("Content-type: appilication/x-msexcel");
header("Content-disposition: attachment; filename=".$filename);
header("Pragma: no-cache");
header("Expires: 2");
$csv_output1='Division'.",";
$csv_output1.='Division code'.",";
$csv_output1.='District'.",";
$csv_output1.='District code'.",";
$csv_output1.='Upazilla'.",";
$csv_output1.='Upazilla code'.",";
$csv_output1.='Union'.",";
$csv_output1.='Union Code'.",";
$csv_output1.=''."\n";
echo $csv_output1;
$view=mysql_query("SELECT * FROM bbscode");
while($result=mysql_fetch_array($view))
{
$a = $result['division'];
$b = $result['divcode'];
$c = $result['district'];
$d = $result['districtcode'];
$e = $result['upazilla'];
$f = $result['upazillacode'];
$g = $result['union'];
$h = $result['unioncode'];
$csv_output=$a.",";
$csv_output.=$b.",";
$csv_output.=$c.",";
$csv_output.=$d.",";
$csv_output.=$e.",";
$csv_output.=$f.",";
$csv_output.=$g.",";
$csv_output.=$h."";
$csv_output.=''."\n";
echo $csv_output;
}
exit;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="imagetoolbar" content="no" />
<title>  GeoCode Registry</title>
<link media="screen" rel="stylesheet" type="text/css" 
href="css/style.css"  />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Import a CSV File with PHP & MySQL</title>
</head>
<body>
	<div id="siteWrapper">
			<div id="siteHeader">
				<div id="headerFirst">
				</div>
				<div id="headerLogo">
					<img src="img/gov_logo.gif" />
				</div>
				<div id="siteTitle">
					<h2>Geocode Registry</h2>
					<p>directorate general of health services</p>
				</div><div class="lclear"></div>
			</div><!-- end of siteHeader -->
			<div id="siteMenuWrapper">
				<ul>
					<li><a href="/bbscodefinal/">Home</a></li>
					<li class="seperator"></li>
					<li><a href="/bbscodefinal/import.php"> Import  </a></li>
					<li class="seperator"></li>
					<li><a href="/bbscodefinal/pages/search"> Search Geocode  </a></li>
					<li class="seperator"></li>
				</ul><div class="lclear"></div>
			</div><!-- end of siteMenuWrapper --><!-- end of siteMenuWrapper -->
			<div id="logoutInfo">
			
			</div><!--end of logoutInfo -->
			<div class="lclear"></div>
			<div id="contentWrapper">
			<div id="mainContentWrapper">
<?php if (!empty($_GET[success])) { echo "<b>Your file has been imported.</b><br><br>"; } //generic success notice ?>

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  Upload your CSV file: <br />
  <input name="csv" type="file" id="csv" />
  <input type="submit" name="Submit" value="Submit" />
</form>
</div>
<div class="lclear"></div>
			</div><!-- end of contentWrapper -->
			<div id="footerWrapper">
				<p>&copy; All Rights Reserved by Management Information System, Health Department, Mohakhali, Dhaka</p>				
			<!-- end of contentWrapper -->
		</div>
		</div><!-- end of siteWrapper -->
		
		
		
</body>
</html> 