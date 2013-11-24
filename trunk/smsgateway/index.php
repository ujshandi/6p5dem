<?php 
	/*include "menu2.php"; */
	include "layout/header.php";
	include "layout/menu.php";
	
	
	$menu=$_GET['m'];
	switch ($menu){
		case 'setting_gammurc':
			include('step1.php');
			break;
		case 'test_modem':
			include('step2.php');
			break;
		case 'install_db':
			include('step3.php');
			break;
		case 'set_smsdrc':
			include('step4.php');
			break;
		case 'create_service':
			include('step5.php');
			break;
		case 'start_service':
			include('step6.php');
			break;
		case 'stop_service':
			include('step9.php');
			break;
		case 'send_sms':
			include('step7.php');
			break;
		case 'receive_sms':
			include('step8.php');
			break;
		case 'contact_add':
			include('contact_add.php');
			break;
		case 'contact_list':
			include('contact_list.php');
			break;
		default:	
			include('layout/content.php');
	}
	
	include "layout/footer.php";
?>