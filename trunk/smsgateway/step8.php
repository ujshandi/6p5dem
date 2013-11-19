<div class="wrap_right bgcontent">
<h1 class="heading">SMS Masuk</h1>
<hr/>
<fieldset>
<html>
<head>
  <script type="text/javascript">
  
  function ajax() 
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
    document.getElementById("sms").innerHTML = xmlhttp.responseText;
    }
  }
  
  xmlhttp.open("GET","run2.php",true);
  xmlhttp.send();
  setTimeout("ajax()", 1000);
  }  
  </script>
</head>

<body onload="ajax()">

<div id="sms">
</div>

</body>
</html>
</fieldset>
</div>