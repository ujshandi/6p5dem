<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>BPSDM Kementerian Perhubungan</title>
<link rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>asset/board/asset/frontpage/css/style.css" />
<link rel="shortcut icon" href="<?=base_url()?>asset/board/asset/frontpage/favicon.ico" />
<script type="text/javascript" src="<?=base_url()?>asset/board/asset/frontpage/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>asset/board/asset/frontpage/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?=base_url()?>asset/board/asset/frontpage/js/jquery.vticker.js"></script>
<script type="text/javascript" src="<?=base_url()?>asset/board/asset/frontpage/js/jtree.js"></script>
<script type="text/javascript" src="<?=base_url()?>asset/board/asset/frontpage/js/jquery.simpleCalendar.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url()?>asset/board/asset/frontpage/js/custom.js"></script>
<script type="text/javascript" charset="utf-8" src="<?=base_url()?>asset/board/asset/frontpage/js/app.js"></script>
<script type='text/javascript'>
	function show(page,div){
		do_scroll(0);
		var site = "<?php echo site_url()?>";
		$.ajax({
		  url: site+"/"+page,
		  success: function(response){			
			$(div).html(response);
		  },
		  dataType:"html"  		
		});
		return false;
	}
	function load(page,div){
		do_scroll(0);
		var site = "<?php echo site_url()?>";
		$.ajax({
		  url: site+"/"+page,
		  success: function(response){			
		  $(div).html(response);
		  },
		dataType:"html"  		
		});
		return false;
  }
  function load_silent(page,div){
            var site = "<?php echo site_url()?>";
            $.ajax({
                url: site+"/"+page,
                success: function(response){			
                $(div).html(response);
                },
            dataType:"html"  		
            });
            return false;
        }
</script>
	
	<script type="text/javascript">	
	
	$(document).ready(function () {
		load("news/index","#infos2");
	});
	
	$(document).ready(function () {
		load("pengumuman/index","#infos1");
	});
	
	$(document).ready(function () {
		load("agenda/index","#agenda_kegiatan");
	});
	
	</script>
	
</head>
<body>

<div id="header">
    <div class="header_content">
  
    <div class="logo"><a href="index.html">home</a></div>
    <div class="title"><h1>badan pengembangan sumber daya manusia perhubungan</h1><h2>kementerian perhubungan republik indonesia</h2></div>
    
    <div class="hublogo"><a href="http://www.dephub.go.id" title="Kementerian Perhubungan RI" target="_blank"><span>kementerian perhubungan republik indonesia</span></a></div>
    
    <!--<div class="menu">
        <ul>
            <li class="selected"><a href="index.html">home</a></li>
            <li><a href="#">login</a></li>
        </ul>
    </div>--><!--end top menu-->
    <div class="clear"></div> 
    </div><!--end header content--> 
</div><!-- End of Header-->

