<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller
{
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

		$config['base_url'] = base_url().'index.php/users/index/';

		$config['total_rows'] = $this->db->count_all('USERS');

		$config['per_page'] = '20';

		$config['num_links'] = '5';

		$config['uri_segment'] = '3';	

		$config['full_tag_open'] = '';
		$config['full_tag_close'] = '';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
	
		$config['cur_tag_open'] = '<li><a href="javascript:void(0)" class="current">';
		$config['cur_tag_close'] = '</a></li>';

		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$this->pagination->initialize($config);	
		$data['results'] = $this->users->getItem($config['per_page'], $this->uri->segment(3));
		$this->load->view('users/users_list', $data);
		$this->close_backend();
	}
	
	function insert()

	{
		$this->open_backend();

		$data['USERNAME'] = $this->input->post('username');
		$data['PASSWORD'] = $this->input->post('password');
		$data['NAME'] = $this->input->post('name');
		$data['USER_GROUP_ID'] = $this->input->post('user_group_id');
		$data['DEPARTMENT'] = $this->input->post('department');
		$data['POSITION'] = $this->input->post('position');
		$data['DESCRIPTION'] = $this->input->post('description');
		$data['NIP'] = $this->input->post('nip');


		# set rules validation
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('user_group_id', 'user_group_id', 'required');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		# set message validation
		$this->form_validation->set_message('required', 'Field Harus Diisi!');

		if ($this->form_validation->run() == FALSE){

			$this->load->view('users/users_add',$data);
		}else{	

			$data['PASSWORD'] = md5($this->input->post('password'));

			echo $this->users->insert($data['USERNAME'] ,$data['PASSWORD'],$data['NAME'],$data['USER_GROUP_ID'] ,$data['DEPARTMENT'] ,$data['POSITION'],$data['DESCRIPTION'] ,$data['NIP']);

			$this->session->set_flashdata('message', 'Data user Berhasil disimpan.');

			redirect('users');

		}
		$this->close_backend();
	}

	

	function update($id)

	{

		if ($this->can_update() == FALSE){

			redirect('auth/failed');

		}

		

		$this->open();

		

		$data['result'] 		= $this->users->getItemById($id);

		

		$data['userid'] = $data['result']->row()->userid;

		$data['username'] = $data['result']->row()->username;

		$data['password'] = $data['result']->row()->password;

		$data['nama'] = $data['result']->row()->nama;

		$data['level_id'] = $data['result']->row()->level_id;

		$data['id_cabang'] = $data['result']->row()->id_cabang;

		

		

		$this->load->view('users/users_edit', $data);

		

		$this->close();

	}

	

	function process_update()

	{

		if ($this->can_update() == FALSE){

			redirect('auth/failed');

		}

		

		$this->open();

		

		# Data

		$data['userid'] = get_userid();

		$data['username'] = $this->input->post('username');

		$data['password'] = $this->input->post('password');

		$data['nama'] = $this->input->post('nama');

		$data['level_id'] = $this->input->post('level_id');

		$data['id_cabang'] = $this->input->post('id_cabang');

		

		

		# set rules validation

		$this->form_validation->set_rules('username', 'username', 'required');

		$this->form_validation->set_rules('password', 'password', 'required');

		$this->form_validation->set_rules('nama', 'nama', 'required');

		$this->form_validation->set_rules('level_id', 'level_id', 'required');

		$this->form_validation->set_rules('id_cabang', 'id_cabang', 'required');

		

		

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		

		# set message validation

		$this->form_validation->set_message('required', 'Field Harus Diisi!');

		

		

		if ($this->form_validation->run() == FALSE){

			

			$this->load->view('users/users_edit',$data);

			

		}else{	

			$this->users->update($data['userid'], $data);

			$this->session->set_flashdata('message', 'Data user Berhasil diupdate.');

			redirect('users');

		}

		

		$this->close();

		

	}

	

	function delete($id)

	{

		if ($this->can_delete() == FALSE){

			redirect('auth/failed');

		}
		$this->users->delete($id);

		$this->session->set_flashdata('message', 'Data user Berhasil dihapus.');

		redirect('users');

	}
	
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */