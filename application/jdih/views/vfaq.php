<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
		#faqs 		{ position:relative; }
		#faqs h2	{ cursor:pointer; }
		#faqs h2.active	{ color:#d74646; }
		
	</style>

<script type="text/javascript">
$(document).ready(function() {
  $('#faqs h2').each(function() {
    var tis = $(this), state = false, answer = tis.next('div').slideUp();
    tis.click(function() {
      state = !state;
      answer.slideToggle(state);
      tis.toggleClass('active',state);
    });
  });
});
</script>
</head>

<body>
<br />
<div id="faqs">
<? foreach ($res as $item) {?>
<h2><?=$item['PERTANYAAN']?></h2>
<div>
  <p>Jawaban : <br />
  	<?=$item['JAWABAN']?>
  </p>	
</div>
<? }?>
</div>
<br />
<form action="<?=base_url()?>index.php/faq" method="post">
<table width="98%" border="0" cellspacing="0" cellpadding="0">
  <tr class="tulis4">
    <td width="5%">&nbsp;</td>
    <td width="22%" valign="top">Pertanyaan / Komentar </td>
    <td width="1%" valign="top">:</td>
    <td width="72%" valign="top"><label>
      <textarea name="pertanyaan" cols="60" rows="4" id="pertanyaan" ></textarea>
    </label></td>
  </tr>
  <tr>
    <td width="5%">&nbsp;</td>
    <td colspan="3"><input type="submit" name="submit" value="Kirim"  />&nbsp;</td>
  </tr>
</table>
</form>
<br />
<div align="center" style="color:#000066; font-family:Verdana, Arial, Helvetica, sans-serif"><?=$pesan?></div>


</body>
</html>
