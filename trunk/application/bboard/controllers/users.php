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
		
		/*
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/users/index/';
		$config['total_rows'] = $this->db->count_all('USERS');
		$config['full_tag_open'] = '<p class="pagination">';
		$config['per_page'] = '5';
		$config['num_links'] = '3';
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->users->getItem($config['per_page'], $this->uri->segment(3));
		$this->load->view('users/users_filter', $data); */
		
		$this->load->view('users/users_tabbed');
		
		$this->close_backend();
		
	}
	
	function users_filter(){
		
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/users/index/';
		$config['total_rows'] = $this->db->count_all('USERS');
		$config['full_tag_open'] = '<p class="pagination">';
		$config['per_page'] = '5';
		$config['num_links'] = '3';
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->users->getItem($config['per_page'], $this->uri->segment(3));
		$this->load->view('users/users_filter', $data); 
	}
	
	
	
	public function add(){
		//$this->open_backend();
		$this->load->view('users/users_add');
		//$this->close_backend();
	}
	
	/*get list data bboard from table users*/
	public function getall(){
		$keysearch_users = $this->input->post('txt_search');
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/users/getall/';
		
		$config['total_rows'] = $this->users->get_users_like($keysearch_users,true);
		$config['full_tag_open'] = '<p class="pagination">';
		$config['per_page'] = '5';
		$config['num_links'] = '3';
		$config['is_ajax_paging']      =  TRUE; // default FALSE
		$config['paging_function'] = 'ajax_paging'; // Your jQuery paging
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->users->get_users_like($keysearch_users,false,$config['per_page'], $this->uri->segment(3));
		$this->load->view('users/users_list', $data);
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
	
	/*get list data sdm from table sdm*/
	function get_users_sdm(){
		$keysearch_users = $this->input->post('txt_search');
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/users/getall/';
		$config['total_rows'] = $this->users->get_item_sdm($keysearch_users,true);
		$config['full_tag_open'] = '<p class="pagination">';
		$config['per_page'] = '5';
		$config['num_links'] = '3';
		$config['is_ajax_paging']      =  TRUE; // default FALSE
		$config['paging_function'] = 'ajax_paging'; // Your jQuery paging
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->users->get_item_sdm($keysearch_users,false,$config['per_page'], $this->uri->segment(3));
		$this->load->view('users/users_list_sdm', $data);
	}
	
	function get_users_diklat(){
		$keysearch_users = $this->input->post('txt_search');
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/users/getall/';
		$config['total_rows'] = $this->users->get_item_diklat($keysearch_users,true);
		$config['full_tag_open'] = '<p class="pagination">';
		$config['per_page'] = '5';
		$config['num_links'] = '3';
		$config['is_ajax_paging']      =  TRUE; // default FALSE
		$config['paging_function'] = 'ajax_paging'; // Your jQuery paging
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->users->get_item_diklat($keysearch_users,false,$config['per_page'], $this->uri->segment(3));
		$this->load->view('users/users_list_diklat', $data);
	}
	
	public function proses_add(){
		//$this->open_backend();
		
		# get post data
		$data['NAME'] = $this->input->post('NAME');
        $data['USERNAME'] = $this->input->post('USERNAME');
        $data['PASSWORD'] = md5($this->input->post('PASSWORD'));
		$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');
		$data['DEPARTMENT'] = $this->input->post('DEPARTMENT');
		$data['POSITION'] = $this->input->post('POSITION');
		$data['DESCRIPTION'] = $this->input->post('DESCRIPTION');
		$data['NIP'] = $this->input->post('NIP');
		$data['EMAIL'] = $this->input->post('EMAIL');
		$data['LEVEL'] = $this->input->post('LEVEL_ID');
		$INDUK_UPT = $this->input->post('INDUK_UPT');
		$UPT = $this->input->post('UPT');
		$data['KODE_UPT'] = $INDUK_UPT;
		# set rules validation
		$this->form_validation->set_rules('NAME', 'NAME', 'required');
        $this->form_validation->set_rules('USERNAME', 'USERNAME', 'required');
        $this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'required');
		$this->form_validation->set_rules('USER_GROUP_ID', 'USER GROUP', 'required');
		$this->form_validation->set_rules('DEPARTMENT', 'DEPARTMENT', 'required');
		
		$this->form_validation->set_rules('NIP', 'NIP', 'required|numeric');
		$this->form_validation->set_rules('EMAIL', 'EMAIL', 'required|valid_email');
        
		
		# set message validation 
		
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('users/users_add',$data);
		}else{
			$this->users->insert($data);
			redirect('users/getall');
		}
		
		//$this->close_backend();
	}
	
	public function add_sdm(){

		
		$data['results'] = $this->users->get_allitem_sdm();
		
		$this->load->view('users/users_add_sdm', $data);
	}
	
	public function proses_add_sdm(){
		# get post data
        $USER_ID = $this->input->post('USER_ID');
		$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');
		$results=$this->users->get_item_by_username($USER_ID);
		$data['USER_ID']=$USER_ID;
		$data['USERNAME']=$results->row()->USERNAME;
		$data['NAME']=$results->row()->NAME;
		$data['PASSWORD']=$results->row()->PASSWORD;
		$data['DEPARTMENT']=$results->row()->DEPARTMENT;
		$data['POSITION']=$results->row()->POSITION;
		$data['DESCRIPTION']=$results->row()->DESCRIPTION;
		$data['NIP']=$results->row()->NIP;
		$data['EMAIL']=$results->row()->EMAIL;
		
		
		# set rules validation
		
        $this->form_validation->set_rules('USER_ID', 'USER_ID', 'required');
		$this->form_validation->set_rules('USER_GROUP_ID', 'USER GROUP', 'required');
        
		
		# set message validation 
		
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('users/users_add_sdm',$data);
		}else{
			$this->users->insert_sdm($data);
			redirect('users/get_users_sdm');
		}
	}
	
	public function edit($id){
		//$this->open_backend();
		
		$data['id'] = $id;
		$data['result'] = $this->users->get_data_edit($id);
		
		$this->load->view('users/users_edit', $data);
		
		//$this->close_backend();
	}
	
	public function edit_sdm($id){
		$data['id'] = $id;
		$results = $this->users->get_data_edit_sdm($id);
		$data['USERNAME']=$results->row()->USERNAME;
		$data['USER_GROUP_ID']=$results->row()->USER_GROUP_ID;
		$this->load->view('users/users_edit_sdm', $data);
		
	}
	
	public function proses_edit(){
	
	
		//$this->open_backend();
		
		$data['ID'] = $this->input->post('ID');
		$data['NAME'] = $this->input->post('NAME');
        $data['USERNAME'] = $this->input->post('USERNAME');
	
		
        $data['PASSWORD'] = md5($this->input->post('PASSWORD'));
		$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');
		$data['DEPARTMENT'] = $this->input->post('DEPARTMENT');
		$data['POSITION'] = $this->input->post('POSITION');
		$data['DESCRIPTION'] = $this->input->post('DESCRIPTION');
		$data['NIP'] = $this->input->post('NIP');
		$data['EMAIL'] = $this->input->post('EMAIL');
		$data['LEVEL'] = $this->input->post('LEVEL_ID');
		
		
		# set rules validation
		$this->form_validation->set_rules('NAME', 'NAME', 'required');
        $this->form_validation->set_rules('USERNAME', 'USERNAME', 'required');
        $this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'required');
		$this->form_validation->set_rules('USER_GROUP_ID', 'USER GROUP', 'required');
		$this->form_validation->set_rules('DEPARTMENT', 'DEPARTMENT', 'required');
		$this->form_validation->set_rules('NIP', 'NIP', 'required');
		$this->form_validation->set_rules('KODE_UPT', 'KODE_UPT', 'required');
		$this->form_validation->set_rules('EMAIL', 'EMAIL', 'required|valid_email');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('users/users_edit',$data);
		}else{
			$this->users->update($data);
			redirect('users/getall');
		}
		
		//$this->close_backend();
	}
	
	public function proses_edit_sdm(){
		$data['USERNAME'] = $this->input->post('USERNAME');
		$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');
		
		$this->form_validation->set_rules('USERNAME', 'USERNAME', 'required');
		$this->form_validation->set_rules('USER_GROUP_ID', 'USER_GROUP_ID', 'required');
		
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('users/users_edit_sdm',$data);
		}else{
			$this->users->update_sdm($data);
			redirect('users/get_users_sdm');
		}
		
	}
	
	public function edit_diklat($id){
		$data['id'] = $id;
		$results = $this->users->get_data_edit_diklat($id);
		$data['USERNAME']=$results->row()->USERNAME;
		$data['USER_GROUP_ID']=$results->row()->USER_GROUP_ID;
		$this->load->view('users/users_edit_diklat', $data);
	}
	
	public function proses_edit_diklat(){
		$data['USERNAME'] = $this->input->post('USERNAME');
		$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');
		
		$this->form_validation->set_rules('USERNAME', 'USERNAME', 'required');
		$this->form_validation->set_rules('USER_GROUP_ID', 'USER_GROUP_ID', 'required');
		
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('users/users_edit_diklat',$data);
		}else{
			$this->users->update_diklat($data);
			redirect('users/get_users_diklat');
		}
		
	}
	
	public function proses_delete($id){
		if($this->users->delete($id)){
			redirect('users');
		}else{
			// code u/ gagal simpan
			
		}
	}
	
	public function proses_delete_sdm($id){
		
		if($this->users->delete_sdm($id)){
			redirect('users/get_users_sdm');
		}else{
			 echo 'Gagal Simpan';
		}
	
	}
	
	
	
	public function add_diklat(){

		
		$data['results'] = $this->users->get_allitem_diklat();
		
		$this->load->view('users/users_add_diklat', $data);
	}
	
	/*diklat*/
	public function proses_add_diklat(){
		# get post data
        $USER_ID = $this->input->post('USER_ID');
		$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');
		$results=$this->users->get_item_by_username($USER_ID);
		$data['USER_ID']=$USER_ID;
		$data['USERNAME']=$results->row()->USERNAME;
		$data['NAME']=$results->row()->NAME;
		$data['PASSWORD']=$results->row()->PASSWORD;
		$data['DEPARTMENT']=$results->row()->DEPARTMENT;
		$data['POSITION']=$results->row()->POSITION;
		$data['DESCRIPTION']=$results->row()->DESCRIPTION;
		$data['NIP']=$results->row()->NIP;
		$data['EMAIL']=$results->row()->EMAIL;
		
		
		# set rules validation
		
        $this->form_validation->set_rules('USER_ID', 'USER_ID', 'required');
		$this->form_validation->set_rules('USER_GROUP_ID', 'USER GROUP', 'required');
        
		
		# set message validation 
		
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('users/users_add_diklat',$data);
		}else{
			$this->users->insert_diklat($data);
			redirect('users/get_users_diklat');
		}
	}
	
	function get_induk_upt(){
		$level_id=$this->input->post('level_id');
		$data['level_id'] = $level_id;
		if ($level_id=='2'){ /*induk upt -> tbl mst_induk_upt */
			$data['results']=$this->users->get_induk_upt();
			
			//upt darat,laut.udara
		}elseif($level_id=='3'){ /*upt ->induk upt dan master upt*/
			$data['results']=$this->users->get_induk_upt();
		}else{
			$data['results'] = "";
		}
		
		$this->load->view('users/get_induk_upt', $data);
	}
	
	function get_upt(){
		$induk_upt=$this->input->post('induk_upt');
		$var_level_id=$this->input->post('var_level_id');
		
		$data['results']=$this->users->get_upt($induk_upt);
		$this->load->view('users/get_upt', $data);
	}
	
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */