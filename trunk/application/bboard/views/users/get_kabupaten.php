<script type="text/javascript">	var url='<?php echo site_url();?>/users/';	$(document).ready(function() {			$("#INDUK_UPT").change(function() {			var induk_upt = $("#INDUK_UPT").val();			var var_level_id = $("#var_level_id").val();						if (var_level_id=='3'){				$.ajax({					 type:'post',					 url:url + 'get_upt',					 data:'induk_upt=' +induk_upt,					 success:function(data){						   $("#tampil_upt").html(data);					 }				 });    			}		});	});</script><label for="">KABUPATEN </label>	<select name="KODEKABUP" id="KODEKABUP">				<option value="0">Pilihan Kosong</option>			<?php 		foreach($results->result()  as $r){			echo '<option value="'.$r->KODEKABUP.'">'.$r->NAMAKABUP.'</option>';	}		?>	</select>