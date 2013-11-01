<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class get_xml extends My_Controller
{		public function __construct(){		parent::__construct();		$this->load->helper('path');		$this->load->helper('xml');	}		function index(){	/*		$u = $this->print_xml();				foreach( $u['unitkantor'] as $k => $v ){			echo $k;		} */	}	
	function print_xml()
	{		/*		$xml = simplexml_load_file("http://sik.dephub.go.id/report/pegawai/pegawai.xml");		echo $xml->getName() . "<br />";		*/		$url = 'http://localhost/androidhive/pegawai.xml';		$file = file_get_contents($url); 		$pegawai_xml = simplexml_load_string($file);		$users_array = array();		//print_r($xml);		foreach($pegawai_xml->unitkantor as $u)		{			echo (string)$u->nama . "<br/>";						/*$users_array[ (string)$u->email ]['name'] = (string)$u->name;			$users_array[ (string)$u->email ]['email'] = (string)$u->email;			$users_array[ (string)$u->email ]['password'] = (string)$u->password;			*/			/*			$users_array[ (string)$u->unitkantor ]['unitkantor'] = (string)$u->unitkantor;			foreach($u->unitkantor as $p)			{				@$users_array[(string)$u->unitkantor]['nama'] = explode("," ,(string)$p->nama);			} */ 		}		  //$this->load->view('cron/test', $data); 		//return $users_array;	
	}
}