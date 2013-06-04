<style>
#tabbed_box {  
    margin: 0px auto 0px auto;  
    width:300px;  
}
.tabbed_box h4 {  
    font-family:Arial, Helvetica, sans-serif;  
    font-size:23px;  
    color:#cccccc;  
    letter-spacing:-1px;  
    margin-bottom:10px;  
} 
.tabbed_area {  
    border:1px solid #cccccc;  
    padding:8px;      
}   
ul.tabs {  
    margin:0px; padding:0px;  
}  
ul.tabs li {  
    list-style:none;  
    display:inline;  
}  
ul.tabs li a {  
    background-color:#464c54;  
    color:#ffffff;  
    padding:8px 14px 8px 14px;  
    text-decoration:none;  
    font-size:9px;  
    font-family:Verdana, Arial, Helvetica, sans-serif;  
    font-weight:bold;  
    text-transform:uppercase;  
    border:1px;   
}  
ul.tabs li a:hover {  
    background-color:#2f343a;  
    border-color:#2f343a;  
}  
ul.tabs li a.active {  
    background-color:#cccccc;  
    color:#999999;    
} 
.content {  
    background-color:#ffffff;       
}  
#content_2, #content_3 {
 display:none; 
 }  
 ul.tabs {  
    margin:0px; padding:0px;  
    margin-top:5px;  
    margin-bottom:6px;  
}
.content ul {  
    margin:0px;  
    padding:0px 20px 0px 20px;  
}  
.content ul li {  
    list-style:none;  
    border-bottom:1px solid #d6dde0;  
    padding-top:15px;  
    padding-bottom:15px;  
    font-size:13px;  
}  
.content ul li a {  
    text-decoration:none;  
    color:#3e4346;  
}  
.content ul li a small {  
    color:#8b959c;  
    font-size:9px;  
    text-transform:uppercase;  
    font-family:Verdana, Arial, Helvetica, sans-serif;  
    position:relative;  
    left:4px;  
    top:0px;  
} 
.content ul li:last-child {  
    border-bottom:none;  
} 
  
</style>
<!-- contenna -->
<div class="wrap_right bgcontent">
<h1 class="heading">Tambah Data Diklat & Pendidikan Pegawai</h1>
<hr/>
<body>
<div id="tabbed_box_1" class="tabbed_box">  
	<div class="tabbed_area">  
	<script src="<?=base_url()?>asset/sdm2/js/function2.js" type="text/javascript"></script>   
	<ul class="tabs">  
		<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Diklat</a></li>  
		<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Pendidikan</a></li>    
	</ul>
	<div id="content_1" class="content">
	<?=form_open('sdm_kementerian/proses_add_diklat', array('class'=>'sform'))?>
	<fieldset>
		<?php 
			if(validation_errors())
			{
		?>
				<ul class="message error grid_12">
					<li><?=validation_errors()?></li>
					<li class="close-bt"></li>
				</ul>	
		<?php
			} 
		?>
		<ol>
			<li><label for="">Id Pegawai <em>*</em></label> <input name="ID_PEG_KEMENTRIAN" value="<?=$result->row()->ID_PEG_KEMENTRIAN?>" type="text" class="five" readonly="yes"/></li>
			<li><label for="">Diklat   <em>*</em></label>
				<?php
					echo form_dropdown("KODE_DIKLAT", $option_diklat, $this->input->post('KODE_DIKLAT'),"id='KODE_DIKLAT'");
				?>
			<li><label for="">Tahun Diklat <em>*</em></label> <input name="TAHUN_DIKLAT" value="<?=set_value('TAHUN_DIKLAT')?>" type="text" class="five"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:left"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
	</div>
	<div id="content_2" class="content">
	<?=form_open('sdm_kementerian/proses_add_pendidikan', array('class'=>'sform'))?>
	<fieldset>
		<?php 
			if(validation_errors())
			{
		?>
				<ul class="message error grid_12">
					<li><?=validation_errors()?></li>
					<li class="close-bt"></li>
				</ul>	
		<?php
			} 
		?>
		<ol>
			<li><label for="">Id Pegawai <em>*</em></label> <input name="ID_PEG_KEMENTRIAN" value="<?=$result->row()->ID_PEG_KEMENTRIAN?>" type="text" class="five" readonly="yes"/></li>
			<li><label for="">Jenjang Pendidikan   <em>*</em></label>
				<?php
					echo form_dropdown("ID_JENJANG", $option_jenjang, $this->input->post('ID_JENJANG'),"id='ID_JENJANG'");
				?>
			<li><label for="">Nama Sekolah <em>*</em></label> <input name="NAMA_SEKOLAH" value="<?=set_value('NAMA_SEKOLAH')?>" type="text" class="five"/></li>
			<li><label for="">Tahun Pendidikan <em>*</em></label> <input name="TAHUN_PENDIDIKAN" value="<?=set_value('TAHUN_PENDIDIKAN')?>" type="text" class="five"/></li>
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:left"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
	</div>
</div>
<?=form_open('sdm_kementerian/search', array('class'=>'sform'))?>
<hr/>
			<li><input class="greenbutton" type="submit" value="Back" style="float:left"/></li>
<?=form_close()?>
</div>
</body>
</div><!-- end wrap right content-->
