<?Php
if ( ! function_exists('show'))
{
	function  show($view, $data)
	{
		global $template;		
		$ci = &get_instance(); 
		$data['view'] = $view;		
		
		$ci->load->view('layout/index.php', $data);
	}	
		
}

function fbAppsId() {
		return '507422122627183';
	}
	function getTwitStatus($mention="goyz87") {
	//$jsonpath = "http://search.twitter.com/search.json?q=".urlencode($mention)."&rpp=5&include_entities=true&result_type=mixed";
		$jsonpath = "http://api.twitter.com/1/statuses/user_timeline/".$mention.".json";
		$decode   = file_get_contents($jsonpath);
		$data   = json_decode($decode);
		return $data;
	}
	
	function fbfanpage($width="", $height="", $stream=false) {
		return '<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FPenggemarSoftwareDevelopment&amp;width='.$width.'&amp;height='.$height.'&amp;show_faces=true&amp;colorscheme=light&amp;stream=true&amp;show_border=true&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$width.'px; height:'.$height.'px;" allowTransparency="true"></iframe>';
	}