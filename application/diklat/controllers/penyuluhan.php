<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class penyuluhan extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_satker');
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
	
	public function add(){
		$this->open();
		$this->load->view('penyuluhan/penyuluhan_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		# get post data
		//$data['IDDATA'] = $this->input->post('IDDATA');
        $data['NAMA_PENYULUHAN'] = $this->input->post('NAMA_PENYULUHAN');
        $data['JML_PESERTA'] = $this->input->post('JML_PESERTA');
        $data['TEMPAT'] = $this->input->post('TEMPAT');
        $data['TANGGAL'] = "to_date('".$this->input->post('TANGGAL')."', 'mm/dd/yyyy')";
        $data['KODE_UPT'] = $this->input->post('KODE_UPT');
		
		# set rules validation
		$this->form_validation->set_rules('NAMA_PENYULUHAN', 'NAMA PENYULUHAN', 'required');
        $this->form_validation->set_rules('JML_PESERTA', 'JUMLAH PESERTA', 'required');
        $this->form_validation->set_rules('TEMPAT', 'TEMPAT', 'required');
        $this->form_validation->set_rules('TANGGAL', 'TANGGAL', 'required');
        $this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('penyuluhan/penyuluhan_add',$data);
		}else{
			$this->mdl_penyuluhan->insert($data);
			redirect('penyuluhan');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_dosen->getDataEdit($id);
		$this->load->view('dosen/dosen_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['id'] = $this->input->post('id');
		//$data['IDDATA'] = $this->input->post('IDDATA');
        $data['NAMA_PENYULUHAN'] = $this->input->post('NAMA_PENYULUHAN');
        $data['JML_PESERTA'] = $this->input->post('JML_PESERTA');
        $data['TEMPAT'] = $this->input->post('TEMPAT');
        $data['TANGGAL'] = "to_date('".$this->input->post('TANGGAL')."', 'mm/dd/yyyy')";
        $data['KODE_UPT'] = $this->input->post('KODE_UPT');
		
		# set rules validation
		$this->form_validation->set_rules('NAMA_PENYULUHAN', 'NAMA PENYULUHAN', 'required');
		$this->form_validation->set_rules('JML_PESERTA', 'JUMLAH PESERTA', 'required');
		$this->form_validation->set_rules('TEMPAT', 'TEMPAT', 'required');
        $this->form_validation->set_rules('TANGGAL', 'TANGGAL', 'required');
        $this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('penyuluhan/penyuluhan_edit',$data);
		}else{
			$this->mdl_penyuluhan->update($data);
			redirect('penyuluhan');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_penyuluhan->delete($id)){
			redirect('penyuluhan');
		}else{
			//code u/ gagal simpan
		}
	}
	
}
