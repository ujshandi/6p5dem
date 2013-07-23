<?Php
if ( ! function_exists('show'))
{
	function  show($view, $data)
	{
		global $template;		
		$ci = &get_instance(); 
		$data['view'] = $view;		
		
		$ci->load->view('layout/header.php', $data);
	}	
		
}