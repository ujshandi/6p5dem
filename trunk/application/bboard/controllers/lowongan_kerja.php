<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lowongan_kerja extends MY_Frontpage
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('mdl_lowongan_kerja', 'lowongan_kerja');
	}

	function index()
	{
		$this->open();
		//$data['results'] = $this->lowongan_kerja->getItem();
		$this->load->view('lowongan_kerja/lowongan_kerja_search');
		$this->close();
	}
	
	function get_mahli(){
		$makracode=$this->input->post('MAKRA_CODE');
		$data['result']=$this->lowongan_kerja->get_mahli_data($makracode);
		$this->load->view('lowongan_kerja/mahli_data', $data);
	}
	
	function get_lowongan(){
		$ahlicode=$this->input->post('AHLI_CODE');
		//$makracode=$this->input->post('MAKRA_CODE');
		$data['result']=$this->lowongan_kerja->get_lowongan_data($ahlicode);
		$this->load->view('lowongan_kerja/lowongan_kerja_view', $data);
	}
	
	function search(){
		
		$lowongancode=$this->input->post('LOWONGAN_CODE');
		$ahlicode=$this->input->post('AHLI_CODE');
		
		//$data['result']=$this->lowongan_kerja->search_lowongan($ahlicode, $lowongancode);
		$data['result_md']=$this->lowongan_kerja->search_lowongan_md($ahlicode, $lowongancode);
		$data['result_ml']=$this->lowongan_kerja->search_lowongan_ml($ahlicode, $lowongancode);
		$data['result_mu']=$this->lowongan_kerja->search_lowongan_mu($ahlicode, $lowongancode);
		$data['result_mka']=$this->lowongan_kerja->search_lowongan_mka($ahlicode, $lowongancode);
		$this->load->view('lowongan_kerja/lowongan_kerja_view', $data);
		
	}
	
	function lowongan_kerja_detail(){
		$this->open();
		
		$lowongancode = $this->uri->segment(3);
		$data['result']=$this->lowongan_kerja->search_lowongan_detail($lowongancode);
		
		$this->load->view('lowongan_kerja/lowongan_kerja_detail', $data);
		$this->close();
	}
	
	
	
	
	
	
}

/* End of file lowongan_kerja.php */
/* Location: ./application/controllers/lowongan_kerja.php */