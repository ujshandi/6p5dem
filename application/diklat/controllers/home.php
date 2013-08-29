<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends My_Controller {
	
	function __construct(){
		parent::__construct();
		//$this->load->model('mdl_golongan');
	}
	
	public function test(){
		echo 'test';
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/home/index/';
		$this->load->view('home');
		
		
		$this->close();
	}
	
	function generateuser(){
		$this->db->flush_cache();
		$this->db->select('KODE_UPT, NAMA_UPT');
		$this->db->from('DIKLAT_MST_UPT');
		
		$res = $this->db->get();
		$out = '';
		foreach($res->result() as $r){
			$out .= 'INSERT INTO USERS ("USER_GROUP_ID", "NAME", "USERNAME", "PASSWORD", "NIP", "EMAIL", "STAT")';
			$out .= ' VALUES ';
			$out .= " ('1', '".$r->NAMA_UPT."', '".$r->KODE_UPT."', '".md5('bpsdm')."', '1111', 'xxx@xxx.com', 'A'); ";
			$out .= "\n";
		}
		
		echo '<textarea name="xx">'.$out.'</textarea>';
	}
	
}
?>