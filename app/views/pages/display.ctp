<div style="text-align:left"> <a href="<?php echo $this->base;?>/divexport.php">Export CSV </a>|
<a href="http://app.dghs.gov.bd/orgregistry/">Organization Registry</a>
</div>


	<?php

	
	?>
	<div style="margin-top:15px;" class="bbs_details">
				<table class="tableHeader" id="drafts" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<th width="50" align="center">SL</th>  
				
				<th width="50" align="center" nowrap><?php echo 'Division Code';?></th>
				<th width="50" align="center" nowrap><?php echo 'Division Name';?></th>
				
				<th width="50" align="center" nowrap><?php echo 'District Code';?></th>
				<th width="50" align="center" nowrap><?php echo 'District Name';?></th>
				<th width="50" align="center" nowrap><?php echo 'Upazilla Code';?></th>
				<th width="50" align="center" nowrap><?php echo 'Upazilla Name';?></th>
				
				<th width="50" align="center" nowrap><?php echo 'Union code';?></th>
				<th width="50" align="center" nowrap><?php echo 'Union name';?></th>   
				    <th width="50" align="right" nowrap><?php echo 'Total Population';?></th>
					
			</tr>
<?php
			$i = 0;
			foreach($AllCode as $AllCodes):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
				
			
?>   
<tr>  <td width="20px;" align="center"><?php echo $i.'.'; ?></td>
						<td width="20px;" align="center"><?php echo $AllCodes['upa']['div_code']; ?></td></td>
							<td width="20px;" align="center"><?php echo $AllCodes['divi']['div_name']; ?></td></td>
								<td width="20px;" align="center"><?php if($AllCodes['upa']['district_code']){ echo $AllCodes['upa']['district_code'];} else { echo '--'; }  ?>
								<td width="20px;" align="center"><?php 
								$dis_name     = str_replace('Zila', '',$AllCodes['dis']['dis_name']);
								if($dis_name){ echo $dis_name;} else { echo '--'; }  
								?>
								
								<td width="20px;" align="center"><?php if($AllCodes['upa']['upazilla_code']){ echo $AllCodes['upa']['upazilla_code']; } else { echo '--';} ?></td>
						
						<td width="20px;" align="center"><?php 
						$upa_name     = str_replace('Upazila', '',$AllCodes['upa']['upa_name']);
						if($upa_name ){ echo $upa_name; } else { echo '-';} ?></td>
						    
						<td width="20px;" align="center"><?php if($AllCodes['uni']['union_code']){ echo $AllCodes['uni']['union_code']; } else { echo '-';} ?></td>
						    
						<td width="20px;" align="center"><?php 
							$union_name     = str_replace('Union', '',$AllCodes['uni']['union_name']);   
						    if($union_name){ echo $union_name; } else { echo '-';} ?></td>
							
						<td width="20px;" align="right"><?php if($AllCodes['uni']['total_population']){ echo $AllCodes['uni']['total_population']; } else { echo '-';} ?></td>
						
							   
					<!-- 	<td class="actions">
							
							<a href="<?php echo $this->base;?>/pages/edit/<?php echo $AllCodes['upazillas']['id'];?>"><img src="<?php echo $this->base;?>/img/admin/pencil.png"></a>
						  &nbsp;
						
							

				--></tr>
			<?php 

			endforeach;
			unset($AllCode); ?>
			
		</table>

</div>
<!--
<div class="paging">
		<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $paginator->numbers();?>
		<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
	</div>-->