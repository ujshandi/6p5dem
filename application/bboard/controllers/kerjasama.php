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
		
		
		/*
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/matra/index/';
		$config['total_rows'] = $this->db->count_all('KOPETEN_MATRA');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->kerjasama->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('matra/matra_list', $data);
		
		
		$this->close(); */
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
	
	public function add(){
		$this->open();
		$this->load->view('matra/matra_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		$data['KODEMATRA'] = $this->input->post('KODEMATRA');
		$data['NAMAMATRA'] = $this->input->post('NAMAMATRA');
		
		# set rules validation
		$this->form_validation->set_rules('KODEMATRA', 'Kode Bumn', 'required');
		$this->form_validation->set_rules('NAMAMATRA', 'Nama Bumn', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('matra/matra_add',$data);
		}else{
			$this->mdl_matra->insert($data);
			redirect('matra');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['KODEMATRA'] = $id;
		$data['result'] = $this->mdl_matra->getDataEdit($id);
		$this->load->view('matra/matra_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['KODEMATRA'] = $this->input->post('KODEMATRA');
		$data['NAMAMATRA'] = $this->input->post('NAMAMATRA');
		
		# set rules validation
		//$this->form_validation->set_rules('kode_induk', 'Kode Satker', 'required');
		$this->form_validation->set_rules('NAMAMATRA', 'Nama Matra', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('matra/matra_edit',$data);
		}else{
			$this->mdl_matra->update($data);
			redirect('matra');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_matra->delete($id)){
			redirect('matra');
		}else{
			// code u/ gagal simpan
		}
	}
	
	
	
	
	
	
}

/* End of file kerjasama.php */
/* Location: ./application/controllers/kerjasama.php */