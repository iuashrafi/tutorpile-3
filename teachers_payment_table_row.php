<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	if(isset($_SESSION['name']) || isset($_SESSION['emailid']) || isset($_SESSION['catogory']) || isset($_SESSION['teacher_id']) || isset($_SESSION['tooltip']) || isset($_SESSION['display']))
	{
		if($_SESSION['name']!="" || $_SESSION['emailid']!="" || $_SESSION['catogory']!="" || $_SESSION['teacher_id']!="" || $_SESSION['tooltip']!="" || $_SESSION['display']!="")
		{
			/***********************************************************************/
			?>
				<tr id="January">
				<td>January</td>
				<td <?php if($row943['January'] == "paid") echo "style='color:darkgreen;'"?>><b><?php echo " ".$row943['January']; ?></b></td>
				<td><?php if($row943['January_Paid_Date'] == "0000-00-00") ;else echo " ".$row943['January_Paid_Date']; ?></td>
				<td><?php echo " ".$row943['January_Paid_Amount']; ?></td>
				<td>
					<div>
						<button class="btn btn-<?php if($row943['January']=="paid") echo "success"; else echo "primary"; ?> btn-sm" onclick="payment_process(<?php echo "".$yers.",1"; ?>)" style="width:125px;"><b><?php if($row943['January']=="paid") echo "Payment received"; else echo "Not paid"; ?></b></button>
					</div>
				</td>
				</tr>
				<tr id="February">
				<td>February</td>
				<td <?php if($row943['February'] == "paid") echo "style='color:darkgreen;'"?>><b><?php echo " ".$row943['February']; ?></b></td>
				<td><?php if($row943['February_Paid_Date'] == "0000-00-00") ;else echo " ".$row943['February_Paid_Date']; ?></td>
				<td><?php echo " ".$row943['February_Paid_Amount']; ?></td>
				<td>
					<div>
						<button class="btn btn-<?php if($row943['February']=="paid") echo "success"; else echo "primary"; ?> btn-sm" style="width:125px;" onclick="payment_process(<?php echo "".$yers.",2"; ?>)"><b><?php if($row943['February']=="paid") echo "Payment received"; else echo "Not paid"; ?></b></button>
					</div>
				</td>
				</tr>
				<tr id="March">
				<td>March</td>
				<td <?php if($row943['March'] == "paid") echo "style='color:darkgreen;'"?>><b><?php echo " ".$row943['March']; ?></b></td>
				<td><?php if($row943['March_Paid_Date'] == "0000-00-00") ;else echo " ".$row943['March_Paid_Date']; ?></td>
				<td><?php echo " ".$row943['March_Paid_Amount']; ?></td>
				<td>
					<div>
						<button class="btn btn-<?php if($row943['March']=="paid") echo "success"; else echo "primary"; ?> btn-sm" style="width:125px;" onclick="payment_process(<?php echo "".$yers.",3"; ?>)"><b><?php if($row943['March']=="paid") echo "Payment received"; else echo "Not paid"; ?></b></button>
					</div>
				</td>
				</tr>
				<tr id="April">
				<td>April</td>
				<td <?php if($row943['April'] == "paid") echo "style='color:darkgreen;'"?>><b><?php echo " ".$row943['April']; ?></b></td>
				<td><?php if($row943['April_Paid_Date'] == "0000-00-00") ;else echo " ".$row943['April_Paid_Date']; ?></td>
				<td><?php echo " ".$row943['April_Paid_Amount']; ?></td>
				<td>
					<div>
						<button class="btn btn-<?php if($row943['April']=="paid") echo "success"; else echo "primary"; ?> btn-sm" style="width:125px;" onclick="payment_process(<?php echo "".$yers.",4"; ?>)"><b><?php if($row943['April']=="paid") echo "Payment received"; else echo "Not paid"; ?></b></button>
					</div>
				</td>
				</tr>
				<tr id="May">
				<td>May</td>
				<td <?php if($row943['May'] == "paid") echo "style='color:darkgreen;'"?>><b><?php echo " ".$row943['May']; ?></b></td>
				<td><?php if($row943['May_Paid_Date'] == "0000-00-00") ;else echo " ".$row943['May_Paid_Date']; ?></td>
				<td><?php echo " ".$row943['May_Paid_Amount']; ?></td>
				<td>
					<div>
						<button class="btn btn-<?php if($row943['May']=="paid") echo "success"; else echo "primary"; ?> btn-sm" style="width:125px;" onclick="payment_process(<?php echo "".$yers.",5"; ?>)"><b><?php if($row943['May']=="paid") echo "Payment received"; else echo "Not paid"; ?></b></button>
					</div>
				</td>
				</tr>
				<tr id="June">
				<td>June</td>
				<td <?php if($row943['June'] == "paid") echo "style='color:darkgreen;'"?>><b><?php echo " ".$row943['June']; ?></b></td>
				<td><?php if($row943['June_Paid_Date'] == "0000-00-00") ;else echo " ".$row943['June_Paid_Date']; ?></td>
				<td><?php echo " ".$row943['June_Paid_Amount']; ?></td>
				<td>
					<div>
						<button class="btn btn-<?php if($row943['June']=="paid") echo "success"; else echo "primary"; ?> btn-sm" style="width:125px;" onclick="payment_process(<?php echo "".$yers.",6"; ?>)"><b><?php if($row943['June']=="paid") echo "Payment received"; else echo "Not paid"; ?></b></button>
					</div>
				</td>
				</tr>
				<tr id="July">
				<td>July</td>
				<td <?php if($row943['July'] == "paid") echo "style='color:darkgreen;'"?>><b><?php echo " ".$row943['July']; ?></b></td>
				<td><?php if($row943['July_Paid_Date'] == "0000-00-00") ;else echo " ".$row943['July_Paid_Date']; ?></td>
				<td><?php echo " ".$row943['July_Paid_Amount']; ?></td>
				<td>
					<div>
						<button class="btn btn-<?php if($row943['July']=="paid") echo "success"; else echo "primary"; ?> btn-sm" style="width:125px;" onclick="payment_process(<?php echo "".$yers.",7"; ?>)"><b><?php if($row943['July']=="paid") echo "Payment received"; else echo "Not paid"; ?></b></button>
					</div>
				</td>
				</tr>
				<tr id="August">
				<td>August</td>
				<td <?php if($row943['August'] == "paid") echo "style='color:darkgreen;'"?>><b><?php echo " ".$row943['August']; ?></b></td>
				<td><?php if($row943['August_Paid_Date'] == "0000-00-00") ;else echo " ".$row943['August_Paid_Date']; ?></td>
				<td><?php echo " ".$row943['August_Paid_Amount']; ?></td>
				<td>
					<div>
						<button class="btn btn-<?php if($row943['August']=="paid") echo "success"; else echo "primary"; ?> btn-sm" style="width:125px;" onclick="payment_process(<?php echo "".$yers.",8"; ?>)"><b><?php if($row943['August']=="paid") echo "Payment received"; else echo "Not paid"; ?></b></button>
					</div>
				</td>
				</tr>
				<tr id="September">
				<td>September</td>
				<td <?php if($row943['September'] == "paid") echo "style='color:darkgreen;'"?>><b><?php echo " ".$row943['September']; ?></b></td>
				<td><?php if($row943['September_Paid_Date'] == "0000-00-00") ;else echo " ".$row943['September_Paid_Date']; ?></td>
				<td><?php echo " ".$row943['September_Paid_Amount']; ?></td>
				<td>
					<div>
						<button class="btn btn-<?php if($row943['September']=="paid") echo "success"; else echo "primary"; ?> btn-sm" style="width:125px;" onclick="payment_process(<?php echo "".$yers.",9"; ?>)"><b><?php if($row943['September']=="paid") echo "Payment received"; else echo "Not paid"; ?></b></button>
					</div>
				</td>
				</tr>
				<tr id="October">
				<td>October</td>
				<td <?php if($row943['October'] == "paid") echo "style='color:darkgreen;'"?>><b><?php echo " ".$row943['October']; ?></b></td>
				<td><?php if($row943['October_Paid_Date'] == "0000-00-00") ;else echo " ".$row943['October_Paid_Date']; ?></td>
				<td><?php echo " ".$row943['October_Paid_Amount']; ?></td>
				<td>
					<div>
						<button class="btn btn-<?php if($row943['October']=="paid") echo "success"; else echo "primary"; ?> btn-sm" style="width:125px;" onclick="payment_process(<?php echo "".$yers.",10"; ?>)"><b><?php if($row943['October']=="paid") echo "Payment received"; else echo "Not paid"; ?></b></button>
					</div>
				</td>
				</tr>
				<tr id="November">
				<td>November</td>
				<td <?php if($row943['November'] == "paid") echo "style='color:darkgreen;'"?>><b><?php echo " ".$row943['November']; ?></b></td>
				<td><?php if($row943['November_Paid_Date'] == "0000-00-00") ;else echo " ".$row943['November_Paid_Date']; ?></td>
				<td><?php echo " ".$row943['November_Paid_Amount']; ?></td>
				<td>
					<div>
						<button class="btn btn-<?php if($row943['November']=="paid") echo "success"; else echo "primary"; ?> btn-sm" style="width:125px;" onclick="payment_process(<?php echo "".$yers.",11"; ?>)"><b><?php if($row943['November']=="paid") echo "Payment received"; else echo "Not paid"; ?></b></button>
					</div>
				</td>
				</tr>
				<tr id="December">
				<td>December</td>
				<td <?php if($row943['December'] == "paid") echo "style='color:darkgreen;'"?>><b><?php echo " ".$row943['December']; ?></b></td>
				<td><?php if($row943['December_Paid_Date'] == "0000-00-00") ;else echo " ".$row943['December_Paid_Date']; ?></td>
				<td><?php echo " ".$row943['December_Paid_Amount']; ?></td>
				<td>
					<div>
						<button class="btn btn-<?php if($row943['December']=="paid") echo "success"; else echo "primary"; ?> btn-sm" style="width:125px;" onclick="payment_process(<?php echo "".$yers.",12"; ?>)"><b><?php if($row943['December']=="paid") echo "Payment received"; else echo "Not paid"; ?></b></button>
					</div>
				</td>
				</tr>
			<?php
			/***********************************************************************/
		}
		else
		{
			unset($_SESSION['name']);
			unset($_SESSION['emailid']);
			unset($_SESSION['catogory']);
			unset($_SESSION['teacher_id']);
			unset($_SESSION['tooltip']);
			unset($_SESSION['display']);
			session_destroy();
			error_log("\nTryed to open the teachers payment table row page with session set but the session was empty!",3, "logged errors/e.log");//remove it later
			echo "You need to log in to access this page.";
			mysql_close($con);
			header("location:login.php");
		}
	}
	else
	{
		unset($_SESSION['name']);
		unset($_SESSION['emailid']);
		unset($_SESSION['catogory']);
		unset($_SESSION['teacher_id']);
		unset($_SESSION['tooltip']);
		unset($_SESSION['display']);
		session_destroy();
		error_log("\nTryed to open the teachers payment table row page without session being set!",3, "logged errors/e.log");//remove it later
		echo "You need to log in to access this page.";
		mysql_close($con);
		header("location:login.php");
	}
?>