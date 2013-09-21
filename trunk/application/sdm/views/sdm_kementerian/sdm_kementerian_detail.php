<style>
#tabbed_box {  
    margin: 0px auto 0px auto 0px auto;  
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
    background-color:#666666;  
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
#content_2, #content_3, #content_4 {
 display:none; 
}  
ul.tabs {  
    margin:0px; 
	padding:0px;  
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
<h1 class="heading">Detail Data Pegawai</h1>
	<?=form_open('sdm_kementerian', array('class'=>'sform'))?>
	<hr/>
			<li><input class="greenbutton" type="submit" value="Back" style="float:left"/></li>
<?=form_close()?>
	<hr/>
<body>  
  
<div id="tabbed_box_1" class="tabbed_box">    
    <div class="tabbed_area">  
      
    <script src="<?=base_url()?>asset/globalstyle/js/function2.js" type="text/javascript"></script>   
	<ul class="tabs">  
		<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Profil Pegawai</a></li>  
		<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Profile Pendidikan</a></li>
		<!--li><a href="javascript:tabSwitch('tab_4', 'content_4');" id="tab_4">Pangkat</a></li-->
	</ul>   
          
        <div id="content_1" class="content">
			<table class="box-table-a" width="100%" border="1" bordercolor="#FFFFFF">
		<tr>
			<td width="125">NIP</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->NIP?></td>
		</tr>
		<tr>
			<td width="125">Nama</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->NAMA?></td>
		</tr>
		<tr>
			<td width="125">Tempat Lahir</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->TMPLAHIR?></td>
		</tr>
		<tr>
			<td width="125">Tanggal Lahir</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->TGL_LAHIR?></td>
		</tr>  
		<tr>
			<td width="125">Jenis Kelamin</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->KELAMIN?></td>
		</tr>
		<tr>
			<td width="125">Agama</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->AGAMA?></td>
		</tr>
		<tr>
			<td width="125">Perkawinan</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->KAWIN?></td>
		</tr>
		<tr>
			<td width="125">Alamat</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->JALAN?></td>
		</tr>
		<tr>
			<td width="125">Golongan</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->NAMA_GOLONGAN?></td>
		</tr>
		<tr>
			<td width="125">TMT Golongan</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->TMTGOLONGAN?></td>
		</tr>
		<tr>
			<td width="125">Jabatan</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->JABATAN?></td>
		</tr>
		<tr>
			<td width="125">TMT Jabatan</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->TMTJABATAN?></td>
		</tr>
		<tr>
			<td width="125">TMT PNS</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->TMTPNS?></td>
		</tr>
	</table>
		</div>  
        <div id="content_2" class="content">
		<table class="box-table-a" width="100%" border="1" bordercolor="#FFFFFF">
		<tr>
			<td><h2>Jenjang S1</h2></td>
			<td width="159" bgcolor="#FFFFFF"></td>
		</tr>
		<tr>
			<td width="125">Nama Sekolah</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->SEKOLAH_S1?></td>
		</tr>
		<tr>
			<td width="125">Jurusan</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->S11?></td>
		</tr>
		<tr>
			<td><h2>Jenjang S2</h2></td>
			<td width="159" bgcolor="#FFFFFF"></td>
		</tr>  
		<tr>
			<td width="125">Nama Sekolah</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->SEKOLAH?></td>
		</tr>
		<tr>
			<td width="125">Jurusan</td>
			<td width="159" bgcolor="#FFFFFF"><?=$result1->row()->JURUSAN?></td>
		</tr>
	</table>	
		</div>       
    </div>  
  
</div>  
</body>  
</div>
<!-- end wrap right content-->