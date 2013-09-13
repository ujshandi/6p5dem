<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class kerjasama_backend extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('Authentikasi');
		$this->load->model('mdl_kerjasama', 'kerjasama_backend');
		$this->load->model('mdl_lowongan_kerja', 'lowongan_kerja');
		$this->load->library('fungsi');
	}

	function index()
	{
	/*
		$data['can_view'] 	= $this->can_view();

		$data['can_insert'] = $this->can_insert();

		$data['can_update'] = $this->can_update();

		$data['can_delete'] = $this->can_delete(); */
		
		$this->open_backend();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/kerjasama_backend/index/';
		$config['total_rows'] = $this->db->count_all('BB_INFORMASI_KERJASAMA');
		$config['per_page'] = '30';
		$config['num_links'] = '3';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->kerjasama_backend->getItem($config['per_page'], $this->uri->segment(3));
		$this->load->view('kerjasama_backend/kerjasama_backend_list', $data);
		
		$this->close_backend();
		
	}
	
	public function add(){
		$this->open_backend();
		$this->load->view('kerjasama_backend/kerjasama_backend_add');
		$this->close_backend();
	}
	
	public function proses_add(){
		$this->open_backend();
	
			
			# get post data
			
			$data['NAMA_PENYEDIA_JASA'] = $this->input->post('NAMA_PENYEDIA_JASA');
			$data['JENIS_KERJASAMA'] = $this->input->post('JENIS_KERJASAMA');
			$data['MAKRA_CODE'] = $this->input->post('MAKRA_CODE');
			$data['PERIODE_AWAL'] = "to_date('".$this->input->post('PERIODE_AWAL')."', 'dd/mm/yyyy')";
			$data['PERIODE_AKHIR'] = "to_date('".$this->input->post('PERIODE_AKHIR')."', 'dd/mm/yyyy')";
			
			# set rules validation
			$this->form_validation->set_rules('NAMA_PENYEDIA_JASA', 'NAMA_PENYEDIA_JASA', 'required');
			$this->form_validation->set_rules('JENIS_KERJASAMA', 'JENIS_KERJASAMA', 'required');
						
			
			# set message validation
			$this->form_validation->set_message('required', 'Field %s harus diisi!');
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('kerjasama_backend/kerjasama_backend_add',$data);
			}else{
				$this->kerjasama_backend->insert($data);
				redirect('kerjasama_backend');
			}
		
		$this->close_backend();
	}
	
	public function edit($id){
		$this->open_backend();
		
		$data['id'] = $id;
		$data['result'] = $this->kerjasama_backend->getDataEdit($id);
		
		$this->load->view('kerjasama_backend/kerjasama_backend_edit', $data);
		
		$this->close_backend();
	}
	
	public function proses_edit(){
		$this->open_backend();
		
		$data['id'] = $this->input->post('id');
		$data['NAMA_PENYEDIA_JASA'] = $this->input->post('NAMA_PENYEDIA_JASA');
		$data['JENIS_KERJASAMA'] = $this->input->post('JENIS_KERJASAMA');
		$data['MAKRA_CODE'] = $this->input->post('MAKRA_CODE');
		$data['PERIODE_AWAL'] = "to_date('".$this->input->post('PERIODE_AWAL')."', 'dd/mm/yyyy')";
		$data['PERIODE_AKHIR'] = "to_date('".$this->input->post('PERIODE_AKHIR')."', 'dd/mm/yyyy')";
		
		# set rules validation
		$this->form_validation->set_rules('NAMA_PENYEDIA_JASA', 'NAMA_PENYEDIA_JASA', 'required');
		$this->form_validation->set_rules('JENIS_KERJASAMA', 'JENIS_KERJASAMA', 'required');
       
        
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('kerjasama_backend/kerjasama_backend_edit',$data);
		}else{
			$this->kerjasama_backend->update($data['id'],$data);
			redirect('kerjasama_backend');
		}
		
		$this->close_backend();
	}
	
	public function proses_delete($id){
		if($this->kerjasama_backend->delete($id)){
			redirect('kerjasama_backend');
		}else{
			// code u/ gagal simpan
			redirect('kerjasama_backend');
		}
	}
	
}

/* End of file kerjasama_backend.php */
/* Location: ./application/controllers/kerjasama_backend.php */