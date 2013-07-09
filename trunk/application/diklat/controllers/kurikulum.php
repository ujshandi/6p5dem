<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kurikulum extends My_Controller {
	
	function __construct(){
		parent::__construct();
		//$this->load->model('mdl_diklat');
		$this->load->model('mdl_upt');
		$this->load->model('mdl_kurikulum');
		$this->load->model('mdl_satker');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/kurikulum/index/';
		$config['total_rows'] = $this->db->count_all('DIKLAT_MST_KURIKULUM');
		$config['per_page'] = '30';
		$config['num_links'] = '3';
		// $config['uri_segment'] = '3';
		// $config['full_tag_open'] = '';
		// $config['full_tag_close'] = '';
		// $config['num_tag_open'] = '<li>';
		// $config['num_tag_close'] = '</li>';
		// $config['cur_tag_open'] = '<li><a href="javascript:void(0)" class="current">';
		// $config['cur_tag_close'] = '</a></li>';
		// $config['prev_link'] = 'Prev';
		// $config['prev_tag_open'] = '<li>';
		// $config['prev_tag_close'] = '</li>';
		// $config['next_link'] = 'Next';
		// $config['next_tag_open'] = '<li>';
		// $config['next_tag_close'] = '</li>';
		// $config['last_link'] = 'Last';
		// $config['last_tag_open'] = '<li>';
		// $config['last_tag_close'] = '</li>';
		// $config['first_link'] = 'First';
		// $config['first_tag_open'] = '<li>';
		// $config['first_tag_close'] = '</li>';

		$this->pagination->initialize($config);	
		
		$data['result'] = $this->mdl_kurikulum->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('kurikulum/kurikulum_list', $data);
		
		$this->close();
	}
	
	public function add(){
		$this->open();
		$this->load->view('kurikulum/kurikulum_add');
		$this->close();
	}
	
	public function add2(){
		$this->open();
		
		# get post data
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
        $data['JUMLAH'] = $this->input->post('JUMLAH');
		
		if($data['KODE_DIKLAT'] == ''){
			redirect('kurikulum/add');
		}
		
		$this->load->view('kurikulum/kurikulum_add2', $data);
		
		$this->close();
	}
	
	public function proses_add(){
		
		# get post data
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
        $data['DATA'] = $this->input->post('DATA');
		
		# set rules validation
		//$this->form_validation->set_rules('KODE_KURIKULUM', 'KODE KURIKULUM', 'required');
        //$this->form_validation->set_rules('NAMA_KURIKULUM', 'NAMA KURIKULUM', 'required');
        //$this->form_validation->set_rules('SKS_TEORI', 'SKS TEORI', 'required');
		
		# set message validation
		//$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		//if ($this->form_validation->run() == FALSE){
			//$this->load->view('kurikulum/kurikulum_add',$data);
		//}else{
			if($this->mdl_kurikulum->insert($data['KODE_DIKLAT'], $data['KODE_UPT'], $data['DATA'])){
				redirect('kurikulum');
			}else{
				echo 'Error insert to DB';die;
			}
		//}
		
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_kurikulum->getDataEdit($id);
		$this->load->view('kurikulum/kurikulum_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['id'] = $this->input->post('id');
		$data['KODE_KURIKULUM'] = $this->input->post('KODE_KURIKULUM');
        $data['NAMA_KURIKULUM'] = $this->input->post('NAMA_KURIKULUM');
        $data['SKS_TEORI'] = $this->input->post('SKS_TEORI');
		$data['SKS_PRAKTEK'] = $this->input->post('SKS_PRAKTEK');
		$data['JAM'] = $this->input->post('JAM');
		$data['SEMESTER'] = $this->input->post('SEMESTER');
		$data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_KURIKULUM', 'KODE KURIKULUM', 'required');
        $this->form_validation->set_rules('NAMA_KURIKULUM', 'NAMA KURIKULUM', 'required');
        $this->form_validation->set_rules('SKS_TEORI', 'SKS TEORI', 'required');
		$this->form_validation->set_rules('SKS_PRAKTEK', 'SKS PRAKTEK', 'required');
		$this->form_validation->set_rules('JAM', 'JAM', 'required');
		$this->form_validation->set_rules('SEMESTER', 'SEMSTER', 'required');
		$this->form_validation->set_rules('KODE_DIKLAT', 'KODE DIKLAT', 'required');
		$this->form_validation->set_rules('KODE_UPT', 'KODE UPT', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('kurikulum/kurikulum_edit',$data);
		}else{
			$this->mdl_kurikulum->update($data);
			redirect('kurikulum');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_kurikulum->delete($id)){
			redirect('kurikulum');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
