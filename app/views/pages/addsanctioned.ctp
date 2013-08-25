<?php
	echo $form->create('Page',array('controller'=>'pages','action'=>'addsanctioned'));?>
	<div class="formBGCSS" style="margin-top: -1px;">
	        <div class="formWrapper">	
			  <div class="formContainer" id="F1">
			  <div class="clearfix">
			  	<?php echo $form->input('organization_id', array('type' => 'select', 'options'=>array(), 'label'=>'Navigation'));	?>		
			   </div>
		    </div>
		    </div>
	        
			<div style="clear:both;height:10px;"></div>
			<div class="formWrapper">	
			<div class="formContainer" id="F2">	
			<div class="clearfix">		
			<?php
			echo $form->input('department_id');?>
			<span id="titleError" style="font-size:11px;display:none;color:red;">Title field could not be blank.</span>
			 </div>
		    </div>
		    </div>
			
			<div style="clear:both;"></div>
			<div class="formWrapper">	
			<div class="formContainer" id="F3">	
			<div class="clearfix">		
			<?php
			echo $form->input('designation_id');?>
			<span id="titleError" style="font-size:11px;display:none;color:red;">Title field could not be blank.</span>
			 </div>
		    </div>
		    </div>
			
			<div style="clear:both;"></div>
			<div class="formWrapper">	
			<div class="formContainer" id="F4">	
			<div class="clearfix">		
			<?php
			echo $form->hidden('sanctioned_post',array('value'=>1));?>
			
			 </div>
		    </div>
		    </div>
			
		   
			
			<input id="submitButton" tabindex="6" src="/img/admin/save.gif" border="0" type="image" height="40" width="85" >
			<?php echo $form->end();?>
	</div>