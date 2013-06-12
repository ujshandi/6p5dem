<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kalender extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_upt');
		$this->load->model('mdl_kalender');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/kalender/index/';
		$config['total_rows'] = $this->db->count_all('DIKLAT_KALENDER');
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
		
		$data['result'] = $this->mdl_kalender->getData($config['per_page'], $this->uri->segment(3));
		$this->load->view('kalender/kalender_list', $data);
		
		$this->close();
	}
	
	public function add(){
		$this->open();
		$this->load->view('kalender/kalender_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		# get post data
		//$data['IDKALENDER'] = $this->input->post('IDKALENDER');
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['TGL_AWAL'] = "to_date('".$this->input->post('TGL_AWAL')."', 'mm/dd/yyyy')";
        $data['TGL_AKHIR'] = "to_date('".$this->input->post('TGL_AKHIR')."', 'mm/dd/yyyy')";
        $data['KEGIATAN'] = $this->input->post('KEGIATAN');
		
		$data['TANGGAL_UPLOAD'] = "to_date('".date('Y/m/d')."', 'yyyy/mm/dd')";
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'KODE UPT', 'required');
        $this->form_validation->set_rules('TGL_AWAL', 'TGL AWAL', 'required');
        $this->form_validation->set_rules('TGL_AKHIR', 'TGL AWAL', 'required');
        $this->form_validation->set_rules('KEGIATAN', 'KEGIATAN', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('kalender/kalender_add',$data);
		}else{
			$this->mdl_kalender->insert($data);
			redirect('kalender');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_kalender->getDataEdit($id);
		$this->load->view('kalender/kalender_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['id'] = $this->input->post('id');
		//$data['IDKALENDER'] = $this->input->post('IDKALENDER');
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['TGL_AWAL'] = "to_date('".$this->input->post('TGL_AWAL')."', 'mm/dd/yyyy')";
        $data['TGL_AKHIR'] = "to_date('".$this->input->post('TGL_AKHIR')."', 'mm/dd/yyyy')";
        $data['KEGIATAN'] = $this->input->post('KEGIATAN');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'KODE UPT', 'required');
        $this->form_validation->set_rules('TGL_AWAL', 'TGL AWAL', 'required');
        $this->form_validation->set_rules('TGL_AKHIR', 'TGL AWAL', 'required');
        $this->form_validation->set_rules('KEGIATAN', 'KEGIATAN', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('kalender/kalender_edit',$data);
		}else{
			$this->mdl_kalender->update($data);
			redirect('kalender');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_kalender->delete($id)){
			redirect('kalender');
		}else{
		
		}
	}
	
}
