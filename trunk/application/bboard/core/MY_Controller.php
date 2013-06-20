<?php

class MY_Controller extends CI_Controller{
	var $privilage_x;
	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler(false);
		
		// jika belum login
		if (is_login() == FALSE){
			redirect('auth');
		}
		
		// set privilage
		$this->set_privilage();
		
		// jika tidak diperbolehkan mengakses controller
		//$ctr = $this->uri->segment(1);
		if ($this->can_access($ctr) == FALSE){
			redirect('auth/failed');
		}
		
	}
	
	function open()
	{
		//$data = $this->_extract_data_session($_SESSION);
		$this->load->view('layouts/header');
		$this->load->view('layouts/menu', $data);
	}
	function close()
	{
		$this->load->view('layouts/footer');
	}
	
	function set_privilage_asli(){
		// cek user
		$row = $this->session->userdata('userlevel');
		# set privilage
		# init privilage
		//$privilage[''][0] = '';
		
		# ambil privilage dari users_level
		$this->db->flush_cache();
		$this->db->where('level_id', $row);
		$row_pri = $this->db->get('users_level')->row_array();
		
		$fields = $this->db->field_data('users_level');
		foreach($fields as $field){
			if (($field->name != 'level_id') and ($field->name != 'nama'))
			{
				$tmp_pri = str_split($row_pri[$field->name]);
				$privilage[$field->name][0] = $tmp_pri[0];
				$privilage[$field->name][1] = $tmp_pri[1];
				$privilage[$field->name][2] = $tmp_pri[2];
				$privilage[$field->name][3] = $tmp_pri[3];
				$privilage[$field->name][4] = $tmp_pri[4];
				 // echo 'Field : '.$field->name.'&nbsp;&nbsp;&nbsp;0.'.$tmp_pri[0].
												// '&nbsp;&nbsp;&nbsp;1.'.$tmp_pri[1].
												// '&nbsp;&nbsp;&nbsp;2.'.$tmp_pri[2].
												// '&nbsp;&nbsp;&nbsp;3.'.$tmp_pri[3].
												// '&nbsp;&nbsp;&nbsp;4.'.$tmp_pri[4].'<br/>';
			}
		}
		
		$this->privilage_x = $privilage;
	}
	
	function can_access($ctr='')
	{	
		$priv = $this->privilage_x;
		$form = $ctr;
		if($form){
			if($priv[$form][0] == 1){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return TRUE;
		}
	}
	
	function can_view()
	{
		$priv = $this->privilage_x;
		$form = $this->uri->segment(1);
		
		if($form){
			if($priv[$form][1] == 1){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return TRUE;
		}
	}
	
	function can_insert()
	{
		$priv = $this->privilage_x;
		$form = $this->uri->segment(1);
		
		if($form){
			if($priv[$form][2] == 1){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return TRUE;
		}
	}
	
	function can_update()
	{
		$priv = $this->privilage_x;
		$form = $this->uri->segment(1);
		
		if($form){
			if($priv[$form][3] == 1){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return TRUE;
		}
	}
	
	function can_delete()
	{
		$priv = $this->privilage_x;
		$form = $this->uri->segment(1);
		
		if($form){
			if($priv[$form][4] == 1){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return TRUE;
		}
	}
	//abah tambahan function
}