<a href="<?php echo $this->base;?>/uniexport.php?uni=<?php echo $AllCode[0]['bbscode']['name'];?>">Export CSV</a>
	<div style="margin-top:15px;">
		<table class="tableHeader" id="drafts" cellpadding="0" cellspacing="0" width="80%">
			<tr>
				<th width="50" align="center">SL</th>  
				
				<th width="200" align="center"><?php echo 'Division';?></th>
				<th width="200" align="center" nowrap><?php echo 'Division Code';?></th>
				<th width="200" align="center"><?php echo 'District';?></th>
				<th width="200" align="center" nowrap><?php echo 'District code';?></th>
				<th width="200" align="center"><?php echo 'Upazilla';?></th>
				<th width="200" align="center" nowrap><?php echo 'Upazilla Code';?></th>
				<th width="200" align="center"><?php echo 'Union';?></th>
				<th width="200" align="center" nowrap><?php echo 'Union Code';?></th>
			
			</tr>
<?php
			$i = 0;
			foreach($AllCode as $AllCodes):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			
?>
<tr>
					<td width="20px;" align="center"><?php echo $i.'.'; ?></td>
					    <td width="20px;" align="center"><?php echo $AllCodes['bbscode']['division']; ?></td>
						<td width="20px;" align="center"><?php echo $AllCodes['bbscode']['divcode']; ?></td>
						<td width="20px;" align="center"><?php echo $AllCodes['bbscode']['district']; ?></td>
						<td width="20px;" align="center"><?php echo $AllCodes['bbscode']['districtcode']; ?></td>
						<td width="20px;" align="center"><?php if($AllCodes['bbscode']['upazilla']){ echo $AllCodes['bbscode']['upazilla']; } else echo '-';?></td>
						<td width="20px;" align="center"><?php if($AllCodes['bbscode']['upazillacode']){ echo $AllCodes['bbscode']['upazillacode']; } else { echo '-';} ?></td>
						<td width="20px;" align="center"><?php if($AllCodes['bbscode']['name']){ echo $AllCodes['bbscode']['name']; } else echo '-';?></td>
						<td width="20px;" align="center"><?php if($AllCodes['bbscode']['unioncode']){ echo $AllCodes['bbscode']['unioncode']; } else { echo '-';} ?></td>
					
							

				</tr>
			<?php 

			endforeach; ?>
			
		</table>

</div>
<!--
<div class="paging">
		<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $paginator->numbers();?>
		<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
	</div>-->