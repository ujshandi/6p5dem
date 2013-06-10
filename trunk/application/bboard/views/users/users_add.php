<script type="text/javascript">
	
	function batal(){
		document.location.href = '<?=base_url().'index.php/users'?>';
	}
	
</script>

<section class="grid_8">
	<div class="block-border">
		<?php
			$attributes = array('name' => 'form1', 'id' => 'form1', 'class'=>'block-content form');
			echo form_open('users/insert', $attributes);
		?>
			<h1>Tambah Data User</h1>
			
			<fieldset class="grey-bg">
				
		<div class="columns">										<p class="colx2-left">						<label for="complex-en-url">NIP :</label>						<span class="relative">							<input type="text" name="nip" id="nip" value="<?=set_value('nip')?>" class="duapertiga-width">							<?=form_error('nip')?>						</span>					</p>					
					<p class="colx2-left">
						<label for="complex-en-url">User Name :</label>
						<span class="relative">
							<input type="text" name="username" id="username" value="<?=set_value('username')?>" class="duapertiga-width">
							<?=form_error('username')?>
						</span>
					</p>
					<p class="colx2-right">
						<label for="complex-en-url">Password :</label>
						<span class="relative">
							<input type="password" name="password" id="password" value="<?=set_value('password')?>" class="duapertiga-width">
							<?=form_error('password')?>
						</span>
					</p>
				</div>
		<div class="columns">
					<p class="colx2-left">
						<label for="complex-en-url">Nama Lengkap :</label>
						<span class="relative">
							<input type="text" name="name" id="name" value="<?=set_value('name')?>" class="duapertiga-width">
							<?=form_error('name')?>
						</span>
					</p>
					<p class="colx2-right">
						<label for="complex-en-url">User Group :</label>
						<span class="relative">
							<select name="user_group_id" id="user_group_id"class="duapertiga-width">
							<?php
								$query = $this->db->get('USER_GROUP');
								if($query->num_rows() > 0)
								{
									foreach($query->result() as $row)
									{
										echo '<option value="'.$row->USER_GROUP_ID.'">'.$row->USER_GROUP_NAME.'</option>';
									}
								}
							?>
							</select>
						</span>
					</p>
				</div>
				<div class="columns">
					<p class="colx2-left">						<label for="complex-en-url">Departemen :</label>						<span class="relative">							<input type="text" name="departemen" id="departemen" value="<?=set_value('departemen')?>" class="duapertiga-width">							<?=form_error('departemen')?>						</span>					</p>					<p class="colx2-right">						<label for="complex-en-url">Posisi :</label>						<span class="relative">							<input type="posisi" name="posisi" id="posisi" value="<?=set_value('posisi')?>" class="duapertiga-width">							<?=form_error('posisi')?>						</span>					</p>					<p class="colx2-right">						<label for="complex-en-url">Deskripsi :</label>						<span class="relative">							<input type="deskripsi" name="deskripsi" id="deskripsi" value="<?=set_value('deskripsi')?>" class="duapertiga-width">							<?=form_error('deskripsi')?>						</span>					</p>
				</div>
			</fieldset>
				
			<div id="tab-settings" class="tabs-content">
					<button type="submit"><img src="<?=base_url()?>asset/admin/images/icons/fugue/tick-circle.png" width="16" height="16"> Simpan</button>
					<button type="button" onclick="javascript:batal();" class="red">Batal</button> 	
			</div>
			
		</form>
	</div>
</section>