<?php
	#
	include('convert_rupiah.php');
	
	# memasukan detail barang ke list detail di form add barang
	function add_detail_1() // pas add
	{	 		$data['detail_parent'] 		= $_POST['detail_parent'];
		$data['detail_akunid'] 		= $_POST['detail_akunid'];
		$data['detail_nakun'] 		= $_POST['detail_nakun'];		$data['detail_plafon'] 		= $_POST['detail_plafon'];		$data['detail_realisasi'] 	= $_POST['detail_realisasi'];		$data['detail_sisa'] 		= $_POST['detail_sisa']; 		$data['detail_kredit'] 		= $_POST['detail_kredit']; 
		$data['detail_jumlah']	 	= $_POST['detail_jumlah'];		$data['detail_count']	 	= $_POST['detail_count'];
		
		$i=0;
		//print_r($detail);
		
		if (isset($_POST['detail']))
		{
			$detail = $_POST['detail'];
			$count_detail = count($detail);
		
			for($i=0; $i<$count_detail; $i++)
			{
				echo '						<tr>							<td>'.($i + 1).'</td>														<td>								'.$detail[$i]['parent'].'								<input type="hidden" name="detail['.$i.'][parent]" value="'.$detail[$i]['parent'].'" />							</td>														<td>								'.$detail[$i]['akunid'].'								<input type="hidden" name="detail['.$i.'][akunid]" value="'.$detail[$i]['akunid'].'" />							</td>							<td>								'.$detail[$i]['nakun'].'								<input type="hidden" name="detail['.$i.'][nakun]" value="'.$detail[$i]['nakun'].'" />							</td>							<td>								'.$detail[$i]['plafon'].'								<input type="hidden" name="detail['.$i.'][plafon]" value="'.$detail[$i]['plafon'].'" />							</td>							<td>								'.$detail[$i]['realisasi'].'								<input type="hidden" name="detail['.$i.'][realisasi]" value="'.$detail[$i]['realisasi'].'" />							</td>							<td>								'.$detail[$i]['sisa'].'								<input type="hidden" name="detail['.$i.'][sisa]" value="'.$detail[$i]['sisa'].'" />							</td>							<td>								'.$detail[$i]['kredit'].'								<input type="hidden" name="detail['.$i.'][kredit]" value="'.$detail[$i]['kredit'].'"  />							</td>							<td align="right">								'.convert_rupiah($detail[$i]['jumlah']).'								<input type="hidden" name="detail['.$i.'][jumlah]" value="'.$detail[$i]['jumlah'].'" />							</td>														<td>								<input type="text" name="detail['.$i.'][ket_transaksi]" value="" />							</td>						</tr>';
			}
		}
		
		$xx=0;
		for($xx=0; $xx < $data['detail_count']; $xx++){
			echo '
						<tr>							<td>'.($i + 1).'</td>							<td>								'.$data['detail_parent'].'								<input type="hidden" name="detail['.$i.'][parent]" value="'.$data['detail_parent'].'" />							</td>							<td>								'.$data['detail_akunid'].'								<input type="hidden" name="detail['.$i.'][akunid]" value="'.$data['detail_akunid'].'" />							</td>							<td>								'.$data['detail_nakun'].'								<input type="hidden" name="detail['.$i.'][nakun]" value="'.$data['detail_nakun'].'" />							</td>							<td>								'.$data['detail_plafon'].'								<input type="hidden" name="detail['.$i.'][plafon]" value="'.$data['detail_plafon'].'" />							</td>							<td>								'.$data['detail_realisasi'].'								<input type="hidden" name="detail['.$i.'][realisasi]" value="'.$data['detail_realisasi'].'" />							</td>							<td>								'.$data['detail_sisa'].'								<input type="hidden" name="detail['.$i.'][sisa]" value="'.$data['detail_sisa'].'" />							</td>														<td>								'.$data['detail_kredit'].'								<input type="hidden" name="detail['.$i.'][kredit]" value="'.$data['detail_kredit'].'" />							</td>							<td align="right">								'.convert_rupiah($data['detail_jumlah']).'								<input type="hidden" name="detail['.$i.'][jumlah]" value="'.$data['detail_jumlah'].'" />							</td>							<td>								<input type="text" name="detail['.$i.'][ket_transaksi]" value="" />							</td>						</tr>';
			$i++;
		}
	}

	function add_detail_2() // pas edit
	{
		$data['detail_akunid'] 		= $_POST['detail_akunid'];		$data['detail_nakun'] 		= $_POST['detail_nakun'];		$data['detail_jumlah']	 	= $_POST['detail_jumlah'];		$data['detail_count']	 	= $_POST['detail_count'];
		
		$i=0;
		
		
		if (isset($_POST['detail']))
		{
			$detail = $_POST['detail'];
			$count_detail = count($detail);
		
			for($i=0; $i<$count_detail; $i++)
			{
				echo '
						<tr>							<td>'.($i + 1).'</td>							<td>								'.$data['detail_akunid'].'								<input type="hidden" name="detail['.$i.'][akunid]" value="'.$data['detail_akunid'].'" />							</td>														<td>								'.$data['detail_nakun'].'								<input type="hidden" name="detail['.$i.'][nakun]" value="'.$data['detail_nakun'].'" />							</td>															<td>								'.convert_rupiah($data['detail_jumlah']).'								<input type="hidden" name="detail['.$i.'][jumlah]" value="'.$data['detail_jumlah'].'" />							</td>														<td>								<input type="text" name="detail['.$i.'][ket_transaksi]" value="" />							</td>						</tr>';
			}
		}
		
		
		$xx=0;
		for($xx=0; $xx < $data['detail_count']; $xx++){
			echo '
						<tr>							<td>'.($i + 1).'</td>														<td>								'.$data['detail_akunid'].'								<input type="hidden" name="detail['.$i.'][akunid]" value="'.$data['detail_akunid'].'" />							</td>																					<td>								'.$data['detail_nakun'].'								<input type="hidden" name="detail['.$i.'][nakun]" value="'.$data['detail_nakun'].'" />							</td>																						<td>								'.convert_rupiah($data['detail_jumlah']).'								<input type="hidden" name="detail['.$i.'][jumlah]" value="'.$data['detail_jumlah'].'" />							</td>							<td>								<input type="text" name="detail['.$i.'][ket_transaksi]" value="" />							</td>						</tr>';
			$i++;
		}
	}
	
	function remove_detail($id)
	{
		if (isset($_POST['detail']))
		{
			$detail = $_POST['detail'];
			$count_detail = count($detail);
			
			for($x=0; $x<$count_detail; $x++)			{				if($id != $x){					echo '							<tr>								<td>'.($i + 1).'</td>																<td>									'.$detail[$i]['detail_akunid'].'									<input type="hidden" name="detail['.$i.'][akunid]" value="'.$detail[$i]['detail_akunid'].'" />								</td>																<td>									'.$detail[$i]['detail_nakun'].'									<input type="hidden" name="detail['.$i.'][nakun]" value="'.$detail[$i]['detail_nakun'].'" />								</td>								<td>									'.convert_rupiah($detail[$i]['jumlah']).'									<input type="hidden" name="detail['.$i.'][jumlah]" value="'.$detail[$i]['detail_jumlah'].'" />								</td>																<td>								<input type="text" name="detail['.$i.'][ket_transaksi]" value="" />							</td>								<td align="center">									<a href="Javascript:remove_detail('.$i.')">Batal</a>								</td>																							</tr>';					$i++;				}			}
		}
	}
	
	$command = $_GET['command'];
		
	if($command == 'add_1')
	{	 		echo "<script type='text/javascript'>	alert(' asd ');</script>";
		//add_detail_1();
	
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