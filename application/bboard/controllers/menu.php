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
		$config['total_rows'] = $this->db->count_all('MENU');
		$config['per_page'] = '20';
		$config['num_links'] = '3';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->menu->getItem($config['per_page'], $this->uri->segment(3));
		$data['number_ai'] = $this->uri->segment(3);
		$this->load->view('menu/menu_list', $data);
		
		$this->close_backend();
		
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
	
	public function edit($id){
		$this->open_backend();
		
		$data['id'] = $id;
		$data['result'] = $this->menu->get_data_edit($id);
		
		$this->load->view('menu/menu_edit', $data);
		
		$this->close_backend();
	}
	
	public function proses_edit(){
		$this->open_backend();
		
		echo '-' .$data['ID'] = $this->input->post('ID');
        echo '-' .$data['MENU_NAME'] = $this->input->post('MENU_NAME');
        echo '-' .$data['MENU_URL'] = $this->input->post('MENU_URL');
        echo '-' .$data['MENU_GROUPING_ID'] = $this->input->post('MENU_GROUPING_ID');
        
	
		
		# set rules validation
		$this->form_validation->set_rules('MENU_NAME', 'MENU_NAME', 'required');
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('menu/menu_edit',$data);
		}else{
			$this->menu->update($data);
			redirect('menu');
		}
		
		$this->close_backend();
	}
	
	public function proses_delete($id){
		if($this->menu->delete($id)){
			redirect('menu');
		}else{
			// code u/ gagal simpan
			
		}
	}
	
}

/* End of file menu.php */
/* Location: ./application/controllers/menu.php */