<div id="wrap">	

   <div class="slider">
		<div class="flexslider">
            <ul class="slides">
                <li>
                    <a href="#"><img src="<?=base_url()?>asset/board/asset/frontpage/images/slider-image1.jpg" alt="" title="" border="0"/></a>
                    <p class="flex-caption">Pelantikan Taruna BP2IP Barombong - <a href="#">Detail</a></p>
                </li>
                <li>
                    <a href="#"><img src="<?=base_url()?>asset/board/asset/frontpage/images/slider-image2.jpg" alt="" title="" border="0"/></a>
                    <p class="flex-caption">Taruni Penerbang Sekolah Tinggi Penerbangan Indonesia - <a href="#">Detail</a>
					</p>
                </li>
                <li>
                    <a href="#"><img src="<?=base_url()?>asset/board/asset/frontpage/images/slider-image3.jpg" alt="" title="" border="0"/></a>
                    <p class="flex-caption">Peresmian Kampus Baru BP2IP Surabaya - <a href="#">Detail</a></p>
                </li>
            </ul>
	  	</div>
   </div><!--end slider-->
   
   <div class="infos"  id="pengumuman">
	<h3>Pengumuman</h3>
    <div id="infos1">
        <ul>
            <li>
                <div>
                    <h6><a href="#">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, consectetur, adipisci velit</a></h6>
                    <span>Release : 15 Pebruari 2013</span>
                </div>
            </li> 
            <li>
                <div>
                    <h6><a href="#">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, consectetur, adipisci velit</a></h6>
                    <span>Release : 15 Pebruari 2013</span>
                </div>
            </li> 
            <li>
                <div>
                    <h6><a href="#">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, consectetur, adipisci velit</a></h6>
                    <span>Release : 15 Pebruari 2013</span>
                </div>
            </li>   
        </ul>
    </div><!--end infos1-->
	</div><!--end pengumuman-->
   
   <div class="infos" id="berita">
   	   	
   	<h3>Berita Update</h3>
   	<div id="infos2">
        <ul>
            <li>
                <div>
                    <span>15 Pebruari 2013 | 09:39 WIB</span>
                    <h5><a href="#">Lorem Ipsum sim dolor met</a></h5>
                    <img src="images/pic-small.jpg" />
                    <h6><a href="#">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, consectetur, adipisci velit</a></h6>
                </div>
            </li> 
            <li>
                <div>
                    <span>15 Pebruari 2013 | 09:39 WIB</span>
                    <h5><a href="#">Lorem Ipsum sim dolor met</a></h5>
                    <img src="images/pic-small.jpg" />
                    <h6><a href="#">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, consectetur, adipisci velit</a></h6>
                </div>
            </li> 
            <li>
                <div>
                    <span>15 Pebruari 2013 | 09:39 WIB</span>
                    <h5><a href="#">Lorem Ipsum sim dolor met</a></h5>
                    <img src="images/pic-small.jpg" />
                    <h6><a href="#">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, consectetur, adipisci velit</a></h6>
                </div>
            </li>   
        </ul>
    </div><!--end infos2-->

   </div><!--end berita-->
   <div class="clear"></div>
   
  <div class="center_content">
  	<div class="section_14">
    	<h2 class="typo">BPSDM Aplikasi</h2>
        <div class="apl_box">
        	<img src="<?=base_url()?>asset/board/asset/frontpage/images/icon-apl.png" class="ic" />
            <hr class="style1"/>
            <p>BPSDM Aplikasi merupakan aplikasi manajemen sumber daya manusia bidang transportasi Badan Pengembangan Sumber Daya Manusia Perhubungan - Kementerian Perhubungan RI</p>
        </div>
        <a href="<?php echo site_url() . '/auth/login' ?>" class="more_bgcolor more_rounded centered">LOGIN</a>
		<br/><br/>
		<!--Link Pendaftaran Taruna-->
			<h2 class="typo">Pendaftaran Taruna</h2>
			<div class="apl_box">
				<img src="<?=base_url()?>asset/board/asset/frontpage/images/Security.png" class="ic" />
				<hr class="style1"/>
				<p align="center"><center><a href="<?php echo site_url() . '/peserta_front/add'?>" class="more_bgcolor more_rounded centered">DAFTAR</a></center></p>
			</div>
		<!--End Link Pendaftaran Taruna-->
		
		<!--Link Lowongan kerja-->
			<h2 class="typo">Lowongan Kerja</h2>
			<div class="apl_box">
				<img src="<?=base_url()?>asset/board/asset/frontpage/images/loker.png" class="ic" />
				<hr class="style1"/>
				<p align="center"><center><a href="<?php echo site_url() . '/lowongan_kerja/' ?>" class="more_bgcolor more_rounded centered">LOKER</a></center></p>
			</div>
		<!--End Link lowongan kerja-->
		
		<!--Link Informasi Kerjasama-->
			<h2 class="typo">Informasi Kerjasama</h2>
			<div class="apl_box">
				<img src="<?=base_url()?>asset/board/asset/frontpage/images/loker.png" class="ic" />
				<hr class="style1"/>
				<p align="center"><center><a href="<?php echo site_url() . '/kerjasama/' ?>" class="more_bgcolor more_rounded centered">INFO KERJASAMA</a></center></p>
			</div>
		<!--End Link Informasi Kerjasama-->
    </div>
	
    
    <div class="section_14" id="agenda_kegiatan">
       
        <div class="clear">&nbsp;</div>
        <a href="#" class="inlink right">agenda lainnya</a>
    </div>
    
    <div class="section_14 list">
        <h2>Pendaftaran Taruna</h2>
        <hr/>
        <ul>
        <li>
			<a href="" title="">INFORMASI (www.beritakebumen.info)</a>
			<p class="feat_text">Kemenhub RI (Kementerian Perhubungan Republik Indonesia) adalah kementerian dalam Pemerintah Indonesia yang membidangi urusan transportasi. </p>
		</li>
         <li><a href="" title="">PERSYARATAN ADMINISTRASI</a>
			<p class="feat_text">	
					<li>1.Usia maksimum 23 tahun pada bulan Agustus 2013;</li>
					<li>2.Jenis Kelamin : Pria / Wanita;</li>
					<li>3.Belum menikah dan sangguptidak menikah selama masa pendidikan dibuktikan dengan surat pernyataan;</li>
					<li>4. Tinggi Badan minimal Pria 160 Gm dan Wanita 155 Cm;</li>
			</p>
		 </li>
        </ul>
    </div>
    
    <div class="section_14">
    	<h2>Calender</h2>
		
        <hr/>
        <p></p>
        <hr/>
        <div id="calendar_box"></div>
    </div>
	<div class="section_14">
    	<!--<h2>Polling</h2>
		
        <hr/>
        <p>
			<img src="<?//=base_url()?>asset/board/asset/frontpage/images/polling_images.jpg" alt="" title="" width="200" height="120" border="0" class="center" />
			<br/>
			<br/>
			
				<input type="radio">Bagus<br/>
				<input type="radio">Cukup<br/>
				<input type="radio">Kurang<br/>
			
		</p>
        <hr/> -->
		<h2 class="typo">Informasi Alumni</h2>
			<div class="apl_box">
				<img src="<?=base_url()?>asset/board/asset/frontpage/images/alumni.png" class="ic" />
				<hr class="style1"/>
				<p align="center"><center><a href="<?php echo site_url() . '/alumni_frontpage/' ?>" class="more_bgcolor more_rounded centered">LIHAT</a></center></p>
			</div>
		</h2>
        <div id="calendar_box"></div>
    </div>
	
	<div class="clear"></div> 
  </div>
  
