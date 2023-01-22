<tr>
<td><?php echo " <b>".$row94['Students_Name']."</b>"; ?></td>
<td><?php echo " ".$row78['Batch_Name']; ?></td>
<td  class="clearfix visible-sm clearfix visible-md clearfix visible-lg"><?php echo " ".$row94['Students_Standard']; ?></td>
<td><?php echo " ".$row94['S_Phonenumber']; ?></td>
<td><?php echo " ".$row94['Students_School']; ?></td>
<?php
$_SESSION['redirect']="teachers_students.php";
?>
<td>
	<div class="btn-group">
		<a title="view" class="btn btn-sm" style="background-color:#4D317A;color:white;margin-top:1px;margin-left:1px;" href="teachers_students_more.php?B_id=<?php echo $row94['Batches_id']; ?>&S_id=<?php echo $row94['Students_id']; ?>"><i class="icon_check_alt2"><span class="glyphicon glyphicon-eye-open"></span></i></a>
		<a title="call to <?php echo $row94['Students_Name']; ?>" class="btn  btn-sm" style="background-color:#4D317A;color:white;margin-top:1px;margin-left:1px;" href="<?php echo "tel:" . $row94['S_Phonenumber']; ?>"><i class="icon_plus_alt2"><span  class="glyphicon glyphicon-earphone"></span></i></a>
		<!--<a title="Check Payment" class="btn btn-sm" style="background-color:#4D317A;color:white;margin-top:1px;margin-left:1px;" href="teachers_students_pay.php?B_id=<?php echo $row94['Batches_id']; ?>&S_id=<?php echo $row94['Students_id']; ?>"><i title="Call" class="icon_close_alt2"><span class="glyphicon glyphicon-usd"></span></i></a>-->
		<a title="Delete" class="btn btn-sm " style="background-color:#4D317A;color:white;margin-top:1px;margin-left:1px;" href="teachers_students_delete.php?B_id=<?php echo $row94['Batches_id']; ?>&S_id=<?php echo $row94['Students_id']; ?>"><i class="icon_plus_alt2"><span  class="glyphicon glyphicon-trash"></span></i></a>
	</div>
</td>
</tr>