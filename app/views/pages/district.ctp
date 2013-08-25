<div style="text-align:left"><a href="<?php echo $this->base;?>/pages/addgeocode">Add New </a> | <a href="<?php echo $this->base;?>/export.php">Export CSV </a>|
<a href="http://app.dghs.gov.bd/orgregistry/">Organization Registry</a>
</div>


	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	
	?>
	<div style="margin-top:15px;">
				<table class="tableHeader" id="drafts" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<th width="50" align="center">SL</th>  
				
				<th width="50" align="center" nowrap><?php echo 'Div';?></th>
				<th width="50" align="center" nowrap><?php echo 'ZL';?></th>
					<th width="50" align="left" nowrap><?php echo 'Admin Unit';?></th>
		
				
					<th width="50" align="center" nowrap><?php echo 'Area in acres';?></th>
					
				   <th width="50" align="center" nowrap><?php echo 'Total Household';?></th>
				   
				    <th width="50" align="center" nowrap><?php echo 'Total Population';?></th>
					
					 <th width="50" align="center" nowrap><?php echo 'Population floating';?></th>
					 
					  <th width="200" align="center" nowrap><?php echo 'Population density';?></th>
			</tr>
<?php
			$i = 0;
			foreach($AllCode as $AllCodes):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			
?>
<tr>  <td width="20px;" align="center"><?php echo $i; ?></td>
						<td width="20px;" align="center"><?php echo $AllCodes['District']['div_code']; ?></td></td>
					
						<td width="20px;" align="center"><?php if($AllCodes['District']['district_code']){ echo $AllCodes['District']['district_code']; } else { echo '-';} ?></td>
				
						   <td width="20px;" align="left" nowrap><?php if($AllCodes['District']['admin_unit']){ echo $AllCodes['District']['admin_unit']; } else { echo '-';} ?></td>
						   <td width="20px;" align="center"><?php if($AllCodes['District']['area_in_acres']){ echo $AllCodes['District']['area_in_acres']; } else { echo '-';} ?></td>
						 
							  
							   <td width="20px;" align="center"><?php if($AllCodes['District']['total_household']){ echo $AllCodes['District']['total_household']; } else { echo '-';} ?></td>
							   
							   	  
							   <td width="20px;" align="center"><?php if($AllCodes['District']['population_total']){ echo $AllCodes['District']['population_total']; } else { echo '-';} ?></td>
							   
							      	  
							   <td width="20px;" align="center"><?php if($AllCodes['District']['floating']){ echo $AllCodes['District']['floating']; } else { echo '-';} ?></td>
							   
							    <td width="20px;" align="center"><?php if($AllCodes['District']['population_density']){ echo $AllCodes['District']['population_density']; } else { echo '-';} ?></td>
							   
					<!-- 	<td class="actions">
							
							<a href="<?php echo $this->base;?>/pages/edit/<?php echo $AllCodes['bbscode']['id'];?>"><img src="<?php echo $this->base;?>/img/admin/pencil.png"></a>
						  &nbsp;
							<?php echo $html->link($html->image('admin/trash.gif'), array('action'=>'delete', $AllCodes['bbscode']['id']), array('escape' => false, 'title'=>'delete', 'alt'=>'delete'), sprintf(__('Are you sure you want to delete # %s?', true),  $AllCodes['bbscode']['division'].' data')); ?>
							

				--></tr>
			<?php 

			endforeach; ?>
			
		</table>

</div>

<div class="paging">
		<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $paginator->numbers();?>
		<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
	</div>