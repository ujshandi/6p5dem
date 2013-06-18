<!-- page content -->
	<div class="wrap_right bgcontent">
	<h1 class="heading">Daftar Kompetensi Perhubungan Matra Udara</h1>
    <hr/>
	<?=form_open('kopetensi_udara/search')?>
	<div id="kategori">
   Kategori Kompetensi : <br/>
    <?php
        echo form_dropdown("KODE_KATEG_KOPETENSI", $option_kategori, $this->input->post('KODE_KATEG_KOPETENSI'),"id='KODE_KATEG_KOPETENSI'");
    ?>
    </div>
 
    <div id="tingkat">
   Tingkat Kompetensi :<br/>
    <?php
        echo form_dropdown("KODE_TINGKAT", $option_tingkat, $this->input->post('KODE_TINGKAT'),"id='KODE_TINGKAT'");
    ?>
    </div>
 
    <td></td>
		<td><input class="greenbutton" type="submit" value="Tampilkan" style="float:left"/></td>
 	<hr/>
    <?=form_close() ?>
	<li style="float:left">
	<a href="<?=base_url().$this->config->item('index_page').'/kopetensi_udara/add'?>" class="control"> <span class="add">Tambah Data</span></a>
	</li>
    
	<table width="100%">
	  <thead>
		<th>No</th>
		<th>KODE</th>
		<th>Deskripsi</th>
		<th align="center">aksi</th>
	  </thead>
	</table>
	<div class="clear">&nbsp;</div>
</div>
    
    <script type="text/javascript">
        $("#KODE_KATEG_KOPETENSI").change(function(){
                var selectValues = $("#KODE_KATEG_KOPETENSI").val();
                if (selectValues == 0){
                    var msg = "Tingkat Kompetensi :<br><select name=\"KODE_TINGKAT\" disabled><option value=\"0\">Pilih Kategori Dahulu</option></select>";
                    $('#tingkat').html(msg);
                }else{
                    var KODE_KATEG_KOPETENSI = {KODE_KATEG_KOPETENSI:$("#KODE_KATEG_KOPETENSI").val()};
                    $('#KODE_TINGKAT').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('kopetensi_udara/select_tingkat')?>",
                            data: KODE_KATEG_KOPETENSI,
                            success: function(msg){
                                $('#tingkat').html(msg);
                            }
                    });
                }
        });
    </script>