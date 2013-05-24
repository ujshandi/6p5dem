var xmlhttp;
var output;

function hitUrl(url, out)
{
	output=out;
	xmlhttp=GetXmlHttpObject();
	
	if (xmlhttp==null)
	{
		alert ("Browser does not support HTTP Request");
		return;
	}
	
	xmlhttp.onreadystatechange=stateChanged;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function stateChanged()
{
	if (xmlhttp.readyState==4)
	{
		document.getElementById(output).innerHTML = xmlhttp.responseText;
	}
}

function GetXmlHttpObject()
{
	if (window.XMLHttpRequest)
	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		return new XMLHttpRequest();
	}
	if (window.ActiveXObject)
	{
		// code for IE6, IE5
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
	return null;
}