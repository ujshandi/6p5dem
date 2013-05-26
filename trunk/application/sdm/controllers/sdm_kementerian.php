<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sdm_kementerian extends My_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mdl_sdm_kementerian');
	}
	
	public function index()
	{
		$this->open();
		
		# config pagination
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/sdm_kementerian/index/';
		$config['total_rows'] = $this->db->count_all('SDM_PEG_KEMENTRIAN');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$data['option_eselon1'] = $this->mdl_sdm_kementerian->geteselon1();
		$this->load->view('sdm_kementerian/sdm_kementerian', $data);
		
		
		$this->close();
	}
    
	
    function select_eselon2(){
    			
			if('IS_AJAX') {
            $data['option_eselon2'] = $this->mdl_sdm_kementerian->geteselon2();
       		$this->load->view('sdm_kementerian/selecteselon2',$data);
            }
    }
	
	 function select_eselon3(){
			
			if('IS_AJAX') {
            $data['option_eselon3'] = $this->mdl_sdm_kementerian->geteselon3();
       		$this->load->view('sdm_kementerian/selecteselon3',$data);
            }
    }
	
	function select_eselon4(){
			
			if('IS_AJAX') {
            $data['option_eselon4'] = $this->mdl_sdm_kementerian->geteselon4();
       		$this->load->view('sdm_kementerian/selecteselon4',$data);
            }
    }
 
    function search()
	{	
		$this->open();
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/sdm_kementerian/index/';
		$config['total_rows'] = $this->db->count_all('SDM_PEG_KEMENTRIAN');
		$config['per_page'] = '10';
		$config['num_links'] = '3';

		$this->pagination->initialize($config);	
		
		$e1 = $this->input->post('ID_ESELON_1');
		$e2 = $this->input->post('ID_ESELON_2');
		$e3 = $this->input->post('ID_ESELON_3');
		$e4 = $this->input->post('ID_ESELON_4');
		
		$data['option_eselon1'] = $this->mdl_sdm_kementerian->geteselon1();
		$data['option_eselon2'] = $this->mdl_sdm_kementerian->geteselon2();
		$data['option_eselon3'] = $this->mdl_sdm_kementerian->geteselon3();
		$data['option_eselon4'] = $this->mdl_sdm_kementerian->geteselon4();
		$data['result'] = $this->mdl_sdm_kementerian->get_data($e1, $e2, $e3, $e4);
		
		
		$this->load->view('sdm_kementerian/sdm_kementerian_search',$data);
		$this->close();
	}
	
	function detail($id){
		$this->open();
		$config['base_url'] = base_url().'/'.$this->config->item('index_page').'/sdm_kementerian/index/';		
		
		$data['result1'] = $this->mdl_sdm_kementerian->get_data_duk_detail($id);
		$data['result2'] = $this->mdl_sdm_kementerian->get_data_duk_detail_diklat($id);
		$data['result3'] = $this->mdl_sdm_kementerian->get_data_duk_detail_pendidikan($id);
		$this->load->view('sdm_kementerian/sdm_kementerian_detail',$data);
		$this->close();
	}
	
	function edit($id){
		$data['title']	='EDIT DATA PEGAWAI KEMENTERIAN ';
		$data['home']	='selected';
		$data['main']	='form/edit/kementrian1_edit';
		
		//$data['option_golongan'] =$this->MChain->get_golongan();
		//$data['option_jabatan'] =$this->MChain->get_jabatan();
		if($this->input->post('submit')){
			$id = $this->input->post('id_peg_kementrian');
			$this->MChain->update($id);
		}
		$data['result'] = $this->MChain->get_data_duk_detail($id);
		$this->load->view('container/template',$data);
	}
	
	function tes($id){
		$data['title']	='Detail Pegawai';
		$data['home']	='selected';
		$data['main']	='form/detail';
		
		$data['result1'] = $this->MChain->get_data_duk_detail($id);
		$data['result2'] = $this->MChain->get_data_duk_detail_diklat($id);
		$this->load->view('container/template', $data);
	}
	
	public function add_peg(){
	
		if($_POST){
			$add= $this->MChain->add_peg(
				$this->input->post('nip'),
				$this->input->post('nama'),
				$this->input->post('alamat'),
				$this->input->post('tmptLahir'),
				$this->input->post('tglLahir'),
				$this->input->post('agama'),
				$this->input->post('jenisKelamin'),
				$this->input->post('status'),
				$this->input->post('jmlAnak'),
				$this->input->post('id_eselon_1'),
				$this->input->post('id_eselon_2'),
				$this->input->post('id_eselon_3'),
				$this->input->post('id_eselon_4'),
				$this->input->post('id_golongan'),
				$this->input->post('id_jabatan'),
				$this->input->post('TMT'),
				$this->input->post('statusPeg'),
				$this->input->post('keterangan')
				
			);
            if($add)
            {
                print"<script>alert('Berhasil menambah user');</script>";
                redirect('','refresh');
            }
            else
            {
                print"<script>alert('Gagal menambah user');</script>";
                redirect('','refresh');
            }
		}
		else
        {
		
 		$data['option_eselon1'] = $this->MChain->geteselon1();
		$data['option_eselon2'] = $this->MChain->geteselon2();
		$data['option_eselon3'] = $this->MChain->geteselon3();
		$data['option_eselon4'] = $this->MChain->geteselon4();
		//get golongan
		$data['option_golongan'] = $this->MChain->getgolongan();
		//get jabatan
		$data['option_jabatan'] = $this->MChain->getjabatan();
		$data['option_jenisKelamin'] = array(
				''=>'-Pilih-',
				'pria'=>'pria',
				'wanita'=>'wanita'
		);
		$data['option_status'] = array(
				''=>'-Pilih-',
				'lajang'=>'lajang',
				'menikah'=>'menikah'
		);
		$data['option_statusPeg'] = array(
				''=>'-Pilih-',
				'PNS'=>'PNS',
				'Magang'=>'Magang'
		);
	    $data['title']	='Tambah Pegawai';
		$data['home']	='selected';
		$data['main']	='form/add/add_peg2';       
        $this->load->view('container/template',$data);
        }
		//get eselon
		/*$data['option_eselon1'] = $this->MChain->geteselon1();
		$data['option_eselon2'] = $this->MChain->geteselon2();
		$data['option_eselon3'] = $this->MChain->geteselon3();
		$data['option_eselon4'] = $this->MChain->geteselon4();
		//get golongan
		$data['option_golongan'] = $this->MChain->getgolongan();
		//get jabatan
		$data['option_jabatan'] = $this->MChain->getjabatan();
		$data['option_jenisKelamin'] = array(
				''=>'-Pilih-',
				'pria'=>'pria',
				'wanita'=>'wanita'
		);
		$data = array(
				'id_eselon_1'=>$data['option_eselon1'],
				'id_eselon_2'=>$data['option_eselon2'],
				'id_eselon_3'=>$data['option_eselon3'],
				'id_eselon_4'=>$data['option_eselon4'],
				'id_golongan'=>$data['option_golongan'],
				'id_jabatan'=>$data['option_jabatan'],
				'jenisKelamin'=>$data['option_jenisKelamin'],
				'title'=>'TAMBAH PEGAWAI',
				'form'=>'selected',
				'main'=>'form/add/add_peg'
		); 
		$this->load->view('container/template',$data);*/
	}
	
	function insert_peg()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_eselon_1','id_eselon_1','trim|required');
		$this->form_validation->set_rules('id_eselon_2','id_eselon_2','trim|required');
		$this->form_validation->set_rules('id_eselon_3','id_eselon_3','trim|required');
		$this->form_validation->set_rules('id_eselon_4','id_eselon_4','trim|required');
		$this->form_validation->set_rules('id_golongan','id_golongan','trim|required');
		$this->form_validation->set_rules('id_jabatan','id_jabatan','trim|required');	
		$this->form_validation->set_rules('nip','nip','trim|required');
		$this->form_validation->set_rules('nama','nama','trim|required');
		$this->form_validation->set_rules('jenisKelamin','jenisKelamin','trim|required');
		    			
	   $data = array(
		   'id_eselon_1'=>$this->input->post('id_eselon_1'),
		   'id_eselon_2'=>$this->input->post('id_eselon_2'),
		   'id_eselon_3'=>$this->input->post('id_eselon_3'),
		   'id_eselon_4'=>$this->input->post('id_eselon_4'),
		   'id_golongan'=>$this->input->post('id_golongan'),
		   'id_jabatan'=>$this->input->post('id_jabatan'),
		   'jenisKelamin'=>$this->input->post('jenisKelamin'),
		   'nama'=>$this->input->post('nama'),
		   'nip'=>$this->input->post('nip')
	   );
		if($this->form_validation->run() == FALSE ){
			$info['error'] 		= TRUE;
			$info['message'] 	= 'Data yang anda masukkan masih ada yang kurang';
		}else{
				 
			 
			if($this->MChain->insert_peg($data)){
				$info['error'] = FALSE;
				$info['message'] = 'Insert data lowongan berhasil.';

			}else{
				$info['error'] = TRUE;
				$info['message'] = 'Generate data gagal';
 			}
		}
		
		header('Content-type: application/json');
		echo json_encode($info);			 
 		 
	}

	
}
?>