<tr>
<td><?php echo " ".$row84['Batch_Name']; ?></td>
<td><?php echo " ".$row84['Batch_start_year']."-".$row84['Batch_end_year']; ?></td>
<td class="hidden-xs"><?php echo " ".$row84['Batch_Address']; ?></td>
<td><?php echo " ".$row84['No_Of_Student']; ?></td>
<td><?php echo " ".$row84['Standard']; ?></td>
<td>
	<div class="btn-group">																<!--send the random number in the B_id and send real id using post method-->
		<a class="btn btn-primary btn-sm" style="margin-top:1px;margin-right:1px;" href="teachers_Batches_more_info.php?B_id=<?php echo $row84['Batches_id']; ?>"><i class="icon_check_alt2"><span class="glyphicon glyphicon-eye-open"></span></i></a>
		<a class="btn btn-primary btn-sm" style="margin-top:1px;margin-right:1px;" href="teachers_Batches_settings.php?B_id=<?php echo $row84['Batches_id']; ?>"><i class="icon_close_alt2"><span class="glyphicon glyphicon-cog"></span></i></a>
		<a class="btn btn-primary btn-sm" style="margin-top:1px;margin-right:1px;" href="teachers_Batches_more_info.php?B_id=<?php echo $row84['Batches_id']; ?>"><i class="icon_plus_alt2"><span class="glyphicon glyphicon-bell"></span></i></a>
	</div>
</td>
</tr>