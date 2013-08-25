<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="imagetoolbar" content="no" />
<title>  </title>
<link media="screen" rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/admincss/admin.css"  />

<link rel="shortcut icon" href="<?php echo $this->base;?>/img/favicon.ico" type="image/x-icon">
<link media="screen" rel="stylesheet" type="text/css" href="<?php echo $this->base;?>/css/admincss/admin-blue.css"  />
<?php echo $scripts_for_layout;?>
<script type="text/javascript" src="<?php echo $this->base;?>/js/behaviour.js"></script>

<?php echo $this->Html->css(array('jquery.datepick','jquery.alerts.css'));
	  echo $this->Html->script(array(
			'jquery-1.5.1.min.js',
			'jquery.datepick.js',
			'jquery.datepick-ja.js','jquery.ui.core.min.js','jquery.ui.timepicker.js','jquery.ui.timepicker-ja.js','jquery.js','jquery.alerts.js'));
?>
<style>
.sub_bg a{color:#000;}
@media screen and (-webkit-min-device-pixel-ratio:0)
{
#main_menu ul {
margin-top:-8px;
}
}
</style>

</head>
<body>
	<?php 
	
	echo "welcome";
	
	$logout = __("logout",true);?>
	<?php $preview = __("preview",true);?>
	<!--[if !IE]>start wrapper<![endif]-->
	<div id="wrapper">
		
		<!--[if !IE]>start header main menu<![endif]-->
		
		<div id="header_main_menu">
		
		<span id="header_main_menu_bg"></span>
		<!--[if !IE]>start header<![endif]-->
		<div id="header">
			<div class="inner">
				<h1 id="logo">
                    <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$this->base
