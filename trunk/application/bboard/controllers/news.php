<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('mdl_news', 'news');
	}

	function index()
	{
		$data['results'] = $this->news->getItem();
		$this->load->view('news/news_list', $data);
	}
}

/* End of file news.php */
/* Location: ./application/controllers/news.php */