</div><!--end center content-->

<div id="footer">
	<div class="footer_content">
    	<!--<div class="footer_left">
        <h2>Latest Tweets</h2>
        	<div class="tweets">
            <a href="#">Lincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</a>
            <a href="#">Lincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</a>
            <a href="#">Lincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</a>
            </div>
        </div>-->
        
    	<!--<div class="footer_left">
        <h2>Get in touch</h2>
        	<div class="info">
            <p>
            Lincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam <br />
            Adress:  <span>info@email.com</span> <br />
			Phone:  <span>1234 345 978</span>
            </p>
                <div class="social">
                <a href="#"><img src="images/rss.gif" alt="" title="" border="0" /></a>
                <a href="#"><img src="images/digg.gif" alt="" title="" border="0" /></a>
                <a href="#"><img src="images/delicious.gif" alt="" title="" border="0" /></a>
                <a href="#"><img src="images/reddit.gif" alt="" title="" border="0" /></a>
                <a href="#"><img src="images/twitter.gif" alt="" title="" border="0" /></a>
                </div>
            </div>
        </div>--> 
        
        <!--<div class="footer_right">
        <h2>Network Links</h2>
            <ul>
                <li><a href="#">Lincididunt ut labore et</a></li>
                <li><a href="#">Lincididunt ut labore et</a></li>
                <li><a href="#">Lincididunt ut labore et</a></li>
                <li><a href="#">Lincididunt ut labore et</a></li>
                <li><a href="#">Lincididunt ut labore et</a></li>
            </ul>
            
            <ul>
                <li><a href="#">Lincididunt ut labore et</a></li>
                <li><a href="#">Lincididunt ut labore et</a></li>
                <li><a href="#">Lincididunt ut labore et</a></li>
                <li><a href="#">Lincididunt ut labore et</a></li>
                <li><a href="#">Lincididunt ut labore et</a></li>
            </ul>           
        </div>-->
        
        <div class="footer_bottom">
            <div class="copyrights">
            &copy; BPSDM Perhubungan - <a href="#" target="_blank">Kementerian Perhubungan RI.</a> 2013
            </div>
            <div class="footer_right_links">
            <ul>
                <li class="selected"><a href="index.html">HOME</a></li>
                <li><a href="#">KONTAK</a></li>
                <li><a href="#">WEB MAIL</a></li>
                <li><a href="<?php echo site_url() . '/auth/login' ?>">LOGIN</a></li>
            </ul>
            </div>
        </div>

     <div class="clear"></div>   
	</div><!--end footer content-->
</div><!--end all footer-->
 
</body>
</html>
