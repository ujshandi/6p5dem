<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
 	}

	function index()
	{
	
		//rss reader
		$this->load->library('simplepie');
		$feed_urls = array(
			'http://www.kompas.com/getrss/all',
			'http://rss.detik.com/index.php/detiknews/',
			'http://news.google.com/news?ned=us&topic=h&output=rss'
		);

		foreach ($feed_urls as $feed_url)
		{
			$feed[] = $this->_get_feed($feed_url);
		}
		$this->simplepie->set_cache_location(base_url() . 'cache');
		
		$data = array(
				'title'=>'Pengelolaan SDM',
				'main'=>'home',
				//'weather'=>$this->checkWeather(),
				'feed'=>$feed
		); 
		$this->load->view('container/template',$data);
	}
	

/*-------------------------------
WEATER CONTROLLER
---------------------------------*/
	/*function checkWeather(){ 
		$this->load->library('curl');
		$url = 'http://weather.yahooapis.com/forecastrss?w=1047378&u=f';
		$xml = $this->curl->simple_get($url); 
		// SimpleXML seems to have problems with the colon ":" in the response tags

		$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
		if ($xml) { 
			try { 
				$xmlobject = new SimpleXMLElement($xml);
				if ($xmlobject == false){ 
					return false; 
				} 
			}catch (Exception $e) { 
				return false;
			}
			$forecast = array();
			foreach ($xmlobject->channel as $channel) { 
				foreach($channel->yweatherlocation->attributes() as $a => $b) { 
					if($a=='city') { 
						$forecast[$a] = (string)$b; 
					} 
				} 
			} 
			foreach ($xmlobject->channel->item as $item) { 
				foreach($item->yweathercondition->attributes() as $a => $b) { 
					$forecast[$a] = (string)$b; 
				} 
			} 
		}
		//print_r($forecast);
		//$data['hasil'] = $forecast;
		//$this->load->view('test',$data);
		return @$forecast;
	} */
	//rss feed
	function _get_feed($url){

		$feed = new SimplePie();
		$feed->set_feed_url($url);
		$feed->init();

		$count = 0;

		foreach($feed->get_items(0, 5) as $item){
			$return[$count]['title'] = $item->get_title();
			$return[$count]['permalink'] = $item->get_permalink();
			$return[$count]['weather']	=$item->get_content();
			$count ++;
		}       
		return $return;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */