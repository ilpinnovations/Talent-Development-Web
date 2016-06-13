function reject_request(str)
   { 
  var comment=document.getElementById('comment').value;
 
  if(comment=="")
  {
	   alert('Please enter reason for rejection in the commments section.')
	  }
  else
  {
   var result=confirm("Do you really want to reject this request?");
if(result)
{
   var key = 1;
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
		 alert('Request rejected successfully');
  document.getElementById("approve").innerHTML = xmlhttp.responseText;

	}
  }
xmlhttp.open("GET","ajax_calls/learning_officer/learning_officer_request.php?id="+str+"&key="+key+"&comment="+escape(comment),true);
xmlhttp.send();
}
 }
   }

function approve_request(str)
   { 
   
   var key = 0;
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
		 alert('Request approved successfully')
  document.getElementById("approve").innerHTML = xmlhttp.responseText;

	}
  }
xmlhttp.open("GET","ajax_calls/learning_officer/learning_officer_request.php?id="+str+"&key="+key,true);
xmlhttp.send();
}



function delete_request(str)
   { 
   var result=confirm("Do you really want to delete this request?");
if(result)
{
  var key = 2;
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
		 alert('Request deleted successfully')
  document.getElementById("approve").innerHTML = xmlhttp.responseText;

	}
  }
xmlhttp.open("GET","ajax_calls/learning_officer/learning_officer_request.php?id="+str+"&key="+key,true);
xmlhttp.send();
}
 }
