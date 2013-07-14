<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends MY_Frontpage
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('mdl_agenda', 'agenda');
	}

	function index()
	{
		$data['results'] = $this->agenda->getItem();
		$this->load->view('agenda/agenda_list', $data);
	}
	
	function detail(){
		$this->open();
		$id=$this->uri->segment(3);
		$data['results'] = $this->agenda->getItemById($id);
		$this->load->view('agenda/agenda_detail', $data);
		$this->close();
	}
}

/* End of file agenda.php */
/* Location: ./application/controllers/agenda.php */