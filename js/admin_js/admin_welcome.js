function get_session_details()
{
	var session_id=document.getElementById('sessionid').value;
if (window.XMLHttpRequest)
{// co'1de for IE7+, Firefox, Chrome, Opera, Safari
  	xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
		
   document.getElementById("editinfo").innerHTML = xmlhttp.responseText;

    }
  }
xmlhttp.open("GET","ajax_calls/admin/session_stats_aj.php?a="+session_id,true);
xmlhttp.send();
}

function next_list(str)
{
	
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   document.getElementById("upcoming").innerHTML = xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax_calls/admin/upcoming_aj.php?q="+str,true);
xmlhttp.send();
}

function previous_list(str)
{
	
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   document.getElementById("upcoming").innerHTML = xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax_calls/admin/previous_aj.php?q="+str,true);
xmlhttp.send();
}

function get_registerlist(str)
{
	
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   document.getElementById("reg").innerHTML = xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax_calls/admin/get_registrations.php?q="+str,true);
xmlhttp.send();
}