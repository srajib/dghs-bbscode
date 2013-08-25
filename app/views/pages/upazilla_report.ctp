	<div style="margin-top:15px;">
		<table class="tableHeader" id="drafts" cellpadding="0" cellspacing="0" width="80%">


<tr>
					<a href="<?php echo $this->base;?>>Export CSV</a>
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
			    <th width="200" align="center" nowrap><?php echo 'Union';?></th>
				<th width="200" align="center" nowrap><?php echo 'Union Code';?></th>
			
			</tr>
<?php
echo"<pre>";
			$i = 0;
			foreach($AllCode as $AllCodes):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			
?>
<tr>
					<td width="20px;" align="center"><?php echo $i.'.'; ?></td>
					       <td width="20px;" align="center"><?php echo $AllCodes['divi']['div_name']; ?></td>
						<td width="20px;" align="center"><?php echo $AllCodes['upa']['div_code']; ?></td>
						<td width="20px;" align="center"><?php echo $AllCodes['dis']['dis_name']; ?></td>
						<td width="20px;" align="center"><?php echo $AllCodes['upa']['district_code']; ?></td>
						<td width="20px;" align="center"><?php if($AllCodes['upa']['upa_name']){ echo $AllCodes['upa']['upa_name']; } else echo '-';?></td>
						<td width="20px;" align="center"><?php if($AllCodes['upa']['upazilla_code']){ echo $AllCodes['upa']['upazilla_code']; } else { echo '-';} ?></td>
						<td width="20px;" align="center"><?php if($AllCodes['uni']['union_name']){ echo $AllCodes['uni']['union_name']; } else echo '-';?></td>
						<td width="20px;" align="center"><?php if($AllCodes['uni']['union_code']){ echo $AllCodes['uni']['union_code']; } else { echo '-';} ?></td>
						
				</tr>
			<?php 

			endforeach; ?>
			
		</table>
</table>
<div>
<table class="tableHeader" id="drafts" cellpadding="0" cellspacing="0" width="80%">
		
<tr>
<th>
		Summary Report :

</th>
</tr>
<tr>
<th>	<?php echo '
		Total Union: '.$unionCount;
		?>
</th>
</tr>							
</table>
</div>
</div>

<!--
<div class="paging">
		<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $paginator->numbers();?>
		<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
	</div>-->
							

		