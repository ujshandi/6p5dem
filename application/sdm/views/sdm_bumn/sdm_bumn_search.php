<!-- page content -->
	<div class="wrap_right bgcontent">
	<h1 class="heading">Data Pegawai BUMN</h1>
    <hr/>
	<?=form_open('sdm_bumn/search')?>
	<div id="matra">
   Matra : <br/>
    <?php
        echo form_dropdown("KODEMATRA", $option_matra, $this->input->post('KODEMATRA'),"id='KODEMATRA'");
    ?>
    </div>
 
    <div id="bumn">
    BUMN :<br/>
    <?php
        echo form_dropdown("KODEBUMN", $option_bumn, $this->input->post('KODEBUMN'),"id='KODEBUMN'");
    ?>
    </div>
 
    <td></td>
		<td><input class="greenbutton" type="submit" value="Tampilkan" style="float:left"/></td>
 	<hr/>
    <?=form_close() ?>
	<li style="float:left">
	<a href="<?=base_url().$this->config->item('index_page').'/sdm_bumn/add'?>" class="control"> <span class="add">Tambah Data</span></a>
	</li>
    
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>NIK</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Jabatan</th>
		<th>aksi</th>
	  </thead>
	  <?
		$i=1;
		foreach($result->result() as $row){
	  ?>
		<tr>
				<td width='5%'><?=$i?></td>
				<td width='8%'><?=$row->NIK?></td>
				<td width='15%'><?=$row->NAMA?></td>
				<td width='15%'><?=$row->ALAMAT?></td>
				<td width='15%'><?=$row->NAMA_JABATAN?></td>
				<td width='8%'>
					<a href="<?=site_url().'/sdm_bumn/add_diklat/'.$row->ID_PEG_BUMN?>">
						<img src="<?=base_url()?>asset/globalstyle/images/ic-add.png" />&nbsp;
					</a>
					<a href="<?=site_url().'/sdm_bumn/edit/'.$row->ID_PEG_BUMN?>">
						<img src="<?=base_url()?>asset/globalstyle/images/ic-edit.png" />&nbsp; 
					</a>
					<a href="<?=site_url().'/sdm_bumn/detail/'.$row->ID_PEG_BUMN?>">
						<img src="<?=base_url()?>asset/globalstyle/images/check.png" />&nbsp;
					</a>
					<a href="<?=site_url().'/sdm_bumn/detail/'.$row->ID_PEG_BUMN?>">
						<img src="<?=base_url()?>asset/globalstyle/images/ic-delete.png" />
					</a>
				</td>
			</tr>
      <?
		$i++;
		}
	  ?>

	</table>
	
	<div class="clear">&nbsp;</div>
	<div class="paging right">
          <ul>
            <li><?=$this->pagination->create_links()?></li>
          </ul>
        </div>
</div>
    
    <script type="text/javascript">
        $("#KODEMATRA").change(function(){
                var selectValues = $("#KODEMATRA").val();
                if (selectValues == 0){
                    var msg = "BUMN :<br><select name=\"KODEBUMN\" disabled><option value=\"0\">Pilih Matra Dahulu</option></select>";
                    $('#bumn').html(msg);
                }else{
                    var KODEMATRA = {KODEMATRA:$("#KODEMATRA").val()};
                    $('#KODEBUMN').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('sdm_bumn/select_bumn')?>",
                            data: KODEMATRA,
                            success: function(msg){
                                $('#bumn').html(msg);
                            }
                    });
                }
        });
    </script>