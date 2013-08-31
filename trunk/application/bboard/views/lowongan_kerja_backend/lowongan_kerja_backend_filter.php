<script type="text/javascript">
	$(document).ready(function() {
		    var makracode=document.getElementById('MAKRA_CODE').value;
			$.ajax({
				 type:'post',
				 url:'<?php echo site_url(); ?>/lowongan_kerja/get_mahli',
				 data:'MAKRA_CODE='+makracode,
				 success:function(data){
					   //do something if you want to with returned data
					   $("#AHLI_CODE").html(data);
					   var mahlicode=document.getElementById('AHLI_CODE').value;
						$.ajax({
								type: 'POST',
								url:'<?php echo site_url();?>/lowongan_kerja_backend/filter_mahli/',
								data: 'MAHLI_CODE=' + mahlicode,
								success: function(data) {
									$('#list_data').html(data);
								}

							});
					   
				 }
			 });
		
				
		 $("#MAKRA_CODE").change(function() {
			var makracode=$(this).val();
			$.ajax({
				 type:'post',
				 url:'<?php echo site_url(); ?>/lowongan_kerja/get_mahli',
				 data:'MAKRA_CODE='+makracode,
				 success:function(data){
					   //do something if you want to with returned data
					   $("#AHLI_CODE").html(data);
					   
						var mahlicode=document.getElementById('AHLI_CODE').value;
						$.ajax({
								type: 'POST',
								url:'<?php echo site_url();?>/lowongan_kerja_backend/filter_mahli/',
								data: 'MAHLI_CODE=' + mahlicode,
								success: function(data) {
									$('#list_data').html(data);
								}

							});
					   
				 }
			 });    
			 
		});
		
		
		var mahlicode=document.getElementById('AHLI_CODE').value;
		$.ajax({
				type: 'POST',
				url:'<?php echo site_url();?>/lowongan_kerja_backend/filter_mahli/',
				data: 'MAHLI_CODE=' + mahlicode,
				success: function(data) {
					$('#list_data').html(data);
				}
				

			});
		
		          
		$("p.pagination a").click(function() {
				$.ajax({
				  type: "GET",
				  url: $(this).attr('href'),
				  success: function(html){
					$("#list_data").html(html);
				  }
				});               
				return false;
			  }); 
		
		
		
    }); 
	
	ajax_paging = function(){
			
			$("p.pagination a").click(function() {
					
				var mahlicode=document.getElementById('AHLI_CODE').value;
				   $.ajax({
					 type: "POST",
					 url: $(this).get(),
					 data: 'MAHLI_CODE=' + mahlicode,
					 success: function(html){
							$("#list_data").html(html);
					  }
				   });               
             });    		
			return false;
		};
	
		function search_lowongan(){
		
			$.ajax({
					type: 'POST',
					url:'<?php echo site_url();?>/lowongan_kerja_backend/filter_all',
					data: $('#lowongan_kerja').serialize(),
					success: function(data) {
						$('#list_data').html(data);
					}

				});
		}
		
	
	
</script>	

<div class="wrap_right bgcontent">
	<h1 class="heading">Data Lowongan Kerja</h1>
	<hr/>
	<?=form_open('lowongan_kerja_backend/search', array('class'=>'sform','id'=>'lowongan_kerja'))?>
	<a href="<?=base_url().$this->config->item('index_page').'/lowongan_kerja_backend/add'?>" class="control"><span class="add">Tambah Data</span></a>
	<fieldset>
	<ol>
			<li>
				MAKRA &nbsp; 
				<?php 
				
					$opti['name'] = 'MAKRA';
					$opti['value'] = set_value('MAKRA_CODE');
					$opti['id'] = 'MAKRA_CODE';
					echo $this->lowongan_kerja->get_group_makra($opti); 
				?>
				 &nbsp; &nbsp; -  &nbsp; &nbsp;

				AHLI &nbsp; &nbsp;
				<select name="AHLI_CODE" id="AHLI_CODE">
					<option value="0">Pilihan Kosong</option>
				</select>
				 &nbsp; &nbsp; -  &nbsp; &nbsp;
				
			
				NAMA LOWONGAN &nbsp; <input type="text" name="search" id="search" value=""/>
				<a href="#" class="control" onClick="search_lowongan();">Cari</a>
				
			</li>
	</ol>		
	</fieldset>
	<div id="list_data">
	
	</div>
	
		
	
</div>
