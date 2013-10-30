<!-- contenna -->
<script>
    $(document).ready(function(){
        $("#KODE_INDUKUPT").change(function(){
            var KODE_INDUKUPT = $("#KODE_INDUKUPT").val();
            $.ajax({
               type : "POST",
               url  : "<?=base_url().$this->config->item('index_page');?>/peserta/getUpt",
               data : "KODE_INDUKUPT=" + KODE_INDUKUPT,
               success: function(data){
                   $("#KODE_UPT").html(data);
               }
            });
        });
		
		$("#KODE_UPT").change(function(){
            var KODE_UPT = $("#KODE_UPT").val();
            $.ajax({
               type : "POST",
               url  : "<?=base_url().$this->config->item('index_page');?>/peserta/getDiklat",
               data : "KODE_UPT=" + KODE_UPT,
               success: function(data){
                   $("#KODE_DIKLAT").html(data);
               }
            });
        });
		
    });
</script>


<div class="wrap_right bgcontent">
	<h1 class="heading">Upload Data Peserta</h1>
	<hr/>
	<?=form_open_multipart('peserta/proses_upload', array('class'=>'sform'))?>
	<fieldset>
		<ol>						
			<li>
				<label for="">INDUK UPT<em>*</em></label>
				<select name="KODE_INDUKUPT" id="KODE_INDUKUPT">
					<?=$this->mdl_satker->getOptionSatker()?>
				</select>
			</li>
			<li>
				<label for="">UPT<em>*</em></label>
				<select name="KODE_UPT" id="KODE_UPT">
					<?=$this->mdl_satker->getOptionUPTChild()?>
				</select>
			</li>
			<li><label for="">DIKLAT <em>*</em></label>
				<select name="KODE_DIKLAT" id="KODE_DIKLAT">
					<option value="">--Pilih--</option>        	
				</select>
			</li>
			<li><label for="">File Name <em>*</em></label> <input type="file" name="datafile"/></li>
			
			<div class="clearfix">&nbsp;</div>
			<hr/>
			<li><input class="greenbutton" type="submit" value="SUBMIT" style="float:right"/></li>
		</ol>
	</fieldset>
	<?=form_close()?>
</div><!-- end wrap right content-->