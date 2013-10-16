<?php

class produk_hukum extends My_Controller {

	function __construct()
	{
		
		parent::__construct();
		//	$this->load->library(array('pagination','filedownload'));
		$this->load->helper(array('url','form','download'));
		$this->CI = & get_instance(); 
		$this->load->model('mjdih');
		
		if(!$this->session->userdata('login') == TRUE){
			redirect(base_url().'index.php/auth/login');
		}
	}
	
	function peraturan($p1="")
	{
			$data['flag']=$p1;
			
			$this->db->select ('*')->from('JDIH_MENU_F');
			$this->db->where('MENU_GROUPING_ID',3);
			$query=$this->db->get();
			$res=$query->result_array();
			
			switch ($data['flag']){
				case 1:
					$data['form'] = "Undang-undang";
					break;
					
				case 2:
					$data['form'] = "Peraturan Pemerintah";
					break;
					
				case 3:
					$data['form'] = "Peraturan Presiden";
					break;
				case 4:
					$data['form'] = "Instruksi Presiden";
					break;
				case 5:
					$data['form'] = "Keputusan Presiden";
					break;
				case 6:
					$data['form'] = "Peraturan Menteri";
					break;
				case 7:
					$data['form'] = "Keputusan Menteri";
					break;
				case 9:
					$data['form'] = "Keputusan DIRJEN";
					break;
				case 10:
					$data['form'] = "Surat Edaran DIRJEN";
					break;
				case 8:
					$data['form'] = "Lain - lain";
					break;
			
			}		
			
			$data['res']=$this->mjdih->get_data('get_tahun',$data['flag']);
          	show('vundang-undang', $data);
		  
	}
	
	function lihat_uud($p1="",$p2="",$p3=""){
			
			$tahun=$p1;
			$data['flag']=$p2;
			switch ($data['flag']){
					case 1:
					$data['folder'] = "undang_undang";
					break;
					case 2:
					$data['folder'] = "peraturan_pemerintah";
					break;
					case 3:
					$data['folder'] = "peraturan_presiden";
					break;
					case 4:
					$data['folder'] = "instruksi_presiden";
					break;
					case 5:
					$data['folder'] = "keputusan_presiden";
					break;
					case 6:
					$data['folder'] = "peraturan_menteri";
					break;
					case 7:
					$data['folder'] = "keputusan_menteri";
					break;
					case 8:
					$data['folder'] = "lain_lain";
					break;
					case 9:
					$data['folder'] = "keputusan_dirjen";
					break;
					case 10:
					$data['folder'] = "surat_edaran_dirjen";
					break;
				}
			
			
			$form=$p3;
			$data['form'] = "Daftar ".$form." Tahun ".$tahun;
			$data['res']=$this->mjdih->get_data('data_peraturan',$data['flag'],$tahun,'Y');
          	show('vdaftar_uud', $data);
	}
	
	function action(){
	global $site_adm;
	$id=$this->uri->segment(3);
	$file=$this->uri->segment(4);
	$data['flag']=$this->uri->segment(5);
	switch ($data['flag']){
					case 1:
					$data['folder'] = "Undang_undang";
					break;
					case 2:
					$data['folder'] = "peraturan_pemerintah";
					break;
					case 3:
					$data['folder'] = "peraturan_presiden";
					break;
					case 4:
					$data['folder'] = "instruksi_presiden";
					break;
					case 5:
					$data['folder'] = "keputusan_presiden";
					break;
					case 6:
					$data['folder'] = "peraturan_menteri";
					break;
					case 7:
					$data['folder'] = "keputusan_menteri";
					break;
				}
	
	$data = file_get_contents($site_adm."files/".$data['folder']."/".$file);
	$name=$file;
	force_download($name, $data); 
	}
	
	function cek_file(){
 
		global $site_adm;

		$folder=$this->input->post('folder');
		$file=$this->input->post('file');
		//$id=$this->input->post('id');
		//$loc=$site_adm.'files/'.$folder.'/'.$file;
		//$res=$this->db->get('m_config')->row();
		//$file=$this->db->get_where('d_produk_hukum',array('id'=>$id))->row();
		$loc=$this->config->item('path_doc').$folder."/".$file;
		//$loc="D:/xampp/htdocs/admjdih/files/undang_undang/Materi_PHP.pdf";
		//echo $loc;
		if (file_exists($loc)) {
			echo 1;
		} else {
			//$this->db->query("update d_produk_hukum set status_f='N' where id=".$this->input->post('id'));
			echo "File Not Exist";
		}
		
	}
	
