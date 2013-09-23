<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class menu extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('Authentikasi');
		$this->load->model('mdl_menu', 'menu');
		$this->load->model('mdl_user_privilege', 'user_privilege');
		$this->load->library('auth_ad');
	}

	function index()
	{

		$this->open_backend();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/menu/index/';
		/*
		$config['total_rows'] = $this->db->count_all('MENU');
		$config['per_page'] = '20';
		$config['num_links'] = '3';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->menu->getItem($config['per_page'], $this->uri->segment(3));
		$data['number_ai'] = $this->uri->segment(3); */
		/*$this->load->view('menu/menu_tabbed', $data); */
		$this->load->view('menu/menu_tabbed');
		
		$this->close_backend();
		
	}
	
	/*start bboard*/
	public function bboard_getall(){
		
		$keysearch_users = $this->input->post('txt_search');
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/menu/bboard_getall/';
		
		$config['total_rows'] = $this->menu->get_menu_bboard_like($keysearch_users,true);
		
		$config['full_tag_open'] = '<p class="pagination">';
		$config['per_page'] = '30';
		$config['num_links'] = '3';
		$config['is_ajax_paging']      =  TRUE; // default FALSE
		$config['paging_function'] = 'ajax_paging'; // Your jQuery paging
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->menu->get_menu_bboard_like($keysearch_users,false,$config['per_page'], $this->uri->segment(3));
		$data['number_ai'] = $this->uri->segment(3);
		$this->load->view('menu/menu_bboard_list', $data);
	}
	
	public function add(){
		$this->open_backend();
		$this->load->view('menu/menu_add');
		$this->close_backend();
	}
	
	public function proses_add(){
		$this->open_backend();
		
		# get post data
		$data['NAME'] = $this->input->post('NAME');
        $data['USERNAME'] = $this->input->post('USERNAME');
        $data['PASSWORD'] = $this->input->post('PASSWORD');
		$data['menu_ID'] = $this->input->post('menu_ID');
		$data['DEPARTMENT'] = $this->input->post('DEPARTMENT');
		$data['DESCRIPTION'] = $this->input->post('DESCRIPTION');
		$data['NIP'] = $this->input->post('NIP');
		$data['EMAIL'] = $this->input->post('EMAIL');
		
		# set rules validation
		$this->form_validation->set_rules('NAME', 'NAME', 'required');
        $this->form_validation->set_rules('USERNAME', 'USERNAME', 'required');
        $this->form_validation->set_rules('PASSWORD', 'PASSWORD', 'required');
		$this->form_validation->set_rules('menu_ID', 'USER GROUP', 'required');
		$this->form_validation->set_rules('DEPARTMENT', 'DEPARTMENT', 'required');
		$this->form_validation->set_rules('NIP', 'NIP', 'required');
		$this->form_validation->set_rules('EMAIL', 'EMAIL', 'required|valid_email');
        
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('menu/menu_add',$data);
		}else{
			$this->menu->insert($data);
			redirect('menu');
		}
		
		$this->close_backend();
	}
	
	public function edit_bboard($id){
		
		$data['id'] = $id;
		$data['result'] = $this->menu->get_data_edit_bboard($id);
		
		$this->load->view('menu/menu_edit_bboard', $data);
		
	}
	
	public function proses_edit_bboard(){
		
		
		$data['ID'] = $this->input->post('ID');
        $data['MENU_NAME'] = $this->input->post('MENU_NAME');
        $data['MENU_URL'] = $this->input->post('MENU_URL');
        $data['MENU_GROUPING_ID'] = $this->input->post('MENU_GROUPING_ID');
        
	
		
		# set rules validation
		$this->form_validation->set_rules('MENU_NAME', 'MENU_NAME', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('menu/menu_edit_bboard',$data);
		}else{
			$this->menu->update_bboard($data);
			redirect('menu/bboard_getall');
		}
		
	}
	
	public function proses_delete_bboard($id){
		if($this->menu->delete_bboard($id)){
			redirect('menu/bboard_getall');
		}else{
			// code u/ gagal simpan
			
		}
	}
	
	/*end bboard*/
	
	/*start sdm*/
	public function sdm_getall(){
		
		$keysearch_users = $this->input->post('txt_search');
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/menu/bboard_getall/';
		
		$config['total_rows'] = $this->menu->get_menu_sdm_like($keysearch_users,true);
		
		$config['full_tag_open'] = '<p class="pagination">';
		$config['per_page'] = '30';
		$config['num_links'] = '3';
		$config['is_ajax_paging']      =  TRUE; // default FALSE
		$config['paging_function'] = 'ajax_paging'; // Your jQuery paging
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->menu->get_menu_sdm_like($keysearch_users,false,$config['per_page'], $this->uri->segment(3));
		$data['number_ai'] = $this->uri->segment(3);
		$this->load->view('menu/menu_sdm_list', $data);
	}
	public function edit_sdm($id){
	
		$data['id'] = $id;
		$data['result'] = $this->menu->get_data_edit_sdm($id);
		$this->load->view('menu/menu_edit_sdm', $data);
		
	}
	public function proses_edit_sdm(){
		
		$data['ID'] = $this->input->post('ID');
        $data['MENU_NAME'] = $this->input->post('MENU_NAME');
        $data['MENU_GROUPING_ID'] = $this->input->post('MENU_GROUPING_ID');
        /*$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID'); */
		
		# set rules validation
		$this->form_validation->set_rules('MENU_NAME', 'MENU_NAME', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('menu/menu_edit',$data);
		}else{
			$this->menu->update_sdm($data);
			redirect('menu/sdm_getall');
		}
		
	}
	
	public function proses_delete_sdm($id){
		if($this->menu->delete_sdm($id)){
			redirect('menu/sdm_getall');
		}else{
			// code u/ gagal simpan
			
		}
	}
	/*end sdm*/
	
	/*start diklat*/
	public function diklat_getall(){
		
		$keysearch_users = $this->input->post('txt_search');
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/menu/bboard_getall/';
		
		$config['total_rows'] = $this->menu->get_menu_diklat_like($keysearch_users,true);
		
		$config['full_tag_open'] = '<p class="pagination">';
		$config['per_page'] = '30';
		$config['num_links'] = '3';
		$config['is_ajax_paging']      =  TRUE; // default FALSE
		$config['paging_function'] = 'ajax_paging'; // Your jQuery paging
		$config['full_tag_close'] = '</p>';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->menu->get_menu_diklat_like($keysearch_users,false,$config['per_page'], $this->uri->segment(3));
		$data['number_ai'] = $this->uri->segment(3);
		$this->load->view('menu/menu_diklat_list', $data);
	}
	public function edit_diklat($id){
	
		$data['id'] = $id;
		$data['result'] = $this->menu->get_data_edit_diklat($id);
		$this->load->view('menu/menu_edit_diklat', $data);
		
	}
	public function proses_edit_diklat(){
		$this->open_backend();
		
		$data['ID'] = $this->input->post('ID');
        $data['MENU_NAME'] = $this->input->post('MENU_NAME');
        $data['MENU_GROUPING_ID'] = $this->input->post('MENU_GROUPING_ID');
        /*$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID'); */
        
	
		
		# set rules validation
		$this->form_validation->set_rules('MENU_NAME', 'MENU_NAME', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('menu/menu_edit',$data);
		}else{
			$this->menu->update_diklat($data);
			redirect('menu/diklat_getall');
		}
		
		$this->close_backend();
	}
	
	public function proses_delete_diklat($id){
		if($this->menu->delete_diklat($id)){
			redirect('menu/diklat_getall');
		}else{
			// code u/ gagal simpan
			
		}
	}
	/*end diklat*/
	
}

/* End of file menu.php */
/* Location: ./application/controllers/menu.php */