function onacepptingrequest(id,divid)
{
	alert("accepting request.."+id);
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
	xmlhttp.open("GET","accepting_request.php?id="+id,true);
	xmlhttp.send();
}
function onrejectingrequest(id,divid)
{
	alert("rejecting request.."+id);
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
	xmlhttp.open("GET","rejecting_request.php?id="+id,true);
	xmlhttp.send();
}
function delete_student(id,divid)
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
	xmlhttp.open("GET","./short_pages/delete_student.php?id="+id,true);
	xmlhttp.send();
}