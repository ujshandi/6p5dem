<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class user_privilege extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('Authentikasi');
		$this->load->model('mdl_user_privilege', 'user_privilege');
		$this->load->library('auth_ad');
	}

	function index()
	{
		
		$this->open_backend();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/user_privilege/index/';
		$config['total_rows'] = $this->user_privilege->countItem();
		$config['per_page'] = '30';
		$config['num_links'] = '3';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->user_privilege->getItem($config['per_page'], $this->uri->segment(3));
		$this->load->view('user_privilege/user_privilege_list', $data);
		
		$this->close_backend();
		
	}
	
	public function add(){
		$this->open_backend();
		$this->load->view('user_privilege/user_privilege_add');
		$this->close_backend();
	}
	
	public function proses_add(){
		$this->open_backend();
		
		# get post data
		$hakakses1 = $this->input->post('HAKAKSES1')=='1'?'1':'0';
        $hakakses2 = $this->input->post('HAKAKSES2')=='1'?'1':'0';
        $hakakses3 = $this->input->post('HAKAKSES3')=='1'?'1':'0';
        $hakakses4 = $this->input->post('HAKAKSES4')=='1'?'1':'0';
        $hakakses5 = $this->input->post('HAKAKSES5')=='1'?'1':'0';
		
		$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');
        $data['MENU_ID'] = $this->input->post('MENU_ID');
        $data['PRIVILEGE'] = $hakakses1.$hakakses2.$hakakses3.$hakakses4.$hakakses5;
		
		# set rules validation
		$this->form_validation->set_rules('USER_GROUP_ID', 'USER_GROUP_ID', 'required');
        $this->form_validation->set_rules('MENU_ID', 'MENU_ID', 'required');
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('user_privilege/user_privilege_add',$data);
		}else{
			$this->user_privilege->insert($data);
			redirect('user_privilege');
		}
		
		$this->close_backend();
	}
	
	public function edit($id){
		$this->open_backend();
		
		$data['id'] = $id;
		$data['results'] = $this->user_privilege->get_data_edit($id);
		
		$this->load->view('user_privilege/user_privilege_edit', $data);
		
		$this->close_backend();
	}
	
	public function proses_edit(){
		$this->open_backend();
		
		# get post data
		
		$data['ID'] = $this->input->post('ID');
		$MENU = $this->input->post('MENU');
		
		foreach ($MENU  as $value){
			/*echo $value['MENU_ID'] .'-'. $value['HAKAKSES0'] . '-' . $value['HAKAKSES1'] . '-' . $value['HAKAKSES2'] . '-' . $value['HAKAKSES3'] . '-' . $value['HAKAKSES4'] . '<br/>';
			$data['USER_GROUP_MENU_ID'] = $value['USER_GROUP_MENU_ID'];*/
			
			if (isset($value['HAKAKSES0'])){
				$HAKAKSES0 = '1';
			}else{
				$HAKAKSES0 = '0';
			}
			
			if (isset($value['HAKAKSES1'])){
				$HAKAKSES1 = '1';
			}else{
				$HAKAKSES1 = '0';
			}
			if (isset($value['HAKAKSES2'])){
				$HAKAKSES2 = '1';
			}else{
				$HAKAKSES2 = '0';
			}
			
			if (isset($value['HAKAKSES3'])){
				$HAKAKSES3 = '1';
			}else{
				$HAKAKSES3 = '0';
			}
			
			if (isset($value['HAKAKSES4'])){
				$HAKAKSES4 = '1';
			}else{
				$HAKAKSES4 = '0';
			}
			
			
			$data['USER_GROUP_MENU_ID'] = $value['USER_GROUP_MENU_ID'];
			$data['PRIVILEGE']=$HAKAKSES0.$HAKAKSES1.$HAKAKSES2.$HAKAKSES3.$HAKAKSES4;
			$this->user_privilege->update($data);
		}
        
		redirect('user_privilege');
		
		$this->close_backend();
	}
	
	public function proses_delete($id){
		if($this->user_privilege->delete($id)){
			redirect('user_privilege');
		}else{
			// code u/ gagal simpan
			
		}
	}
	
}

/* End of file user_privilege.php */
/* Location: ./application/controllers/user_privilege.php */