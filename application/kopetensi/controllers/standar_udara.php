<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Standar_udara extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_standar_udara');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/standar_udara/index/';
		$config['total_rows'] = $this->db->count_all('KOPETEN_STDR_UDARA');
		$config['per_page'] = '11';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		$kategori = $this->input->post('KODE_KATEG_KOPETENSI');
		$tingkat = $this->input->post('KODE_TINGKAT');
		$data['option_kategori'] = $this->mdl_standar_udara->getkategori();
		$data['option_tingkat'] = $this->mdl_standar_udara->gettingkat();
		$data['result'] = $this->mdl_standar_udara->getData($kategori, $tingkat, $config['per_page'], $this->uri->segment(3));
		$this->load->view('standar_udara/standar_udara_list', $data);
		
		
		$this->close();
	}
	
	public function select_tingkat(){
    			
			if('IS_AJAX') {
            $data['option_tingkat'] = $this->mdl_standar_udara->gettingkat();
       		$this->load->view('standar_udara/tingkat',$data);
            }
    }
	
	public function select_tingkat2(){
    			
			if('IS_AJAX') {
            $data['option_tingkat'] = $this->mdl_standar_udara->gettingkat();
       		$this->load->view('standar_udara/tingkat2',$data);
            }
    }

	public function add(){
		$this->open();
		$data['option_kategori'] = $this->mdl_standar_udara->getkategori();
		$data['option_tingkat'] = $this->mdl_standar_udara->gettingkat();
		$this->load->view('standar_udara/standar_udara_add',$data);
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		$data['KODE_KATEG_KOPETENSI'] = $this->input->post('KODE_KATEG_KOPETENSI');
		$data['KODE_TINGKAT'] = $this->input->post('KODE_TINGKAT');
		$data['KODE_STANDAR_UDARA'] = $this->input->post('KODE_STANDAR_UDARA');
		$data['NAMA_STANDAR'] = $this->input->post('NAMA_STANDAR');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_STANDAR_UDARA', 'Kode Kopetensi', 'required');
		$this->form_validation->set_rules('NAMA_STANDAR', 'Nama Kopetensi', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('standar_udara/standar_udara_add',$data);
		}else{
			$this->mdl_standar_udara->insert($data);
			redirect('standar_udara');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['KODE_STANDAR_UDARA'] = $id;
		$data['result'] = $this->mdl_standar_udara->getDataEdit($id);
		$this->load->view('standar_udara/standar_udara_edit', $data);
		
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
			$this->load->view('standar_udara/standar_udara_edit',$data);
		}else{
			$this->mdl_standar_udara->update($data);
			redirect('standar_udara');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_standar_udara->delete($id)){
			redirect('standar_udara');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
