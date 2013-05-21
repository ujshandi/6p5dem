<?php
 class Captcha_model extends Model
 {
 	private $vals = array();
 	
	private $baseUrl  = 'http://modulkn.local/';
	//private $baseUrl  = 'http://10.10.1.43/';
	private $basePath = 'D:/www/webroot/mknii/';
	//private $basePath = '/opt/lampp/htdocs/mknii/';
	
	private $captchaImagePath = 'tmp/captcha/';
	private $captchaImageUrl  = 'tmp/captcha/';
	private $captchaFontPath  = 'c:/windows/fonts/verdana.ttf';
	
	public function __construct($configVal = array())
	{
		parent::Model();
		
		$this->load->plugin('captcha');		
		
		if(!empty($config))
			$this->initialize($configVal);
		else
			$this->vals = array(
								'word'		 	=> '',
								'word_length'	=> 4,
								'img_path'	 	=> $this->basePath . $this->captchaImagePath,
								'img_url'	 	=> $this->baseUrl . $this->captchaImageUrl,
								'font_path'	 	=> $this->captchaFontPath,
								'img_width'	 	=> '135',
								'img_height' 	=> 50,
								'expiration' 	=> 3600
							   );	
	}	
	
	/**
	 * initializes the variables
	 *
	 * @author 	Mohammad Jahedur Rahman <jahed01@gmail.com>
	 * @access 	public
	 * @param 	array 	config
	 */		 	
	public function initialize ($configVal = array())
	{
		$this->vals = $configVal;
	} //end function initialize
	
	//---------------------------------------------------------------
	
	/**
	 * generate the captcha
	 *
	 * @author 	Mohammad Jahedur Rahman <jahed01@gmail.com>
	 * @access 	public
	 * @return 	array
	 */	
	public function generateCaptcha () 
	{
		$cap = create_captcha($this->vals);
		
		return $cap;	
	} //end function generateCaptcha	
 }
?>