<tr>
<td><?php echo " ".$row78['Batch_Name']; ?></td>
<td><?php echo " ".$row94['Students_Name']; ?></td>
<td><?php echo " ".$row94['Students_Standard']; ?></td>
<td><?php echo " ".$row94['Phonenumber']; ?></td>
<td><?php echo " ".$row94['Students_School']; ?></td>
<td>
	<div class="btn-group">
		<a class="btn btn-sm" style="background-color:#218800;color:white;margin-top:1px;" href="teachers_students_more.php?B_id=<?php echo $row94['Batches_id']; ?>&S_id=<?php echo $row94['Students_id']; ?>"><i class="icon_check_alt2"><span class="glyphicon glyphicon-eye-open"></span></i></a>
		<a class="btn  btn-sm" style="background-color:#218800;color:white;margin-top:1px;" href="<?php echo "tel:" . $row94['Phonenumber']; ?>"><i class="icon_plus_alt2"><span  class="glyphicon glyphicon-earphone"></span></i></a>
		<a class="btn btn-sm" style="background-color:#218800;color:white;margin-top:1px;" href="teachers_students_pay.php?B_id=<?php echo $row94['Batches_id']; ?>&S_id=<?php echo $row94['Students_id']; ?>"><i title="Call" class="icon_close_alt2"><span class="glyphicon glyphicon-usd"></span></i></a>
	</div>
</td>
</tr>