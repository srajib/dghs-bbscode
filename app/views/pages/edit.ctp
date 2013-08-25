<?php
	echo $form->create('Page',array('controller'=>'pages','action'=>'addsanctioned'));?>
	<div class="formBGCSS" style="margin-top: -1px;">
	      <div class="formWrapper">	
			  <div class="formContainer" id="F1">
			  <div class="clearfix">
			  	<?php echo $form->input('divcode');?>		
			   </div>
		    </div>
		    </div>
	   
	        <div class="formWrapper">	
			  <div class="formContainer" id="F1">
			  <div class="clearfix">
			  	<?php echo $form->input('division');?>		
			   </div>
		    </div>
		    </div>
			
			<div class="formWrapper">	
			<div class="formContainer" id="F2">	
			<div class="clearfix">		
				<?php echo $form->input('distcode');	?>		
			<span id="titleError" style="font-size:11px;display:none;color:red;">Title field could not be blank.</span>
			 </div>
		    </div>
		    </div>
	        
			<div class="formWrapper">	
			<div class="formContainer" id="F2">	
			<div class="clearfix">		
				<?php echo $form->input('district');	?>		
			<span id="titleError" style="font-size:11px;display:none;color:red;">Title field could not be blank.</span>
			 </div>
		    </div>
		    </div>
			
			<div class="formWrapper">	
			<div class="formContainer" id="F3">	
			<div class="clearfix">		
			<?php echo $form->input('upazillacode');?>	
			<span id="titleError" style="font-size:11px;display:none;color:red;">Title field could not be blank.</span>
			 </div>
		    </div>
		    </div>
			
			<div class="formWrapper">	
			<div class="formContainer" id="F3">	
			<div class="clearfix">		
			<?php echo $form->input('upazilla');?>	
			<span id="titleError" style="font-size:11px;display:none;color:red;">Title field could not be blank.</span>
			 </div>
		    </div>
		    </div>
			
			<div class="formWrapper">	
			<div class="formContainer" id="F4">	
			<div class="clearfix">		
				<?php echo $form->input('unioncode');?>	
			
			 </div>
		    </div>
		    </div>
			
			<div class="formWrapper">	
			<div class="formContainer" id="F4">	
			<div class="clearfix">		
				<?php echo $form->input('name');?>	
			
			 </div>
		    </div>
		    </div>
			
			<?php echo $form->end('Save');?>
	</div>