<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengumuman extends MY_Frontpage
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('mdl_pengumuman', 'pengumuman');
	}

	function index()
	{
		$data['results'] = $this->pengumuman->getItem();
		$this->load->view('pengumuman/pengumuman_list', $data);
	}
	
	function detail(){
		$this->open();
		$id_pengumuman=$this->uri->segment(3);
		$data['results'] = $this->pengumuman->getItemById($id_pengumuman);
		$this->load->view('pengumuman/pengumuman_detail', $data);
		$this->close();
	}
	
	function get_pengumuman(){
		$this->load->view('pengumuman/get_pengumuman');
	}
}

/* End of file pengumuman.php */
/* Location: ./application/controllers/pengumuman.php */