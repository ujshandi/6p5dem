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
		$config['per_page'] = '30';
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
		$config['per_page'] = '30';
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
		$config['per_page'] = '30';
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
		$config['per_page'] = '30';
		$config['num_links'] = '3';
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->users->get_users_like($keysearch_users,false,$config['per_page'], $this->uri->segment(3));
		$this->load->view('users/users_list', $data); 
		
	}
	
	/*get list data sdm from table sdm*/
	function get_users_sdm(){
		$keysearch_users = $this->input->post('txt_search');
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/users/get_users_sdm/';
		$config['total_rows'] = $this->users->get_item_sdm($keysearch_users,true);
		$config['full_tag_open'] = '<p class="pagination">';
		$config['per_page'] = '30';
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
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/users/get_users_diklat/';
		$config['total_rows'] = $this->users->get_item_diklat($keysearch_users,true);
		$config['full_tag_open'] = '<p class="pagination">';
		$config['per_page'] = '30';
		$config['num_links'] = '3';
		$config['is_ajax_paging']      =  TRUE; // default FALSE
		$config['paging_function'] = 'ajax_paging'; // Your jQuery paging
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->users->get_item_diklat($keysearch_users,false,$config['per_page'], $this->uri->segment(3));
		$this->load->view('users/users_list_diklat', $data);
	}
	
	public function get_users_kopeten(){
		$keysearch_users = $this->input->post('txt_search');
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/users/get_users_kopeten/';
		$config['total_rows'] = $this->users->get_item_kopeten($keysearch_users,true);
		$config['full_tag_open'] = '<p class="pagination">';
		$config['per_page'] = '30';
		$config['num_links'] = '3';
		$config['is_ajax_paging']      =  TRUE; // default FALSE
		$config['paging_function'] = 'ajax_paging'; // Your jQuery paging
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->users->get_item_kopeten($keysearch_users,false,$config['per_page'], $this->uri->segment(3));
		$this->load->view('users/users_list_kopeten', $data);
	}
	
	public function get_users_jdih(){
		$keysearch_users = $this->input->post('txt_search');
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/users/get_users_jdih/';
		$config['total_rows'] = $this->users->get_item_jdih($keysearch_users,true);
		$config['full_tag_open'] = '<p class="pagination">';
		$config['per_page'] = '30';
		$config['num_links'] = '3';
		$config['is_ajax_paging']      =  TRUE; // default FALSE
		$config['paging_function'] = 'ajax_paging'; // Your jQuery paging
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->users->get_item_jdih($keysearch_users,false,$config['per_page'], $this->uri->segment(3));
		$this->load->view('users/users_list_jdih', $data);
	}
	
	public function proses_add(){
		//$this->open_backend();
		
		# get post data
		$data['NAME'] = $this->input->post('NAME');
        $data['USERNAME'] = $this->input->post('USERNAME');
        $data['PASSWORD'] = md5($this->input->post('PASSWORD'));
		$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');
		
		$data['NIP'] = $this->input->post('NIP');
		$data['EMAIL'] = $this->input->post('EMAIL');
		/*$data['LEVEL'] = $this->input->post('LEVEL_ID');
		$INDUK_UPT = $this->input->post('INDUK_UPT');
		$UPT = $this->input->post('UPT');
		$data['KODE_UPT'] = $INDUK_UPT; */
		$data['LEVEL'] = "";
		$data['KODE_UPT'] = "";
		# set rules validation
		$this->form_validation->set_rules('NAME', 'NAME', 'required');
        $this->form_validation->set_rules('USERNAME', 'USERNAME', 'required');
        $this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'required');
		$this->form_validation->set_rules('USER_GROUP_ID', 'USER GROUP', 'required');        
		
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
		$data['LEVEL'] = $this->input->post('LEVEL_ID');
		//$data['KODEPROVIN'] = $this->input->post('KODEPROVIN');
		$data['KODEKABUP'] = $this->input->post('KODEKABUP');
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
		$data['NAME']=$data['result']->row()->NAME;
		$data['USERNAME']=$data['result']->row()->USERNAME;
		$data['PASSWORD']=$data['result']->row()->PASSWORD;
		$data['USER_GROUP_ID']=$data['result']->row()->USER_GROUP_ID;
		$data['EMAIL']=$data['result']->row()->EMAIL;
		$data['NIP']=$data['result']->row()->NIP;
		$data['NIP']=$data['result']->row()->NIP;
		
		$this->load->view('users/users_edit', $data);
		
		//$this->close_backend();
	}
	
	public function edit_sdm($id){
		$data['id'] = $id;
		$results = $this->users->get_data_edit_sdm($id);
		$data['USERNAME']=$results->row()->USERNAME;
		$data['USER_GROUP_ID']=$results->row()->USER_GROUP_ID;
		$data['LEVEL_ID']=$results->row()->LEVEL;
		$data['KODEPROVIN']=$results->row()->KODEPROVIN;
		$data['EMAIL']=$results->row()->EMAIL;
		
		$this->load->view('users/users_edit_sdm', $data);
		
	}
	
	public function proses_edit(){
	
	
		//$this->open_backend();
		
		$data['ID'] = $this->input->post('ID');
		$data['id'] = $data['ID'];
		$data['NAME'] = $this->input->post('NAME');
        $data['USERNAME'] = $this->input->post('USERNAME');
	
		
        $data['PASSWORD'] = md5($this->input->post('PASSWORD'));
		$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');
		$data['NIP'] = $this->input->post('NIP');
		$data['EMAIL'] = $this->input->post('EMAIL');
		$data['LEVEL'] = $this->input->post('LEVEL_ID');
		
		
		# set rules validation
		$this->form_validation->set_rules('NAME', 'NAME', 'required');
        $this->form_validation->set_rules('USERNAME', 'USERNAME', 'required');
        $this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'required');
		$this->form_validation->set_rules('USER_GROUP_ID', 'USER GROUP', 'required');
		/*$this->form_validation->set_rules('DEPARTMENT', 'DEPARTMENT', 'required'); */
		/*$this->form_validation->set_rules('NIP', 'NIP', 'required'); */
		/*$this->form_validation->set_rules('KODE_UPT', 'KODE_UPT', 'required');*/
		/*$this->form_validation->set_rules('EMAIL', 'EMAIL', 'required|valid_email'); */
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
		$data['LEVEL'] = $this->input->post('LEVEL_ID');
		$data['KODEPROVIN'] = $this->input->post('KODEPROVIN');
		$data['KODEKABUP'] = $this->input->post('KODEKABUP');
		
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
		$data['LEVEL']=$results->row()->LEVEL;
		$data['KODE_UPT']=$results->row()->KODE_UPT;
		$this->load->view('users/users_edit_diklat', $data);
	}
	
	public function proses_edit_diklat(){
		$data['USERNAME'] = $this->input->post('USERNAME');
		$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');
		$data['LEVEL'] = $this->input->post('LEVEL_ID');
		$INDUK_UPT = $this->input->post('INDUK_UPT');
		$UPT = $this->input->post('UPT');
		if ($data['LEVEL']==2){
			$data['KODE_UPT'] = $INDUK_UPT;	
		}else if ($data['LEVEL']==3){
			$data['KODE_UPT'] = $UPT;	
		}
		
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
	
	public function edit_jdih($id){
		$data['id'] = $id;
		$results = $this->users->get_data_edit_jdih($id);
		$data['USERNAME']=$results->row()->USERNAME;
		$data['USER_GROUP_ID']=$results->row()->USER_GROUP_ID;
		$data['LEVEL']=$results->row()->LEVEL;
		$this->load->view('users/users_edit_jdih', $data);
	}
	
	public function proses_edit_jdih(){
		$data['USERNAME'] = $this->input->post('USERNAME');
		$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');
		$data['LEVEL'] = $this->input->post('LEVEL');
	
		$this->form_validation->set_rules('USERNAME', 'USERNAME', 'required');
		$this->form_validation->set_rules('USER_GROUP_ID', 'USER_GROUP_ID', 'required');
		
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('users/users_edit_jdih',$data);
		}else{
			$this->users->update_jdih($data);
			redirect('users/get_users_jdih');
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
	
	public function proses_delete_diklat($id){
		
		if($this->users->delete_diklat($id)){
			redirect('users/get_users_diklat');
		}else{
			 echo 'Gagal Simpan';
		}
	
	}
	
	public function proses_delete_kopeten($id){
		
		if($this->users->delete_kopeten($id)){
			redirect('users/get_users_kopeten');
		}else{
			 echo 'Gagal Simpan';
		}
	
	}
	
	public function proses_delete_jdih($id){
		
		if($this->users->delete_jdih($id)){
			redirect('users/get_users_jdih');
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
		$data['LEVEL'] = $this->input->post('LEVEL_ID');
		
		$INDUK_UPT = $this->input->post('INDUK_UPT');
		$UPT = $this->input->post('UPT');
		if ($data['LEVEL']==2){
			$data['KODE_UPT'] = $INDUK_UPT;	
		}else if ($data['LEVEL']==3){
			$data['KODE_UPT'] = $UPT;	
		}else if ($data['LEVEL']==1){
			$data['KODE_UPT'] = "";	
		}
		
		
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
	
	public function add_kopeten(){

		
		$data['results'] = $this->users->get_allitem_kopeten();
		
		$this->load->view('users/users_add_kopeten', $data);
	}
	
	/*kopeten*/
	public function proses_add_kopeten(){
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
		/*$data['LEVEL'] = $this->input->post('LEVEL_ID'); 
	
		if ($data['LEVEL']==2){
			$data['KODE_UPT'] = $INDUK_UPT;	
		}else if ($data['LEVEL']==3){
			$data['KODE_UPT'] = $UPT;	
		}else if ($data['LEVEL']==1){
			$data['KODE_UPT'] = "";	
		}*/
		
		
		# set rules validation
		
        $this->form_validation->set_rules('USER_ID', 'USER_ID', 'required');
		$this->form_validation->set_rules('USER_GROUP_ID', 'USER GROUP', 'required');
        
		
		# set message validation 
		
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('users/users_add_kopeten',$data);
		}else{
			$this->users->insert_kopeten($data);
			redirect('users/get_users_kopeten');
		}
	}
	
	public function edit_kopeten($id){
		$data['id'] = $id;
		$results = $this->users->get_data_edit_kopeten($id);
		$data['USERNAME']=$results->row()->USERNAME;
		$data['USER_GROUP_ID']=$results->row()->USER_GROUP_ID;
		/*$data['LEVEL']=$results->row()->LEVEL;
		$data['KODE_UPT']=$results->row()->KODE_UPT;*/
		$this->load->view('users/users_edit_kopeten', $data);
	}
	
	public function proses_edit_kopeten(){
		$data['USERNAME'] = $this->input->post('USERNAME');
		$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');
		$data['LEVEL'] = $this->input->post('LEVEL_ID');
		$INDUK_UPT = $this->input->post('INDUK_UPT');
		$UPT = $this->input->post('UPT');
		if ($data['LEVEL']==2){
			$data['KODE_UPT'] = $INDUK_UPT;	
		}else if ($data['LEVEL']==3){
			$data['KODE_UPT'] = $UPT;	
		}
		
		$this->form_validation->set_rules('USERNAME', 'USERNAME', 'required');
		$this->form_validation->set_rules('USER_GROUP_ID', 'USER_GROUP_ID', 'required');
		
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('users/users_edit_kopeten',$data);
		}else{
			$this->users->update_kopeten($data);
			redirect('users/get_users_kopeten');
		}
		
	}
	
	public function add_jdih(){

		
		$data['results'] = $this->users->get_allitem_jdih();
		
		$this->load->view('users/users_add_jdih', $data);
	}
	
	public function proses_add_jdih(){
		# get post data
        $USER_ID = $this->input->post('USER_ID');
		$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');
		$data['LEVEL'] = $this->input->post('LEVEL');
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
			$this->load->view('users/users_add_jdih',$data);
		}else{
			$this->users->insert_jdih($data);
			redirect('users/get_users_jdih');
		}
	}
	
	function get_induk_upt(){
		$level_id=$this->input->post('level_id');
		$kode_upt= $this->input->post('kode_upt');
		$data['level_id'] = $level_id;
		$data['kode_upt'] = $kode_upt;
		if ($level_id=='2'){ /*induk upt -> tbl mst_induk_upt */
			/*$data['results']=$this->users->get_induk_upt($kode_upt); */
			
			/*upt darat,laut.udara */
			$this->load->view('users/get_induk_upt', $data);
		}elseif($level_id=='3'){ /*upt ->induk upt dan master upt*/
			/*$data['results']=$this->users->get_upt($kode_upt); */
			$this->load->view('users/get_upt', $data);
		}else{
			$data['results'] = "";
		}
		
		
	}
	
	function get_upt(){
		$induk_upt=$this->input->post('induk_upt');
		$var_level_id=$this->input->post('var_level_id');
		
		$data['results']=$this->users->get_upt($induk_upt);
		$this->load->view('users/get_upt', $data);
	}
	
	function get_provinsi(){
		$level_id=$this->input->post('level_id');
		$kodeprovin=$this->input->post('kodeprovin');
		$kodekabup=$this->input->post('kodekabup');
		$data['level_id'] = $level_id;
		$data['kodeprovin'] = $kodeprovin;
		$data['kodekabup'] = $kodekabup;
		$data['results']=$this->users->get_provinsi();
		$this->load->view('users/get_provinsi', $data);
	}
	
	function get_kabupaten(){
		
		$kodeprovin = $this->input->post('kodeprovin');
		$data['kodekabup']=$this->input->post('kodekabup');
		$data['kodeprovin']=$kodeprovin;
		

		
		$data['results']=$this->users->get_kabupaten($kodeprovin);
		$this->load->view('users/get_kabupaten', $data);
	}
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */