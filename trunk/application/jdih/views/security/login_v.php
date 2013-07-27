<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><!-- saved from url=(0057)http://www.gallyapp.com/tf_themes/weadmin/login_blue.html -->
 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
 
<!-- Website Title --> 
<title>.:: Administrator Website ::.</title>

<!-- Meta data for SEO -->
<meta name="description" content="">
<meta name="keywords" content="">

<!-- Template stylesheet 
<link href="public/css/blue/screen.css" rel="stylesheet" type="text/css" media="all">
<link href="public/css/blue/datepicker.css" rel="stylesheet" type="text/css" media="all">
<link href="js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all">
<link href="js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all"> -->

<link rel="stylesheet" type="text/css" href="public/diklat/css/blue/screen.css" />
<link rel="stylesheet" type="text/css" href="public/diklat/css/blue/datepicker.css" />
<link rel="stylesheet" type="text/css" href="public/diklat/css/ie.css" />
<link rel="stylesheet" type="text/css" href="public/diklat/css/tipsy.css" />

<!--[if IE]>
	<link href="css/ie.css" rel="stylesheet" type="text/css" media="all">
	<meta http-equiv="X-UA-Compatible" content="IE=7" />
<![endif]-->

<!-- Jquery and plugins -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.img.preload.js"></script>
<script type="text/javascript" src="js/hint.js"></script>
<script type="text/javascript" src="js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" charset="utf-8"> 
$(function(){ 
    // find all the input elements with title attributes
    $('input[title!=""]').hint();
    $('#login_info').click(function(){
		$(this).fadeOut('fast');
	});
});
</script>


	<script>
	function runScript(e) {
		if (e.keyCode == 13) {
			document.getElementById('form_login').submit();
		}
	}
	</script>
</head>
<body class="login">

	<!-- Begin login window -->
	<div id="login_wrapper">
		<div id="login_info" class="alert_warning noshadow" style="width:350px; height:70px;margin:auto;padding:auto;">
			<p align="center">Isi user name dan password untuk mengakses halaman ini..</p>

			
			<!--<p>
				<span style="float:left;width:20px;height:20px;display:block;background:#000000;cursor:pointer;margin-right:5px" onclick="location.href='login_black.html'"></span>
				<span style="float:left;width:20px;height:20px;display:block;background:#BF2317;cursor:pointer;margin-right:5px" onclick="location.href='login_red.html'"></span>
				<span style="float:left;width:20px;height:20px;display:block;background:#67CF00;cursor:pointer;margin-right:5px" onclick="location.href='login_green.html'"></span>
			</p>-->
			<br class="clear"/><br/>
		</div>
		<br class="clear"/>
		<div id="login_top_window">
			<img src="public/diklat/images/blue/top_login_window.png" alt="top window"/>
		</div>
		
		<!-- Begin content -->
		<div id="login_body_window">
			<div class="inner">
				<form action="dashboard_blue.html" method="post" id="form_login"  name="form_login">
				<img src="public/diklat/images/login_logo.png" alt="logo"/>
					<p>
						<input type="text" id="username" name="username" style="width:285px" title="Username"/>
					</p>
					<p>
						<input type="password" id="password" name="password" style="width:285px"  title="******" onkeypress="runScript(event)"/>
					</p>
					<p style="margin-top:50px">
						<input type="submit" id="submit" name="submit" value="Login" class="Login" href="javascript:document.getElementById('formLogin').submit();" style="margin-right:5px"/>
						<input type="checkbox" id="remember" name="remember"/>Remember my password
					</p>
				</form>
			</div>
		</div>
		<!-- End content -->
		
		<div id="login_footer_window">
			<img src="public/diklat/images/blue/footer_login_window.png" alt="footer window"/>
		</div>
		<div id="login_reflect">
			<img src="public/diklat/images/blue/reflect.png" alt="window reflect"/>
		</div>
	</div>
	<!-- End login window -->

<!--ipt type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-203192-11']);
  _gaq.push(['_setDomainName', 'none']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</scri-->
	
</body>
</html>
