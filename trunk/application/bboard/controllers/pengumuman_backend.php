<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class pengumuman_backend extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('Authentikasi');
		$this->load->model('mdl_pengumuman_backend', 'pengumuman');
		$this->load->library('auth_ad');
		$this->load->library('fungsi');
	}

	function index()
	{
		
		$this->open_backend();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/pengumuman_backend/index/';
		$config['total_rows'] = $this->db->count_all('BB_PENGUMUMAN');
		$config['per_page'] = '10';
		$config['num_links'] = '3';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->pengumuman->getItem($config['per_page'], $this->uri->segment(3));
		$this->load->view('pengumuman_backend/pengumuman_backend_list', $data);
		
		$this->close_backend();
		
	}
	
	public function add(){
		$this->open_backend();
		$this->load->view('pengumuman_backend/pengumuman_backend_add');
		$this->close_backend();
	}
	
	public function proses_add(){
		$this->open_backend();
		
		# get post data
		$data['ID_PENGUMUMAN'] = $this->input->post('ID_PENGUMUMAN');
        $data['JUDUL'] = $this->input->post('JUDUL');
        $data['ISI'] = $this->input->post('ISI');
        $data['TANGGAL_PEMBUATAN'] = $this->input->post('TANGGAL_PEMBUATAN');
        $data['URL'] = $this->input->post('URL');
        $data['GAMBAR'] = $this->input->post('GAMBAR');
        $data['EXPIRE'] = $this->input->post('EXPIRE');
        $data['ATTACHMENT'] = $this->input->post('ATTACHMENT');
        $data['DESKRIPSI'] = $this->input->post('DESKRIPSI');
        $data['TANGGAL_MODIFIKASI'] = $this->input->post('TANGGAL_MODIFIKASI');
		
		# set rules validation
		$this->form_validation->set_rules('ID_PENGUMUMAN', 'ID PENGUMUMAN', 'required');
        $this->form_validation->set_rules('JUDUL', 'JUDUL', 'required');
        $this->form_validation->set_rules('ISI', 'ISI', 'required');
        $this->form_validation->set_rules('TANGGAL_PEMBUATAN', 'TANGGAL PEMBUATAN', 'required');
        $this->form_validation->set_rules('URL', 'URL', 'required');
        $this->form_validation->set_rules('GAMBAR', 'GAMBAR', 'required');
        $this->form_validation->set_rules('EXPIRE', 'EXPIRE', 'required');
        $this->form_validation->set_rules('ATTACHMENT', 'ATTACHMENT', 'required');
        $this->form_validation->set_rules('DESKRIPSI', 'DESKRIPSI', 'required');
        $this->form_validation->set_rules('TANGGAL_MODIFIKASI', 'TANGGAL MODIFIKASI', 'required');
        
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('pengumuman_backend/pengumuman_backend_add',$data);
		}else{
			$this->pengumuman->insert($data);
			redirect('pengumuman_backend');
		}
		
		$this->close_backend();
	}
	
	public function edit($id){
		$this->open_backend();
		
		$data['id'] = $id;
		$data['result'] = $this->pengumuman->get_data_edit($id);
		
		$this->load->view('pengumuman_backend/pengumuman_backend_edit', $data);
		
		$this->close_backend();
	}
	
	public function proses_edit(){
		$this->open_backend();
		
		$data['id'] = $this->input->post('id');
        $data['JUDUL'] = $this->input->post('JUDUL');
		$data['DESKRIPSI'] = $this->input->post('DESKRIPSI');
        $data['ISI'] = $this->input->post('ISI');
        $data['URL'] = $this->input->post('URL');
        $data['GAMBAR'] = $this->input->post('GAMBAR');
        $data['EXPIRE'] = $this->input->post('EXPIRE');
        
        $data['TANGGAL_MODIFIKASI'] = date('m/d/Y');
		
		# set rules validation
        $this->form_validation->set_rules('JUDUL', 'JUDUL', 'required');
       
        
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('pengumuman_backend/pengumuman_backend_edit',$data);
		}else{
			$this->pengumuman->update($data['id'],$data);
			redirect('pengumuman_backend');
		}
		
		$this->close_backend();
	}
	
	public function proses_delete($id){
		if($this->pengumuman_backend->delete($id)){
			redirect('pengumuman_backend');
		}else{
			// code u/ gagal simpan
			
		}
	}
	
}

/* End of file pengumuman_backend.php */
/* Location: ./application/controllers/pengumuman_backend.php */