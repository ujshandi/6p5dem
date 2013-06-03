<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class penyuluhan extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_upt');
		$this->load->model('mdl_penyuluhan');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/penyuluhan/index/';
		$config['total_rows'] = $this->db->count_all('DIKLAT_PENYULUHAN');
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
		
		$data['result'] = $this->mdl_penyuluhan->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('penyuluhan/penyuluhan_list', $data);
		
		$this->close();
	}
	
	// public function add(){
		// $this->open();
		// $this->load->view('penyuluhan/penyuluhan_add');
		// $this->close();
	// }
	
	// public function proses_add(){
		// $this->open();
		
		// # get post data
		// $data['KODE_UPT'] = $this->input->post('KODE_penyuluhan');
        // $data['NAMA_penyuluhan'] = $this->input->post('NAMA_penyuluhan');
        // $data['KODE_INDUK'] = $this->input->post('KODE_INDUK');
		
		// # set rules validation
		// $this->form_validation->set_rules('KODE_penyuluhan', 'KODE penyuluhan', 'required');
        // $this->form_validation->set_rules('NAMA_penyuluhan', 'NAMA penyuluhan', 'required');
        // $this->form_validation->set_rules('KODE_INDUK', 'KODE INDUK', 'required');
		
        //$this->form_validation->set_rules('URUTAN', 'URUTAN', 'required');
		
		// # set message validation
		// $this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		// if ($this->form_validation->run() == FALSE){
			// $this->load->view('penyuluhan/penyuluhan_add',$data);
		// }else{
			// $this->mdl_penyuluhan->insert($data);
			// redirect('penyuluhan');
		// }
		
		// $this->close();
	// }
	
	// public function edit($id){
		// $this->open();
		
		// $data['id'] = $id;
		// $data['result'] = $this->mdl_penyuluhan->getDataEdit($id);
		// $this->load->view('penyuluhan/penyuluhan_edit', $data);
		
		// $this->close();
	// }
	
	// public function proses_edit(){
		// $this->open();
		
		// $data['id'] = $this->input->post('id');
		// $data['KODE_penyuluhan'] = $this->input->post('KODE_penyuluhan');
        // $data['NAMA_penyuluhan'] = $this->input->post('NAMA_penyuluhan');
        // $data['KODE_INDUK'] = $this->input->post('KODE_INDUK');
		
		// # set rules validation
		// $this->form_validation->set_rules('KODE_penyuluhan', 'KODE penyuluhan', 'required');
        // $this->form_validation->set_rules('NAMA_penyuluhan', 'NAMA penyuluhan', 'required');
        // $this->form_validation->set_rules('KODE_INDUK', 'KODE INDUK', 'required');
		// # set message validation
		// $this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		// if ($this->form_validation->run() == FALSE){
			// $this->load->view('penyuluhan/penyuluhan_edit',$data);
		// }else{
			// $this->mdl_penyuluhan->update($data);
			// redirect('penyuluhan');
		// }
		
		// $this->close();
	// }
	
	// public function proses_delete($id){
		// if($this->mdl_penyuluhan->delete($id)){
			// redirect('penyuluhan');
		// }else{
			//code u/ gagal simpan
		// }
	//}
	
}
