
function get_emp_details()
{
	var str=document.getElementById('iouid').value;

	
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
   document.getElementById("editinfo").innerHTML = xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax_calls/hr/tag_hr_ajax.php?q="+escape(str)+"&key=1",true);
xmlhttp.send();
}

function tag_hr(str)
{	
 var result=confirm("Do you really want to add this HR?");
if(result)
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
		 alert('HR added successfully')
   document.getElementById("approve").innerHTML = xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax_calls/hr/tag_hr_ajax.php?emp_id="+escape(str)+"&key=2",true);
xmlhttp.send();
}
}

function untag_hr(str)
{	
 var result=confirm("Do you really want to remove this HR?");
if(result)
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
		 alert('HR removed successfully')
   document.getElementById("result").innerHTML = xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax_calls/hr/tag_hr_ajax.php?emp_id="+escape(str)+"&key=3",true);
xmlhttp.send();
}
}

// JavaScript Document