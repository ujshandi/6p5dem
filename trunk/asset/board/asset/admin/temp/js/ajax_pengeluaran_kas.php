<?php
	#
	include('convert_rupiah.php');
	
	# memasukan detail barang ke list detail di form add barang
	function add_detail_1() // pas add
	{
		$data['detail_akunid'] 		= $_POST['detail_akunid'];
		$data['detail_nakun'] 		= $_POST['detail_nakun'];
		$data['detail_jumlah']	 	= $_POST['detail_jumlah'];
		
		$i=0;
		//print_r($detail);
		
		if (isset($_POST['detail']))
		{
			$detail = $_POST['detail'];
			$count_detail = count($detail);
		
			for($i=0; $i<$count_detail; $i++)
			{
				echo '
			}
		}
		
		$xx=0;
		for($xx=0; $xx < $data['detail_count']; $xx++){
			echo '
						<tr>
			$i++;
		}
	}

	function add_detail_2() // pas edit
	{
		$data['detail_akunid'] 		= $_POST['detail_akunid'];
		
		$i=0;
		
		
		if (isset($_POST['detail']))
		{
			$detail = $_POST['detail'];
			$count_detail = count($detail);
		
			for($i=0; $i<$count_detail; $i++)
			{
				echo '
						<tr>
			}
		}
		
		
		$xx=0;
		for($xx=0; $xx < $data['detail_count']; $xx++){
			echo '
						<tr>
			$i++;
		}
	}
	
	function remove_detail($id)
	{
		if (isset($_POST['detail']))
		{
			$detail = $_POST['detail'];
			$count_detail = count($detail);
			
			for($x=0; $x<$count_detail; $x++)
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