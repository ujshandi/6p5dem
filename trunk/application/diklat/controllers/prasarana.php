<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class prasarana extends My_Controller {
	
	var $id = 'prasarana';
	
	function __construct(){
		parent::__construct();		
		$this->load->model('mdl_satker');
		$this->load->model('mdl_upt');
		$this->load->model('mdl_prasarana');
	}
	
	public function index()
	{
		$this->open();
		
		# get filter
		$data['kode_upt'] = $this->session->userdata($this->id.'kode_upt');
		$data['search'] = $this->session->userdata($this->id.'search');
		$data['numrow'] = $this->session->userdata($this->id.'numrow');
		$data['numrow'] = !empty($data['numrow'])?$data['numrow']:10;
		$offset = ($this->uri->segment(3))?$this->uri->segment(3):0;
		
		# get data
		$result = $this->mdl_prasarana->getData($data['numrow'], $offset, $data);
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/prasarana/index/';
		$config['per_page'] = $data['numrow'];
		$config['num_links'] = '10';
		$config['uri_segment'] = '3';
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
		
		$this->load->view('sarpras/prasarana_list', $data);
		
		$this->close();
	}
	
	public function search(){
		$this->session->set_userdata($this->id.'kode_upt', $this->input->post('kode_upt'));
		$this->session->set_userdata($this->id.'search', $this->input->post('search'));
		$this->session->set_userdata($this->id.'numrow', $this->input->post('numrow'));
		
		redirect('prasarana');
	}
	
	public function add(){
		$this->open();
		$this->load->view('sarpras/prasarana_add');
		$this->close();
	}
	
	public function proses_add(){
		$this->open();
		
		$config['upload_path'] = './file_upload/diklat/';
		$config['allowed_types'] = 'gif|jpg|png|BMP|';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( $this->upload->do_upload()){
			$data['GAMBAR_PRASARANA'] =  $this->upload->file_name;
			$data['KODE_UPT'] = $this->input->post('KODE_UPT');
			$data['TAHUN'] = $this->input->post('TAHUN');
			$data['ID_SARPRAS'] = $this->input->post('ID_SARPRAS');
			$data['JUMLAH'] = $this->input->post('JUMLAH');
			$data['KAPASITAS'] = $this->input->post('KAPASITAS');
			$data['DESKRIPSI_PRASARANA'] = $this->input->post('DESKRIPSI_PRASARANA');
			$data['TANGGAL_UPLOAD'] = "to_date('".date('Y/m/d')."', 'yyyy/mm/dd')";
			
			# set rules validation
			$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
			$this->form_validation->set_rules('TAHUN', 'TAHUN', 'required');
			$this->form_validation->set_rules('ID_SARPRAS', 'NAMA PRASARANA', 'required');
			$this->form_validation->set_rules('JUMLAH', 'JUMLAH', 'required');
			$this->form_validation->set_rules('KAPASITAS', 'KAPASITAS', 'required');
			//$this->form_validation->set_rules('GAMBAR_PRASARANA', 'GAMBAR_PRASARANA', 'required');
			$this->form_validation->set_rules('DESKRIPSI_PRASARANA', 'DESKRIPSI_PRASARANA', 'required');
			
			# set message validation
			$this->form_validation->set_message('required', 'Field %s harus diisi!');
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('sarpras/prasarana_add',$data);
			}else{
				$this->mdl_prasarana->insert($data);
				redirect('prasarana');
			}
		}else{
			echo $this->upload->display_errors();
		}
		
		$this->close();
	}
	
	public function edit($id){
		$this->open();
		
		$data['id'] = $id;
		$data['result'] = $this->mdl_prasarana->getDataEdit($id);
		$this->load->view('sarpras/prasarana_edit', $data);
		
		$this->close();
	}
	
	public function proses_edit(){
		$this->open();
		
		$config['upload_path'] = './file_upload/diklat/';
		$config['allowed_types'] = 'gif|jpg|png|BMP|';
		$config['max_size']	= '1000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( $this->upload->do_upload()){
		$data['GAMBAR_PRASARANA'] =  $this->upload->file_name;			
		$data['KODE_UPT'] = $this->input->post('KODE_UPT');
		$data['TAHUN'] = $this->input->post('TAHUN');
		$data['ID_SARPRAS'] = $this->input->post('ID_SARPRAS');
		$data['JUMLAH'] = $this->input->post('JUMLAH');
		$data['KAPASITAS'] = $this->input->post('KAPASITAS');
		$data['DESKRIPSI_PRASARANA'] = $this->input->post('DESKRIPSI_PRASARANA');
		$data['TANGGAL_UPLOAD'] = "to_date('".date('Y/m/d')."', 'yyyy/mm/dd')";
		
		# set rules validation
		$this->form_validation->set_rules('KODE_UPT', 'UPT', 'required');
		$this->form_validation->set_rules('TAHUN', 'TAHUN', 'required');
		$this->form_validation->set_rules('ID_SARPRAS', 'NAMA PRASARANA', 'required');
		$this->form_validation->set_rules('JUMLAH', 'JUMLAH', 'required');
		$this->form_validation->set_rules('KAPASITAS', 'KAPASITAS', 'required');
		$this->form_validation->set_rules('DESKRIPSI_PRASARANA', 'DESKRIPSI_PRASARANA', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('sarpras/prasarana_edit',$data);
		}else{
			$this->mdl_prasarana->update($data);
			redirect('prasarana');
		}
		}else{
			echo $this->upload->display_errors();
		}
		
		$this->close();
	}
	
	public function proses_delete($id){
		if($this->mdl_prasarana->delete($id)){
			redirect('prasarana');
		}else{
			// code u/ gagal simpan
		}
	}
	
}
