<script>
    $(document).ready(function(){
        $("#KODEKANTOR").change(function(){
            var KODEKANTOR = $("#KODEKANTOR").val();
            $.ajax({
               type : "POST",
               url  : "<?=base_url().$this->config->item('index_page');?>/sdm_kementerian/getSatker",
               data : "KODEKANTOR=" + KODEKANTOR,
               success: function(data){
                   $("#KODEUNIT").html(data);
               }
            });
        });
    });
</script>


<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Pegawai Kementerian</h1>
	<hr/>
	<!--a href="<?=base_url().$this->config->item('index_page').'/kurikulum/add'?>" class="control"> <span class="add">Tambah Data </span></a-->
	
	<?=form_open('sdm_kementerian/search', array('class'=>'sform'))?>
	<fieldset>
	
	<ol>
		<li>
			<!-- cainned combobox-->
			ESELON I&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
				<select name="KODEKANTOR" id="KODEKANTOR">
					<?=$this->mdl_sdm_kementerian->getOptionKantorChild(array('value'=>$kodekantor))?>
				</select>
			<br>			
			SATKER &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<select name="KODEUNIT" id="KODEUNIT">
					<?=$this->mdl_sdm_kementerian->getOptionSatkerByKantor(array('KODEKANTOR'=>$kodekantor, 'value'=>$kodeunit));?>        	
				</select>
			&nbsp;&nbsp;
			<br>
			NAMA PEGAWAI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="textfield" name="search" value="<?=!empty($search)?$search:''?>" />
			&nbsp;&nbsp;
			<select name="numrow">
				<option value="30" <?=$numrow==30?'Selected="selected"':''?>>30</option>
				<option value="50" <?=$numrow==50?'Selected="selected"':''?>>50</option>
				<option value="75" <?=$numrow==75?'Selected="selected"':''?>>75</option>
				<option value="100" <?=$numrow==100?'Selected="selected"':''?>>100</option>
				<option value="200" <?=$numrow==200?'Selected="selected"':''?>>200</option>
			</select>
			<input type="submit" name="submit" value="Proses" />
		</li>
	</ol>		
	</fieldset>
	<?=form_close()?>
	
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>Nip</th>
		<th>Nama</th>
		<th>Eselon</th>
		<th>Jabatan</th>
		<th>Golongan</th>
		<th>aksi</th>
	  </thead>
	  <tbody>
		<?
		$i=$curcount;
		foreach($result->result() as $r){
		?>
			<tr class='gradeC'>
				<td width='5%'><?=$i?></td>
				<td width='5%'><?=$r->NIP?></td>
				<td width='20%'><?=$r->NAMA?></td>
				<td width='5%'><?=$r->NAMA_ESELON?></td>
				<td width='20%'><?=$r->JABATAN?></td>
				<td width='3%'><?=$r->NAMA_GOLONGAN?></td>
				<td width='5%'>
					<a href="<?=site_url().'/sdm_kementerian/detail_new/'.$r->NIP?>" class="control">
						<span class="view">View</span>
					</a>
				</td>
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