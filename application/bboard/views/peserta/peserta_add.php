<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Sistem Informasi Manajemen DIKLAT Perhubungan - BPSDM Perhubungan - Kementerian Perhubungan RI</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
  <link rel="shortcut icon" href="<?=base_url()?>asset/globalstyle/images/favicon.ico" />
	<link type="text/css" href="<?=base_url()?>asset/globalstyle/css/style.css" rel="stylesheet"  type="text/css"  />
	<script type="text/javascript" src="<?=base_url()?>asset/globalstyle/js/jquery-min.js" ></script>
	<script type="text/javascript" src="<?=base_url()?>asset/globalstyle/js/custom.js" ></script>
	<script type="text/javascript" src="<?=base_url()?>asset/diklat/js/ui.datepicker.js" ></script>	
	<script type="text/javascript" src="<?=base_url()?>asset/board/asset/frontpage/js/ui.datepicker.js"></script>
	<link href="<?=base_url()?>asset/globalstyle/css/jquery-ui-datepicker/ui-lightness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
	<script src="<?=base_url()?>asset/globalstyle/js/jquery-ui-datepicker/jquery-1.9.1.js"></script>
	<script src="<?=base_url()?>asset/globalstyle/js/jquery-ui-datepicker/jquery-ui-1.10.3.custom.js"></script>
</head>

<script>
$(function() {
$( "#TGL_LAHIR" ).datepicker();
$( "#TGL_MASUK" ).datepicker();
});
</script>

<script>
    $(document).ready(function(){
        $("#KODE_UPT").change(function(){
            var KODE_UPT = $("#KODE_UPT").val();
            $.ajax({
               type : "POST",
               url  : "<?=base_url().$this->config->item('index_page');?>/peserta_front/getDiklat",
               data : "KODE_UPT=" + KODE_UPT,
               success: function(data){
                   $("#KODE_DIKLAT").html(data);
               }
            });
        });
    });
</script>

<body>
	<div id="container">
		<div id="header" class="bg_green"> 
			<div class="header-img green"> 
			  <div id="title">
				<h3>BPSDM Perhubungan - Kementerian Perhubungan RI</h3>
				<h2>Sistem Informasi Manajemen SDM Bidang Transportasi</h2>
				<!--<h1>Aplikasi Basis Data Diklat</h1>-->
			  </div><!-- end title -->
			  
			  <div class="hublogo"><a href="http://www.dephub.go.id" title="Kementerian Perhubungan RI" target="_blank"></a></div>
			  <div class="clear"></div>
			  
			  <!--
			  <div class="bread">
				<ul class="breadcrumbs">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Aplikasi title</a></li>
				  <li><span>Edit</span></li>
				  <li class="current"><a href="#">Add</a></li>
				</ul>
			  </div><!-- end breadcrumbs -->
			  
			  
			
			  
			  <div class="clear"></div>
			</div><!-- end image headers -->
		</div><!-- end header -->

		<!-- contenna -->
		<div id="content" class="page-green">
			<div id="contentwrap">		
				<div class="wrap_center bgcontent">
					<h1 class="heading">Pendaftaran Peserta Taruna</h1>
					<hr/>	
					<?=form_open('peserta_front/proses_add', array('class'=>'sform'))?>
					<fieldset>
						<!--<?php 
							if(validation_errors())
							{
						?>
								<ul class="message error grid_12">
									<li><?=validation_errors()?></li>
									<li class="close-bt"></li>
								</ul>	
						<?php
							} 
						?>-->
						
						
						<ol>						
							<li><label for="" >UPT <em>*</em></label>
								<?
									$opt_satker['id'] = 'KODE_UPT';
									$opt_satker['name'] = 'KODE_UPT';
									//$opt_satker[] = '';
									echo $this->mdl_satker->getOptionUPTChild($opt_satker);
									
								?>
							</li>
							
							<li><label for="">DIKLAT <em>*</em></label>
								<div id="KODE_DIKLAT">
								<select name="KODE_DIKLAT">
									<option value="">--Pilih--</option>        	
								</select>
								</div>
							</li>
							
							<li><label for="">NOMOR INDUK <em>*</em></label> <input name="NO_PESERTA" value="<?=set_value('NO_PESERTA')?>" type="text" class="two"/></li>
							
							<li><label for="">NAMA PESERTA <em>*</em></label> <input name="NAMA_PESERTA" value="<?=set_value('NAMA_PESERTA')?>" type="text" class="three"/></li>
							
							<li><label for="">TEMPAT LAHIR<em>*</em></label> <input name="TEMPAT_LAHIR" value="<?=set_value('TEMPAT_LAHIR')?>" type="text" class="three"/></li>
							
							<li><label for="">TANGGAL LAHIR<em>*</em></label> <input name="TGL_LAHIR" value="<?=set_value('TGL_LAHIR')?>" type="text" class="one" id="TGL_LAHIR"/></li>
							
							<li><label for="">Jenis Kelamin <em>*</em></label> <select id="JK" name="JK">
							<option value="">- Pilih Jenis Kelamin -</option>
							<option value="Pria">Pria</option>
							<option value="Wanita">Wanita</option>
							</select></li>
							
							<li><label for="">TANGGAL MASUK<em>*</em></label> <input name="TGL_MASUK" value="<?=set_value('TGL_MASUK')?>" type="text" class="one" id="TGL_MASUK"/></li>
							
							<li><label for="">TAHUN<em>*</em></label> <select id="THN_ANGKATAN" name="THN_ANGKATAN">
							<option value="">- Pilih Tahun -</option>
							<option value="2000">2000</option>
							<option value="2001">2001</option>
							<option value="2002">2002</option>
							<option value="2003">2003</option>
							<option value="2004">2004</option>
							<option value="2005">2005</option>
							<option value="2006">2006</option>
							<option value="2007">2007</option>
							<option value="2008">2008</option>
							<option value="2009">2009</option>
							<option value="2010">2010</option>
							<option value="2011">2011</option>
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							</select></li>

							<input type="hidden" name="STATUS_PESERTA" value="Registrasi">
							
							<li><label for="">KETERANGAN <em>*</em></label> <input name="KETERANGAN" value="<?=set_value('KETERANGAN')?>" type="text" class="five"/></li>
							
							<div class="clearfix">&nbsp;</div>
							<hr/>
							<li>
							<input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/>
							
							<a href="<?=site_url().'/auth/index/'?>" class="control" ><span class="delete">Kembali</span></a>
							
							<hr/>	
							
							<li><a href="" title="">PERSYARATAN ADMINISTRASI</a>
								<p class="feat_text">	
										<li>1. Usia maksimum 23 tahun pada bulan Agustus 2013;</li>
										<li>2. Jenis Kelamin : Pria / Wanita;</li>
										<li>3. Belum menikah dan sangguptidak menikah selama masa pendidikan dibuktikan dengan surat pernyataan;</li>
										<li>4. Tinggi Badan minimal Pria 160 Gm dan Wanita 155 Cm;</li>
								</p>
							 </li>
							 
						</ol>
					</fieldset>
					<?=form_close()?>
				</div><!-- end wrap right content-->
				<div class="clearfix"></div>
			</div><!-- end content wrap -->
		  </div><!-- end content -->
		  
		  <div id="footer">
			Copyright &copy; 2013 BPSDM Perhubungan - <a href="http://www.dephub.go.id/">Kementerian Perhubungan RI</a>
		  </div><!-- end footer -->
	</div><!-- end container -->
</body>
</html>

