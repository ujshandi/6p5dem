<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class News extends MY_Frontpage
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
	
	function detail(){
		$this->open();
		$id=$this->uri->segment(3);
		$data['results'] = $this->news->getItemById($id);
		$this->load->view('news/news_detail', $data);
		$this->close();
	}
}

/* End of file news.php */
/* Location: ./application/controllers/news.php */