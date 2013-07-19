<script type="text/javascript">
	$(document).ready(function() {
		param_url='<?php echo site_url();?>/users/getall/';
		$('#list_data').load(param_url);
		
		$(function (){
			$('#txt_search').change(function (){
			  var txt_search = $("#txt_search").val();
			  param_url='<?php echo site_url();?>/users/proses_pencarian/';
			  $.ajax({
					type: 'POST',
					url :  param_url,
					data: 'txt_search=' + txt_search,
					success: function(data) {
						$('#list_data').html(data);
					}
				});
			});
		});
		
	});
	
	function ajaxpaging(param_url){
		var txt_search=document.getElementById('txt_search').value;
		if (param_url== null ){
			param_url='<?php echo site_url();?>/users/proses_pencarian/';
		}
		$.ajax({
				type: 'POST',
				url :  param_url,
				data: 'txt_search=' + txt_search,
				success: function(data) {
					$('#list_data').html(data);
				}
			});
	}
</script>
<div class="wrap_right bgcontent">
	<h1 class="heading">Data Users</h1>
	<input type="text" name="txt_search" id="txt_search" value="<?=$this->session->userdata('keysearch_users'); ?>"/><!--<input type="button" onClick="ajaxpaging()" value="Cari">-->
	&nbsp; <a href="#" onClick="ajaxpaging()" class="control">&nbsp; &nbsp; Cari &nbsp; &nbsp; </a>
	<hr/>
	
	<a href="<?=base_url().$this->config->item('index_page').'/users/add'?>" class="control"><span class="add">Tambah Data</span></a>
	
	
	<div id="list_data"></div>
	
</div>
