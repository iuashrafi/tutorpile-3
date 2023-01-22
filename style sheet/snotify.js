function change_notification(data)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("inbox").innerHTML=xmlhttp.responseText;
		}
	  }
  if(data=="general")
	{
		xmlhttp.open("GET","student_general.php",true);
		xmlhttp.send();
	}
	else if(data=="join")
	{
		xmlhttp.open("GET","student_joining.php",true);
		xmlhttp.send();
	}
	else if(data=="payments")
	{
		xmlhttp.open("GET","student_payments.php",true);
		xmlhttp.send();
	}
	else if(data=="settings")
	{
		xmlhttp.open("GET","student_settings_notify.php",true);
		xmlhttp.send();
	}
}
function load_stud_notifications(data,divid,start,end)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById(divid).innerHTML=xmlhttp.responseText;
		}
	  }
	if(data=="general")
	{
	xmlhttp.open("GET","short_pages/student_general_page2.php?s="+start+"&e="+end,true);
	xmlhttp.send();
	}
	else if(data=="join")
	{
	xmlhttp.open("GET","short_pages/student_joining_page2.php?s="+start+"&e="+end,true);
	xmlhttp.send();
	}
	else if(data=="payments")
	{
	xmlhttp.open("GET","short_pages/student_payments_page2.php?s="+start+"&e="+end,true);
	xmlhttp.send();
	}
	else if(data=="settings")
	{
	xmlhttp.open("GET","short_pages/student_settings_notify_page2.php?s="+start+"&e="+end,true);
	xmlhttp.send();
	}
	
}