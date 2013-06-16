<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_kopetensi extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_kategori_kopetensi');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/kategori_kopetensi/index/';
		$config['total_rows'] = $this->db->count_all('KOPETEN_KATEGORI');
		$config['per_page'] = '11';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		$matra = $this->input->post('KODEMATRA');
		$data['option_matra'] = $this->mdl_kategori_kopetensi->getmatra();
		$data['result'] = $this->mdl_kategori_kopetensi->getData($matra, $config['per_page'], $this->uri->segment(3));
		$this->load->view('kategori_kopetensi/kategori_kopetensi_list', $data);
		
		
		$this->close();
	}

	public function add(){
		$this->open();
		$this->load->view('kategori_kopetensi/kategori_kopetensi_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		$data['KODE_KATEG_KOPETENSI'] = $this->input->post('KODE_KATEG_KOPETENSI');
		$data['NAMA_KATEGORI'] = $this->input->post('NAMA_KATEGORI');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_KATEG_KOPETENSI', 'Kode Bumn', 'required');
		$this->form_validation->set_rules('NAMA_KATEGORI', 'Nama Bumn', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('kategori_kopetensi/kategori_kopetensi_add',$data);
		}else{
			$this->mdl_kategori_kopetensi->insert($data);
			redirect('kategori_kopetensi');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['KODE_KATEG_KOPETENSI'] = $id;
		$data['result'] = $this->mdl_kategori_kopetensi->getDataEdit($id);
		$this->load->view('kategori_kopetensi/kategori_kopetensi_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['KODE_KATEG_KOPETENSI'] = $this->input->post('KODE_KATEG_KOPETENSI');
		$data['NAMA_KATEGORI'] = $this->input->post('NAMA_KATEGORI');
		
		# set rules validation
		//$this->form_validation->set_rules('kode_induk', 'Kode Satker', 'required');
		$this->form_validation->set_rules('NAMA_KATEGORI', 'Nama Matra', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('kategori_kopetensi/kategori_kopetensi_edit',$data);
		}else{
			$this->mdl_kategori_kopetensi->update($data);
			redirect('kategori_kopetensi');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_kategori_kopetensi->delete($id)){
			redirect('kategori_kopetensi');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
