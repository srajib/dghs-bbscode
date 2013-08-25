<?php 
//connect to the database
$connect = mysql_connect("103.247.238.164","root","M1$DB@2012");
mysql_select_db("bbs_code",$connect); //select the table
//


set_time_limit(11112);


if ($_FILES[csv][size] > 0) {

  
  //get the csv file
   
 $file = $_FILES[csv][tmp_name];
   
 $handle = fopen($file,"r");

    //loop through the csv file and insert into database
   
 do {
        if ($data[0])
 {
         
   mysql_query("INSERT INTO bbscode(divcode,division, districtcode,district,upazillacode,upazilla,unioncode,name) VALUES
 (
 '".addslashes($data[0])."',
                    '".addslashes($data[1])."',
                    '".addslashes($data[2])."',
					'".addslashes($data[3])."',
					'".addslashes($data[4])."',
					'".addslashes($data[5])."',
					'".addslashes($data[6])."',
					'".addslashes($data[7])."'
                )
            ");
        }
    } while ($data = fgetcsv($handle,1000,",","'"));
   
 //

    //redirect
  
  header('Location: index.php');
 die;

}


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
					<li><a href="/bbscode/">Home</a></li>
					<li class="seperator"></li>
				
					<li><a href="/bbscode/pages/search"> Search Geocode  </a></li>
					<li class="seperator"></li>
	<li><a href="/bbscode/import.php"> Import  </a></li>
					<li class="seperator"></li>
<li><a href="/bbscode/export.php"> Export CSV </a></li>
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