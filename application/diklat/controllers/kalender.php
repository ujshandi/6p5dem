<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kalender extends My_Controller {
	
	var $id = 'kalender';
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_upt');
		$this->load->model('mdl_satker');
		$this->load->model('mdl_kalender');
	}
	
	public function index($sort_by ='TGL_AWAL', $sort_order ='ASC') ##sorting
	{
	
		$data['can_view'] 	= $this->can_view();

		$data['can_insert'] = $this->can_insert();

		$data['can_update'] = $this->can_update();

		$data['can_delete'] = $this->can_delete();
		
		$this->open();
		
		# get filter
		$data['kode_upt'] = $this->session->userdata($this->id.'kode_upt');
		$data['search'] = $this->session->userdata($this->id.'search');
		$data['numrow'] = $this->session->userdata($this->id.'numrow');
		$data['numrow'] = !empty($data['numrow'])?$data['numrow']:10;
		$offset = ($this->uri->segment(5))?$this->uri->segment(5):0; ##sorting
		
		##sorting
		$data['fields'] = array (
			'TGL_AWAL' => 'PERIODE AWAL',
			'TGL_AKHIR' => 'PERIODE AKHIR',
		);
		$data['sort_by'] = $sort_by;
		$data['sort_order'] = $sort_order;
		##
		
		##sorting
		$result = $this->mdl_kalender->getData($data['numrow'], $offset, $data, $sort_by, $sort_order);
		
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/kalender/index/'."$sort_by/$sort_order"; ##sorting
		$config['per_page'] = $data['numrow'];
		$config['num_links'] = '10';
		$config['uri_segment'] = '5'; ##sorting
		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0)" class="current">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['total_rows'] = $result['row_count'];

		$this->pagination->initialize($config);	
		
		$data['curcount'] = $offset+1;
		
		$data['result'] = $result['row_data'];
		
		$this->load->view('kalender/kalender_list', $data);
		
		$this->close();
	}
	
	public function search(){
		$this->session->set_userdata($this->id.'kode_upt', $this->input->post('kode_upt'));
		$this->session->set_userdata($this->id.'search', $this->input->post('search'));
		$this->session->set_userdata($this->id.'numrow', $this->input->post('numrow'));
		
		redirect('kalender');
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
        $data['TGL_AWAL'] = "to_date('".$this->input->post('TGL_AWAL')."', 'dd/mm/yyyy')";
        $data['TGL_AKHIR'] = "to_date('".$this->input->post('TGL_AKHIR')."', 'dd/mm/yyyy')";
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
        $data['TGL_AWAL'] = "to_date('".$this->input->post('TGL_AWAL')."', 'dd/mm/yyyy')";
        $data['TGL_AKHIR'] = "to_date('".$this->input->post('TGL_AKHIR')."', 'dd/mm/yyyy')";
        $data['KEGIATAN'] = $this->input->post('KEGIATAN');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'KODE UPT', 'required');
        $this->form_validation->set_rules('TGL_AWAL', 'TGL AWAL', 'required');
        $this->form_validation->set_rules('TGL_AKHIR', 'TGL AWAL', 'required');
        $this->form_validation->set_rules('KEGIATAN', 'KEGIATAN', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$data['result'] = $this->mdl_kalender->getDataEdit($id);
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
