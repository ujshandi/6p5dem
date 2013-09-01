<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class pengumuman_backend extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('Authentikasi');
		$this->load->model('mdl_pengumuman_backend', 'pengumuman');
		$this->load->library('auth_ad');
		$this->load->library('fungsi');
	}

	function index()
	{
		
		$this->open_backend();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/pengumuman_backend/index/';
		$config['total_rows'] = $this->db->count_all('BB_PENGUMUMAN');
		$config['per_page'] = '30';
		$config['num_links'] = '3';
		$this->pagination->initialize($config);	
		
		$data['results'] = $this->pengumuman->getItem($config['per_page'], $this->uri->segment(3));
		$this->load->view('pengumuman_backend/pengumuman_backend_list', $data);
		
		$this->close_backend();
		
	}
	
	public function add(){
		$this->open_backend();
		$this->load->view('pengumuman_backend/pengumuman_backend_add');
		$this->close_backend();
	}
	
	public function proses_add(){
		$this->open_backend();
		
		$config['upload_path'] = './asset/board/upload/pengumuman/';
		$config['allowed_types'] = 'gif|jpg|png|BMP|';
		$config['max_size']	= '1000';
		$config['max_width']  = '800';
		$config['max_height']  = '800';

		$this->load->library('upload', $config);

		if ( $this->upload->do_upload()){
			$data['GAMBAR'] =  $this->upload->file_name;
			# get post data
			$data['JUDUL'] = $this->input->post('JUDUL');
			$data['ISI'] = $this->input->post('ISI');
			
			$data['URL'] = $this->input->post('URL');
			$data['ATTACHMENT'] = $this->input->post('ATTACHMENT');
			$data['DESKRIPSI'] = $this->input->post('DESKRIPSI');
			$data['TANGGAL_MODIFIKASI'] = "to_date('".date('d/m/Y')."', 'dd/mm/yyyy')";
			$data['EXPIRE'] = "to_date('".$this->input->post('EXPIRE')."', 'dd/mm/yyyy')";
			$data['TANGGAL_PEMBUATAN'] = "to_date('".$this->input->post('TANGGAL_PEMBUATAN')."', 'dd/mm/yyyy')";
			
			# set rules validation
			$this->form_validation->set_rules('JUDUL', 'JUDUL', 'required');
			$this->form_validation->set_rules('ISI', 'ISI', 'required');
			$this->form_validation->set_rules('URL', 'URL', 'required');
			
			
			# set message validation
			$this->form_validation->set_message('required', 'Field %s harus diisi!');
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('pengumuman_backend/pengumuman_backend_add',$data);
			}else{
				$this->pengumuman->insert($data);
				redirect('pengumuman_backend');
			}
		}
		$this->close_backend();
	}
	
	public function edit($id){
		$this->open_backend();
		
		$data['id'] = $id;
		$data['result'] = $this->pengumuman->get_data_edit($id);
		
		$this->load->view('pengumuman_backend/pengumuman_backend_edit', $data);
		
		$this->close_backend();
	}
	
	public function proses_edit(){
		$this->open_backend();
		
		$data['id'] = $this->input->post('id');
        $data['JUDUL'] = $this->input->post('JUDUL');
		$data['DESKRIPSI'] = $this->input->post('DESKRIPSI');
        $data['ISI'] = $this->input->post('ISI');
        $data['URL'] = $this->input->post('URL');
        $data['GAMBAR'] = $this->input->post('GAMBAR');
    
		$data['TANGGAL_MODIFIKASI'] = "to_date('".date('d/m/Y')."', 'dd/mm/yyyy')";
		$data['EXPIRE'] = "to_date('".$this->input->post('EXPIRE')."', 'dd/mm/yyyy')";

		# set rules validation
        $this->form_validation->set_rules('JUDUL', 'JUDUL', 'required');
        $this->form_validation->set_rules('DESKRIPSI', 'DESKRIPSI', 'required');
       
        
		
		# set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('pengumuman_backend/pengumuman_backend_edit',$data);
		}else{
			$this->pengumuman->update($data['id'],$data);
			redirect('pengumuman_backend');
		}
		
		$this->close_backend();
	}
	
	public function proses_delete($id){
		if($this->pengumuman->delete($id)){
			redirect('pengumuman_backend');
		}else{
			// code u/ gagal simpan
			redirect('pengumuman_backend');
		}
	}
	
}

/* End of file pengumuman_backend.php */
/* Location: ./application/controllers/pengumuman_backend.php */