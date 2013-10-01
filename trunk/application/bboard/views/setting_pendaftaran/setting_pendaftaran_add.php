<script>
var counter=0;
$(function() {
$( "#PERIODE_AKHIR" ).datepicker({dateFormat : 'dd-mm-yy'});
$( "#PERIODE_AWAL" ).datepicker({dateFormat : 'dd-mm-yy'});
});

function add_upt(){
	counter = counter+1;
	bodyid = document.getElementById('list_forms');
	v_kodeupt = document.getElementById('KODE_UPT').value;
	v_periodeawal = document.getElementById('PERIODE_AWAL').value;
	v_periodeakhir = document.getElementById('PERIODE_AKHIR').value;
	
	newInput_upt = document.createElement('input');
	newInput_pawal = document.createElement('input');
	newInput_pakhir = document.createElement('input');
	newInput_bdel = document.createElement('a');
	
	
	newInput_tr = document.createElement('tr');
	newInput_td1 = document.createElement('td');
	newInput_td2 = document.createElement('td');
	newInput_td3 = document.createElement('td');
	newInput_td4 = document.createElement('td');
		
	newInput_upt.setAttribute('name', 'value_upt[]');
	newInput_upt.setAttribute('type', 'text');
	newInput_upt.setAttribute('value', v_kodeupt);
	newInput_upt.setAttribute('id', 'value_upt' + counter);
	
	newInput_pawal.setAttribute('name', 'periode_awal[]');
	newInput_pawal.setAttribute('type', 'text');
	newInput_pawal.setAttribute('value', v_periodeawal);
	newInput_pawal.setAttribute('id', 'periode_awal' + counter);
	
	newInput_pakhir.setAttribute('name', 'periode_akhir[]');
	newInput_pakhir.setAttribute('type', 'text');
	newInput_pakhir.setAttribute('value', v_periodeakhir);
	newInput_pakhir.setAttribute('id', 'periode_akhir' + counter);

	newInput_bdel.setAttribute('href', 'javascript:void(0)');
	newInput_bdel.setAttribute('id', 'batal' + counter);
	newInput_bdel.setAttribute('class', 'delete');
	newInput_bdel.setAttribute('onclick', 'remove_elemen(' + counter + ')');
	newInput_bdel.innerHTML="batal";
	
	newInput_td1.appendChild(newInput_upt);
	newInput_td2.appendChild(newInput_pawal);
	newInput_td3.appendChild(newInput_pakhir);
	newInput_td4.appendChild(newInput_bdel);
	
	newInput_tr.appendChild(newInput_td1);
	newInput_tr.appendChild(newInput_td2);
	newInput_tr.appendChild(newInput_td3);
	/*newInput_tr.appendChild(newInput_td4); */
	
	
	bodyid.appendChild(newInput_tr);
	
}

function remove_elemen(numb){
	bodyid = document.getElementById('list_forms');
	newP = document.getElementsByTagName('tr');
	child=bodyid.children[numb-1];
	bodyid.removeChild(child);
}
/*
$(document).ready(function() {
$('#setting_pendaftaran').submit(function() { 
	$.ajax({
		type: 'POST',
		url: "<?=base_url().'index.php/setting_pendaftaran/proses_add'?>",
		data: $('#setting_pendaftaran').serialize(),
		success: function(data) {
			
		}
	});
	return false;		
}); 
});*/
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

<div class="wrap_right bgcontent">
	<h1 class="heading">Setting Pendaftaran Taruna</h1>
	<hr/>
	<?=form_open('setting_pendaftaran/proses_add', array('class'=>'sform','id'=>'setting_pendaftaran'))?>
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
			<li>
				<label for="">UPT<em>*</em></label>
				<select name="KODE_UPT" id="KODE_UPT">
					<?=$this->mdl_satker->getOptionUPTChild(array('value'=>$kode_upt))?>
				</select>
			</li>
			
			<li><label for="">PERIODE AWAL<em>*</em></label> <input name="PERIODE_AWAL" value="<?=set_value('PERIODE_AWAL')?>" type="text" class="one" id="PERIODE_AWAL"/></li>
			<li><label for="">PERIODE AKHIR<em>*</em></label> <input name="PERIODE_AKHIR" value="<?=set_value('PERIODE_AKHIR')?>" type="text" class="one" id="PERIODE_AKHIR"/></li>
			<li><a href="javascript:void(0);" onclick="add_upt()" class="control">Tambah UPT</a></li>
			<div class="clearfix">&nbsp;</div>
			
			<table width="100%">
		    <thead>
				<th width="18%">UPT</th>
				<th width="12%">Periode Awal</th>
				<th width="12%">Periode Akhir</th>
				<th width="5%">Batal</th>
				
		    </thead>
			<tbody id="list_forms">
			 </tbody>
		</table>
		<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	
</div><!-- end wrap right content-->