<?php
	#
	include('convert_rupiah.php');
	
	# memasukan detail barang ke list detail di form add barang
	function add_detail_1() // pas add
	{
		$data['detail_idbarang'] 		= $_POST['detail_idbarang'];
		$data['detail_namabarang'] 		= $_POST['detail_namabarang'];		$data['detail_qty'] 			= $_POST['detail_qty'];		/*
		$data['detail_harga']	 		= $_POST['detail_harga'];
		$data['detail_harga_toko'] 		= $_POST['detail_harga_toko'];
		$data['detail_harga_partai'] 	= $_POST['detail_harga_partai'];
		$data['detail_harga_cabang'] 	= $_POST['detail_harga_cabang'];
		
		$data['detail_jatuh_tempo'] 	= $_POST['detail_jatuh_tempo'];
		$data['detail_total'] 			= $data['detail_harga']; //* $data['detail_qty'];*/
		
		$i=0;
		
		//print_r($detail);
		
		if (isset($_POST['detail']))
		{
			$detail = $_POST['detail'];
			$count_detail = count($detail);
		
			for($i=0; $i<$count_detail; $i++)
			{
				echo '
						<tr>
							<td>'.($i + 1).'</td>
							<td>
								'.$detail[$i]['nama_barang'].'
								<input type="hidden" name="detail['.$i.'][nama_barang]" value="'.$detail[$i]['nama_barang'].'" />
								<input type="hidden" name="detail['.$i.'][id_barang]" value="'.$detail[$i]['id_barang'].'" />
							</td>
							<td>
								'.convert_rupiah($detail[$i]['harga']).'
								<input type="hidden" name="detail['.$i.'][harga]" value="'.$detail[$i]['harga'].'" />
								<input type="hidden" name="detail['.$i.'][total]" value="'.$detail[$i]['total'].'" />
							</td>
							<td>
								'.convert_rupiah($detail[$i]['harga_toko']).'
								<input type="hidden" name="detail['.$i.'][harga_toko]" value="'.$detail[$i]['harga_toko'].'" />
							</td>
							<td>
								'.convert_rupiah($detail[$i]['harga_partai']).'
								<input type="hidden" name="detail['.$i.'][harga_partai]" value="'.$detail[$i]['harga_partai'].'" />
							</td>
							<td>
								'.convert_rupiah($detail[$i]['harga_cabang']).'
								<input type="hidden" name="detail['.$i.'][harga_cabang]" value="'.$detail[$i]['harga_cabang'].'" />
							</td>
							<td>
								<input class="tblInput" type="text" name="detail['.$i.'][sn]" value="'.$detail[$i]['sn'].'" />
							</td>
							<td>
								1
								<input type="hidden" name="detail['.$i.'][qty]" value="1" />
							</td>
							<td>
								'.$detail[$i]['jatuh_tempo'].'
								<input type="hidden" name="detail['.$i.'][jatuh_tempo]" value="'.$detail[$i]['jatuh_tempo'].'" />
							</td>
							<td align="center">
								<a href="Javascript:remove_detail('.$i.')">Batal</a>
							</td>
						</tr>';
			}
		}
		
		$xx=0;
		for($xx=0; $xx < $data['detail_qty']; $xx++){
			echo '
						<tr>
							<td>'.($i + 1).'</td>
							<td>
								'.$data['detail_namabarang'].'
								<input type="hidden" name="detail['.$i.'][nama_barang]" value="'.$data['detail_namabarang'].'" />
								<input type="hidden" name="detail['.$i.'][id_barang]" value="'.$data['detail_idbarang'].'" />
							</td>
							<td>
								'.convert_rupiah($data['detail_harga']).'
								<input type="hidden" name="detail['.$i.'][harga]" value="'.$data['detail_harga'].'" />
								<input type="hidden" name="detail['.$i.'][total]" value="'.$data['detail_total'].'" />
							</td>
							<td>
								'.convert_rupiah($data['detail_harga_toko']).'
								<input type="hidden" name="detail['.$i.'][harga_toko]" value="'.$data['detail_harga_toko'].'" />
							</td>
							<td>
								'.convert_rupiah($data['detail_harga_partai']).'
								<input type="hidden" name="detail['.$i.'][harga_partai]" value="'.$data['detail_harga_partai'].'" />
							</td>
							<td>
								'.convert_rupiah($data['detail_harga_cabang']).'
								<input type="hidden" name="detail['.$i.'][harga_cabang]" value="'.$data['detail_harga_cabang'].'" />
							</td>
							<td>
								<input type="text" name="detail['.$i.'][sn]" value="" />
							</td>
							<td>
								1
								<input type="hidden" name="detail['.$i.'][qty]" value="1" />
							</td>
							<td>
								'.$data['detail_jatuh_tempo'].'
								<input type="hidden" name="detail['.$i.'][jatuh_tempo]" value="'.$data['detail_jatuh_tempo'].'" />
							</td>
							<td align="center">
								<a href="Javascript:remove_detail('.$i.')">Batal</a>
							</td>
						</tr>';
			$i++;
		}
	}

	function add_detail_2() // pas edit
	{
		$data['detail_idbarang'] 	= $_POST['detail_idbarang'];
		$data['detail_namabarang'] 	= $_POST['detail_namabarang'];
		$data['detail_harga'] 		= $_POST['detail_harga'];
		$data['detail_qty'] 		= $_POST['detail_qty'];
		$data['detail_jatuh_tempo'] = $_POST['detail_jatuh_tempo'];
		$data['detail_total'] 		= $data['detail_harga']; //* $data['detail_qty'];
		
		$i=0;
		
		
		if (isset($_POST['detail']))
		{
			$detail = $_POST['detail'];
			$count_detail = count($detail);
		
			for($i=0; $i<$count_detail; $i++)
			{
				echo '
						<tr>
							<td>'.($i + 1).'</td>
							<td>
								'.$detail[$i]['nama_barang'].'
								<input type="hidden" name="detail['.$i.'][nama_barang]" value="'.$detail[$i]['nama_barang'].'" />
								<input type="hidden" name="detail['.$i.'][id_barang]" value="'.$detail[$i]['id_barang'].'" />
							</td>
							<td>
								'.convert_rupiah($detail[$i]['harga']).'
								<input type="hidden" name="detail['.$i.'][harga]" value="'.$detail[$i]['harga'].'" />
							</td>
							<td>
								<input type="text" name="detail['.$i.'][sn]" value="'.$detail[$i]['sn'].'" />
							</td>
							<td>
								1
								<input type="hidden" name="detail['.$i.'][qty]" value="1" />
							</td>
							<td>
								'.$detail[$i]['jatuh_tempo'].'
								<input type="hidden" name="detail['.$i.'][jatuh_tempo]" value="'.$detail[$i]['jatuh_tempo'].'" />
							</td>
							<td>
								'.convert_rupiah($detail[$i]['total']).'
								<input type="hidden" name="detail['.$i.'][total]" value="'.$detail[$i]['total'].'" />
							</td>
							<td align="center">
								<a href="Javascript:remove_detail('.$i.')">Batal</a>
							</td>
						</tr>';
			}
		}
		
		
		$xx=0;
		for($xx=0; $xx < $data['detail_qty']; $xx++){
			echo '
						<tr>
							<td>'.($i + 1).'</td>
							<td>
								'.$data['detail_namabarang'].'
								<input type="hidden" name="detail['.$i.'][nama_barang]" value="'.$data['detail_namabarang'].'" />
								<input type="hidden" name="detail['.$i.'][id_barang]" value="'.$data['detail_idbarang'].'" />
							</td>
							<td>
								'.convert_rupiah($data['detail_harga']).'
								<input type="hidden" name="detail['.$i.'][harga]" value="'.$data['detail_harga'].'" />
							</td>
							<td>
								<input type="text" name="detail['.$i.'][sn]" value="" />
							</td>
							<td>
								1
								<input type="hidden" name="detail['.$i.'][qty]" value="1" />
							</td>
							<td>
								'.$data['detail_jatuh_tempo'].'
								<input type="hidden" name="detail['.$i.'][jatuh_tempo]" value="'.$data['detail_jatuh_tempo'].'" />
							</td>
							<td>
								'.convert_rupiah($data['detail_total']).'
								<input type="hidden" name="detail['.$i.'][total]" value="'.$data['detail_total'].'" />
							</td>
							<td align="center">
								<a href="Javascript:remove_detail('.$i.')">Batal</a>
							</td>
						</tr>';
			$i++;
		}
	}
	
	function remove_detail($id)
	{
		if (isset($_POST['detail']))
		{
			$detail = $_POST['detail'];
			$count_detail = count($detail);
			
			$i=0;
			for($x=0; $x<$count_detail; $x++)
			{
				if($id != $x){
					echo '
							<tr>
								<td>'.($i + 1).'</td>
								<td>
									'.$detail[$i]['nama_barang'].'
									<input type="hidden" name="detail['.$i.'][nama_barang]" value="'.$detail[$i]['nama_barang'].'" />
									<input type="hidden" name="detail['.$i.'][id_barang]" value="'.$detail[$i]['id_barang'].'" />
								</td>
								<td>
									'.convert_rupiah($detail[$i]['harga']).'
									<input type="hidden" name="detail['.$i.'][harga]" value="'.$detail[$i]['harga'].'" />
									<input type="hidden" name="detail['.$i.'][total]" value="'.$detail[$i]['total'].'" />
								</td>
								<td>
									'.convert_rupiah($detail[$i]['harga_toko']).'
									<input type="hidden" name="detail['.$i.'][harga_toko]" value="'.$detail[$i]['harga_toko'].'" />
								</td>
								<td>
									'.convert_rupiah($detail[$i]['harga_partai']).'
									<input type="hidden" name="detail['.$i.'][harga_partai]" value="'.$detail[$i]['harga_partai'].'" />
								</td>
								<td>
									'.convert_rupiah($detail[$i]['harga_cabang']).'
									<input type="hidden" name="detail['.$i.'][harga_cabang]" value="'.$detail[$i]['harga_cabang'].'" />
								</td>
								<td>
									<input type="text" name="detail['.$i.'][sn]" value="'.$detail[$i]['sn'].'" />
								</td>
								<td>
									1
									<input type="hidden" name="detail['.$i.'][qty]" value="1" />
								</td>
								<td>
									'.$detail[$i]['jatuh_tempo'].'
									<input type="hidden" name="detail['.$i.'][jatuh_tempo]" value="'.$detail[$i]['jatuh_tempo'].'" />
								</td>
								<td align="center">
									<a href="Javascript:remove_detail('.$i.')">Batal</a>
								</td>
							</tr>';
					$i++;
				}
			}
		}
	}
	
	$command = $_GET['command'];
		
	if($command == 'add_1')
	{
		add_detail_1();
	
	}else if($command == 'add_2')
	{
		add_detail_2();
	
	}else if($command == 'remove')
	{
		$id = $_GET['id'];
		remove_detail($id);
		
	}else if($command == 'change_total')
	{
		echo convert_rupiah($_GET['total']);
	}
?>