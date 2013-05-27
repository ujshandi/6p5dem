<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Sistem Informasi Management Sumber Daya Manusia Bid. Transportasi - BPSDM Perhubungan - Kementerian Perhubungan Republik Indonesia</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="<?=base_url()?>asset/board/asset/login/css/login_style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="favicon.ico" />
</head>
<body>
		
<?php
$username = array(
	'name'	=> 'username',
	'class' => 'sText',
	'id'	=> 'username',
	'value' => set_value('username'),
	'maxlength'	=> 80,
	'size'	=> 30,
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'class' => 'sText',
	'size'	=> 30,
);
?>

<div id="outer"><!-- begin outer -->
  <div id="container">
    <div id="inner">
      <div class="bgform">
		<?php echo form_open('auth/login');  ?>
      	<p>
        <?php echo form_label('Username', $username['id']); ?><br/>
		<?php echo "<input type='text' name='username' class='input'>"; ?>
        <br/>
        <br/>
        
		<?php echo form_label('Password', $password['id']); ?><br/>
		<?php echo "<input type='password' name='password' class='input'>"; ?>
        <br/>
        <br/>
        <input name="Submit" type="submit" value="Submit" class="btn">
        <input name="Submit2" type="reset" value="Reset" class="btn">
        </p>
        <a href="#" class="link">Forget Password</a>
      </div><!-- end bgform -->
      </form>
	  
      <div class="bgform1">
      <p><span class="text">&copy; 2013 BPSDM Perhubungan.<br/>Kementerian Perhubungan RI</span></p>	  
	  </div><!-- end bgform1 -->
    </div><!-- end inner -->
  </div><!-- end container -->
</div><!-- end outer -->

</body>
</html>
		
