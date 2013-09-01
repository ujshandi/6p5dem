<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class news_backend extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('Authentikasi');
		$this->load->model('mdl_news', 'news');
		$this->load->model('mdl_news_backend', 'news_backend');
		$this->load->library('fungsi');
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
		$config['upload_path'] = './asset/board/upload/news/';
		$config['allowed_types'] = 'gif|jpg|png|BMP|';
		$config['max_size']	= '1000';
		$config['max_width']  = '800';
		$config['max_height']  = '800';

		$this->load->library('upload', $config);

		if ( $this->upload->do_upload()){
			$data['IMAGE'] =  $this->upload->file_name;
			# get post data
			$data['NEWS_ID'] = $this->input->post('NEWS_ID');
			$data['NEWS_TITLE'] = $this->input->post('NEWS_TITLE');
			$data['NEWS_BODY'] = $this->input->post('NEWS_BODY');
			
			$data['NEWS_DATETIME'] = "to_date('".$this->input->post('NEWS_DATETIME')."', 'dd/mm/yyyy')";
			$data['NEWS_READ'] = $this->input->post('NEWS_READ');
			$data['URL'] = $this->input->post('URL');
			$data['DESKRIPSI'] = $this->input->post('DESKRIPSI');
			
			# set rules validation
			$this->form_validation->set_rules('NEWS_TITLE', 'NEWS TITLE', 'required');
			$this->form_validation->set_rules('NEWS_BODY', 'NEWS BODY', 'required');
			$this->form_validation->set_rules('NEWS_DATETIME', 'NEWS DATETIME', 'required');
			$this->form_validation->set_rules('DESKRIPSI', 'DESKRIPSI', 'required');
			
			
			# set message validation
			$this->form_validation->set_message('required', 'Field %s harus diisi!');
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('news_backend/news_backend_add',$data);
			}else{
				$this->news_backend->insert($data);
				redirect('news_backend');
			}
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
		$id= $this->input->post('id');
		
        $data['NEWS_TITLE'] = $this->input->post('NEWS_TITLE');
        $data['NEWS_BODY'] = $this->input->post('NEWS_BODY');
		
		$data['NEWS_DATETIME'] = "to_date('".$this->input->post('NEWS_DATETIME')."', 'dd/mm/yyyy')";
		$data['NEWS_READ'] = $this->input->post('NEWS_READ');
        $data['URL'] = $this->input->post('URL');
        $data['IMAGE'] = $this->input->post('IMAGE');
        $data['DESKRIPSI'] = $this->input->post('DESKRIPSI');
		
	
		
		# set rules validation
        $this->form_validation->set_rules('NEWS_TITLE', 'NEWS TITLE', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('news_backend/news_backend_edit',$data);
		}else{
			$this->news_backend->update($id,$data);
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