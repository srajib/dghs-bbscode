<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="imagetoolbar" content="no" />
<title>  Geo Location Registry</title>
<link media="screen" rel="stylesheet" type="text/css" 
href="<?php echo $this->base;?>/css/style.css"  />
<?php echo $this->Html->script('jquery-1.4.2.min'); // Include jQuery library?>
<link rel="shortcut icon" href="<?php echo $this->base;?>/img/favicon.ico" type="image/x-icon">
<?php echo $scripts_for_layout;?>
</head>
<script>
function search(keyword)
{
	if(keyword)
		window.open('<?php echo $this->base;?>/pages/keywordReport/'+escape(keyword),'','scrollbars=yes,menubar=yes,height=925,width=800,resizable=no,toolbar=no,location=no,addressbar=no,status=no,dialog=yes');
	else {
	window.open('<?php echo $this->base; ?>/pages/keywordReport/','','scrollbars=yes,menubar=yes,height=925,width=800,resizable=no,toolbar=no,location=no,addressbar=no,status=no,dialog=yes');
	}
}

jQuery(document).ready(function(){
   validSubmit = false;
});
</script>
<body>
		<div id="siteWrapper">
			<div id="siteHeader">
				<div id="headerFirst">
				</div>
				<div id="headerLogo">
				  <a href="http://dghs.gov.bd"><img src="<?php echo $this->base;?>/img/gov_logo.gif" /></a>
				</div>
				<div id="siteTitle">
				<h3 style="font-size:27px;margin-left:3px;"> Geo Location Registry</h3>
					<p style="margin-left:-10px;margin-top:-10px;">directorate general of health services</p>
				</div>
				
				
				
		     <div class="lclear"></div>
			</div><!-- end of siteHeader -->
			<div id="siteMenuWrapper">
				
					<ul>
					<li><a href="<?php echo $this->base;?>/">Home</a></li>
						
					<li class="seperator"></li>
					<li><a href="<?php echo $this->base;?>/pages/geohierarchy">Geographic Hierarchies </a></li>
					<li class="seperator"></li>
					<li><a href="<?php echo $this->base;?>/pages/search"> Search Geo Location Code </a></li>
					<li class="seperator"></li>
					<!--
					<li><a href="<?php echo $this->base;?>/import.php"> Import CSV  </a></li>
						<li class="seperator"></li>-->
				</ul><div class="lclear"></div>
			</div><!-- end of siteMenuWrapper --><!-- end of siteMenuWrapper -->
			<div id="logoutInfo">
			<img src="<?php echo $this->base;?>/img/web.png"/>
				<p><a href="http://dghs.gov.bd" style="text-decoration:none;color:white;font-weight:bold; display: block;margin-left:-5px;">DGHS WEBSITE</a> </p>
			</div><!--end of logoutInfo -->
			<div class="lclear"></div>
			<div id="contentWrapper">
			    <!--
				<div id="leftMenuWrapper">
					<?php echo $this->element('left_menu');?>
				</div><!-- end of leftMenuWrapper 
				-->
				<div id="mainContentWrapper">
					<?php echo $content_for_layout; ?>				
				</div><!-- end of mainContentWrapper -->
				<div class="lclear"></div>
			</div><!-- end of contentWrapper -->
			<div id="footerWrapper">
				<p>&copy; All Rights Reserved by Management Information System, Health Department, Mohakhali, Dhaka</p>				
			</div><!-- end of contentWrapper -->
		</div><!-- end of siteWrapper -->
	<!--[if !IE]>end footer<![endif]-->

</body>
</html>
