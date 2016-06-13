function searchd()
{
	var data=document.getElementById('searchdata').value;
	
	if(data!=""){
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
xmlhttp.open("GET","ajax_calls/rmg/search_ajax.php?searchquery="+data,true);
xmlhttp.send();
}
else
{
	 document.getElementById("editinfo").innerHTML = "";
}
}
