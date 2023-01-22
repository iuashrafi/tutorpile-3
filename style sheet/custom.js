function search_tutors()
	{
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
			document.getElementById("Display_teachers_list").innerHTML=xmlhttp.responseText;
			}
		  }
		
		var categ=document.getElementById('category').value;
		var city = document.getElementById('city').value;
		var pin = document.getElementById('pin').value;  
		var pass = "category=" + categ ;
		pass += "&city=" + city + "&pin=" + pin;
		xmlhttp.open("GET", "searching.php?"+pass, true);
		xmlhttp.send();
}
function stats_operate(tid,opt,div_id)
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
				if(div_id=="div1")
				{
					document.getElementById("div1").innerHTML=xmlhttp.responseText;
				}
			}
		  }
	  if(opt=='send_request')
	  {
		xmlhttp.open("GET","send_request.php?id="+tid,true);
		xmlhttp.send();
	  }
	  else if(opt=='cancel_request')
	  {
		xmlhttp.open("GET","cancel_request.php?id="+tid,true);
		xmlhttp.send();
	  }
}