<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class agenda_backend extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('Authentikasi');
		$this->load->model('mdl_agenda_backend', 'agenda');
		$this->load->library('auth_ad');
		$this->load->library('fungsi');
	}

	function index()
	{

		
		$this->open_backend();
		
		$data['can_view'] 	= $this->can_view();

		$data['can_insert'] = $this->can_insert();

		$data['can_update'] = $this->can_update();

		$data['can_delete'] = $this->can_delete();
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/agenda_backend/index/';
		$config['total_rows'] = $this->db->count_all('BB_AGENDA');
		$config['per_page'] = '30';
		$config['num_links'] = '3';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->agenda->getItem($config['per_page'], $this->uri->segment(3));
		$this->load->view('agenda_backend/agenda_backend_list', $data);
		
		$this->close_backend();
		
	}
	
	public function add(){
		if ($this->can_insert() == FALSE){
			redirect('auth/failed');
		}
		
		$this->open_backend();
		$this->load->view('agenda_backend/agenda_backend_add');
		$this->close_backend();
	}
	
	public function proses_add(){
		if ($this->can_insert() == FALSE){
			redirect('auth/failed');
		}
		$this->open_backend();
		
		# get post data
		
		$config['upload_path'] = './asset/board/upload/agenda/';
		$config['allowed_types'] = 'gif|jpg|png|BMP|';
		$config['max_size']	= '1000';
		$config['max_width']  = '800';
		$config['max_height']  = '800';

		$this->load->library('upload', $config);

		if ( $this->upload->do_upload()){
			$data['GAMBAR'] =  $this->upload->file_name;
		}
		$data['JUDUL'] = $this->input->post('JUDUL');
		$data['DESKRIPSI'] = $this->input->post('DESKRIPSI');
		$data['ISI'] = $this->input->post('ISI');
		$data['TANGGAL_PEMBUATAN'] = "to_date('".date('d/m/Y')."', 'dd/mm/yyyy')";
		$data['TANGGAL_MODIFIKASI'] = "to_date('".date('d/m/Y')."', 'dd/mm/yyyy')";
		$data['EXPIRE'] = "to_date('".$this->input->post('EXPIRE')."', 'dd/mm/yyyy')";
		$data['URL'] = $this->input->post('URL');
		
		# set rules validation
		$this->form_validation->set_rules('JUDUL', 'JUDUL', 'required');
		$this->form_validation->set_rules('DESKRIPSI', 'DESKRIPSI', 'required');
		$this->form_validation->set_rules('ISI', 'ISI', 'required');
				
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('agenda_backend/agenda_backend_add',$data);
		}else{
			$this->agenda->insert($data);
			redirect('agenda_backend');
		}
		$this->close_backend();
	}
	
	public function edit($id){
		if ($this->can_update() == FALSE){
			redirect('auth/failed');
		}
		$this->open_backend();
		
		$data['id'] = $id;
		$data['result'] = $this->agenda->get_data_edit($id);
		
		$this->load->view('agenda_backend/agenda_backend_edit', $data);
		
		$this->close_backend();
	}
	
	public function proses_edit(){
		if ($this->can_update() == FALSE){
			redirect('auth/failed');
		}
		$this->open_backend();
		
		$data['id'] = $this->input->post('id');
		$data['JUDUL'] = $this->input->post('JUDUL');
        $data['DESKRIPSI'] = $this->input->post('DESKRIPSI');
        $data['ISI'] = $this->input->post('ISI');
        $data['TANGGAL_PEMBUATAN'] = "to_date('".date('d/m/Y')."', 'dd/mm/yyyy')";
        $data['TANGGAL_MODIFIKASI'] = "to_date('".date('d/m/Y')."', 'dd/mm/yyyy')";
       // $data['EXPIRE'] = $this->input->post('EXPIRE');
		$data['EXPIRE'] = "to_date('".$this->input->post('EXPIRE')."', 'dd/mm/yyyy')";
        $data['URL'] = $this->input->post('URL');
        $data['GAMBAR'] = $this->input->post('GAMBAR');
		
		# set rules validation
		$this->form_validation->set_rules('JUDUL', 'JUDUL', 'required');
		$this->form_validation->set_rules('DESKRIPSI', 'DESKRIPSI', 'required');
		$this->form_validation->set_rules('ISI', 'ISI', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('agenda_backend/agenda_backend_edit',$data);
		}else{
			$this->agenda->update($data['id'],$data);
			redirect('agenda_backend');
		}
		
		$this->close_backend();
	}
	
	public function proses_delete($id){
		if ($this->can_delete() == FALSE){
			redirect('auth/failed');
		}
		if($this->agenda->delete($id)){
			redirect('agenda_backend');
		}else{
			// code u/ gagal simpan
			
		}
	}
	
}

/* End of file agenda_backend.php */
/* Location: ./application/controllers/agenda_backend.php */