	function ttg(){
		 $data['form'] = "Tentang Kami";
		 	$res=$this->mjdih->get_data('m_tentang_kami');
			
			
			$data['id_tentang']=$res->ID;
			$data['isi_tentang']=$res->ISI_TENTANGKAMI;
			show('vtentang',$data);
	}
	
	function kontak(){
		 $data['form'] = "Kontak Kami";
		
          	show('vkontak', $data);
		  //redirect('mod_sosio_eko/test_form#');
	}
	
	function faq(){
		
		$data['res']=$this->mjdih->get_data('m_faq');
		$data['pesan']='';
		
			$submit=$this->input->post('submit');
				if($submit!=false){
					if($this->input->post('pertanyaan')==''){
					$data['pesan']='HARAP ISI PERTANYAAN ATAU KOMENTAR ANDA';
					}
					else{
					$this->model_gw->insert_faq();
					$data['pesan']='Terima Kasih Telah Mengunjungi JDIH Kementerian ESDM <br> Pertanyaan Anda Akan Segera Dikonfirmasi';
					}
				}
		
		show('vfaq', $data);
		
	}
	function lempar(){
		redirect ('http://localhost/admjdih');
	}
	
	function get_data($p1=""){
		echo $this->mjdih->get_data($p1);
	}
	
	function artikel(){
			$data['form']='ARTIKEL';
	
			$data['linkurl']	= "http://esdm.go.id";
			$data['linkname']	= 'TES CUYZ';
			
		
			$query=$this->db->query('SELECT * FROM JDIH_M_ARTIKEL ORDER BY ID ASC');
			$data['res']=$query->result_array();
			
			$query2=$this->db->query('SELECT * FROM JDIH_M_ARTIKEL ORDER BY ID DESC');	
			$data['res2']=$query2->result_array();
			
		show('vartikel',$data);
	}
	
	function berita(){
	
	}
	
	function add_hukum(){
		$data['title'] = 'Tambah Hukum';
		show('hukum_add', $data);
	}
	
	function proses_insert(){
		# get pos
        $data['ID_PRODUK_HUKUM'] 	= $this->input->post('ID_PRODUK_HUKUM');
        $data['ID_TEMATIK'] 		= $this->input->post('ID_TEMATIK');
        $data['TAHUN'] 				= $this->input->post('TAHUN');
        $data['TANGGAL'] 			= date('Y-m-d');
        $data['JUDUL'] 				= $this->input->post('JUDUL');
        $data['DESKRIPSI'] 			= $this->input->post('DESKRIPSI');
        $data['STATUS'] 			= $this->input->post('STATUS');
		
		# validasi
        $this->form_validation->set_rules('ID_PRODUK_HUKUM', 'ID PRODUK HUKUM', 'required');
        $this->form_validation->set_rules('ID_TEMATIK', 'ID TEMATIK', 'required');
        $this->form_validation->set_rules('TAHUN', 'TAHUN', 'required|numeric');
        $this->form_validation->set_rules('JUDUL', 'JUDUL', 'required');
        $this->form_validation->set_rules('DESKRIPSI', 'DESKRIPSI', 'required');
        $this->form_validation->set_rules('STATUS', 'STATUS', 'required');
		
		// set message validation
		$this->form_validation->set_message('required', 'Field %s harus diisi!');
		
		if ($this->form_validation->run() == FALSE){
			show('hukum_add', $data);
		}else{
			# --
			$error='';
			$result=true;
			$extensi = '';
			
			# load
			$this->load->helper('file');
			
			# get file
			$fupload = $_FILES['datafile'];
			$nama = $_FILES['datafile']['name'];
			$extensi = $_FILES['datafile']['type'];
			
			/*# cek extensi file
			$allowedExtensions = array("xls");

			if (!in_array(end(explode(".", 
				strtolower($nama))), 
				$allowedExtensions)) { 
				
				$this->import_gagal('File yang disuport hanya Excel (xls)');
				return;
			} */
				  
			# proses upload
			if(isset($fupload)){
				$lokasi_file 	= $fupload['tmp_name'];
				$direktori		= "upload/jdih/$nama";
			
				if(move_uploaded_file($lokasi_file, $direktori)){ // proses upload
				
					$data['FILE'] 				= $nama;
				
					$this->mjdih->insert($data);
					redirect('home');
				}else{
					//$this->import_gagal('File gagal diupload');
					echo 'file gagal diupload';
				}
			}
		}
	}
	
}