<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class diklat_sekretariat extends My_Controller {

	var $id = 'diklat_sekretariat';
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_upt');
		$this->load->model('mdl_satker');
		$this->load->model('mdl_program');
		$this->load->model('mdl_diklat_sekretariat');
	}
	
	public function index($sort_by ='KODE_DIKLAT', $sort_order ='ASC') ##sorting
	{
		$this->open();
		
		# get filter		
		$data['search'] = $this->session->userdata($this->id.'search');
		$data['numrow'] = $this->session->userdata($this->id.'numrow');
		$data['numrow'] = !empty($data['numrow'])?$data['numrow']:10;
		$offset = ($this->uri->segment(5))?$this->uri->segment(5):0; ##sorting
		
		##sorting
		$data['fields'] = array (
			'KODE_DIKLAT' => 'KODE',
			'NAMA_DIKLAT' => 'NAMA DIKLAT',
			'NAMA_PROGRAM' => 'PROGRAM',
			'NAMA_INDUK' => 'SATKER',
		);
		$data['sort_by'] = $sort_by;
		$data['sort_order'] = $sort_order;
		##
		
		# get data
		$result = $this->mdl_diklat_sekretariat->getData($data['numrow'], $offset, $data, $sort_by, $sort_order);
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/diklat_sekretariat/index/'."$sort_by/$sort_order"; ##sorting
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
		
		$this->load->view('diklat/diklat_sekretariat_list', $data);
		
		$this->close();
	}
	
	public function search(){
		$this->session->set_userdata($this->id.'search', $this->input->post('search'));
		$this->session->set_userdata($this->id.'numrow', $this->input->post('numrow'));
		
		redirect('diklat_sekretariat');
	}
	
	public function add(){
		$this->open();
		$this->load->view('diklat/diklat_sekretariat_add');
		$this->close();
	}
	
	
	public function proses_add(){
		$this->open();
		
		# get post data
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['KODE_PROGRAM'] = $this->input->post('KODE_PROGRAM');
        $data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
        $data['NAMA_DIKLAT'] = $this->input->post('NAMA_DIKLAT');
        $data['KODE_INDUK'] = $this->input->post('KODE_INDUK');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('KODE_PROGRAM', 'PROGRAM', 'required');
        $this->form_validation->set_rules('KODE_DIKLAT', 'KODE DIKLAT', 'required');
        $this->form_validation->set_rules('NAMA_DIKLAT', 'NAMA DIKLAT', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('diklat_sekretariat/diklat_sekretariat_add',$data);
		}else{
			$this->mdl_diklat_sekretariat->insert($data);
			redirect('diklat_sekretariat');
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_diklat_sekretariat->getDataEdit($id);
		$this->load->view('diklat/diklat_sekretariat_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$data['id'] = $this->input->post('id');
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
        $data['KODE_PROGRAM'] = $this->input->post('KODE_PROGRAM');
        $data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
        $data['NAMA_DIKLAT'] = $this->input->post('NAMA_DIKLAT');
        $data['KODE_INDUK'] = $this->input->post('KODE_INDUK');
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
        $this->form_validation->set_rules('KODE_PROGRAM', 'PROGRAM', 'required');
        $this->form_validation->set_rules('KODE_DIKLAT', 'KODE DIKLAT', 'required');
        $this->form_validation->set_rules('NAMA_DIKLAT', 'NAMA DIKLAT', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('diklat_sekretariat/diklat_sekretariat_edit',$data);
		}else{
			$this->mdl_diklat_sekretariat->update($data);
			redirect('diklat_sekretariat');
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_diklat_sekretariat->delete($id)){
			redirect('diklat_sekretariat');
		}else{
		
		}
	}
	
	//yan
	public function add_detail($kode_diklat){
		$this->open();
		
		if($this->mdl_diklat_sekretariat->detail_diklat_exist($kode_diklat)){
			$data['action'] = 'update';
			$data['result'] = $this->mdl_diklat_sekretariat->get_detail_diklat($kode_diklat);

			$data['DESKRIPSI'] = ReadCLOB($data['result']->row()->DESKRIPSI);
			$data['TUJUAN'] = ReadCLOB($data['result']->row()->TUJUAN);
			$data['PELUANG'] = ReadCLOB($data['result']->row()->PELUANG);
			$data['LAMA'] = $data['result']->row()->LAMA;
			$data['SYARAT'] = ReadCLOB($data['result']->row()->SYARAT);
		}else{
			$data['action'] = 'insert';
			
			$data['DESKRIPSI'] = '';
			$data['TUJUAN'] = '';
			$data['PELUANG'] = '';
			$data['LAMA'] = '';
			$data['SYARAT'] = '';
		}
		
		$data['kode_diklat'] = $kode_diklat;
		$data['diklat'] = $this->mdl_diklat_sekretariat->getDataEdit($kode_diklat);
		
		$this->load->view('diklat/diklat_sekretariat_detail', $data);
		
		$this->close();
	}
	
	public function proses_detail(){
		$data['action'] = $this->input->post('action');
		$data['KODE_DIKLAT'] = $this->input->post('KODE_DIKLAT');
        $data['DESKRIPSI'] = $this->input->post('DESKRIPSI');
        $data['TUJUAN'] = $this->input->post('TUJUAN');
        $data['PELUANG'] = $this->input->post('PELUANG');
        $data['LAMA'] = $this->input->post('LAMA');
        $data['SYARAT'] = $this->input->post('SYARAT');
		
		$this->mdl_diklat_sekretariat->insert_detail($data);
		redirect('diklat_sekretariat');
		
	}
	
}
