<?php if (!defined('BASEPATH')) exit('No direct script access allowed');class user_group extends MY_Controller{	function __construct()	{		parent::__construct();		$this->load->helper('url');		$this->load->model('Authentikasi');		$this->load->model('mdl_user_group', 'user_group');		$this->load->library('auth_ad');	}	function index()	{				$this->open_backend();				# config pagination		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/user_group/index/';		$config['total_rows'] = $this->db->count_all('USER_GROUP');		$config['per_page'] = '30';		$config['num_links'] = '3';		$this->pagination->initialize($config);					$data['results'] = $this->user_group->getItem($config['per_page'], $this->uri->segment(3));		$this->load->view('user_group/user_group_list', $data);				$this->close_backend();			}		public function add(){		$this->open_backend();		$this->load->view('user_group/user_group_add');		$this->close_backend();	}		public function proses_add(){		$this->open_backend();				# get post data				$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');        $data['MENU_ID'] = $this->input->post('MENU_ID');				# set rules validation		$this->form_validation->set_rules('USER_GROUP_ID', 'USER_GROUP_ID', 'required');        $this->form_validation->set_rules('MENU_ID', 'MENU_ID', 'required');				# set message validation		$this->form_validation->set_message('required', 'Field %s harus diisi!');						if ($this->form_validation->run() == FALSE){			$this->load->view('user_group/user_group_add',$data);		}else{			$this->user_group->insert($data);			redirect('user_group');		}				$this->close_backend();	}		public function edit($id){		$this->open_backend();				$data['id'] = $id;		$data['result'] = $this->user_group->get_data_edit($id);				$this->load->view('user_group/user_group_edit', $data);				$this->close_backend();	}		public function proses_edit(){		$this->open_backend();				# get post data					$data['ID'] = $this->input->post('ID');		$data['USER_GROUP_ID'] = $this->input->post('USER_GROUP_ID');        $data['MENU_ID'] = $this->input->post('MENU_ID');        				# set rules validation		$this->form_validation->set_rules('USER_GROUP_ID', 'USER_GROUP_ID', 'required');        $this->form_validation->set_rules('MENU_ID', 'MENU_ID', 'required');				# set message validation		$this->form_validation->set_message('required', 'Field %s harus diisi!');				if ($this->form_validation->run() == FALSE){			$this->load->view('user_group/user_group_edit',$data);		}else{			$this->user_group->update($data);			redirect('user_group');		}				$this->close_backend();	}		public function proses_delete($id){		if($this->user_group->delete($id)){			redirect('user_group');		}else{			// code u/ gagal simpan					}	}	}/* End of file user_group.php *//* Location: ./application/controllers/user_group.php */