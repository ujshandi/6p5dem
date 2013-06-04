<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengumuman extends CI_Controller
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
}

/* End of file pengumuman.php */
/* Location: ./application/controllers/pengumuman.php */