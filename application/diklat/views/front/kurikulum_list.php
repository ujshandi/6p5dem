<!-- contenna -->
<div class="wrap_right bgcontent">
	<h1 class="heading">Kurikulum</h1>
	<hr/>
	<?=form_open('front/kurikulum')?>
		<select name="KODE_UPT">
			<?				
				$opt['value'] = isset($KODE_UPT)?$KODE_UPT:$this->input->post('KODE_UPT');
				echo $this->mdl_satker->getOptionUPTChild($opt)
			?>
		</select>	
		<br>
		<input type="submit" value="Proses" class="control">
	<?=form_close()?>
	<?if($opt['value'] != ""){?>
		<br>
		<table width="100%" border="0" cellspacing="2" cellpadding="2">
			<?
				$r_prog = $this->mdl_kurikulum->getProgram($opt['value']);
				if($r_prog->num_rows() > 0){
					$ip = 1;
					foreach($r_prog->result() as $prog){
						echo 	'<tr>
									<td width="1%" align="left" valign="top"><b>'.$ip.'</b></td>
									<td colspan="2" align="left" valign="top"><b>'.$prog->NAMA_PROGRAM.'</b></td>
								</tr>';
						$r_dik = $this->mdl_kurikulum->getDiklat($prog->KODE_PROGRAM, $opt['value']);
						
						$id = 1;
						foreach($r_dik->result() as $dik){
							echo 	'<tr>
										<td align="left" valign="top"></td>
										<td width="1%" align="left" valign="top">'.$id.'</td>
										<td width="98%" align="left" valign="top"><a href="'.base_url().$this->config->item('index_page').'/front/kurikulum_detail/'.$dik->KODE_DIKLAT.'/'.$opt['value'].'">'.$dik->NAMA_DIKLAT.'</a></td>
									</tr>';
							$id++;
						}
						
						$ip++;
					}
				}
			?>
		</table>
	<?}?>
	<div class="clear">&nbsp;</div>
</div><!-- end wrap right content-->