<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Informasi Data Alumni</h1>
	<hr/>
	<a href="<?=site_url();?>" class="greenbutton">Back</a>
	<hr/>
	<table width="100%">
	  <thead>
		<th>NO</th>
		<th width="20%">UPT</th>
		<th width="15%">DIKLAT</th>
		<th>NO PESERTA</th>
		<th width="15%">Nama PESERTA</th>
		<th>TEMPAT BEKERJA</th>
	  </thead>
	  <tbody>
	  
		<?
		$i=1;
		foreach($result->result() as $r){
		?>
		
			<tr class='gradeC'>
				<td width='2%'><?=$i?></td>
				<td width='15%'><?=$r->NAMA_UPT?></td>
				<td width='15%'><?=$r->NAMA_DIKLAT?></td>
				<td width='10%'><?=$r->NO_PESERTA?></td>
				<td width='20%'><?=$r->NAMA_PESERTA?></td>
				<td width='15%'><?=$r->INSTANSI?></td>
			</tr>
		<?
		$i++;
		}
		?>
	  </tbody>
	</table>
	
	<div class="clearfix">&nbsp;</div>        
        <div class="paging right">
          	 <?=$this->pagination->create_links()?>
        </div><!--end pagination-->
	<div class="clearfix"></div>
	
</div><!-- end wrap right content-->