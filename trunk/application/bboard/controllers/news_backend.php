<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class news_backend extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('Authentikasi');
		$this->load->model('mdl_news', 'news');
		$this->load->library('auth_ad');
	}

	function index()
	{
		
		$this->open_backend();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/news_backend/index/';
		$config['total_rows'] = $this->db->count_all('BB_NEWS');
		$config['per_page'] = '10';
		$config['num_links'] = '3';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->news->getItem($config['per_page'], $this->uri->segment(3));
		$this->load->view('news_backend/news_backend_list', $data);
		
		$this->close_backend();
		
	}
	
	public function add(){
		$this->open_backend();
		$this->load->view('news_backend/news_backend_add');
		$this->close_backend();
	}
	
	public function proses_add(){
		$this->open_backend();
		
		# get post data
		$data['NAME'] = $this->input->post('NAME');
        $data['USERNAME'] = $this->input->post('USERNAME');
        $data['PASSWORD'] = $this->input->post('PASSWORD');
		$data['news_backend_ID'] = $this->input->post('news_backend_ID');
		$data['DEPARTMENT'] = $this->input->post('DEPARTMENT');
		$data['DESCRIPTION'] = $this->input->post('DESCRIPTION');
		$data['NIP'] = $this->input->post('NIP');
		$data['EMAIL'] = $this->input->post('EMAIL');
		
		# set rules validation
		$this->form_validation->set_rules('NAME', 'NAME', 'required');
        $this->form_validation->set_rules('USERNAME', 'USERNAME', 'required');
        $this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'required');
		$this->form_validation->set_rules('news_backend_ID', 'USER GROUP', 'required');
		$this->form_validation->set_rules('DEPARTMENT', 'DEPARTMENT', 'required');
		$this->form_validation->set_rules('NIP', 'NIP', 'required');
		$this->form_validation->set_rules('EMAIL', 'EMAIL', 'required|valid_email');
        
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('news_backend/news_backend_add',$data);
		}else{
			$this->news_backend->insert($data);
			redirect('news_backend');
		}
		
		$this->close_backend();
	}
	
	public function edit($id){
		$this->open_backend();
		
		$data['id'] = $id;
		$data['result'] = $this->news_backend->get_data_edit($id);
		
		$this->load->view('news_backend/news_backend_edit', $data);
		
		$this->close_backend();
	}
	
	public function proses_edit(){
		$this->open_backend();
		
		$data['id'] = $this->input->post('id');
		$data['NAME'] = $this->input->post('NAME');
        $data['USERNAME'] = $this->input->post('USERNAME');
        $data['PASSWORD'] = $this->input->post('PASSWORD');
		$data['news_backend_ID'] = $this->input->post('news_backend_ID');
		$data['DEPARTMENT'] = $this->input->post('DEPARTMENT');
		$data['DESCRIPTION'] = $this->input->post('DESCRIPTION');
		$data['NIP'] = $this->input->post('NIP');
		$data['EMAIL'] = $this->input->post('EMAIL');
		
		# set rules validation
		$this->form_validation->set_rules('NAME', 'NAME', 'required');
        $this->form_validation->set_rules('USERNAME', 'USERNAME', 'required');
        $this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'required');
		$this->form_validation->set_rules('news_backend_ID', 'USER GROUP', 'required');
		$this->form_validation->set_rules('DEPARTMENT', 'DEPARTMENT', 'required');
		$this->form_validation->set_rules('NIP', 'NIP', 'required');
		$this->form_validation->set_rules('EMAIL', 'EMAIL', 'required|valid_email');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('news_backend/news_backend_edit',$data);
		}else{
			$this->news_backend->update($data);
			redirect('news_backend');
		}
		
		$this->close_backend();
	}
	
	public function proses_delete($id){
		if($this->news_backend->delete($id)){
			redirect('news_backend');
		}else{
			// code u/ gagal simpan
			
		}
	}
	
}

/* End of file news_backend.php */
/* Location: ./application/controllers/news_backend.php */