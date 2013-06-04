<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Agenda extends CI_Controller
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
}

/* End of file agenda.php */
/* Location: ./application/controllers/agenda.php */