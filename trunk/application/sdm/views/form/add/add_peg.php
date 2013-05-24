<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<div class="main">
<?=form_open('#','id="addlowongan" name="addlowongan"');?>	<table>
<table class="box-table-a">
  <tr>
		<td>Masukan Eselon</td>
		<td> <div id="eselon1"><?php echo form_dropdown("id_eselon_1", $id_eselon_1, $this->input->post('id_eselon_1'),"id='id_eselon_1'");?></div></td>
	</tr>
	<tr>
		<td></td>
 		<td><div id="eselon2"> <?php echo form_dropdown("id_eselon_2",array('0'=>'Pilih Eselon I Dahulu'),'',"id='id_eselon_2'",$this->input->post('id_eselon_2'));?></div></td>
	</tr>
    <tr>
		<td></td>
 		<td><div id="eselon3"> <?php echo form_dropdown("id_eselon_3",array('0'=>'Pilih Eselon II Dahulu'),'',"id='id_eselon_3'",$this->input->post('id_eselon_3'));?></div></td>
	</tr>
    <tr>
		<td></td>
 		<td><div id="eselon4"> <?php echo form_dropdown("id_eselon_4",array('0'=>'Pilih Eselon III Dahulu'),'',"id='id_eselon_4'",$this->input->post('id_eselon_4'));?></div></td>
	</tr>
    <tr>
		<td>Golongan</td>
 		<td><div id="golongan"> <?php echo form_dropdown("id_golongan", $id_golongan, $this->input->post('id_golongan'),"id='id_golongan'");?></div></td>
	</tr>
        <tr>
		<td>Jabatan</td>
 		<td><div id="jabatan"> <?php echo form_dropdown("id_jabatan", $id_jabatan, $this->input->post('id_jabatan'),"id='id_jabatan'");?></div></td>
	</tr>
  <tr>
	<td>Nip</td>
	<td> <?=form_input('nip', '','class="required"');?></td>
  </tr>
  <!-- <tr>
	<td>Tanggal Aktif</td>
	<td>: <? //echo form_input('dateAktif', '','id="dateAktif"');?></td>
  </tr> -->
  <tr>
	<td>Nama</td>
	<td> <?=form_input('nama', '','class="required"');?></td>
  </tr>
  <tr>
	<td>Jenis Kelamin</td>
	<td><div id="jabatan"> <?php echo form_dropdown("jenisKelamin", $jenisKelamin, $this->input->post('jenisKelamin'),"id='jenisKelamin'");?></div></td>
  </tr>
  <tr><td colspan="2">
  <div class="control-btn" align="center">
	<?php echo form_submit('save', 'Simpan')?></td>
  </div>
  </tr>
  </table>
  <?=form_close()?>
  <div class="loading">
  
  </div>

<script>
$("#id_eselon_1").change(function(){
                var selectValues = $("#id_eselon_1").val();
                if (selectValues == 0){
                    var msg = "Eselon II :<br><select name=\"id_eselon_2\" disabled><option value=\"0\">Pilih Eselon I Dahulu</option></select>";
                    $('#eselon2').html(msg);
                }else{
                    var id_eselon_1 = {id_eselon_1:$("#id_eselon_1").val()};
                    $('#id_eselon_2').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('chain/select_eselon2')?>",
                            data: id_eselon_1,
                            success: function(msg){
                                $('#eselon2').html(msg);
                            }
                    });
                }
        });
            $('body').delegate("#id_eselon_2","change", function() {
                var selectValues = $("#id_eselon_2").val();
                if (selectValues == 0){
                    var msg = "Eselon III :<br><select name=\"id_eselon_3\" disabled><option value=\"0\">Pilih Eselon II Dahulu</option></select>";
                    $('#eselon3').html(msg);
                }else{
                    var id_eselon_2 = {id_eselon_2:$("#id_eselon_2").val()};
                    $('#id_eselon_3').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('chain/select_eselon3')?>",
                            data: id_eselon_2,
                            success: function(msg){
                                $('#eselon3').html(msg);
                            }
                    });
                }
        });
		$('body').delegate("#id_eselon_3","change", function() {
                var selectValues = $("#id_eselon_3").val();
                if (selectValues == 0){
                    var msg = "Eselon IV :<br><select name=\"id_eselon_4\" disabled><option value=\"0\">Pilih Eselon III Dahulu</option></select>";
                    $('#eselon4').html(msg);
                }else{
                    var id_eselon_3 = {id_eselon_3:$("#id_eselon_3").val()};
                    $('#id_eselon_4').attr("disabled",true);
                    $.ajax({
                            type: "POST",
                            url : "<?php echo site_url('chain/select_eselon4')?>",
                            data: id_eselon_3,
                            success: function(msg){
                                $('#eselon4').html(msg);
                            }
                    });
                }
        }); 
 $(document).ready(function(){
		$("#addlowongan").validate({
			submitHandler: function() {
 				 
					post_data();
				
 			}
		});
	});
 	
	function post_data() {
		var action = '<?=site_url()?>/chain/insert_peg/'; 
 
		$.post(action, $("#addlowongan").serialize(), 
		
		function(data) {
	   		if(data.update == true ){
		   		//jika tambah data behasil
				$.fancybox({
                        'scrolling'     : 'no',
                        'content'       : data.message
                    });

  	   		}else{
		   		//jika tambah data gagal
				$.fancybox({
                        'scrolling'     : 'no',
                        'content'       : data.message
                    });

   	   		}
	 	}, "json");
	}
 			 

</script>