;?>" target="_blank">websitename <span>Administration Panel</span></a></h1>
				
				<div id="user_details">
					<ul id="user_details_menu">
						<li class="welcome"><?php echo __('welcome');?> <strong><?php echo __('administrator');?> (<a class="new_messages" href="#"><?php echo __('1_new_message');?></a>)</strong></li>
						
						<li>
							<ul id="user_access">
								<li class="first"><a href="#"><?php echo __('my_account');?></a></li>
								<li class="last"><?php echo $this->Html->link($logout,array('controller'=>'authentication','action'=>'logout'));?></li>
			<div>					
       <?php $english = __('english',true);
			  $japanese = __('japanese',true);
		?>
	   <?php 
	        __('language'); ?> :
	<?php  echo $this->Html->image("us.png", array("alt" => "English",'url' => '/'.'lang'.'/'.'en','width'=>24,'height'=>24,'border'=>0)); ?>&nbsp;
	<?php echo $this->Html->image("japan.png", array("alt" => "Japan",'url' => '/'.'lang'.'/'.'ja','width'=>26,'height'=>25,'border'=>0));?>
	   </div>
	
       
							</ul>   <li><?php echo $this->Html->link($preview,array('controller'=>'pages','action'=>'home'));?></li>
						</li>
						
						
					</ul>
					
					<div id="server_details">
						<dl>
							<dt><?php echo __('server_time');?>:</dt>
							<dd>9:22 AM | 03/04/2009</dd>
						</dl>
						<dl>
							<dt><?php echo __('last_login_ip');?> :</dt>
							<dd>192.168.0.25</dd>
						</dl>
					</div>
					
				</div>
				
			</div>
		</div>
			<?php     $content = $this->base.'/'.'kanrisha'.'/'.'contenttypelist';
			          $topic = $this->base.'/'.'kanrisha'.'/'.'/new_topics_list';
			          $dashboard = $this->base.'/'.'kanrisha'.'/'.'index';
					  $regularmeeting = $this->base.'/'.'kanrisha'.'/'.'meeting_title_list';
				      $usermanagement = $this->base.'/'.'authentication'.'/'.'user_management'; 
					  $homepage = $this->base.'/'.'kanrisha'.'/'.'homepage';
					  $makeup = $this->base.'/'.'kanrisha'.'/'.'makeupapplication_list';
					  $payment_list = $this->base.'/'.'kanrisha'.'/'.'payment_list';
					  $attendence_list = $this->base.'/'.'kanrisha'.'/'.'attendence';
					  $chat_log = $this->base.'/'.'kanrisha'.'/'.'chatlog';
				?>
		<div id="main_menu">
	    <div class="inner">
			<ul>
				<li>
					<a href="<?php echo $dashboard;?>" <?php if($this->params['controller']=='kanrisha' AND ($this->params['action']=='index')){echo 'class="selected_lk"';} else echo '';?>><span class="l"><span></span></span><span class="m"><em><?php echo __('dashboard');?></em><span></span></span><span class="r"><span></span></span></a></li>
					<ul>
						<li><a href="#"><span class="l"><span></span></span><span class="m"><em></em><span></span></span><span class="r"><span></span></span></li>
						<li><a href="#"><span class="l"><span></span></span><span class="m"><em></em><span></span></span><span class="r"><span></span></span></li>
						<li><a href="#"><span class="l"><span></span></span><span class="m"><em></em><span></span></span><span class="r"><span></span></span></li>
						<li><a href="#"><span class="l"><span></span></span><span class="m"><em></em><span></span></span><span class="r"><span></span></span></li>
						<li><a href="#"><span class="l"><span></span></span><span class="m"><em></em><span></span></span><span class="r"><span></span></span></li>
						<li><a href="#"><span class="l"><span></span></span><span class="m"><em></em><span></span></span><span class="r"><span></span></span></li>
						<li><a href="#"><span class="l"><span></span></span><span class="m"><em></em><span></span></span><span class="r"><span></span></span></li>
						<li><a href="#"><span class="l"><span></span></span><span class="m"><em></em><span></span></span><span class="r"><span></span></span></li>
					</ul>	
				</li>
			
				<li><a href="<?php echo $content;?>" <?php if($this->params['controller']=='kanrisha' AND ($this->params['action']=='contenttypelist' ||$this->params['action']=='contentlist' || $this->params['action']=='homepage' || $this->params['action']=='content_edit' || $this->params['action']=='addcontent'  || $this->params['action']=='addhomepage')){echo 'class="selected_lk"';} ?> ><span class="l"><span></span></span><span class="m"><em><?php echo __('content');?></em><span></span></span><span class="r"><span></span></span></a></li>
				<li><a href="<?php echo $payment_list;?>"  <?php if($this->params['controller']=='kanrisha' AND ($this->params['action']=='payment_list')){echo 'class="selected_lk"';} ?>><span class="l"><span></span></span><span class="m"><em><?php echo __('payment');?></em><span></span></span><span class="r"><span></span></span></a></li>
					<li><a href="<?php echo $makeup?>" <?php if($this->params['controller']=='kanrisha' AND($this->params['action']=='makeupapplication_list')){echo 'class="selected_lk"';} ?> "><span class="l"><span></span></span><span class="m"><em><?php echo __('makeup');?></em><span></span></span><span class="r"><span></span></span></a></li>
				<li><a href="<?php echo $usermanagement;?>"  <?php if($this->params['controller']=='authentication' AND 
								 ( $this->params['action']=='user_management' 
								 || $this->params['action']=='user_list' || $this->params['action']=='add_user' || $this->params['action']=='user_edit' || $this->params['action']=='register'||$this->params['action']=='create_group')){echo 'class="selected_lk"';} ?>><span class="l"><span></span></span><span class="m"><em><?php echo __('user_management');?></em><span></span></span><span class="r"><span></span></span></a></li>
				<li><a href="<?php echo $regularmeeting;?>" <?php if($this->params['controller']=='kanrisha' AND ($this->params['action']=='meeting_title_list' || $this->params['action']=='regularmeetingslist'||$this->params['action']=='add_regularmeeting' || $this->params['action']=='edit_regularmeeting' )){echo 'class="selected_lk"';} else echo ""; ?> ><span class="l"><span></span></span><span class="m"><em><?php echo __('regular_meeting');?></em><span></span></span><span class="r"><span></span></span></a></li>
				<li><a href="<?php echo $attendence_list;?>" <?php if($this->params['controller']=='kanrisha' AND ($this->params['action']=='attendence' || $this->params['action']=='attendence_list' )){echo 'class="selected_lk"';} else echo ""; ?> ><span class="l"><span></span></span><span class="m"><em><?php echo __('attendence');?></em><span></span></span><span class="r"><span></span></span></a></li>
					
					</ul>
			</div>
	        <span class="sub_bg"></span>
		</div>
		</div>
		
		<div id="content">
			<div class="inner">
				<div class="section">
					
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2><?php echo __('quick_shortcuts');?></h2>
								<ul class="section_menu right">
										</ul>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>
						
						<div class="section_content_inner">
							<!--[if !IE]>start dashboard menu<![endif]-->
								<div class="dashboard_menu_wrapper">
								<ul class="dashboard_menu">
									<li><a href="<?php echo $usermanagement;?>" class="d1"><span><?php echo __('user_management');?></span></a></li>
								
									<li><a href="<?php echo $homepage;?>" class="d7"><span><?php echo __('front_page_manager');?></span></a></li>
								    <li><a href="<?php echo $content;?>" class="d9"><span><?php echo __('content');?></span></a></li>
									<li><a href="<?php echo $regularmeeting;?>" class="d5"><span><?php echo __('regular_meeting');?></span></a></li>
									<li><a href="<?php echo $makeup;?>" class="d13"><span><?php echo __('makeup');?></span></a></li>
								    <li><a href="<?php echo $attendence_list;?>" class="d8"><span><?php echo __('attendence');?></span></a></li>
									<li><a href="<?php echo $payment_list;?>" class="d14"><span><?php echo __('payments');?></span></a></li>
									<li><a href="<?php echo $chat_log;?>" class="d2"><span><?php echo __('??????');?></span></a></li>
									
									</ul>
								</div>
								<!--[if !IE]>end dashboard menu<![endif]-->	
						</div>
						
						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->
				<!--[if !IE]>start section<![endif]-->
				<div class="section">
					
					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2><?php 
								if($this->params['controller']=='kanrisha' AND 
								 ($this->params['action']=='regularmeetingslist' || $this->params['action']=='add_regularmeeting' || $this->params['action']=='meeting_title_list' 
								 || $this->params['action']=='edit_regularmeeting' )) 
								 { 
									echo __('regular_meeting');
								 }  
							   
							   	elseif($this->params['controller']=='authentication' AND 
								 ($this->params['action']=='user_management' 
								 || $this->params['action']=='user_list' || $this->params['action']=='add_user' || $this->params['action']=='user_edit' || $this->params['action']=='register'||$this->params['action']=='create_group')) 
								 { 
									echo __('user_management');
								 } 
								 
								 elseif($this->params['controller']=='kanrisha' AND ($this->params['action']=='contenttypelist' ||$this->params['action']=='contentlist' || $this->params['action']=='homepage' || $this->params['action']=='content_edit' || $this->params['action']=='addcontent'  || $this->params['action']=='addhomepage'))
								 {
								   echo __('content');
								 } 
								  elseif($this->params['controller']=='kanrisha' AND ($this->params['action']=='makeupapplication_list'))
								 {
								   echo __('makeup_application');
								 } 
								  elseif($this->params['controller']=='kanrisha' AND ($this->params['action']=='payment_list'))
								 {
								   echo __('payment');
								 }
								  elseif($this->params['controller']=='kanrisha' AND ($this->params['action']=='attendence' || $this->params['action']=='attendence_list' ))
								 {
								   echo __('attendance_management');
								 }  
								else  
								{ 
									echo __('dashboard'); 
								}
								?>
								</h2>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>
							
						<div class="section_content_inner">
			
							<div style="color:#000;">
                                 <span style="color:#000">
								 <?php echo $this->Html->getCrumbs();  ?>
								 </span>
		                     </div>
							  <div style="color:#223366;padding:5px;">	<?php  echo $this->Session->flash(); echo $session->flash('auth'); ?></div>
						<?php echo $content_for_layout; ?>
						
						</div>
						
						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->
			
			</div>
		</div>
		<!--[if !IE]>end content<![endif]-->
		
		
	</div>
	<!--[if !IE]>end wrapper<![endif]-->
	
	<!--[if !IE]>start footer<![endif]-->
	
	<div id="footer">
		<div id="footer_inner">
			<div class="inner">
				
				<div id="footer_info">
					<?php echo __('powered_by_ITA_v1_2');?> | �<?php echo __('2012_ita');?>. <?php echo __('all_rights_reserved');?>
				</div>
				
				
				<ul id="footer_menu">
					<li class="first"><a href="#"><?php echo __('help');?></a></li>
					<li><a href="#"><?php echo __('contact_support');?></a></li>
				</ul>	
				
				
				
			</div>
		</div>
	</div>
	<!--[if !IE]>end footer<![endif]-->

</body>
</html>
