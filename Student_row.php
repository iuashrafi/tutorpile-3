<tr>
<td><?php echo " ".$row94['Students_Name']; ?></td>
<td class="clearfix visible-sm clearfix visible-md clearfix visible-lg"><?php echo " ".$row94['Students_Standard']; ?></td>
<td><?php echo " ".$row94['S_Phonenumber']; ?></td>
<td><?php echo " ".$row94['Students_School']; ?></td>
<?php
$_SESSION['redirect']="teachers_Batches_more_info.php?B_id=".$row94['Batches_id'];
?>
<td>
	<div class="btn-group">
		<a class="btn btn-primary btn-sm" style="margin-bottom:1px;" href="teachers_students_more.php?B_id=<?php echo $row94['Batches_id']; ?>&S_id=<?php echo $row94['Students_id']; ?>"><i class="icon_check_alt2"><span class="glyphicon glyphicon-eye-open"></span></i></a>
		<a class="btn btn-primary btn-sm" style="margin-bottom:1px;" href="<?php echo "tel:" . $row94['S_Phonenumber']; ?>"><i title="Call" class="icon_close_alt2"><span class="glyphicon glyphicon-earphone"></span></i></a>
		<a class="btn btn-primary btn-sm" href="teachers_students_delete.php?B_id=<?php echo $row94['Batches_id']; ?>&S_id=<?php echo $row94['Students_id']; ?>"><i class="icon_plus_alt2"><span  class="glyphicon glyphicon-trash"></span></i></a>
	</div>
</td>
</tr>