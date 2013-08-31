<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kerjasama extends MY_Frontpage
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('mdl_kerjasama', 'kerjasama');
	}

	function index()
	{
		$this->open();
		$data['results'] = $this->kerjasama->getItem();
		$this->load->view('kerjasama/kerjasama_list', $data);
		$this->close();
	}
	
	function get_mahli(){
		$makracode=$this->input->post('MAKRA_CODE');
		$data['result']=$this->kerjasama->get_mahli_data($makracode);
		$this->load->view('kerjasama/mahli_data', $data);
	}
	
	function get_lowongan(){
		$ahlicode=$this->input->post('AHLI_CODE');
		//$makracode=$this->input->post('MAKRA_CODE');
		$data['result']=$this->kerjasama->get_lowongan_data($ahlicode);
		$this->load->view('kerjasama/kerjasama_view', $data);
	}
	
	function search(){
		
		$lowongancode=$this->input->post('LOWONGAN_CODE');
		$ahlicode=$this->input->post('AHLI_CODE');
		
		//$data['result']=$this->kerjasama->search_lowongan($ahlicode, $lowongancode);
		$data['result_md']=$this->kerjasama->search_lowongan_md($ahlicode, $lowongancode);
		$data['result_ml']=$this->kerjasama->search_lowongan_ml($ahlicode, $lowongancode);
		$data['result_mu']=$this->kerjasama->search_lowongan_mu($ahlicode, $lowongancode);
		$data['result_mka']=$this->kerjasama->search_lowongan_mka($ahlicode, $lowongancode);
		$this->load->view('kerjasama/kerjasama_view', $data);
		
	}
	
	function kerjasama_detail(){
		$this->open();
		
		$lowongancode = $this->uri->segment(3);
		$data['result']=$this->kerjasama->search_lowongan_detail($lowongancode);
		
		$this->load->view('kerjasama/kerjasama_detail', $data);
		$this->close();
	}
	
	
	
	
	
	
}

/* End of file kerjasama.php */
/* Location: ./application/controllers/kerjasama.php */