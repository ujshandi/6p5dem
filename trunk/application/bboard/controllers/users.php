<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller
{
	private $pagesize = 20;
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('Authentikasi');
		$this->load->model('mdl_users', 'users');
		$this->load->library('auth_ad');
	}

	function index()
	{
		
		$this->open_backend();
		
		# config pagination
		
		
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/users/index/';
		$config['total_rows'] = $this->db->count_all('USERS');
		$config['full_tag_open'] = '<p class="pagination">';
		$config['per_page'] = '5';
		$config['num_links'] = '3';
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->users->getItem($config['per_page'], $this->uri->segment(3));
		$this->load->view('users/users_filter', $data); 
				
		$this->close_backend();
		
	}
	
	
	
	public function add(){
		$this->open_backend();
		$this->load->view('users/users_add');
		$this->close_backend();
	}
	public function getall(){
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/users/getall/';
		$config['total_rows'] = $this->db->count_all('USERS');
		$config['full_tag_open'] = '<p class="pagination">';
		$config['per_page'] = '5';
		$config['num_links'] = '3';
		$config['is_ajax_paging']      =  TRUE; // default FALSE
		$config['paging_function'] = 'ajax_paging'; // Your jQuery paging
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->users->getItem($config['per_page'], $this->uri->segment(3));
		$this->load->view('users/users_list', $data);
	}
	
	public function proses_add(){
		$this->open_backend();
		
		# get post data
		$data['NAME'] = $this->input->post('NAME');
        $data['USERNAME'] = $this->input->post('USERNAME');
        $data['PASSWORD'] = md5($this->input->post('PASSWORD'));
		$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');
		$data['DEPARTMENT'] = $this->input->post('DEPARTMENT');
		$data['DESCRIPTION'] = $this->input->post('DESCRIPTION');
		$data['NIP'] = $this->input->post('NIP');
		$data['EMAIL'] = $this->input->post('EMAIL');
		
		# set rules validation
		$this->form_validation->set_rules('NAME', 'NAME', 'required');
        $this->form_validation->set_rules('USERNAME', 'USERNAME', 'required');
        $this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'required');
		$this->form_validation->set_rules('USER_GROUP_ID', 'USER GROUP', 'required');
		$this->form_validation->set_rules('DEPARTMENT', 'DEPARTMENT', 'required');
		$this->form_validation->set_rules('NIP', 'NIP', 'required');
		$this->form_validation->set_rules('EMAIL', 'EMAIL', 'required|valid_email');
        
		
		# set message validation 
		
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('users/users_add',$data);
		}else{
			$this->users->insert($data);
			redirect('users');
		}
		
		$this->close_backend();
	}
	
	public function edit($id){
		$this->open_backend();
		
		$data['id'] = $id;
		$data['result'] = $this->users->get_data_edit($id);
		
		$this->load->view('users/users_edit', $data);
		
		$this->close_backend();
	}
	
	public function proses_edit(){
		$this->open_backend();
		
		$data['id'] = $this->input->post('id');
		$data['NAME'] = $this->input->post('NAME');
        $data['USERNAME'] = $this->input->post('USERNAME');
	
		
        $data['PASSWORD'] = md5($this->input->post('PASSWORD'));
		$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');
		$data['DEPARTMENT'] = $this->input->post('DEPARTMENT');
		$data['DESCRIPTION'] = $this->input->post('DESCRIPTION');
		$data['NIP'] = $this->input->post('NIP');
		$data['EMAIL'] = $this->input->post('EMAIL');
		
		# set rules validation
		$this->form_validation->set_rules('NAME', 'NAME', 'required');
        $this->form_validation->set_rules('USERNAME', 'USERNAME', 'required');
        $this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'required');
		$this->form_validation->set_rules('USER_GROUP_ID', 'USER GROUP', 'required');
		$this->form_validation->set_rules('DEPARTMENT', 'DEPARTMENT', 'required');
		$this->form_validation->set_rules('NIP', 'NIP', 'required');
		$this->form_validation->set_rules('EMAIL', 'EMAIL', 'required|valid_email');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('users/users_edit',$data);
		}else{
			$this->users->update($data);
			redirect('users');
		}
		
		$this->close_backend();
	}
	
	public function proses_delete($id){
		if($this->users->delete($id)){
			redirect('users');
		}else{
			// code u/ gagal simpan
			
		}
	}
	
	public function proses_pencarian(){
	
		$keysearch_users = $this->input->post('txt_search');
		/*if ($keysearch_users!=''){
				$this->session->set_userdata('keysearch_users', $keysearch_users);
			}else{
				$keysearch_users = $this->session->userdata('keysearch_users');
			}*/
		
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/users/proses_pencarian/';
		$config['total_rows'] = $this->users->get_users_like($keysearch_users,true);
		$config['full_tag_open'] = '<p class="pagination">';
		$config['per_page'] = '5';
		$config['num_links'] = '3';
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->users->get_users_like($keysearch_users,false,$config['per_page'], $this->uri->segment(3));
		$this->load->view('users/users_list', $data); 
		
	}
	
	
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */