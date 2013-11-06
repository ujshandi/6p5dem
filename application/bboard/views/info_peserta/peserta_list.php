<style>
	.bgtrans {background:#fff;background:rgba(255,255,255,.8);border:solid 1px #ececec;padding:15px 10px;border-radius:4px;}

	#lmenu {width:920px;}
	#rcontent {margin: 0px 20px 0 290px;}

	.incont p{margin:10px 0;}

	/* collapsible menu */
	ul#vmenu, ul#vmenu ul {list-style-type:none;margin:0;padding:0;}
	ul#vmenu a {display:block;text-decoration:none;}
	ul#vmenu li {margin-top:1px; display:inline;}
	ul#vmenu li a {background:#ececec;background:rgba(236,236,236,.8);font-size:13px;color:#666666;text-shadow:0 1px 0 #fff;padding:0.5em;display:inline-block;border-radius:4px;}
	ul#vmenu li a:focus, ul#vmenu li a:focus:hover {background:#fff;background:rgba(255,255,255,.9);color:#666666;}
	ul#vmenu li a:hover {background:#dedede;}
	ul#vmenu li a.active {background:#bbb;color:#fff;text-shadow:0 1px 0 #000;}
	ul#vmenu li ul li a {background:#ccc;background:rgba(204,204,204,.7) url(../images/arrow-list.gif) no-repeat 5px 50%;color:#666;padding-left:20px;}
	ul#vmenu li ul li a:hover,ul#vmenu li ul .current a,ul#vmenu li ul li a:focus {background-color:#f9f9f9;border-left:5px #99CC66 solid;color:#99CC66;padding-left:15px;}
</style>

<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 align="center" class="heading">Informasi Data Peserta</h1>
	<h1 align="center" class="heading"><?=$this->mdl_upt->getUPTNameByKode($kode_upt);?></h1>
	<hr/>
	<div id="lmenu" class="bgtrans">
		<ul id="vmenu">
			<li><a href="http://localhost:81/stef.com/bpsdm_new/index.php/peserta_frontpage/hid_filter/<?php echo $kode_upt;?>" class="active">Data Peserta</a></li>
			<li><a href="http://localhost:81/stef.com/bpsdm_new/index.php/alumni2_frontpage/hid_filter/<?php echo $kode_upt;?>">Data Alumni</a></li>
			<li><a href="http://localhost:81/stef.com/bpsdm_new/index.php/dosen_frontpage/hid_filter/<?php echo $kode_upt;?>/Dosen">Data Dosen</a></li>
			<li><a href="http://localhost:81/stef.com/bpsdm_new/index.php/dosen_frontpage/hid_filter/<?php echo $kode_upt;?>/Instruktur">Data Instruktur</a></li>
			<li><a href="http://localhost:81/stef.com/bpsdm_new/index.php/dosen_frontpage/hid_filter/<?php echo $kode_upt;?>/Widyaiswara">Data Widyaiswara</a></li>
		</ul><!-- end vmenu -->
	</div>	
	<br>
	<?=form_open('peserta_frontpage/search', array('class'=>'sform'))?>
	<fieldset>
	<ol>
		<li>
			<table>
			<!-- cainned combobox-->
			<tr>
			<td>UPT : </td><td>
				<select name="KODE_UPT" id="KODE_UPT">
					<?=$this->mdl_upt->getOptionUPT(array('value'=>$kode_upt))?>
				</select></td>
			</tr>	
			<tr>
			<td>NAMA PESERTA : </td>
			<td><input type="textfield" name="search" value="<?=!empty($search)?$search:''?>" style="width:300px"/></td>
			</tr>
			<tr>
			<td>JUMLAH/HALAMAN : </td><td>
			<select name="numrow">
				<option value="10" <?=$numrow==10?'Selected="selected"':''?>>10</option>
				<option value="30" <?=$numrow==30?'Selected="selected"':''?>>30</option>
				<option value="50" <?=$numrow==50?'Selected="selected"':''?>>50</option>
			</select></td></tr>
			<tr><td colspan=2 align="center">
			<input type="submit" name="submit" value="Proses" />
			</td></tr>
			</table>
		</li>
	</ol>		
	</fieldset>
	<?=form_close()?>
	
	<hr/>
	<table width="100%">
	  <thead>
		<th>NO</th>
		<th width="20%">UPT</th>
		<th width="15%">DIKLAT</th>
		<th>NO PESERTA</th>
		<th width="15%">NAMA PESERTA</th>
		<th>TAHUN ANGKATAN</th>
	  </thead>
	  <tbody>
	  
		<?
		$i=$curcount;
		foreach($result->result() as $r){
		?>
		
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td width='15%'><?=$r->NAMA_UPT?></td>
				<td width='15%'><?=$r->NAMA_DIKLAT?></td>
				<td width='10%'><?=$r->NO_PESERTA?></td>
				<td width='20%'><?=$r->NAMA_PESERTA?></td>
				<td width='15%'><?=$r->THN_ANGKATAN?></td>
			</tr>
		<?
		$i++;
		}
		?>
	  </tbody>
	</table>
	
          	<div class="clearfix">&nbsp;</div>        
        <div class="paging right">
          <ul>
            <li class="active">
				 <li><?=$this->pagination->create_links()?></li>
          </ul>
        </div><!--end pagination-->
	<div class="clearfix"></div>
        
</div><!-- end wrap right content-->