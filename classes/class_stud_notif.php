<?php 
class stud_notification
{
	public function get_gbadge($id)
	{
		$select=mysql_query("SELECT S_uniqueid FROM students_notification_info WHERE S_uniqueid='$id' AND Notify_catogory='General' AND Viewed='false' ");
		$badge=0;
		while($row=mysql_fetch_array($select))
		$badge++;
		return $badge++;
	}
	public function get_jbadge($id)
	{
		$select=mysql_query("SELECT S_uniqueid FROM students_notification_info WHERE S_uniqueid='$id' AND Notify_catogory='Join' AND Viewed='false' ");
		$badge=0;
		while($row=mysql_fetch_array($select))
		$badge++;
		return $badge++;
	}
	public function get_pbadge($id)
	{
		$select=mysql_query("SELECT S_uniqueid FROM students_notification_info WHERE S_uniqueid='$id' AND Notify_catogory='Payments' AND Viewed='false' ");
		$badge=0;
		while($row=mysql_fetch_array($select))
		$badge++;
		return $badge++;
	}
	public function get_sbadge($id)
	{
		$select=mysql_query("SELECT S_uniqueid FROM students_notification_info WHERE S_uniqueid='$id' AND Notify_catogory='Settings' AND Viewed='false' ");
		$badge=0;
		while($row=mysql_fetch_array($select))
		$badge++;
		return $badge++;
	}
	public function show_gen_notif($id,$start,$end)
	{ 
		$end=$end+1;
		@session_start();
		$select=mysql_query("SELECT * FROM students_notification_info WHERE S_uniqueid='$id' AND Notify_catogory='General' Order By Unique_Notify_no DESC LIMIT $start,$end ");
		$notify_ct=0;
		?>
		 <table class="table " style="border:1px solid #DDDDDD;background-color:;"><tbody>
		<?php
		while($row=mysql_fetch_array($select))
		{
			if($notify_ct==5)
			{
				break;
			}
			echo "<tr class='unread checked'>
			<td class='hidden-xs'>
			".$row['T_name']."
			</td>
			<td>";
			echo $row['Notify_subject']."<br/>".$row['Notify_message'];
			echo "</td>
			<td>
			".$row['Notify_date']."<br/>".$row['Notify_time']."
			</td>
			</tr>";
			$notify_ct++;
		}
		if($notify_ct==0)
				echo "<p style='padding:10px;'>No notifications to display</p>";
		if($notify_ct==5)
		{
		$did=uniqid();
			?>	
			<div id="<?php echo $did;?>">
			<a onclick="load_stud_notifications('general','<?php echo $did;?>','<?php echo ($end-1);?>','<?php echo ($end+4);?>')">Load Previous</a>
			</div>
			<?php
		}
			?>
			</tbody>
			</table>
		<?php 
	}
	public function show_join_notif($id,$start,$end)
	{
		$end=$end+1;
		$select=mysql_query("SELECT * FROM students_notification_info WHERE S_uniqueid='$id' AND Notify_catogory='Joining' Order By Unique_Notify_no DESC LIMIT $start,$end");
		$notify_ct=0;
		?>
		 <table class="table " style="border:1px solid #DDDDDD;background-color:;"><tbody>
		<?php
		while($row=mysql_fetch_array($select))
		{
				if($notify_ct==5)
				break;
			echo "<tr class='unread checked'>
			<td class='hidden-xs'>
			".$row['T_name']."
			</td>
			<td>";
			echo $row['Notify_subject']."<br/>".$row['Notify_message'];
			echo "</td>
			<td>
			Google  12 march // date 
			</td>
			</tr>";
			$notify_ct++;
		}
		if($notify_ct==0)
			echo "<p style='padding:10px;'>No notifications to display</p>";
		if($notify_ct==5)
		{
		$did=uniqid();
			?>	
			<div id="<?php echo $did;?>">
			<a onclick="load_stud_notifications('join','<?php echo $did;?>','<?php echo ($end-1);?>','<?php echo ($end+4);?>')">Load Previous</a>
			</div>
			<?php
		}
		?>
			</tbody>
			</table>
		<?php
	}
	public function show_settings_notif($id,$start,$end)
	{
		$end=$end+1;
		$select=mysql_query("SELECT * FROM students_notification_info WHERE S_uniqueid='$id' AND Notify_catogory='Settings' Order By Unique_Notify_no DESC LIMIT $start,$end");
		$notify_ct=0;
		?>
		 <table class="table " style="border:1px solid #DDDDDD;background-color:;"><tbody>
		<?php
		while($row=mysql_fetch_array($select))
		{
			if($notify_ct==5)
				break;
			echo "<tr class='unread checked'>
			<td class='hidden-xs'>
			".$row['T_name']."<br/>"."
			</td>
			<td>";
			echo $row['Notify_subject']."<br/>".$row['Notify_message'];
			echo "</td>
			<td>
			".$row['Notify_date']." ".$row['Notify_time']." 
			</td>
			</tr>";
			$notify_ct++;
		}
		if($notify_ct==0)
			echo "<p style='padding:10px;' >No notifications to display</p>";
		if($notify_ct==5)
		{
		$did=uniqid();
			?>	
			<div id="<?php echo $did;?>">
			<a onclick="load_stud_notifications('settings','<?php echo $did;?>','<?php echo ($end-1);?>','<?php echo ($end+4);?>')">Load Previous</a>
			</div>
			<?php
		}
		?>
			</tbody>
			</table>
		<?php
		
	}
	public function show_payments_notif($id,$start,$end)
	{
		$end=$end+1;
		$select=mysql_query("SELECT * FROM students_notification_info WHERE S_uniqueid='$id' AND Notify_catogory='Payments' Order By Unique_Notify_no DESC LIMIT $start,$end");
		$notify_ct=0;
		?>
		 <table class="table " style="border:1px solid #DDDDDD;background-color:;"><tbody>
		<?php
		while($row=mysql_fetch_array($select))
		{
			if($notify_ct==5)
				break;
			echo "<tr class='unread checked'>
			<td class='hidden-xs'>
			".$row['T_name']."
			</td>
			<td>";
			echo $row['Notify_subject']."<br/>".$row['Notify_message']; 
			echo "</td>
			<td>
			Google  12 march // date 
			</td>
			</tr>";
			$notify_ct++;
		}
		if($notify_ct==0)
			echo "<p style='padding:10px;'>No notifications to display</p>";
		if($notify_ct==5)
		{
		$did=uniqid();
			?>	
			<div id="<?php echo $did;?>">
			<a onclick="load_stud_notifications('payments','<?php echo $did;?>','<?php echo ($end-1);?>','<?php echo ($end+4);?>')">Load Previous</a>
			</div>
			<?php
		}
		?>
			</tbody>
			</table>
		<?php
	}
	
}

?>